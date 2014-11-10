<?php

require_once 'config.php';
require_once BUSINESS_DIR_USER . 'UserManager.php';
require_once BUSINESS_DIR_LOCATION . 'LocationManager.php';
require_once BUSINESS_DIR_LANG_PROF. 'LanguageProfManager.php';

$allworks = false;
$userManager = new UserManager();
$User  = new User();

$random_text="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@.()";
$substr = substr(str_shuffle($random_text),0,10);

//This will contain the user Information
$user_info = isset($_POST['json'])?$_POST['json']:"";

//{fname: fname, mlname : lname, 
//	userid : uid, emailid : email, mylanguage : arrLang, proficient : arrPrf, dob : yearsel+"-"+monthsel+"-"+daysel};
//user Information
$userid 	      = $user_info['userid'];
$userfname 	      = $user_info['fname'];
$userlname 	      = $user_info['mlname'];
$dob 	   	      = $user_info['dob'];
$emailid   	      = $user_info['emailid'];
$pass 	      = $user_info['password'];
$user_insert_id   = ""; 

//contains the city Ids
//$cityid = $userManager->getuserLocation();

$cityid='1';

/*$usid = '1';
$langid='1';
$prof='Perfect';*/

//Inserting into the profecient Table;;
$LProfManager = new LanguageProfManager();

/*if($LProfManager->AddProficient($lprof)){

      echo "Inserted";
}
else {echo "not Inserted";}*/

      $User->setFirstName($userfname);
      $User->setLastName($userlname);
      $User->setLogin($userid);
      $User->setEmail($emailid);
      $User->setDOB($dob);
      $User->setLocation($cityid);
      $User->setRegistration_date(date("Y-m-d"));
      $User->setUserType(4);
      
      $user_insert_id =$userManager->addUser($User);
      
//*********************************************

/*$userid 	= "Afghan123";
$userfname 	= "Habib";
$userlname 	= "Zahoori";
$dob 	   	= "2001-02-02";
$emailid   	= "aaa@aa.com";
$pass 	   	= "iloveyou";*/

//contains the city Ids
//$cityid = $userManager->getuserLocation();

//*******************************************
$cityid='4';

$languages = "";
$prof = [];

/*//$lprof->setLanguageId($langid);

$lprof->setUserId($usid);
$lprof->setProf($prof);*/

$count_prof = count($user_info['mylanguage']);
$i = 0;
if(count($count_prof)>0){
      for($i=0;$i<$count_prof;$i++){

            $lprof[] = new LanguageProf();

            echo $user_info['mylanguage'][$i].",";

            $lprof[$i]->setLanguageId($user_info['mylanguage'][$i]);

            $lprof[$i]->setProf($user_info['proficient'][$i]);

            $lprof[$i]->setUserId($user_insert_id);

            if($LProfManager->AddProficient($lprof[$i])){

                 $allworks=true;
            }


	}
}

     /* if($userManager->addUser($User)){
      		echo "data inserted";
      }
      else{
      	echo "Cannot Insert";
      }*/

      //$User->setUserLanguage();
      //$User->setEmailSub();


?>
