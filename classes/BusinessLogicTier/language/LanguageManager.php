<?php

require_once DATA_ACCESSOR_DIR_LANG . 'LanguageDataAccessor.php';

class LanguageManager{


  public function getLanguages(){

      $language = new LanguageDataAccessor();

      $Language = $language->getLanguages();

      return $Language;
  }

  public function getLanguageByName($langname){

  		$language = new LanguageDataAccessor();

  		$lang_id = $language->getLanguageByName($langname);

  		return $lang_id;
  }
  public function getLanguageById($langid){
    $lda = new LanguageDataAccessor();
    $lang = $lda->getLanguageById($langid);
    return $lang;
  }
}