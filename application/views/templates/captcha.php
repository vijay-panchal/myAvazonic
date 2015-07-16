<?php
	$md5_hash = md5(rand(0,999)); 
	$security_code = substr($md5_hash, 15, 6); 
	$this->session->set_userdata('captcha',$security_code);
	$width = 70;
	$height = 20; 
	$image = ImageCreate($width, $height);  
	$white = ImageColorAllocate($image, 255, 255, 255); 
	$black = ImageColorAllocate($image, 64, 63, 49);
	$grey  = ImageColorAllocate($image, 64, 63, 49);
	ImageFill($image, 0, 0, $black); 
	imagefontheight(23);
	imagefontwidth(40);
	ImageString($image, 7, 10, 3, $security_code, $white); 
	ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
	header("Content-Type: image/jpeg"); 
	ImageJpeg($image);
	ImageDestroy($image);
?>