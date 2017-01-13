<?php

class CampaignImage
{
  
  /* Methods */
  function exportImageWithThumb($image, $file_name)
  {
    $thumb_width = 340;
    $thumb_height = 225;
    
    $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
    imagecopyresampled($thumb, $image, 0, 0, 20, 0, $thumb_width, $thumb_height, 680, 450);
    
    imagejpeg($image, CAMPAIGNS_PATH . $file_name . '_n.jpg', 80);
    imagejpeg($thumb, CAMPAIGNS_PATH . $file_name . '_t.jpg', 80);
  }
  
  protected function displayImage($image)
  {
    return imagejpeg($image, null, 85);
  }
  
  protected function getBoundingBoxForWidth($fixed_width, $font, $text, $font_size_default = 28, $fixed_height = false)
  {
    
    $fontSize = $font_size_default;
    
    $bbox = imagettfbbox($fontSize, 0, $font, $text);
    
    $height = abs($bbox[1]) + abs($bbox[7]);
    $width = abs($bbox[0]) + abs($bbox[2]);
    
    if ($width > $fixed_width)
    {
      
      while ($width > $fixed_width)
      {
        $fontSize = $fontSize - 0.1;
        $bbox = imagettfbbox($fontSize, 0, $font, $text);
        $height = abs($bbox[1]) + abs($bbox[7]);
        $width = abs($bbox[0]) + abs($bbox[2]);
      }
      
    }
    elseif ($width < $fixed_width && !$fixed_height)
    {
      
      while ($width < $fixed_width)
      {
        $fontSize = $fontSize + 0.1;
        $bbox = imagettfbbox($fontSize, 0, $font, $text);
        $height = abs($bbox[1]) + abs($bbox[7]);
        $width = abs($bbox[0]) + abs($bbox[2]);
      }
      
    }
    
    return array($fontSize, $width, $height);
    
  }
  
}

?>