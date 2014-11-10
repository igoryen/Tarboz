<?php

require_once DATA_ACCESSOR_DIR_LANG . 'LanguageDataAccessor.php';

class LanguageManager{
  public function getListOfLang(){
    $lda = new LanguageDataAccessor();
    $aryOfLang = $lda->getListOfLang();
    return $aryOfLang;
  }
}