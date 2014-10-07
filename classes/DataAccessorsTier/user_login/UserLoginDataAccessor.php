<?php

require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_USER . 'User.php';
//has constants for the table; USER
require_once(DB_CONNECTION . 'datainfo.php');

//require_once('../../plug-in/email/email_password.php');


class UserLoginDataAccessor {
  /* -------------------------------
    for search
    20. create new instance of database helper
    30. pass a query statment and get the data
    40. returns the user
    ------------------------------ */

  public function user_Login($loginid, $pwd) {
    $user = new User();

    $query = "SELECT * FROM " . USER . " WHERE usr_login =  '$loginid' and usr_password = '$pwd'";

    $dbHelper = new DBHelper(); // 20
    $result = $dbHelper->executeSelect($query); // 30
    $user = $this->getUser($result);
    return $user;
  }

  public function ForgotPassword($email) {
    $reset = false;
    $random_text = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@.()";
    //TO SHUFFLE THE ABOVE TEXT AND PIC 10 CHARS.
    $substr = substr(str_shuffle($random_text), 0, 10);
    $user = new User();
    $query = "SELECT * FROM " . USER . "  WHERE usr_login =  '$email' ";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query); // 30
    $user = $this->getUser($result);
    $userid = $user->getUserId();
    $username = $user->getFirstName();
    $date = date("Y/m/d");

    if ($user) {
      //PASSWORD_RESET
      if ($this->email($email, $username, $substr)) {
        $query_insert = "INSERT INTO PASSWORD_RESET VALUES('','$substr','$userid', '$date',0)";
        $dbHelper = new DBHelper();
        $result = $dbHelper->executeQuery($query_insert);
        if ($result)
          echo "Inserted";
      }
      //$last_inserted_id = mysql_insert_id();
    }


    return $reset;
  }

  /* -------------------------------
    To be moved to bottom later, private to be accessed by member functions only
    ------------------------------ */

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
      //$User->setLocation($list['']);
      $User->setRegistration_date($list['usr_registration_date']);
      $User->setUserType($list['usr_user_type_id']);
      $User->setUserLanguage($list['usr_language']);
      $User->setEmailSub($list['usr_email_subscribed']);
    }

    return $User;
  }

// end of getUser

  private function email($email, $username, $reset_code) {
    ini_set("SMTP", "aspmx.l.google.com");

    $subject = "Password Reset Request @ Tarboz.com";
    $sent = false;
    $message = "Dear " . $username . "<br>A request has been made for resetting your password, if it was requested by you, please follow the link below and a
    a your new password will be sent to your email.<br> Link:" . PASSWORD_RESET_LOC . "?security= " . $reset_code . "<br><br>Tarboz Team";

    mail($email, $subject, $message);
  }

}

?>