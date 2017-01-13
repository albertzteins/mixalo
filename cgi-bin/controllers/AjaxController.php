<?php

/*
Variables from the URI {
  1 => 'action'
}
*/

if ($action == 'votar')
{
  
  if ($_POST['id'] && ctype_digit($_POST['id']))
  {
    
    require 'models/Campaign.class.php';
    
    $vote = Campaign::voteForCampaignWithId((int)$_POST['id']);
    
    if (!$vote) header("HTTP/1.0 400 Bad Request");
    
  }
  else
  {
    header("HTTP/1.0 404 Not Found");
  }
  
}
elseif ($action == 'recientes.ajax')
{
  
  require 'models/Campaign.class.php';
  
  if (ctype_digit($_GET['page']))
  {
    $offset = 40 * ($_GET['page'] - 1);
    $campaigns = Campaign::getCampaignsByDate(40, $offset);
    
    include 'ajax/campaigns.php';
    
  }
  
}
elseif ($action == 'top.ajax')
{
  
  require 'models/Campaign.class.php';
  
  if (ctype_digit($_GET['page']))
  {
    $offset = 40 * ($_GET['page'] - 1);
    
    if (isset($_GET['campaign_type']) && ctype_digit($_GET['campaign_type']))
      $campaigns = Campaign::getCampaignsByVotes(40, $offset, (int)$_GET['campaign_type']);
    else
      $campaigns = Campaign::getCampaignsByVotes(40, $offset);
    
    include 'ajax/campaigns.php';
    
  }
  
}
else
{
  
  include ERROR_PAGE;
  
}

?>