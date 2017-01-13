<?php

/*
Variables from the URI {
  1 => 'campaign'
}
*/

$include = ERROR_PAGE;

if ($campaign == 'epn.jpg')
{
  
  if (isset($_GET['line_1']) && isset($_GET['line_2']) && isset($_GET['line_3']) && isset($_GET['line_4']))
  {
    
    require 'models/CampaignEPN.class.php';

    $campaign = new CampaignEPN;
    
    $campaign->setLine1($_GET['line_1']);
    $campaign->setLine2($_GET['line_2']);
    $campaign->setLine3($_GET['line_3']);
    $campaign->setLine4($_GET['line_4']);
    
    header('Content-Type: image/jpeg');

    $campaign->getImage();

    $include = null;
    
  }
  
}
elseif ($campaign == 'jvm.jpg')
{
  
  if (isset($_GET['line_1']) && isset($_GET['line_2']) && isset($_GET['line_3']))
  {
    
    require 'models/CampaignJVM.class.php';

    $campaign = new CampaignJVM;
    
    $campaign->setLine1($_GET['line_1']);
    $campaign->setLine2($_GET['line_2']);
    $campaign->setLine3($_GET['line_3']);
    
    header('Content-Type: image/jpeg');

    $campaign->getImage();

    $include = null;
    
  }
  
}
elseif ($campaign == 'amlo.jpg')
{
  
  if (isset($_GET['line_1']) && isset($_GET['line_2']))
  {
    
    require 'models/CampaignAMLO.class.php';

    $campaign = new CampaignAMLO;
    
    $campaign->setLine1($_GET['line_1']);
    $campaign->setLine2($_GET['line_2']);
    
    header('Content-Type: image/jpeg');

    $campaign->getImage();

    $include = null;
    
  }
  
}
elseif ($campaign == 'quadri.jpg')
{
  
  if (isset($_GET['line_1']) && isset($_GET['line_2']) && isset($_GET['line_3']))
  {
    
    require 'models/CampaignQUADRI.class.php';

    $campaign = new CampaignQUADRI;
    
    $campaign->setLine1($_GET['line_1']);
    $campaign->setLine2($_GET['line_2']);
    $campaign->setLine3($_GET['line_3']);
    
    header('Content-Type: image/jpeg');

    $campaign->getImage();

    $include = null;
    
  }
  
}


if ($include) include($include);

?>