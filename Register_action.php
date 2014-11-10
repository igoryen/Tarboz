<?php

require_once 'config.php';
require_once 'plug-in/email.php';
require_once BUSINESS_DIR_USER . 'UserManager.php';
require_once BUSINESS_DIR_LOCATION . 'LocationManager.php';
require_once BUSINESS_DIR_LANG_PROF. 'LanguageProfManager.php';

$allworks = false;
$userManager = new UserManager();
$User  = new User();

//This will contain the user Information
$user_info = isset($_POST['json'])?$_POST['json']:"";

//user Information
$userid           = $user_info['userid'];
$userfname        = $user_info['fname'];
$userlname        = $user_info['mlname'];
$dob              = $user_info['dob'];
$emailid          = $user_info['emailid'];
$pass             = $user_info['password'];
$user_insert_id   = ""; 

//contains the city Ids, it will get us the location 
//$cityid = $userManager->getuserLocation();

$cityid='1';

//Inserting into the profecient Table;;
$LProfManager = new LanguageProfManager();

$User->setFirstName($userfname);
$User->setLastName($userlname);
$User->setLogin($userid);
$User->setEmail($emailid);
$User->setDOB($dob);
$User->setLocation($cityid);
$User->setRegistration_date(date("Y-m-d"));
$User->setUserType(4);
      
$user_insert_id =$userManager->addUser($User);
      
$cityid='4';

$prof = [];

$count_prof = count($user_info['mylanguage']);
$i = 0;
if(count($count_prof)>0){
  for($i=0;$i<$count_prof;$i++){

    $lprof[] = new LanguageProf();

    $lprof[$i]->setLanguageId($user_info['mylanguage'][$i]);

    $lprof[$i]->setProf($user_info['proficient'][$i]);

    $lprof[$i]->setUserId($user_insert_id);

    if($LProfManager->AddProficient($lprof[$i])){

      $allworks=true;
      //echo '1';
    }


  }
}

$body = "Dear ".$userfname.","."<br> Thank you for registering with Tarboz.com.<br>We are glad you are with us
Please follow the link below, to reset your password.<br>"."http://tarboz.com/Registered.php/?activate=".sha1($emailid);

//public function email($email, $username, $body,$Subject)
if($allworks){

  if(email($emailid,$userid,$body,"Tarboz.com new Account")) echo '1';
}


?>
