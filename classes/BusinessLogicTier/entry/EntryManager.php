<?php

require_once DATA_ACCESSOR_DIR_ENTRY . 'EntryDataAccessor.php';

class EntryController {

  /**
   *
   * @param type $entry
   * @return $last_inserted_id (the ID generated in the last query)
   */
  public function createEntry($entry) {
    $eda = new EntryDataAccessor();
    $last_inserted_id = $eda->addEntry($entry);
    return $last_inserted_id;
  }

  /**
   *
   * @param type $entry
   * @return $resultOfEntryUpdate
   */
  public function updateEntry($entry) {
    $eda = new EntryDataAccessor();
    $resultOfEntryUpdate = $eda->updateEntry($entry);
    return $resultOfEntryUpdate;
  }

  /**
   *
   * @param type $entryId
   * @return $resultOfEntryDelete
   */
  public function deleteEntry($entryId) {
    $eda = new EntryDataAccessor();
    $resultOfEntryDelete = $eda->deleteEntry($entryId);
    return $resultOfEntryDelete;
  }

  /**
   *
   * @param type $entryId
   * @return $entryGottenById
   */
  public function getEntryById($entryId) {
    $eda = new EntryDataAccessor();
    $entryGottenById = $eda->getEntryById($entryId);
    return $entryGottenById;
  }

  /**
   *
   * @return $arrayOfFathers
   */
  public function getAllFathers() {
    $eda = new EntryDataAccessor();
    $arrayOfFathers = $eda->getAllFathers();
    return $arrayOfFathers;
  }

}
