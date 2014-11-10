<?php

class Language{
  
  private $lang_id;
  private $lang_name;
  
  
  public function getLangId(){ return $this->lang_id; }  
  public function setLangId($x){ $this->lang_id = $x; }
  
  public function getLangName(){return $this->lang_name; }  
  public function setLangName($x){ $this->lang_name = $x; }
}