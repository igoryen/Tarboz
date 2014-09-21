<?php

  //this is a constant, we will put it inside the include files, where it will show the location to the files,
  require_once DATA_ACCESSOR_DIR_USER . 'UserDataAccessor.php';
  
  class EntryController {
    $entry = new Entry();

    /*---------------------------------------
      to add a new entry to the DB
      30. returns the last inserted row
      ---------------------------------------*/
    public function create($entry){
      $last_inserted_id = $entry->add($entry);
      return $last_inserted_id; // 30
    }

    /*---------------------------------------
      to update an entry
      ---------------------------------------*/
    public function edit($entry){
      $result = $entry->edit($entry);
      return $result;
    }

    public function delete($id){
      $result = $entry->delete($id);
      return $result;
    }
    
    /*---------------------------------------
      to retrieve by entry_id
      ---------------------------------------*/
    public function details($id){
      $entry = $entry->find($id);      
      return $entry;     
    }  
  }
?>