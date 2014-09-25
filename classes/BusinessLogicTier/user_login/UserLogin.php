<?php 
class UserLogin extends User{

  private $username;
  private $password;
    
  public function getLogin() {
    return $this->usr_login ;
  }
  
  public function setLogin($login) {
    $this->usr_login  = $login;
  }

  public function getPassword() {
    return $this->usr_password ;
  }

  public function setPassword($password) {
    $this->usr_password  = $password;
  }
  
}
?>