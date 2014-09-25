<?php

  /*---------------------------------------------
    this is a constant to put inside the include files, 
    where it will show the location to the files
    --------------------------------------------*/
  require_once DATA_ACCESSOR_DIR_USER_LOGIN . 'UserLoginDataAccessor.php';
  
  class UserLoginManager {
    
    public function Login($userid,$password){
      $userDataAccessor = new UserDataAccessor();
      $users= $userDataAccessor->Login($userid,$password);
      return $users;  
    }
    
  }

?>