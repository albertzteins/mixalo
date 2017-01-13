<?php
header ('Content-type: text/html; charset=utf-8');

# Includes
require_once 'inc/config.php';
require_once 'inc/functions.php';
require_once 'inc/constants.php';
require_once 'controllers/RootController.php';
require_once 'models/User.class.php';

if (DEVELOPMENT) error_reporting(E_ALL | E_STRICT);
else error_reporting(0);

# Set dabatase
try {
  $pdo_options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
  );
  $db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=UTF8', MYSQL_USER, MYSQL_PASS, $pdo_options);
} catch (PDOException $e) {
  if (DEVELOPMENT) print 'Error: ' . $e->getMessage() . '<br />' . chr(10);
  else echo 'There was an error with the database.' . chr(10);
  die();
}

# Start the user class and get the user if he is logged in
$user = User::getLoggedUser();

# Set the site's URI, name, index page and error page
$root = new RootController(SITE_URI, SITE_NAME, 'controllers/HomeController.php', 'views/error.php');

# User pages
$root->addPageHandler('ajax', 'controllers/AjaxController.php', array(1 => 'action'));
$root->addPageHandler('eliminar', 'controllers/DeleteCampaignController.php', array(1 => 'campaign_id'));
$root->addPageHandler('imagenes', 'controllers/PreviewCampaignController.php', array(1 => 'campaign'));
$root->addPageHandler('login', 'controllers/UserLoginController.php', array(1 => 'action'));
$root->addPageHandler('nueva', 'controllers/CampaignController.php', array(1 => 'campaign'));
$root->addPageHandler('top', 'controllers/TopController.php', array(1 => 'campaign_type'));
$root->addPageHandler('ver', 'controllers/ViewCampaignController.php', array(1 => 'campaign_id'));
$root->addPageHandler('legal', 'views/legal.php');
$root->addPageHandler('descargas', 'views/downloads.php');
$root->addPageHandler('banner', 'controllers/BannerController.php', array(1 => 'action', 2 => 'banner_id'));

$file_to_include = $root->getFileToInclude();
$current_page = $root->getCurrentPage();
require $file_to_include;

# Close database connection
$db = null;
?>
