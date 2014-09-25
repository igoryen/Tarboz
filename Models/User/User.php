<?php 
class User {
    private $user_id;
    private $first_name; 
    private $last_name; 
    private $usr_login; 
    private $usr_password; 
    private $usr_rating_id; 
    private $usr_media_id; 
    private $usr_email; 
    private $usr_DOB; 
    private $usr_location_id; 
    private $usr_registration_date; 
    private $usr_user_type_id; 
    private $usr_language; 
    private $usr_email_subscribed; 


    // method declaration
    public function getUserId(){
      return $this->user_id;
    }
    public function setUserId($userid){
      $this->user_id = $userid;
    }
    
    public function getFirstName() {
      return $this->first_name;
    }
    public function setFirstName($first_name) {
      $this->first_name = $first_name;
    }

    public function getLastName() {
      return $this->last_name;
    }
    public function setLastName($last_name) {
      $this->last_name = $last_name;
    }

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

    public function getUserRatingId() {
      return $this->usr_rating_id;
    }
    public function setUserRatingId($ratingid) {
      $this->usr_rating_id = $ratingid;
    }

    public function getMediaId() {
      return $this->usr_media_id;
    }
    public function setMediaId($media) {
      $this->usr_media_id = $media;
    }

    public function getEmail() {
      return $this->usr_email;
    }
    public function setEmail($email) {
      $this->usr_email = $email;
    }

    public function getDOB() {
      return $this->usr_DOB;
    }
    public function setDOB($DOB) {
      $this->DOB = $DOB;
    }

    public function getLocation() {
      return $this->usr_location_id;
    }
    public function setLocation($location) {
      $this->usr_location_id = $location;
    }

    public function getRegistrationDate() {
      return $this->usr_registration_date;
    }
    public function setRegistration_date($registration_date) {
      $this->usr_registration_date = $registration_date;
    }

    public function getUserType() {
      return $this->usr_user_type_id;
    }
    public function setUserType($user_type) {
      $this->usr_user_type_id = $user_type;
    }

    public function getUserLanguage() {
      return $this->usr_language;
    }
    public function setUserLanguage($mother_tongue) {
      $this->usr_language = $mother_tongue;
    }

    public function getEmailSub() {
      return $this->usr_email_subscribed;
    }
    public function setEmailSub($email_subscribed) {
      $this->usr_email_subscribed = $email_subscribed;
    }    
    
 }
?>