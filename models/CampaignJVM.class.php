<?php

require 'models/CampaignImage.class.php';

class CampaignJVM extends CampaignImage
{
  private $line1;
  private $line2;
  private $line3;
  
  /* Setters */
  function setLine1($line) { $this->line1 = $line; }
  function setLine2($line) { $this->line2 = mb_strtoupper($line, 'utf-8'); }
  function setLine3($line) { $this->line3 = mb_strtoupper($line, 'utf-8'); }
  
  /* Getters */
  function getLine1() { return urlencode($this->line1); }
  function getLine2() { return urlencode($this->line2); }
  function getLine3() { return urlencode($this->line3); }
  
  /* Methods */
  function getImage($fileName = null)
  {
    $source = imagecreatefrompng('views/images/campaign_jvm1.png');
    
    $white = imagecolorallocate($source, 255, 255, 255);
    $blue = imagecolorallocate($source, 117, 157, 209);
    $orange = imagecolorallocate($source, 252, 148, 0);
    
    $font = 'fonts/Harabara.ttf';
    
    // Line 3 - with red rectangle
    $bbox3 = $this->getBoundingBoxForWidth(309, $font, $this->line3);
    $line3_y = 236 + $bbox3[2];
    imagettftext($source, $bbox3[0], 0, 342, $line3_y, $orange, $font, $this->line3);
    
    // Line 2
    $line2_y = 215;
    $bbox2 = $this->getBoundingBoxForWidth(309, $font, $this->line2);
    imagettftext($source, $bbox2[0], 0, 342, $line2_y, $blue, $font, $this->line2);
    
    // Line 1
    $line1_y = $line2_y - $bbox2[2] - 8;
    $bbox1 = $this->getBoundingBoxForWidth(309, $font, $this->line1);
    imagettftext($source, $bbox1[0], 0, 342, $line1_y, $white, $font, $this->line1);
    
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