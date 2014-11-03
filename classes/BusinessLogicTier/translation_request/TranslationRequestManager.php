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
  
}