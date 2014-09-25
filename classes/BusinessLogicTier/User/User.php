<?php 

class User {
  private $first_name; 
  private $last_name; 
  private $user_id;
  private $usr_DOB; 
  private $usr_email; 
  private $usr_email_subscribed; 
  private $usr_language; 
  private $usr_location_id; 
  private $usr_login; 
  private $usr_media_id; 
  private $usr_password; 
  private $usr_rating_id; 
  private $usr_registration_date; 
  private $usr_user_type_id; 


  //------- first name
  public function getFirstName() {
    return $this->first_name;
  }
  
  public function setFirstName($first_name) {
    $this->first_name = $first_name;
  }

  //------- last name
  public function getLastName() {
    return $this->last_name;
  }

  public function setLastName($last_name) {
    $this->last_name = $last_name;
  }

  //------- user id
  public function getUserId(){
    return $this->user_id;
  }

  public function setUserId($userid){
    $this->user_id = $userid;
  }


  //------- login 
  public function getLogin() {
    return $this->usr_login ;
  }

  public function setLogin($login) {
    $this->usr_login  = $login;
  }

  //------- password
  public function getPassword() {
    return $this->usr_password ;
  }

  public function setPassword($password) {
    $this->usr_password  = $password;
  }

  //------- user rating id
  public function getUserRatingId() {
    return $this->usr_rating_id;
  }

  public function setUserRatingId($ratingid) {
    $this->usr_rating_id = $ratingid;
  }

  //------- media id
  public function getMediaId() {
    return $this->usr_media_id;
  }

  public function setMediaId($media) {
    $this->usr_media_id = $media;
  }

  //------- email
  public function getEmail() {
    return $this->usr_email;
  }

  public function setEmail($email) {
    $this->usr_email = $email;
  }

  //------- DOB
  public function getDOB() {
    return $this->usr_DOB;
  }

  public function setDOB($DOB) {
    $this->DOB = $DOB;
  }

  //------- location
  public function getLocation() {
    return $this->usr_location_id;
  }

  public function setLocation($location) {
    $this->usr_location_id = $location;
  }

  //------- registration date
  public function getRegistrationDate() {
    return $this->usr_registration_date;
  }

  public function setRegistration_date($registration_date) {
    $this->usr_registration_date = $registration_date;
  }

  //------- user type
  public function getUserType() {
    return $this->usr_user_type_id;
  }

  public function setUserType($user_type) {
    $this->usr_user_type_id = $user_type;
  }

  // ------ user language
  public function getUserLanguage() {
    return $this->usr_language;
  }

  public function setUserLanguage($mother_tongue) {
    $this->usr_language = $mother_tongue;
  }

  // ------ email subscription
  public function getEmailSub() {
    return $this->usr_email_subscribed;
  }

  public function setEmailSub($email_subscribed) {
    $this->usr_email_subscribed = $email_subscribed;
  }
}
?>