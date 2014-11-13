<?php

require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_LANG_PROF . 'LanguageProf.php';
require_once(DB_CONNECTION . 'datainfo.php');

class LanguageProfDataAccessor{

  public function getProficiencyByLanguageId($LangId){

    $dbHelper = new DBHelper();

    //to escape the strings for inserting
    $lang_name = $dbHelper->EscapeString($LangId);

    $query = "SELECT * FROM ".LANGUAGE_PROF." where language_id = "."'".$LangId."'";

    $result = $dbHelper->executeQuery($query);

    $LanguageProf = $this->getListOfLangProf($result);

    return $LanguageProf;
  }

  
  public function getUsersByLanguageProf($Prof,$LanguageId){

    $dbHelper = new DBHelper();

    $query = "SELECT * FROM ".LANGUAGE_PROF." where language_id = "."'".$LanguageId."' 
    and upper(prof) = "."'".strtoupper($Prof)."'";

    $result = $dbHelper->executeQuery($query);

    $Users = $this->getListOfLangProf($result);

    return $Users;

  }

  public function AddProficient($ProfData){

    $dbHelper = new DBHelper();

    //All the data members are being passed through the escape string function
    $userid    = $dbHelper->EscapeString($ProfData->getUserId());
    $langid    = $dbHelper->EscapeString($ProfData->getLanguageId());
    $prof      = $dbHelper->EscapeString($ProfData->getProf());

    $query_insert = "INSERT INTO ".LANGUAGE_PROF. " VALUES('', '$userid', '$langid','$prof')";

    //echo $query_insert;

    $result = $dbHelper->executeInsertQuery($query_insert);
    
    //returns the last row inserted..
    return $result;

  }

  private function getListOfLangProf($result){
    
    $count = 0;
    //`prof_id`,`userid`,`language_id,`prof`,
    while ($list = mysqli_fetch_assoc($result)){

      $langs_prof[] = new LanguageProf();

      $langs_prof[$count]->setProfId($list['prof_id']);
      $langs_prof[$count]->setUserId($list['userid']);
      $langs_prof[$count]->setLanguageId($list['language_id']);
      $langs_prof[$count]->setProf($list['prof']);

      $count++;
    }
    
    return $langs;
  }

}
