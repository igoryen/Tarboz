<?php

require_once DATA_ACCESSOR_DIR_TRANSLREQ . 'TranslationRequestDataAccessor.php';

// treq = translation request
class TranslationRequestManager{
  
  public function createTreq($treq){
    $trda = new TranslationRequestDataAccessor();
    $last_inserted_id = $trda->addTreq($treq);
    return $last_inserted_id;
  }
  
  public function getListOfTreqByLang($language){
    $trda = new TranslationRequestDataAccessor();
    $arrayOfTreqGottenByLang = $trda->getListOfTreqByLang($language);
    return $arrayOfTreqGottenByLang;
  }
  
  public function getTreqByEntryId($id){
    $trda = new TranslationRequestDataAccessor();
    $treq = $trda->getTreqByEntryId($id);
    return $treq;
  }
  
  public function getTreqAllColumnsByEntryId($id){
    $trda = new TranslationRequestDataAccessor();
    $treq = $trda->getTreqAllColumnsByEntryId($id);
    return $treq;
  }
  
  public function getTreqAllColumnsByEntryIdAndLangId($entry_id, $lang_id){
    $trda = new TranslationRequestDataAccessor();
    $treq = $trda->getTreqAllColumnsByEntryIdAndLangId($entry_id, $lang_id);
    return $treq;
  }
  
  public function getTreqBriefById($id){
    $trda = new TranslationRequestDataAccessor();
    $treq = $trda->getTreqBriefById($id);
    return $treq;
  } 
  
}