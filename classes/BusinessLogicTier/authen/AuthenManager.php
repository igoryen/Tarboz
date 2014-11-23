<?php
// `Authen` is short for 'Authenticity Status' of an entry which can be
// 'Original', 'Translation' or 'Unknown'
require_once DATA_ACCESSOR_DIR_AUTHEN . 'AuthenDataAccessor.php';

class AuthenManager {

  public function getAuthens(){
    $ada = new AuthenDataAccessor();
    $authens = $ada->getAuthens();
    return $authens;
  }
  
  public function getAuthenByName($authenName){
    $ada = new AuthenDataAccessor();
    $authen_id = $ada->getAuthenByName($authenName);
    return $authen_id;
  }
}
