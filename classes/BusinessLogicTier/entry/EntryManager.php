<?php

require_once DATA_ACCESSOR_DIR_ENTRY . 'EntryDataAccessor.php';

class EntryManager {

  /**
   *
   * @param type $entry
   * @return $last_inserted_id (the ID generated in the last query)
   */
  public function createEntry($entry) {
    $eda = new EntryDataAccessor();
    $last_inserted_id = $eda->addEntry($entry);
    //1
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
   * @param string $verbatim
   * @return $entrySetGottenByVerbatim
   */
  public function getEntrySetByVerbatim($verbatim) {
    $eda = new EntryDataAccessor();
    $entrySetGottenByVerbatim = $eda->getEntrySetByVerbatim($verbatim);
    return $entrySetGottenByVerbatim;
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

  public function getFatherByVerbatim($verbatim) {
    $eda = new EntryDataAccessor();
    //2
    $fatherGottenByVerbatim = $eda->getFatherByVerbatim($verbatim);    
    //3
    return $fatherGottenByVerbatim;
  }

  public function getListOfKidBriefByVerbatim($verbatim) {
    $eda = new EntryDataAccessor();
    $arrayOfKidsGottenByVerbatim = $eda->getListOfKidBriefByVerbatim($verbatim);
    return $arrayOfKidsGottenByVerbatim;
  }
  
  public function getListOfEntryBriefByLanguage($language){
    $eda = new EntryDataAccessor();
    $arrayOfEntryBriefGottenByLanguage = $eda->getListOfEntryBriefByLanguage($language);
    return $arrayOfEntryBriefGottenByLanguage;
  }
    
<<<<<<< HEAD
  // get entry by user ids  
  public function getEntryByUserId($UserId) {
    $eda = new EntryDataAccessor();
    $entryGottenByUserId = $eda->getEntryByUserId($UserId);
    return $entryGottenByUserId;
  }

  public function getDadEntryListByLangDate($in_lang, $in_from_date, $in_end_date){
=======
    public function getDadEntryListByLangDate($in_lang, $in_from_date, $in_end_date){
>>>>>>> 99fdbcc30cdc0a614b3decf4dbf27d7fc4135485
    $eda = new EntryDataAccessor();
    $arrayOfEntry = $eda->getDadEntryListByLangDate($in_lang, $in_from_date, $in_end_date);
    return $arrayOfEntry;
  }
    
  public function getKidEntryListByDadLangDate($dad_entryId, $in_lang, $in_from_date, $in_end_date){
    $eda = new EntryDataAccessor();
    $arrayOfEntry = $eda->getKidEntryListByDadLangDate($dad_entryId, $in_lang, $in_from_date, $in_end_date);
    return $arrayOfEntry;
  }
    
  public function getEntryListByNoDadLangDate($in_lang, $in_from_date, $in_end_date) {
    $eda = new EntryDataAccessor();
    $arrayOfEntry = $eda->getEntryListByNoDadLangDate($in_lang, $in_from_date, $in_end_date);
    return $arrayOfEntry;
  }
    
  public function getOriginalKidsNum($entryId){
    $eda = new EntryDataAccessor();
    $numOfKids = $eda->getOriginalKidsNum($entryId);
    return $numOfKids;
  }
    
  public function getEntryLikeNumByEntry($entryId) {
    $eda = new EntryDataAccessor();
    $numOfLikes = $eda->getEntryLikeNumByEntry($entryId);
    return $numOfLikes;
  }
    
}
