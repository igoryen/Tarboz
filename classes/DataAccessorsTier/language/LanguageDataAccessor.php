<?php

require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_LANG . 'Language.php';
require_once(DB_CONNECTION . 'datainfo.php');

class LanguageDataAccessor{
  
  public function getListOfLang(){
    $query = "SELECT * FROM tbl_language";
    
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    //echo "<br>lda::getListOfLang() result: "; 
    //$assoc_array= $result->fetch_array(MYSQLI_ASSOC); 
    //print_r($assoc_array); 
    //print_r(mysql_fetch_assoc($result));
    
    $langs[] = new Language();
    $count = 0;
    while ($list = mysqli_fetch_assoc($result)){
      $langs[] = new Language();
      //$langs[$count]->setTreqId($list['treq_id']);
      $langs[$count]->setLangId($list['lan_language_id']);
      $langs[$count]->setLangName($list['lan_lang_name']);
      //$langs[$count]->setTreqDate($list['treq_date']);
      $count++;
    }
    //echo "<br>lda::getListOfLang() langs: " . print_r($langs);
    return $langs;
  }
}
