<?php

  require_once DB_CONNECTION . 'DBHelper.php';
  require_once BUSINESS_DIR_USER_LOGIN. 'User.php';
    //has constants for the table; USER
  require_once(DB_CONNECTION.'datainfo.php'); 


  class UserLoginDataAccessor {      
      
    /*-------------------------------------------
      gets the user by the names passed
      -----------------------------------------*/
    public function Login($uname,$upwd){
    
      $uname = sha1($uname);
      $upwd = sha1($upwd);

      // returns all users with the names passed
      //$query = "SELECT * FROM ".USER. "  WHERE upper(usr_first_name) like " ."%JOHN%";

      $query = "SELECT * FROM ".USER." WHERE  usr_login = '$uname' and   usr_password='$upwd'";
      
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeSelect($query);
      $Users = $this->getLogin($result);
      return $Users;
    } // getUserByName
  
  
    //To be moved to bottom later, private to be accessed by member functions only..
    private function getLogin($result){    
      $User = new User();
      $count = 0;      
      while($list = mysqli_fetch_assoc($selectResult)){      
        $id = $user->setUserId($list['usr_user_id']);
      }      
      if($id) echo "Good One";
      else echo "no Good";
      ////usr_user_id,`usr_first_name`, `usr_last_name`, `usr_login`, `usr_password`, `usr_email`, `usr_DOB`, `usr_registration_date`, `usr_user_type_id`, `usr_language`, `usr_email_subscribed`
    }   
    /*  $User->setUserId($list['usr_user_id']);
      
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
*/
  }


?>