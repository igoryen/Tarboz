<?php

require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_USER_TYPE . 'UserType.php';
//has constants for the table; USER
require_once(DB_CONNECTION . 'datainfo.php');

class UserTypeDataAccessor {
  /* ----------------------------------------------
    takes a User object and inserts it into the data
    ----------------------------------------------- */

  public function addUserType($userType) {
    $UserTypeName = $userType->getUserTypeName();
    
    $query_insert = "INSERT INTO USER_TYPE VALUES('', '$UserTypeName')";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query_insert);
    $last_inserted_id = mysql_insert_id();
    return $last_inserted_id;
  }

  public function updateUserType($usertype) {

    $utid = $usertype->getUserTypeId();

    $utname = $usertype->getUserTypeName();
   
    $query = "UPDATE USER_TYPE SET

        utp_type_name        = '$utname',

        WHERE utp_usertype_id = '$utid'";

    $dbHelper = new DBHelper();

    $result = $dbHelper->executeQuery($query);

    return $result;
  }


  public function deleteUserType($usertypeid) {

    $query = "DELETE FROM .'USER_TYPE'. WHERE utp_usertype_id = '$usertypeid'";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    return $result;
  }

  //for search
  public function getUserTypeById($usertypeid) {

    $query = "SELECT * FROM " . USER_TYPE . "  WHERE utp_usertype_id = " . "'$usertypeid'";

    $dbHelper = new DBHelper();

    $result = $dbHelper->executeSelect($query);
    
    $user = $this->getUserType($result);

    return $user->getuserTypeName();
  }

  //To be moved to bottom later, private to be accessed by member functions only..
  private function getUserType($selectResult) {
    $UserType = new UserType();
    $count = 0;
    while ($list = mysqli_fetch_assoc($selectResult)) {

      $UserType->setUserTypeId($list['utp_usertype_id']);
      $UserType->setUserTypeName($list['utp_type_name']);

    } // while
    return $UserType;
  }

// getUser
  //A function that returns all the users descending
  public function getAllUserTypes() {

    $dbHelper = new DBHelper();
    $query = "SELECT * FROM " . USER_TYPE . " ORDER BY utp_usertype_id ASC";
    $result = $dbHelper->executeQuery($query);
    $Users = $this->getUserTypeList($result);
    return $Users;
  }

  private function getUserTypeList($selectResult) {
    //Counter that keeps count of the users
    $UserTypes[] = new UserType();

    $count = 0;

    while ($list = mysqli_fetch_assoc($selectResult)) {
 
      $UserTypes[] = new UserType();

      $UserTypes[$count]->setUserTypeId($list['utp_usertype_id']);
      $UserTypes[$count]->setUserTypeName($list['utp_type_name']);
      
      $count++;

    } // while
    return $UserTypes;
  }


}

?>