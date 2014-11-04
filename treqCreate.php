<?php
  include_once 'config.php';
  require_once BUSINESS_DIR_TRANSLREQ . 'TranslationRequestManager.php';
  require_once BUSINESS_DIR_TRANSLREQ . 'TranslationRequest.php';

  date_default_timezone_set('America/Toronto');
  
  $userid = intval($_GET['u']);
  $entryid = intval($_GET['e']);
  $langid = intval($_GET['l']);  
  
  $treq = new TranslationRequest();
  $trm = new TranslationRequestManager();
  
  $treq->setTreqCreatorId($userid);
  $treq->setTreqEntryId($entryid);
  $treq->setTreqLang($langid);
  $treq->setTreqDate(date('Y-m-d'));
  
  $treq_id = $trm->createTreq($treq);
  $treqbrief = $trm->getTreqBriefById($treq_id);

  echo "<span id='treqResp'><b>".$treqbrief->getTreqLang() . "</b> translation requested</span>";