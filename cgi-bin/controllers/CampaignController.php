<?php

/*
Variables from the URI {
  1 => 'campaign'
}

Campaing types:
1: EPN
2: JVM
3: AMLO
4: Quadri

*/

$include = ERROR_PAGE;

$show_publish_button = false;

if ($campaign == 'epn')
{
  
  require 'models/CampaignEPN.class.php';
  
  $epn = new CampaignEPN;
  
  if (getFormValue('refresh'))
  {
    
    $epn->setLine1(getFormValue('line_1') ?: ' ');
    $epn->setLine2(getFormValue('line_2') ?: ' ');
    $epn->setLine3(getFormValue('line_3') ?: ' ');
    $epn->setLine4(getFormValue('line_4') ?: ' ');
    
    $show_publish_button = true;

    $include = 'views/campaign_epn.php';
    
  }
  elseif (getFormValue('publish'))
  {
    
    require 'models/Campaign.class.php';
    
    $cmpgn = new Campaign;
    
    $cmpgn->setCampaignType(1);
    $cmpgn->setDate(date(MYSQL_DATETIME));
    $cmpgn->setAuthor(getFormValue('author'));
    $cmpgn->setAuthorSite(getFormValue('author_site'));
    $cmpgn->setAuthorIP($_SERVER['REMOTE_ADDR']);
    
    if ($cmpgn->save())
    {
      
      $epn->setLine1(getFormValue('line_1') ?: ' ');
      $epn->setLine2(getFormValue('line_2') ?: ' ');
      $epn->setLine3(getFormValue('line_3') ?: ' ');
      $epn->setLine4(getFormValue('line_4') ?: ' ');
      
      $epn->getImage($cmpgn->getId());
      
    }
    
    $include = 'views/campaign-publish.php';
    
  }
  else // Post the default info
  {
    
    $epn->setLine1('Por un México');
    $epn->setLine2('Exitoso');
    $epn->setLine3('Me comprometo');
    $epn->setLine4('Y cumplo');

    $include = 'views/campaign_epn.php';
    
  }
  
}
elseif ($campaign == 'jvm')
{
  
  require 'models/CampaignJVM.class.php';
  
  $jvm = new CampaignJVM;
  
  if (getFormValue('refresh'))
  {
    
    $jvm->setLine1(getFormValue('line_1') ?: ' ');
    $jvm->setLine2(getFormValue('line_2') ?: ' ');
    $jvm->setLine3(getFormValue('line_3') ?: ' ');
    
    $show_publish_button = true;

    $include = 'views/campaign_jvm.php';
    
  }
  elseif (getFormValue('publish'))
  {
    
    require 'models/Campaign.class.php';
    
    $cmpgn = new Campaign;
    
    $cmpgn->setCampaignType(2);
    $cmpgn->setDate(date(MYSQL_DATETIME));
    $cmpgn->setAuthor(getFormValue('author'));
    $cmpgn->setAuthorSite(getFormValue('author_site'));
    $cmpgn->setAuthorIP($_SERVER['REMOTE_ADDR']);
    
    if ($cmpgn->save())
    {
      
      $jvm->setLine1(getFormValue('line_1') ?: ' ');
      $jvm->setLine2(getFormValue('line_2') ?: ' ');
      $jvm->setLine3(getFormValue('line_3') ?: ' ');
      
      $jvm->getImage($cmpgn->getId());
      
    }
    
    $include = 'views/campaign-publish.php';
    
  }
  else // Post the default info
  {
    
    $jvm->setLine1('Josefina');
    $jvm->setLine2('Diferente');
    $jvm->setLine3('Presidenta 2012');

    $include = 'views/campaign_jvm.php';
    
  }
  
}
elseif ($campaign == 'amlo')
{
  
  require 'models/CampaignAMLO.class.php';
  
  $amlo = new CampaignAMLO;
  
  if (getFormValue('refresh'))
  {
    
    $amlo->setLine1(getFormValue('line_1') ?: ' ');
    $amlo->setLine2(getFormValue('line_2') ?: ' ');
    
    $show_publish_button = true;

    $include = 'views/campaign_amlo.php';
    
  }
  elseif (getFormValue('publish'))
  {
    
    require 'models/Campaign.class.php';
    
    $cmpgn = new Campaign;
    
    $cmpgn->setCampaignType(3);
    $cmpgn->setDate(date(MYSQL_DATETIME));
    $cmpgn->setAuthor(getFormValue('author'));
    $cmpgn->setAuthorSite(getFormValue('author_site'));
    $cmpgn->setAuthorIP($_SERVER['REMOTE_ADDR']);
    
    if ($cmpgn->save())
    {
      
      $amlo->setLine1(getFormValue('line_1') ?: ' ');
      $amlo->setLine2(getFormValue('line_2') ?: ' ');
      
      $amlo->getImage($cmpgn->getId());
      
    }
    
    $include = 'views/campaign-publish.php';
    
  }
  else // Post the default info
  {
    
    $amlo->setLine1('El Cambio Verdadero está en tus manos');
    $amlo->setLine2('Unidos es posible');

    $include = 'views/campaign_amlo.php';
    
  }
  
}
elseif ($campaign == 'quadri')
{
  
  require 'models/CampaignQUADRI.class.php';
  
  $quadri = new CampaignQUADRI;
  
  if (getFormValue('refresh'))
  {
    
    $quadri->setLine1(getFormValue('line_1') ?: ' ');
    $quadri->setLine2(getFormValue('line_2') ?: ' ');
    $quadri->setLine3(getFormValue('line_3') ?: ' ');
    
    $show_publish_button = true;

    $include = 'views/campaign_quadri.php';
    
  }
  elseif (getFormValue('publish'))
  {
    
    require 'models/Campaign.class.php';
    
    $cmpgn = new Campaign;
    
    $cmpgn->setCampaignType(4);
    $cmpgn->setDate(date(MYSQL_DATETIME));
    $cmpgn->setAuthor(getFormValue('author'));
    $cmpgn->setAuthorSite(getFormValue('author_site'));
    $cmpgn->setAuthorIP($_SERVER['REMOTE_ADDR']);
    
    if ($cmpgn->save())
    {
      
      $quadri->setLine1(getFormValue('line_1') ?: ' ');
      $quadri->setLine2(getFormValue('line_2') ?: ' ');
      $quadri->setLine3(getFormValue('line_3') ?: ' ');
      
      $quadri->getImage($cmpgn->getId());
      
    }
    
    $include = 'views/campaign-publish.php';
    
  }
  else // Post the default info
  {
    
    $quadri->setLine1('La nueva alianza');
    $quadri->setLine2('Es contigo');
    $quadri->setLine3('Únete a la nueva alianza en');

    $include = 'views/campaign_quadri.php';
    
  }
  
}
elseif ($campaign == 'modificada' && $user->isLoggedIn())
{
  
  if (!empty($_FILES))
  {
    require 'models/Campaign.class.php';
    
    $cmpgn = new Campaign;
    
    $cmpgn->setCampaignType(getFormValue('campaign_type'));
    $cmpgn->setDate(date(MYSQL_DATETIME));
    $cmpgn->setAuthor(getFormValue('author'));
    $cmpgn->setAuthorSite(getFormValue('author_site'));
    $cmpgn->setAuthorIP($_SERVER['REMOTE_ADDR']);
    
    if ($cmpgn->save())
    {
      
      require 'models/CampaignImage.class.php';
      
      $temp_file = $_FILES['image']['tmp_name'];
      $source = imagecreatefromjpeg($temp_file);
      
      $image = new CampaignImage();
      $image->exportImageWithThumb($source, $cmpgn->getId());
      
    }
    
    $include = 'views/campaign-publish.php';
  }
  else
  {
    $include = 'views/campaign-custom.php';
  }
  
}

include($include);

?>