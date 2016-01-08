<?php
class IMG_PROCESS{

var $_font1="";
var $_font2="";
var $_font_size="";
var $_font_size_watermark="";

public function __construct($font_1,$font_2,$font_size="40",$font_size_watermark="15")
{
	$this->_font1=$font_1;
	$this->_font2=$font_2;
	$this->_font_size=$font_size;
	$this->_font_size_watermark=$font_size_watermark;
	
}

public function imagettftext_cr(&$im, $size, $angle, $x, $y, $color, $fontfile, $text)
{
	// retrieve boundingbox
	$bbox = imagettfbbox($size, $angle, $fontfile, $text);
	// calculate deviation
	$dx = ($bbox[2]-$bbox[0])/2.0 - ($bbox[2]-$bbox[4])/2.0;         // deviation left-right
	$dy = ($bbox[3]-$bbox[1])/2.0 + ($bbox[7]-$bbox[1])/2.0;        // deviation top-bottom
	// new pivotpoint
	$px = $x-$dx;
	$py = $y-$dy;
	return imagettftext($im, $size, $angle, $px, $y, $color, $fontfile, $text);
}

public function generate_img($name,$savepath,$size_arr,$watermark,$rgb=array("34","96","76"))
{
 
     
$image = imagecreate($size_arr['width'],$size_arr['height']);
$rgb_background = imagecolorallocate($image,$rgb[0],$rgb[1],$rgb[2]);
$grey_shade = imagecolorallocate($image,40,40,40);
$white = imagecolorallocate($image,255,255,255);


// Local font files, relative to script
$otherFont = $this->_font1;
$font = $this->_font2;

 
$i=0;
while($i<10){
$this->imagettftext_cr($image,12,$this->_font_size_watermark,rand(100,500),rand(200,500),$grey_shade,$otherFont,$watermark);
$i++;
}

// Main Text

$w=$size_arr['width'] / 2 ;
$h=$size_arr['height'] / 2 ;

$this->imagettftext_cr($image,$this->_font_size,0,$w,$h,$white,$font,$name);
$this->imagettftext_cr($image,$this->_font_size_watermark,0,$w,$h+30,$white,$otherFont,$watermark);
imagejpeg($image,$savepath);

}

}
?>
