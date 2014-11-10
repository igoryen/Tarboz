<?php 
require_once 'config.php';
require_once BUSINESS_DIR_USER . 'UserManager.php';
require_once BUSINESS_DIR_LANG_PROF . 'LanguageProfManager.php';

require("header.php");


/*
	The purpose of this file is to give the user a message of their account being registered
	and also let the user activate their account through this page aswell
*/

$activate = isset($_GET['activate'])?$_GET['activate']:"";

if(!isset($activate)){
		
?>
<div style="height:40%;width:60%;background-color:rgba(255,255,255,0.6);;margin:0 auto;">
<br><span style="font-size:25px;font-family:verdana;margin-left:3%;weight:bold;">Account successfully created</span>
<p style="font-size:11px;font-family:verdana;margin-left:3%;">Thank you for your registration! An email has been sent to the email address you provided while registering, <br>please confirm your registration ASAP in order to use your account.</p>
</div>
<?php
}
else{
	//2 is a regular user type
	$usertype = '2';
	$userdata = new UserManager();
	$userid = $userdata->getUserByHashData($activate);

	if($userdata->UpdateUserType($userid,$usertype)){
		Echo "<p style='color:white;font-size:12px;'>Thank you for activating your account. Please use your userid and password to login</p>";
	}
	
	
}
 require("footer.php"); ?>