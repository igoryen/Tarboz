<?php

/* -------------------------
  a constant to be put it inside the include files
  where it will show the location to the files
  --------------------------- */
require_once DATA_ACCESSOR_DIR_USER_TYPE . 'UserTypeDataAccessor.php';

class UserTypeManager {

  //well be a function that adds the user type data to the database
  public function addUserType($usertype) {

    $userTypeDataAccessor = new userTypeDataAccessor();
    $last_inserted_id = $userTypeDataAccessor->addUserType($user);

    return $last_inserted_id;
  }


  //a function that deletes the selected user type
  public function deleteUserType($usertypeid) {

    $userTypeDataAccessor = new userTypeDataAccessor();
    $result = $userTypeDataAccessor->deleteUserType($usertypeid);

    return $result;
  }

  public function getAllUserTypes() {

    $userTypeDataAccessor = new userTypeDataAccessor();

    $usertypes = $userTypeDataAccessor->getAllUserTypes();

    return $usertypes;
  }

  //for searching, if searched by user type id
  public function getUserTypeById($usertypeid) {


    $userTypeDataAccessor = new userTypeDataAccessor();

    $usertype = $userTypeDataAccessor->getUserTypeById($usertypeid);

    return strtoupper($usertype);
  }

  //A method inside the  UserDataAccessor that updates the data
  //if  A user wants to make changes to his/her account
  public function updateUser($usertype) {

    $userTypeDataAccessor = new userTypeDataAccessor();

    $result = $userTypeDataAccessor->updateUserType($usertype);

    return $result;
  }

}

?>