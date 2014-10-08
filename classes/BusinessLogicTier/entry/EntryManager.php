<?php

/* ---------------------------------------
  a constant to put inside the include files, where it will show the location to the files,
  --------------------------------------- */
require_once DATA_ACCESSOR_DIR_USER . 'UserDataAccessor.php';

class EntryController {

//$entry = new Entry();

  /* ---------------------------------------
    to add a new entry to the DB
    30. returns the last inserted row
    --------------------------------------- */
  public function createEntry($entry) {
    $last_inserted_id = $entry->add($entry);
    return $last_inserted_id; // 30
  }

  /* ---------------------------------------
    to update an entry
    --------------------------------------- */

  public function editEntry($entry) {
    $result = $entry->edit($entry);
    return $result;
  }

  public function deleteEntry($id) {
    $result = $entry->delete($id);
    return $result;
  }

  /* ---------------------------------------
    to retrieve by entry_id
    --------------------------------------- */

  public function getEntryById($id) {
    $entry = $entry->find($id);
    return $entry;
  }

}

?>