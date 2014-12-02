<?php

  /*---------------------------------------------
    this is a constant to put inside the include files, 
    where it will show the location to the files
    --------------------------------------------*/

  require_once DATA_ACCESSOR_DIR_USER_LOGIN . 'UserLoginDataAccessor.php';
  require_once BUSINESS_DIR_USER. 'User.php';
  require_once BUSINESS_DIR_USER . 'UserManager.php';
  
  class UserLoginManager {
    
    public function Login($userid,$password){
      $userDataAccessor = new UserLoginDataAccessor();
      $users= $userDataAccessor->Login($userid,$password);
      return $users;  
    }
  
    public function getUserByDOB($dob){
      $userDataAccessor = new UserLoginDataAccessor();
      $users= $userDataAccessor->getUserByDOB($dob);
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

        $loggeduser = false;
      //$loggeduser = new User();

      if($useremail != null){

        $userLoginDataAccessor = new UserLoginDataAccessor();

        $loggeduser = $userLoginDataAccessor->ForgotPassword($useremail);

      }

      return $loggeduser;  
    }


    public function getLoginReset($resetcode){     

        $loggeduser = false;
      //$loggeduser = new User();

      if($resetcode != null){

        $userLoginDataAccessor = new UserLoginDataAccessor();

        $password_reset = $userLoginDataAccessor->LoginReset($resetcode);
            //echo "<br>Data User manager: Testtt: ".$password_reset->getResetCode();

        $user_login = $password_reset->getResetUser();

        //will return 0 or 1, if had already requested he/she will get 1, which means he/she has to do it again
        $requested_before = $password_reset->getResetRequest();
          
          

      }

      //if 0, means he/she has not requested it before
      if($requested_before==0){

          $userman = new UserManager();


          //For generating password
          $random_text = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@()";
          $substr="";

          $substr = substr(str_shuffle($random_text), 0, 15);  

          $user = $userman->getUserByLoginId($user_login); 

          //If we recieve the user object, then we set the password
          if(isset($user)){
      
              $pwd=$substr;
              $user->setPassword(sha1($pwd)); 
              
              $myemail=$user->getEmail();
              $username=$user->getLogin();
              $userFirstName=$user->getFirstName();

              }

              $body="Dear ".$userFirstName.",<br>Your Password has been successfully resetted, Please find your password below, 
              you can change it or keep it the same way as it is; It is an auto-generated password.<br>The userID is: ".$username."<br>The
              Password is: ".$pwd;
          
             //A function that passes recieves the user object and changes the password 
            $userman->changePassword($user);

            //A function, that changes the requested bool to 1
            $userLoginDataAccessor->updateRequestCode($resetcode);

            if($userLoginDataAccessor->email($myemail, null, null,$body)) {
              exit;
              return "Your new Password has been Successfully sent to your email! please check your email";   
            }
      
        } else{
            //if its not 0, it means it was requested by someone previously
            $userLoginDataAccessor->deleteRequestCode($user_login);

            return "Sorry, you have already requested!! Please goto the login page and re-request for a password reset, Thank you";   

        }


    }

}

?>