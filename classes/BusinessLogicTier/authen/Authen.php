<?php
// `Authen` is short for 'Authenticity Status' of an entry which can be
// 'Original', 'Translation' or 'Unknown'

class Authen {
  private $id;
  private $name;
  
  public function getAuthenId(){
    return $this->id;
  }
  public function setAuthenId($x){
    $this->id = $x;
  }
  
  public function getAuthenName(){
    return $this->name;
  }
  public function setAuthenName($x){
    $this->name = $x;
  }
}
