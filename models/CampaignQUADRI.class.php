<?php

require 'models/CampaignImage.class.php';

class CampaignQUADRI extends CampaignImage
{
  private $line1;
  private $line2;
  private $line3;
  
  /* Setters */
  function setLine1($line) { $this->line1 = mb_strtoupper($line, 'utf-8'); }
  function setLine2($line) { $this->line2 = mb_strtoupper($line, 'utf-8'); }
  function setLine3($line) { $this->line3 = $line; }
  
  /* Getters */
  function getLine1() { return urlencode($this->line1); }
  function getLine2() { return urlencode($this->line2); }
  function getLine3() { return urlencode($this->line3); }
  
  /* Methods */
  function getImage($fileName = null)
  {
    $source = imagecreatefrompng('views/images/campaign_quadri1.png');
    
    $green = imagecolorallocate($source, 0, 179, 182);
    $gray = imagecolorallocate($source, 163, 163, 163);
    
    $font = 'fonts/AvantGardeLT-Bold.ttf';
    $font2 = 'fonts/AvantGardeLT-Book.ttf';
    
    // Line 3
    $bbox3 = $this->getBoundingBoxForWidth(148, $font, $this->line3, 10, true);
    $line3_x = 92;
    $line3_y = 406;
    imagettftext($source, $bbox3[0], 0, $line3_x, $line3_y, $gray, $font2, $this->line3);
    
    // Line 2
    $bbox2 = $this->getBoundingBoxForWidth(445, $font, $this->line2, 26, true);
    $line2_x = 27;
    $line2_y = 84;
    imagettftext($source, $bbox2[0], 0, $line2_x, $line2_y, $green, $font, $this->line2);
    
    // Line 1
    $bbox1 = $this->getBoundingBoxForWidth(445, $font, $this->line1, 26, true);
    $line1_x = 27;
    $line1_y = ($line2_y - $bbox2[2]) - 10;
    imagettftext($source, $bbox1[0], 0, $line1_x, $line1_y, $green, $font, $this->line1);
    
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