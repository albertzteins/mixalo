<?php

/*
Variables from the URI {
  1 => 'campaign'
}
*/

$include = ERROR_PAGE;

require 'models/Campaign.class.php';

if (!$campaign_id)
{
  
  // View all the campaigns
  
  $campaigns = Campaign::getCampaignsByVotes(40);
  
  $ajax_page = 'top.ajax?';
  
  $include = 'views/campaigns.php';
  
}
elseif ($campaign_id == 'recientes')
{
  
  // View all the campaigns
  
  $campaigns = Campaign::getCampaignsByDate(40);
  
  $ajax_page = 'recientes.ajax?';
  
  $include = 'views/campaigns.php';
  
}
elseif (ctype_digit($campaign_id))
{
  
  $campaign = Campaign::getCampaignWithId((int)$campaign_id);
  
  if ($campaign)
  {
    
    /* Get footer-banner */
    require_once 'models/Banner.class.php';
    $banner_footer = Banner::getBannerForPosition(11);
    
    $include = 'views/campaign-view.php';
    
  }
  else
  {
    
    $include = 'controllers/ErrorController.php';
    
  }
  
}

include($include);

?>