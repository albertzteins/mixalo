<?php

require 'models/Campaign.class.php';

$epn = Campaign::getRandomFromTopForCampaignType(1);
$jvm = Campaign::getRandomFromTopForCampaignType(2);
$amlo = Campaign::getRandomFromTopForCampaignType(3);
$quadri = Campaign::getRandomFromTopForCampaignType(4);

include('views/home.php');

?>