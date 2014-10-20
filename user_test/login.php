<?php

// Include utility files
require_once '../config.php';
require_once BUSINESS_DIR_USER . 'User.php';
require_once BUSINESS_DIR_USER_LOGIN . 'UserLoginManager.php';
require_once BUSINESS_DIR_USER_TYPE . 'UserTypeManager.php';

//$_POST['userid']="lily";
//$_POST['password']="prj";


$userid = isset($_POST['userid']) ? $_POST['userid'] : "";
$pwd = isset($_POST['password']) ? $_POST['password'] : "";

//echo $userid . "Testing ";

$userManager = new UserLoginManager();

$logged = $userManager->userLogin($userid, $pwd);

  $userTypeManager = new UserTypeManager();

  $UST = $userTypeManager->getUserTypeById($logged->getUserType());

if ($logged->getFirstName() != "" && $UST=="ADMIN") {
  echo SUCCESS_ADMIN_RIGHT;
}else
if ($logged->getFirstName() != "" && $UST=="USER") {
  echo SUCCESS_ADMIN_RIGHT;
}else
if ($logged->getFirstName() != "" && $UST=="BANNED") {
  echo FAILURE_BANNED;
}else
if ($logged->getFirstName() != "" && $UST=="notconfirmed") {
  echo FAILURE_NOT_CONFIRMED;
}
else {
  echo FAIL;
}

?>