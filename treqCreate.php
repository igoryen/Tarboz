<?php
  include_once 'config.php';
  require_once BUSINESS_DIR_TRANSLREQ . 'TranslationRequestManager.php';
  require_once BUSINESS_DIR_TRANSLREQ . 'TranslationRequest.php';
  require_once BUSINESS_DIR_LANG . 'LanguageManager.php';

  date_default_timezone_set('America/Toronto');
  
  $userid = intval($_GET['u']);
  $entryid = intval($_GET['e']);
  $langid = intval($_GET['l']);  
  
  $treq = new TranslationRequest();
  $trm = new TranslationRequestManager();
  $lm = new LanguageManager();
  
  $treqLang = $lm->getLanguageById($langid);
  
  // check if a treq for that entry for that language already exists
  $existingTreqs = $trm->getListOfTreqByEntryIdAndLangId($entryid, $langid);  
  
  if(sizeof($existingTreqs) <= 1){ // if there's just an empty array element
    $treq->setTreqCreatorId($userid);
    $treq->setTreqEntryId($entryid);
    $treq->setTreqLang($langid);
    $treq->setTreqDate(date('Y-m-d'));
    //var_dump($treq);
    $treq_id = $trm->createTreq($treq);
    //echo "<br>treq_id " . $treq_id;
    $treqbrief = $trm->getTreqBriefById($treq_id);
    //var_dump($treqbrief);
    echo "<span id='treqResp'><b>".$treqbrief[0]->getTreqLang() . "</b> translation requested</span>";
  }
  else{
    echo "<span id='treqResp'><mark>"
      . "Sorry, a request for <b>"
      . $treqLang->getLangName()
      . "</b> was already created on "
      . $existingTreqs[0]->getTreqDate()
      . "</mark></span>";
  }
 