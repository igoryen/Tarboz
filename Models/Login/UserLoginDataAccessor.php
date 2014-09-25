<?php

  require_once DB_CONNECTION . 'DBHelper.php';
  require_once BUSINESS_DIR_USER. 'User.php';
    //has constants for the table; USER
  require_once(DB_CONNECTION.'datainfo.php'); 


  class UserLoginDataAccessor {
    
    /*-------------------------------
      for search
      20. create new instance of database helper
      30. pass a query statment and get the data
      40. returns the user
      ------------------------------*/
    public function userLogin($loginid, $pwd){
      $query = "SELECT * FROM ". USER . "  WHERE usr_login = " .
      ' " $loginid " '. "and usr_password = ".' " $pwd " ' ;
      $dbHelper = new DBHelper(); // 20
      $result = $dbHelper->executeSelect($query); // 30      
      $user = $this->getUser($result);  // 40      
      return $user;
    }
    
    /*-------------------------------
      To be moved to bottom later, private to be accessed by member functions only
      ------------------------------*/
    private function getUser($selectResult){    
      $User = new User();
      $count = 0;
      
      while($list = mysqli_fetch_assoc($selectResult)){
        //usr_user_id,`usr_first_name`, `usr_last_name`, `usr_login`, `usr_password`, `usr_email`, `usr_DOB`, `usr_registration_date`, `usr_user_type_id`, `usr_language`, `usr_email_subscribed`
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

    
    /*  public function getUserByLocation($userloc){
    
    // returns returns all users with the names passed
      $query = "SELECT * FROM ".USER. "   WHERE usr_location_id = '$userloc' ";

      // create new instance of database helper
      $dbHelper = new DBHelper();

      // pass a query statement and get the data
      $result = $dbHelper->executeSelect($query);

      // returns a list of Users
      $Users = $this->getUserList($result);

      return $Users;
    } 
        
        */
  
  }


?>