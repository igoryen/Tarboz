<?php

class UserType {

  private $user_type_id;
  private $user_type_name;

  // method declaration
  public function getUserTypeId() {
    return $this->user_type_id;
  }

  public function setUserTypeId($user_type_id) {
    $this->user_type_id = $user_type_id;
  }

  public function getUserTypeName() {
    return $this->user_type_name;
  }

  public function setUserTypeName($user_type_name) {
    $this->user_type_name = $user_type_name;
  }

}

?>