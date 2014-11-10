<?php

require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_USER . 'User.php';
//has constants for the table; USER
require_once(DB_CONNECTION . 'datainfo.php');

class UserDataAccessor {

  public function addUser($user) {

    $dbHelper = new DBHelper();

    //All the data members are being passed through the escape string function
    $uid      = $dbHelper->EscapeString($user->getUserId());
    $fname    = $dbHelper->EscapeString($user->getFirstName());
    $lname    = $dbHelper->EscapeString($user->getLastName());
    //First escape the string, and then change it to hash
    $pwd      = sha1($user->getPassword());
    $loginid  = $dbHelper->EscapeString($user->getLogin());
    $email    = $dbHelper->EscapeString($user->getEmail());
    $dob      = $dbHelper->EscapeString($user->getDOB());
    $language = $dbHelper->EscapeString($user->getUserLanguage());
    $usertype = $dbHelper->EscapeString($user->getUserType());
    $regdate  = $dbHelper->EscapeString($user->getRegistrationDate());
    $location = $dbHelper->EscapeString($user->getLocation());

    //Null for now, because we do not need it..
    $mediaid  = null;//$dbHelper->EscapeString($user->getMediaId();
    $ratingid = null;//$dbHelper->EscapeString($user->getUserRatingId());
    $emailsub = null;//$dbHelper->EscapeString($user->getEmailSub());

    $query_insert = "INSERT INTO ".USER. " VALUES('', '$fname', '$lname','$loginid','$pwd','$ratingid','$mediaid','$email','$dob','$location','$regdate','$usertype','$language','$emailsub')";
    $result = $dbHelper->executeInsertQuery($query_insert);

    //$last_inserted_id = mysql_insert_id();

    return $result;//which will return the last inserted id
  }

  public function updateUser($user) {

    $uid = $user->getUserId();
    $fname = $user->getFirstName();
    $lname = $user->getLastName();
    $pwd = $user->getPassword();
    $loginid = $user->getLogin();
    $email = $user->getEmail();
    $dob = $user->getDOB();
    $language = $user->getUserLanguage();
    $usertype = $user->getUserType();
    $regdate = $user->getRegistrationDate();
    $location = $user->getLocation();
    $mediaid = $user->getMediaId();
    $ratingid = $user->getUserRatingId();
    $emailsub = $user->getEmailSub();

    //usr_user_id,`usr_first_name`, `usr_last_name`, `usr_login`, `usr_password`, `usr_email`, `usr_DOB`, `usr_registration_date`, `usr_user_type_id`, `usr_language`, `usr_email_subscribed`
    $query = "UPDATE USER SET

        usr_first_name        = '$fname',
        usr_last_name         = '$lname',
        usr_login             =   '$loginid',
        usr_email             =   '$email',
        usr_DOB             = '$dob',
        usr_user_type_id      = '$usertype',
        usr_email_subscribed  =   '$emailsub',

        WHERE usr_user_id = '$uid'";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    return $result;
  }

  //This function will take 2 parameters, userid and usertype,and then update the usertypeid
  public function UpdateUserType($userid,$usertype) {

    $query = "UPDATE " .USER. " SET
      usr_user_type_id    = '".$usertype."'
      WHERE usr_user_id = '".$userid."'";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);

    return $result;
  }

  //THis function will change the password for the user
  public function changePassword($user) {

    $uid = $user->getUserId();
    $loginid = $user->getLogin();
    $pwd = $user->getPassword();
    $email = $user->getEmail();

    $query = "UPDATE " .USER. " SET
      usr_password    = '".$pwd."'
      WHERE usr_user_id = '".$uid."'";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);

    return $result;
  }

  public function deleteUser($userid) {
    $query = "DELETE FROM .'USER'. WHERE usr_user_id = $userid";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    return $result;
  }


  //for search
  public function getUserByEmail($emailaddress) {
    $query = "SELECT * FROM " . USER . " WHERE usr_email = " . " '".$emailaddress."' ";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $user = $this->getUser($result);
    return $user;
  }

  //for search
  public function getUserByLoginId($loginid) {

    $query = "SELECT * FROM " . USER . " WHERE usr_login = " . " '".$loginid."' ";

    $dbHelper = new DBHelper();

    $result = $dbHelper->executeSelect($query);

    $user = $this->getUser($result);

    return $user;
  }

