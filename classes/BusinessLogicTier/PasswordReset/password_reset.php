<?php

class ResetPassword{

	private $resetid;
	private $reset_code;
	private $date;
	private $ResetUser;
	private $request;


  public function getResetId() {
    return $this->resetid;
  }

  public function setResetId($resetid) {
    $this->resetid = $resetid;
  }

  public function getResetCode() {
    return $this->reset_code;
  }

  public function setResetCode($resetcode) {
    $this->reset_code = $resetcode;
  }

  public function getResetDate() {
    return $this->date;
  }

  public function setResetDate($date) {
    $this->date = $date;
  }

  public function getResetRequest() {
    return $this->request;
  }

  public function setResetRequest($request) {
    $this->request = $request;
  }

  public function getResetUser() {
    return $this->ResetUser;
  }

  public function setResetUser($resetuser) {
    $this->ResetUser = $resetuser;
  }


}


?>