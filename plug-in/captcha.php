<?php
header("Content-Type: image/png");
session_start();
captcha();

function captcha(){
	$md5_hash = md5(rand(0,999));//some random number between 0 to 999 change to md5 and assign it to a variable
	$security_code = substr($md5_hash, 15, 5);  //

	$_SESSION['capt']=$security_code; ///assigning values produced into the session

	//this point below it changes the variable into an image
	$im = imagecreate(40, 20)
	    or die("Cannot Initialize new GD image stream");
	$background_color = imagecolorallocate($im, 255, 255, 255);
	$text_color = imagecolorallocate($im, 233, 14, 91);
	imagestring($im, 2, 3, 3,  $security_code, $text_color);
	imagepng($im);
	imagedestroy($im);
}

?>