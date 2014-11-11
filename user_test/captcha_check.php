<?php
session_start();
	//a script that is being called by ajax, to see if the session for the captcha is set
	$captcha = isset($_POST['mocaptcha'])?$_POST['mocaptcha']:"";

	if($_SESSION['capt']==$captcha){
		echo 1;
	}
	
	else{
		echo 0;
	}
?>