  //To be moved to bottom later, private to be accessed by member functions only..
  private function getUser($selectResult) {
    $User = new User();
    $count = 0;
    while ($list = mysqli_fetch_assoc($selectResult)) {

      $User->setUserId($list['usr_user_id']);
      $User->setFirstName($list['usr_first_name']);
      $User->setLastName($list['usr_last_name']);
      $User->setLogin($list['usr_login']);
      //$User->setUserRatingId($list['']);
      $User->setEmail($list['usr_email']);
      $User->setDOB($list['usr_DOB']);
      $User->setLocation($list['usr_location_id']);
      $User->setRegistration_date($list['usr_registration_date']);
      $User->setUserType($list['usr_user_type_id']);
      $User->setUserLanguage($list['usr_language']);
      $User->setEmailSub($list['usr_email_subscribed']);
      $User->setMediaId($list['usr_media_id']);

    } // while


    return $User;
  }

// getUser
  //A function that returns all the users descending
  public function getAllUsers() {
    $dbHelper = new DBHelper();
    $query = "SELECT * FROM " . USER . " ORDER BY usr_user_id DESC";
    $result = $dbHelper->executeQuery($query);
    $Users = $this->getUserList($result);
    return $Users;
  }

    //An email is passed to it, to be returned a better data
   public function getUserByHashData($email) {
    $dbHelper = new DBHelper();
    $query = "SELECT * FROM " . USER . " ORDER BY usr_user_id DESC";
    $result = $dbHelper->executeQuery($query);
    $userid = $this->compareHash($result,$email);
    return $userid;
  }

  //This function will compare the hashed, email to the email address in the database, and then
  //return the user ID.
  private function compareHash($selectResult,$email) {

    $userid="";
    while ($list = mysqli_fetch_assoc($selectResult)) {
      if(sha1($list['usr_email'])==$email){

            $userid = $list['usr_user_id'];
      }

      //$count++;
    } // while
    return $userid;
  }

  private function getUserList($selectResult) {
    //Counter that keeps count of the users
    //$Users[] = new User();
    $count = 0;
    while ($list = mysqli_fetch_assoc($selectResult)) {
      $Users[] = new User();
      $Users[$count]->setUserId($list['usr_user_id']);
      $Users[$count]->setFirstName($list['usr_first_name']);
      $Users[$count]->setLastName($list['usr_last_name']);
      $Users[$count]->setLogin($list['usr_login']);
      //$Users[$count]->setUserRatingId($list['']);
      $Users[$count]->setEmail($list['usr_email']);
      $Users[$count]->setDOB($list['usr_DOB']);
      $Users[$count]->setLocation($list['usr_location_id']);
      $Users[$count]->setRegistration_date($list['usr_registration_date']);
      $Users[$count]->setUserType($list['usr_user_type_id']);
      $Users[$count]->setUserLanguage($list['usr_language']);
      $Users[$count]->setEmailSub($list['usr_email_subscribed']);
      $Users[$count]->setMediaId($list['usr_media_id']);
      $count++;
    } // while
    return $Users;
  }

// getUserList

  public function getUserByTypeId($userTypeId) {
    $query = "SELECT * FROM " . USER . " WHERE usr_user_type_id = $userTypeId";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $Users = $this->getUserList($result);
    return $Users;
  }

// getUserByTypeId
  //A function that gets the user by the names passed
  public function getUserByName($userfname, $userlname) {
    $userfname = "%" . strtoupper($userfname) . "%";
    $userlname = "%" . strtoupper($userlname) . "%";
    // returns returns all users with the names passed
    //$query = "SELECT * FROM ".USER. "  WHERE upper(usr_first_name) like " ."%JOHN%";
    $query = "SELECT * FROM " . USER . " WHERE UPPER(USR_FIRST_NAME)  LIKE  '$userfname'";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $Users = $this->getUserList($result);
    return $Users;
  }

// getUserByName

  /* ------------------------------------------------------
    Takes language id returns all the users that have similar language id;
    ----------------------------------------------------- */

  public function getUserByLanguage($languageid) {
    $languageid = "%" . $languageid . "%";
    // returns returns all users with the names passed
    $query = "SELECT * FROM " . USER . "  WHERE usr_language LIKE '$languageid' ";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $Users = $this->getUserList($result);
    return $Users;
  }

  public function getUserByLocation($userloc) {
    // returns returns all users with the names passed
    $query = "SELECT * FROM " . USER . "   WHERE usr_location_id = '$userloc' ";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $Users = $this->getUserList($result);
    return $Users;
  }

  public function getUserByUserId($userId) {
    // returns returns all users with the names passed
    $query = "SELECT * FROM " . USER . "   WHERE usr_user_id = '$userId' ";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);

    $Users = $this->getUser($result);
      
    return $Users;
  }
}

?>