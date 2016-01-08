<?php 
include 'class.img.php';//include class file for generate image

//now create a instance of img class with font file names and sizes as following 
$font_file1="fonts/arial.ttf";
$font_file2="fonts/times.ttf";

$font_size="40";
$font_size_watermark="15";

$img_obj=new IMG_PROCESS($font_file1,$font_file2,$font_size,$font_size_watermark); //init with font files and font sizes

//now generate a single image  

	$text_to_image="THIS IS MY TEXT";//
	$size_arr=array("width"=>"500","height"=>"500"); //define height and width
	$savepath="images/my_image_test.jpg";
	$watermark="w3school test";
	$rgb=array("0","0","0");//define a black rgb scheme
	$img_obj->generate_img($text_to_image,$savepath,$size_arr,$watermark,$rgb); //call the generate image 


//now generate a single image  

 


//generate multiple images in loop

$text=array("MY IMAGE TEXT 1","MY IMAGE TEXT 2","MY IMAGE TEXT 3","MY IMAGE TEXT 4","MY IMAGE TEXT 5",);
foreach($text as $title)
{
	 
	//
	$img_name=strtolower(str_replace(" ","-",$title));
	$size_arr=array("width"=>"1366","height"=>"768"); //define height and width
	$savepath="images/".$img_name.".jpg";
	$watermark="w3school test watermark";
	$rgb=array("34","96","76");//define a light green rgb scheme
	$img_obj->generate_img($title,$savepath,$size_arr,$watermark,$rgb); //call the generate image function
	// 
 
	
}

//generate multiple images in loop

?>
