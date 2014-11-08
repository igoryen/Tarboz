<?php

class LanguageProf{
  
  private $prof_id;
  private $userid;
  private $language_id;
  private $prof;

  
  public function getProfId(){ return $this->prof_id; }  
  public function setProfId($x){ $this->prof_id = $x; }
  
  public function getUserId(){ return $this->userid; }  
  public function setUserId($x){ $this->userid = $x; }

  public function getLanguageId(){ return $this->language_id; }  
  public function setLanguageId($x){ $this->language_id = $x; }

  public function getProf(){ return $this->prof; }  
  public function setProf($x){ $this->prof = $x; }


}