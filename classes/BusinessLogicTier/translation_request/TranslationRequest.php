<?php

class TranslationRequest{
  // treq = translation request
  private $treq_id;
  private $treq_entry_id;
  private $treq_entry_line;
  private $treq_target_lang;
  private $treq_date;
  
  public function getTreqId(){ return $this->treq_id; }  
  public function setTreqId($x){ $this->treq_id = $x; }
  
  public function getTreqEntryId(){ return $this->treq_entry_id; }  
  public function setTreqEntryId($x){ $this->treq_entry_id = $x; }
  
  public function getTreqEntryLine(){ return $this->treq_entry_line; }  
  public function setTreqEntryLine($x){ $this->treq_entry_line = $x; }
  
  public function getTreqLang(){ return $this->treq_target_lang; }  
  public function setTreqLang($x){ $this->treq_target_lang = $x; }
  
  public function getTreqDate(){ return $this->treq_date; }  
  public function setTreqDate($x){ $this->treq_date = $x; }
}