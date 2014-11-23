<?php

require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_AUTHEN . 'Authen.php';
require_once(DB_CONNECTION . 'datainfo.php');

class AuthenDataAccessor {
  
  public function getAuthens(){
    $dbHelper = new DBHelper();
    $query = "SELECT * FROM ". AUTHEN." ORDER BY athn_authen_status_id ASC ";
    $result = $dbHelper->executeQuery($query);
    $authens = $this->getListOfAuthen($result);
    return $authens;
  }
  
  public function getAuthenByName($authenName){
    $dbHelper = new DBHelper();
    //to escape the strings for inserting
    $authen_name = $dbHelper->EscapeString($authenName);
    $authen_name = strtoupper($authen_name);
    $query = "SELECT * FROM ". AUTHEN ." WHERE UPPER(athn_stat_name) = "."'".$authen_name."'";
    $result = $dbHelper->executeQuery($query);
    $authen = $this->getAuthen($result);
    return $authen->getAuthenId();
  }
  
  private function getAuthen($selectResult) {
    $authen = new Authen();
    while ($list = mysqli_fetch_assoc($selectResult)) {
      $authen->setAuthenId($list['athn_authen_status_id']);
      $authen->setAuthenName($list['athn_stat_name']);
    } // while
    return $authen;
   }
  
  private function getListOfAuthen($result){
    $count = 0;
    while ($list = mysqli_fetch_assoc($result)){
      $authens[] = new Authen();
      $authens[$count]->setAuthenId($list['athn_authen_status_id']);
      $authens[$count]->setAuthenName($list['athn_stat_name']);
      $count++;
    }
    return $authens;
  }
  
}
