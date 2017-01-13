<?php

/*
Variables from the URI {
  1 => 'campaign'
}
*/

$include = ERROR_PAGE;

require 'models/Campaign.class.php';

if (!$campaign_type)
{
  
  // View all the campaigns
  
  $campaigns = Campaign::getCampaignsByVotes(40);
  $ajax_page = 'top.ajax?';
  
  $include = 'views/campaigns.php';
  
}
else
{
  
  switch($campaign_type)
  {
    case 'epn':
      $campaign_type_id = 1;
      break;
      
    case 'jvm':
      $campaign_type_id = 2;
      break;
      
    case 'amlo':
      $campaign_type_id = 3;
      break;
      
    case 'quadri':
      $campaign_type_id = 4;
      break;
      
    default:
      $campaign_type_id = false;
  }
  
  if ($campaign_type_id)
  {
    
    $campaigns = Campaign::getCampaignsByVotes(40, 0, (int)$campaign_type_id);
    $ajax_page = 'top.ajax?campaign_type=' . $campaign_type_id . '&';

    if ($campaigns)
    {
      $include = 'views/campaigns.php';
    }
    
  }
  
}

include($include);

?>