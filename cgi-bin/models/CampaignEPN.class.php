<?php

require 'models/CampaignImage.class.php';

class CampaignEPN extends CampaignImage // Width: 309px
{
  private $line1;
  private $line2;
  private $line3;
  private $line4;
  
  /* Setters */
  function setLine1($line) { $this->line1 = mb_strtoupper($line, 'utf-8'); }
  function setLine2($line) { $this->line2 = mb_strtoupper($line, 'utf-8'); }
  function setLine3($line) { $this->line3 = mb_strtoupper($line, 'utf-8'); }
  function setLine4($line) { $this->line4 = mb_strtoupper($line, 'utf-8'); }
  
  /* Getters */
  function getLine1() { return urlencode($this->line1); }
  function getLine2() { return urlencode($this->line2); }
  function getLine3() { return urlencode($this->line3); }
  function getLine4() { return urlencode($this->line4); }
  
  /* Methods */
  function getImage($fileName = null)
  {
    $source = imagecreatefrompng('views/images/campaign_epn1.png');
    
    $white = imagecolorallocate($source, 255, 255, 255);
    $red = imagecolorallocate($source, 238, 28, 37);
    
    $font = 'fonts/avenirnextltproheavy.ttf';
    
    // Line 4
    $bbox4 = $this->getBoundingBoxForWidth(309, $font, $this->line4);
    imagettftext($source, $bbox4[0], 0, 375, 280, $white, $font, $this->line4);
    
    // Line 3 - with red rectangle
    $line3_y = 280 - $bbox4[2] - 12;
    $bbox3 = $this->getBoundingBoxForWidth(309, $font, $this->line3);
    
    imagefilledrectangle($source, 370, $line3_y + 8, 720, $line3_y - $bbox3[2] - 6, $red);
    
    imagettftext($source, $bbox3[0], 0, 375, $line3_y, $white, $font, $this->line3);
    
    // Line 2
    $line2_y = $line3_y - $bbox3[2] - 13;
    $bbox2 = $this->getBoundingBoxForWidth(309, $font, $this->line2);
    imagettftext($source, $bbox2[0], 0, 375, $line2_y, $white, $font, $this->line2);
    
    // Line 1
    $line1_y = $line2_y - $bbox2[2] - 8;
    $bbox1 = $this->getBoundingBoxForWidth(309, $font, $this->line1);
    imagettftext($source, $bbox1[0], 0, 375, $line1_y, $white, $font, $this->line1);
    
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