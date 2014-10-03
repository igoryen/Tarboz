<?php

  /*---------------------------------------------
    this is a constant to put inside the include files, 
    where it will show the location to the files
    --------------------------------------------*/

  require_once DATA_ACCESSOR_DIR_USER_LOGIN . 'UserLoginDataAccessor.php';
  require_once BUSINESS_DIR_USER. 'User.php';
  
  class UserLoginManager {
    
    public function Login($userid,$password){
      $userDataAccessor = new UserLoginDataAccessor();
      $users= $userDataAccessor->Login($userid,$password);
      return $users;  
    }
    
  //Note: I should check for authorization aswell,..
  public function userLogin($user,$pwd){     

      // implementation      
      $logged_in = false;

      $loggeduser = new User();

      if($user !== null && $pwd != null){

        $userLoginDataAccessor = new UserLoginDataAccessor();

        $loggeduser = $userLoginDataAccessor->user_Login($user,sha1($pwd));

      }
      
    if($loggeduser->getFirstName()!=null){

        session_start();

        $_SESSION["user"] = $loggeduser;
        
      }
        
      //returns the last inserted row.
      return $loggeduser;
    }    

public function ForgotPassword($useremail){     

      //$loggeduser = new User();

      if($user !== null && $pwd != null){

        $userLoginDataAccessor = new UserLoginDataAccessor();

        $loggeduser = $userLoginDataAccessor->ForgotPassword($user);

      }
    }

}

?>