<?php

// Include utility files
require_once '../config.php';
require_once BUSINESS_DIR_USER . 'User.php';
require_once BUSINESS_DIR_USER_LOGIN . 'UserLoginManager.php';

//$EmailAddress=isset($_POST['email']) ? $_POST['email'] : "";

$EmailAddress = "like_change@hotmail.com";
$userLoginManager = new UserLoginManager();

$logged = $userLoginManager->ForgotPassword($EmailAddress);

if ($logged) {
  echo "sent";
}
else {
  echo "fail";
}

//				echo "\nThe user is:".$_SESSION["user"]->getFirstName();
?>