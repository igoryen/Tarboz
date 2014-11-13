<?php

require_once DATA_ACCESSOR_DIR_LANG_PROF . 'LanguageProfDataAccessor.php';

class LanguageProfManager{

  public function AddProficient($Proficient){

      $LanguageProf = new LanguageProfDataAccessor();

      $last_inserted_id = $LanguageProf->AddProficient($Proficient);

      return $last_inserted_id;
  }

  
}

?>