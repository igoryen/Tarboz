<?php

require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_LANG . 'Language.php';
require_once(DB_CONNECTION . 'datainfo.php');

class LanguageDataAccessor{


  public function getLanguageByName($langname){

    $dbHelper = new DBHelper();

    //to escape the strings for inserting
    $lang_name = $dbHelper->EscapeString($langname);

    $lang_name=strtoupper($lang_name);

    $query = "SELECT * FROM ".LANGUAGE." where upper(lan_lang_name) = "."'".$lang_name."'";

    $result = $dbHelper->executeQuery($query);

    $Language = $this->getLanguage($result);

    return $Language->getLangId();

  }

  
  public function getLanguages(){

    $dbHelper = new DBHelper();

    $query = "SELECT * FROM ". LANGUAGE."  order by lan_lang_name asc ";

    $result = $dbHelper->executeQuery($query);

    $Languages = $this->getListOfLang($result);

    return $Languages;

  }

  private function getLanguage($selectResult) {

    $lang = new Language();
    
    while ($list = mysqli_fetch_assoc($selectResult)) {

      $lang->setLangId($list['lan_language_id']);
      $lang->setLangName($list['lan_lang_name']);

    } // while

    return $lang;
   }

  private function getListOfLang($result){
    
    $count = 0;

    while ($list = mysqli_fetch_assoc($result)){

      $langs[] = new Language();

      $langs[$count]->setLangId($list['lan_language_id']);
      $langs[$count]->setLangName($list['lan_lang_name']);

      $count++;
    }
    
    return $langs;
  }
}
