<?php

require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_TRANSLREQ . 'TranslationRequest.php';
require_once(DB_CONNECTION . 'datainfo.php');

// treq = translation request
class TranslationRequestDataAccessor{
  
  public function addTreq($treq){
    
    $creator_id = $treq->getTreqCreatorId();
    $entry_id = $treq->getTreqEntryId();
    $lang_id = $treq->getTreqLang();
    $date = $treq->getTreqDate();
    
    $insert_query = 'INSERT INTO  
                      '.TRANS_REQUEST.' (
                        treq_creator_id,
                        treq_entry_id,
                        treq_target_lang_id,
                        treq_date
                      )
                    VALUES (' .$creator_id
                       . ','  .$entry_id
                       . ','  .$lang_id
                       . ',"'  .$date // is a string therefore must be surrounded in double quotes
                       . '");';
    //echo "<br>trda::addTreq() insert_query:<br>" . $insert_query;
    $dbHelper = new DBHelper();
    $last_inserted_id = $dbHelper->executeInsertQuery($insert_query);
    return $last_inserted_id;
  }
  
    public function getListOfTreqByLang($language){
    $query = "SELECT 
                e.ent_entry_id, 
                e.ent_entry_text, 
                l.lan_lang_name
              FROM  
                ".ENTRY." AS e 
                  STRAIGHT_JOIN  
                ".TRANS_REQUEST." AS r 
                  STRAIGHT_JOIN 
                ".LANGUAGE." AS l
              WHERE
                e.ent_entry_id = r.treq_entry_id
              AND
                r.treq_target_lang_id = l.lan_language_id
              AND
                SUBSTR(LOWER(l.lan_lang_name), 1,2) = '".$language ."'";
                
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    //echo "trda::getListOfTreqByLang() result: "; $assoc_array= $result->fetch_array(MYSQLI_ASSOC); print_r($assoc_array); print_r(mysql_fetch_assoc($resultOfSelect));
    $arrayOfTreqGottenByLang = $this->getListOfTreq($result);
    return $arrayOfTreqGottenByLang;                
  }
  
  public function getTreqByEntryId($id){
    //echo "<br>trda::getTreqByEntryId, id = " .$id;
    $query = "SELECT
                r.treq_entry_id,
                l.lan_lang_name
              FROM 
                ".TRANS_REQUEST." r
                  STRAIGHT_JOIN 
                ".LANGUAGE." l
              WHERE
                r.treq_target_lang_id = l.lan_language_id
              AND  
                r.treq_entry_id = {$id};";
    //echo "<br>trda::getTreqByEntryId, sql = " .$query;
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    $treqGottenByEntryId = $this->getTreqBrief($result);
    return $treqGottenByEntryId; 
  }
  
  public function getTreqAllColumnsByEntryId($id){
    //echo "<br>trda::getTreqByEntryId, id = " .$id;
    $query = "SELECT 
                *
              FROM 
                ".TRANS_REQUEST." 
              WHERE
                treq_entry_id = {$id};";
    echo "<br>trda::getTreqFullByEntryId, sql = " .$query;
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    $treqGottenByEntryId = $this->getTreqAllColumns($result);
    return $treqGottenByEntryId; 
  }
  
  public function getTreqAllColumnsByEntryIdAndLangId($entry_id, $lang_id){
    //echo "<br>trda::getTreqByEntryId, id = " .$entry_id;
    $query = "SELECT 
                *
              FROM 
                ".TRANS_REQUEST." 
              WHERE
                treq_entry_id = {$entry_id}
              AND
                treq_target_lang_id = {$lang_id}";
    //echo "<br>trda::getTreqFullByEntryId, sql = " .$query;
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    $treqGottenByEntryId = $this->getTreqAllColumns($result);
    return $treqGottenByEntryId; 
  }
  
  public function getTreqBriefById($id){
    $query = "SELECT
                r.treq_entry_id,
                l.lan_lang_name
              FROM 
                ".TRANS_REQUEST." AS r  
                  STRAIGHT_JOIN 
                ".LANGUAGE." AS l 
              WHERE
                r.treq_target_lang_id = l.lan_language_id
              AND
                r.treq_id={$id}";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    $treqGottenByEntryId = $this->getTreqBrief($result);
    return $treqGottenByEntryId; 
  }
  
  private function getListOfTreq($result){
    //echo "<br><br>trda::getListOfTreq() result: "; $assoc_array= $result->fetch_array(MYSQLI_ASSOC); print_r($assoc_array); print_r(mysql_fetch_assoc($result));
    $Treqs[] = new TranslationRequest();
    $count = 0;
    while ($list = mysqli_fetch_assoc($result)){
      $Treqs[] = new TranslationRequest();
      //$Treqs[$count]->setTreqId($list['treq_id']);
      $Treqs[$count]->setTreqEntryId($list['ent_entry_id']);
      $Treqs[$count]->setTreqEntryLine($list['ent_entry_text']);
      $Treqs[$count]->setTreqLang($list['lan_lang_name']);
      //$Treqs[$count]->setTreqDate($list['treq_date']);
      $count++;
    }
    return $Treqs;
  }
  
  private function getTreqBrief($result){
    //echo "<br><br>trda::getListOfTreq() result: "; $assoc_array= $result->fetch_array(MYSQLI_ASSOC); print_r($assoc_array); print_r(mysql_fetch_assoc($result));
    $treq = new TranslationRequest();
    $list = mysqli_fetch_assoc($result);
    //$Treqs[$count]->setTreqId($list['treq_id']);
    $treq->setTreqEntryId($list['treq_entry_id']);
    //$treq->setTreqEntryLine($list['ent_entry_text']);
    $treq->setTreqLang($list['lan_lang_name']);
    //$Treqs[$count]->setTreqDate($list['treq_date']);
    return $treq;
  }
  
  private function getTreqFull($result){
    //echo "<br><br>trda::getListOfTreq() result: "; $assoc_array= $result->fetch_array(MYSQLI_ASSOC); print_r($assoc_array); print_r(mysql_fetch_assoc($result));
    $treq = new TranslationRequest();
    $list = mysqli_fetch_assoc($result);
    $treq->setTreqId(       $list['treq_id']);
    $treq->setTreqCreatorId($list['treq_creator_id']);
    $treq->setTreqEntryId(  $list['treq_entry_id']);
    $treq->setTreqLang(     $list['lan_lang_name']);
    $treq->setTreqEntryLine($list['ent_entry_text']);
    $treq->setTreqDate(     $list['treq_date']);
    return $treq;
  }
  private function getTreqAllColumns($result){
    //echo "<br><br>trda::getListOfTreq() result: "; $assoc_array= $result->fetch_array(MYSQLI_ASSOC); print_r($assoc_array); print_r(mysql_fetch_assoc($result));
    $treq = new TranslationRequest();
    $list = mysqli_fetch_assoc($result);
    $treq->setTreqId(       $list['treq_id']);
    $treq->setTreqCreatorId($list['treq_creator_id']);
    $treq->setTreqEntryId(  $list['treq_entry_id']);
    $treq->setTreqLangId(   $list['treq_target_lang_id']);
    $treq->setTreqDate(     $list['treq_date']);
    return $treq;
  }
  
  
}

