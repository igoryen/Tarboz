<?php
  include_once 'config.php';
  require_once BUSINESS_DIR_ENTRY . 'EntryManager.php';
  require_once BUSINESS_DIR_ENTRY . 'Entry.php';

  date_default_timezone_set('America/Toronto');
  
  //$userid = intval($_GET['u']);
  $entryid = intval($_GET['e']);
  //$langid = intval($_GET['l']);  
  
  $em = new EntryManager();
  $retval = $em->deleteEntryVirtual($entryid);
//  $treq->setTreqCreatorId($userid);
//  $treq->setTreqEntryId($entryid);
//  $treq->setTreqLang($langid);
//  $treq->setTreqDate(date('Y-m-d'));
//  
//  $treq_id = $trm->createTreq($treq);
//  $treqbrief = $trm->getTreqBriefById($treq_id);
  if(!$retval){
    echo "Entry was not deleted";
  }

