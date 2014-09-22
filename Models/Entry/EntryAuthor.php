<?php

class EntryAuthor{
  /*----------------------------------
    10. of class Entry
    ---------------------------------*/
  private $author_geo;
  private $author_id;
  private $author_name;
  private $author_time;
  private $entry_id; // 10

  public function getAuthorGeo(){
    return $this->author_geo;
  }
  public function setAuthorGeo(){
    $this->author_geo = $author_geo;
  }

  public function getAuthorId(){
    return $this->author_id;
  }

  public function getAuthorName(){
    return $this->author_name;
  }
  public function setAuthorName(){
    $this->author_name = $author_name;
  }

  public function getAuthorTime(){
    return $this->author_time;
  }
  public function setAuthorTime(){
    $this->author_time = $author_time;
  }
}

?>