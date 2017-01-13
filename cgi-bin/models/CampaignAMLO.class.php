<?php

require 'models/CampaignImage.class.php';

class CampaignAMLO extends CampaignImage
{
  private $line1;
  private $line2;
  
  /* Setters */
  function setLine1($line) { $this->line1 = $line; }
  function setLine2($line) { $this->line2 = $line; }
  
  /* Getters */
  function getLine1() { return urlencode($this->line1); }
  function getLine2() { return urlencode($this->line2); }
  
  /* Methods */
  function getImage($fileName = null)
  {
    $source = imagecreatefrompng('views/images/campaign_amlo1.png');
    
    $black = imagecolorallocate($source, 0, 0, 0);
    
    $font = 'fonts/FuturaLT-Book.ttf';
    
    // Line 2
    $bbox2 = $this->getBoundingBoxForWidth(460, $font, $this->line2, 18, true);
    $line2_x = 482 - $bbox2[1];
    $line2_y = floor(404 + ($bbox2[2] / 2));
    imagettftext($source, $bbox2[0], 0, $line2_x, $line2_y, $black, $font, $this->line2);
    
    // Line 1
    $bbox1 = $this->getBoundingBoxForWidth(680, $font, $this->line1, 26, true);
    $line1_x = floor((720 - $bbox1[1]) / 2);
    $line1_y = floor(29 + ($bbox1[2] / 2));
    imagettftext($source, $bbox1[0], 0, $line1_x, $line1_y, $black, $font, $this->line1);
    
    if ($fileName)
    {
      $this->exportImageWithThumb($source, $fileName);
    }
    else
    {
      $this->displayImage($source);
    }
    
    imagedestroy($source);
  }
  
}

?>