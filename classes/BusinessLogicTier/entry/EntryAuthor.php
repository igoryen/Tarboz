<?php

class EntryAuthor{
  /*----------------------------------
    10. of class Entry
    ---------------------------------*/
  private $id;
  private $geo;  
  private $name;
  private $time;
  private $entryId; // 10

  /* getter & setter for $geo */
  public function getGeo(){
    return $this->geo;
  }
  public function setGeo($geo){
    $this->geo = $geo;
  }

  /* getter & setter for $id */
  public function getId(){
    return $this->$id;
  }
  public function setId($id){
    $this->$id = $id;
  }

  /* getter & setter for $name */
  public function getName(){
    return $this->$name;
  }
  public function setName($name){
    $this->name = $name;
  }

  /* getter & setter for $time */
  public function getTime(){
    return $this->time;
  }
  public function setTime($time){
    $this->time = $time;
  }
}

?>