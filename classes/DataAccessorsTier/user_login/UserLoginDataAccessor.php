<?php

  require_once DB_CONNECTION . 'DBHelper.php';

  require_once BUSINESS_DIR_USER. 'User.php';

    //has constants for the table; USER
  require_once(DB_CONNECTION.'datainfo.php'); 
  //require_once('../../plug-in/email/email_password.php');


  class UserLoginDataAccessor {
    
    /*-------------------------------
      for search
      20. create new instance of database helper
      30. pass a query statment and get the data
      40. returns the user
      ------------------------------*/
    public function user_Login($loginid, $pwd){

      $user = new User();

      $query = "SELECT * FROM ". USER . " WHERE usr_login =  '$loginid' and usr_password = '$pwd'";

      $dbHelper = new DBHelper(); // 20

      $result = $dbHelper->executeSelect($query); // 30    

      $user = $this->getUser($result);   

      return $user;
    }


    public function ForgotPassword($email){

      $reset=false;

      $random_text="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@.()";
      //TO SHUFFLE THE ABOVE TEXT AND PIC 10 CHARS.
      $substr = substr(str_shuffle($random_text),0,10);

      $user = new User();

      $query = "SELECT * FROM ". USER . "  WHERE usr_login =  '$email' " ;

      $dbHelper = new DBHelper(); 

      $result = $dbHelper->executeSelect($query); // 30    

      $user = $this->getUser($result);

      if($user){
        
        $reset=true;
      }

      str_shuffle(str);

      return $reset;
    }
    
    /*-------------------------------
      To be moved to bottom later, private to be accessed by member functions only
      ------------------------------*/
    private function getUser($selectResult){ 
       
      $User = new User();
      $count = 0;
      
      while($list = mysqli_fetch_assoc($selectResult)){
          
        $User->setUserId($list['usr_user_id']);     
        $User->setFirstName($list['usr_first_name']);     
        $User->setLastName($list['usr_last_name']);     
        $User->setLogin($list['usr_login']);      
        //$User->setUserRatingId($list['']);      
        $User->setEmail($list['usr_email']);      
        $User->setDOB($list['usr_DOB']);      
        //$User->setLocation($list['']);      
        $User->setRegistration_date($list['usr_registration_date']);      
        $User->setUserType($list['usr_user_type_id']);      
        $User->setUserLanguage($list['usr_language']);      
        $User->setEmailSub($list['usr_email_subscribed']);      
      }

      return $User;  
    } // end of getUser

  }


?>