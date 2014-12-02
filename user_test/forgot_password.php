<?php

// Include utility files
require_once '../config.php';
require_once BUSINESS_DIR_USER . 'User.php';
require_once BUSINESS_DIR_USER_LOGIN . 'UserLoginManager.php';

$EmailAddress=isset($_POST['forgot_email']) ? $_POST['forgot_email'] : "";

//$EmailAddress = "like_change@hotmail.com";
$userLoginManager = new UserLoginManager();

$logged = $userLoginManager->ForgotPassword($EmailAddress);

if ($logged) {
  echo 1;
}
else {
  echo 0;
}

//				echo "\nThe user is:".$_SESSION["user"]->getFirstName();
?>