<?php

/*
Variables from the URI {
  1 => 'campaign_id'
}
*/

$include = ERROR_PAGE;

$delete_error = false;
$delete_success = false;

if ($user->isLoggedIn() && ctype_digit($campaign_id))
{
  
  if (isset($_GET['true']))
  {
    require 'models/Campaign.class.php';
    
    $delete_campaign = Campaign::deleteCampaignWithId((int)$campaign_id);
    
    if ($delete_campaign)
      $delete_success = true;
    else
      $delete_error = true;
    
  }
  
  $include = 'views/campaign-delete.php';
  
}

include $include;

?>