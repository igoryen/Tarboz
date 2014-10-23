<?php

require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_ENTRY . 'Entry.php';
require_once(DB_CONNECTION . 'datainfo.php');

class EntryDataAccessor {

  /**
   *
   * @param type $entry
   * @return type $last_inserted_id (the ID generated in the last query)
   */
  public function addEntry($entry) {
    
    $id =         $entry->getEntryId();
    $text =       $entry->getEntryText(); // 1
    // TODO: create the verbatim of $text using the Bing translator
    $verbatim =   $entry->getEntryVerbatim(); // 2
    // TODO: transliterate the value of $text using ...
    $translit =   $entry->getEntryTranslit(); // 3
    $authen =     $entry->getEntryAuthenStatusId(); // 4
    $translOf =   $entry->getEntryTranslOf(); // 5
    $userId =     $entry->getEntryUserId(); // 6
    $mediaId =    $entry->getEntryMediaId(); // 7
    $commentId =  $entry->getEntryCommentId(); // 8
    $ratingId =   $entry->getEntryRatingId(); // 9
    $tags =       $entry->getEntryTags(); //10
    $authorId =   $entry->getEntryAuthorId(); // 11
    $sourceId =   $entry->getEntrySourceId(); // 12
    $use =        $entry->getEntryUse(); // 13
    $link =       $entry->getEntryHttpLink(); // 14
       
    // 15   
    $query_insert = 'INSERT INTO '
      . 'tbl_entry_english'
      //. " tbl_entry_english"
      . ' VALUES('
      . '"' . $id
      . '", "' . $text
      . '", "' . $verbatim
      . '", "' . $translit
      . '", ' . $authen
      . ', "' . $translOf
      . '", "' . $userId
      . '", "' . $mediaId
      . '", "' . $commentId
      . '", "' . $ratingId
      . '", "' . $tags
      . '", "' . $authorId
      . '", "' . $sourceId
      . '", "' . $use
      . '", "' . $link
      . '")'; 

    $dbHelper = new DBHelper();  // 18
    $result = $dbHelper->executeQuery($query_insert); // 16

    //if ($result) echo "<hr>eda::addEntry() insert_result = " . $result;
    $last_inserted_id = mysql_insert_id(); // 17
    return $last_inserted_id;
  }

  /**
   *
   * @param type $entry
   * @return $resultOfEntryUpdate
   */
  public function updateEntry($entry) {
    $entryId = $entry->getEntryId();
    $text = $entry->getEntryText();
    /*
     * TODO: create the verbatim of $text using the Bing translator
     */
    $verbatim = $entry->getEntryVerbatim();

    /*
     * TODO: transliterate the value of $text using ...
     */
    $translit = $entry->getEntryTranslit();
    $authsid = $entry->getEntryAuthenStatusId();
    $translOf = $entry->getEntryTranslOf();
    $userId = $entry->getEntryUserId();
    // $mediaSet = $entry->getMediaSet();
    // $commentId = $entry->;
    // $ratingId = $entry->getEntryRatingId();
    $tags = $entry->getEntryTags();
    $authorId = $entry->getEntryAuthorId();
    $sourceId = $entry->getEntrySourceId();
    $use = $entry->getEntryUse();
    $httpLink = $entry->getEntryHttpLink();
    /*
     * Compose the MySQL link
     */
    $query = "UPDATE ENTRY SET "
            . "ent_entry_text = '$text',"
            . "ent_entry_verbatim = '$verbatim',"
            . "ent_entry_translit = '$authsid',"
            . "ent_entry_authen_status_id = '$email',"
            . "ent_entry_translation_of = '$translOf',"
            . "ent_entry_creator_id = '$userId',"
            //  . "ent_entry_media_id = '$bla',"
            //  . "ent_entry_comment_id = '',"
            //  . "ent_entry_rating_id = '',"
            . "ent_entry_tags = '$tags',"
            . "ent_entry_author_id = '$authorId',"
            . "ent_entry_source_id = '$sourceId',"
            . "ent_entry_use = '$use',"
            . "ent_entry_http_link = '$httpLink'"
            . "WHERE ent_entry_id = ' $entryId'";
    /*
     * using: require_once DB_CONNECTION . 'DBHelper.php';
     */
    $dbHelper = new DBHelper();
    $resultOfEntryUpdate = $dbHelper->executeQuery($query);
    return $resultOfEntryUpdate;
  }

  /**
   *
   * @param type $entryId
   * @return type $entryGottenById
   */
  public function getEntryById($entryId) {

    $query = 'SELECT *
              FROM tbl_entry_russian
              WHERE ent_entry_id = "' . $entryId . '"

              UNION ALL

              SELECT *
              FROM  tbl_entry_mandarin
              WHERE ent_entry_id = "' . $entryId . '"

              UNION ALL

              SELECT *
              FROM  tbl_entry_english
              WHERE ent_entry_id = "' . $entryId . '";';

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    // 46
    $entryGottenById = $this->getEntryFull($result);
    return $entryGottenById;
  }

  /*
    public function getEntrySetByVerbatim($verbatim) {
    // for SELECT use Full-Text Search Functions
    $query = "SELECT "
    }
   */

  /**
   *
   * @param type $entryId
   * @return type $resultOfDelete
   */
  public function deleteEntry($entryId) {
    $query = "DELETE FROM ENTRY "
            . "WHERE ent_entry_id = $entryId";

    $dbHelper = new DBHelper();
    $resultOfDelete = $dbHelper->executeQuery($query); //47
    return $resultOfDelete;
  }

  public function getAllFathers() {
    // a 'father' is the entry from which all translations are made

    $dbHelper = new DBHelper();
    $query = "SELECT * "
            . "FROM " . ENTRY
            . "WHERE ent_entry_authen_status_id = 'o'"
            . " ORDER BY ent_entry_id DESC";
    $resultOfSelect = $dbHelper->executeQuery($query);
    $Users = $this->getListOfFathers($resultOfSelect);
    return $Users;
  }

  /**
   *
   * @param type $resultOfSelect
   * @return array of class Entry objects
   */
  private function getListOfFathers($resultOfSelect) {
    $Entries[] = new Entry();
    //
    $count = 0; // 30
    while ($list = mysqli_fetch_assoc($resultOfSelect)) {

      $Entries[] = new Entry(); // 31
      // 32
      $Entries[$count]->setEntryId($list['ent_entry_id']);
      $Entries[$count]->setEntryText($list['ent_entry_text']);
      $Entries[$count]->setEntryVerbatim($list['ent_entry_verbatim']);
      $Entries[$count]->setEntryTranslit($list['ent_entry_translit']);
      $Entries[$count]->setEntryAuthenStatusId($list['ent_entry_authen_status_id']);
      $Entries[$count]->setEntryTranslOf($list['ent_entry_translation_of']);
      $Entries[$count]->setEntryUserId($list['ent_entry_creator_id']);
      $Entries[$count]->setEntryMediaId($list['ent_entry_media_id']);
      $Entries[$count]->setEntryCommentId($list['ent_entry_comment_id']);
      $Entries[$count]->setEntryRatingId($list['ent_entry_rating_id']);
      $Entries[$count]->setEntryTags($list['ent_entry_tags']);
      $Entries[$count]->setEntryAuthorId($list['ent_entry_author_id']);
      $Entries[$count]->setEntrySourceId($list['ent_entry_source_id']);
      $Entries[$count]->setEntryUse($list['ent_entry_use']);
      $Entries[$count]->setEntryHttpLink($list['ent_entry_http_link']);
      $count++;
    } // while
    return $Entries;
  }

// used to search the database for the "father" using a verbatim string
  /**
   * 
   * @param string $verbatim
   * @return type
   */
  public function getFatherByVerbatim($verbatim) {
    
    //$fatherGottenByVerbatim = new Entry();
    // 21
    $query = 'SELECT e.ent_entry_id, l.lan_lang_name, e.ent_entry_text
              FROM tbl_entry e, tbl_language l
              WHERE e.ent_entry_language_id = l.lan_language_id
              AND MATCH(e.ent_entry_verbatim)
              AGAINST("'.$verbatim .'" IN BOOLEAN MODE )
              AND e.ent_entry_authen_status_id = 1';
    
    //25
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query); // 20
    // 26,27
    $fatherGottenByVerbatim = $this->getEntryBrief($result); // 22
    //28,29
    return $fatherGottenByVerbatim;
  }

  public function getListOfKidBriefByVerbatim($verbatim) {
    $query = 'SELECT e.ent_entry_id, l.lan_lang_name, e.ent_entry_text,
                MATCH(e.ent_entry_verbatim) 
                AGAINST("'.$verbatim.'" IN NATURAL LANGUAGE MODE)
                AS relevance
              FROM tbl_entry e, tbl_language l
              WHERE e.ent_entry_language_id = l.lan_language_id 
                AND MATCH(e.ent_entry_verbatim) 
                    AGAINST("'.$verbatim.'" IN NATURAL LANGUAGE MODE)
                AND e.ent_entry_authen_status_id = 2
              HAVING relevance > 0.5
              ORDER BY l.lan_lang_name';

    $dbHelper = new DBHelper();
    $resultOfSelect = $dbHelper->executeSelect($query);
    // the current EntryDataAccessor object = $this
    $arrayOfKidsGottenByVerbatim = $this->getListOfKidBrief($resultOfSelect);
    return $arrayOfKidsGottenByVerbatim;
  }

  /**
   *
   * @param type $resultOfSelect
   * @return array of Entry objects
   */
  private function getListOfKidBrief($resultOfSelect) {
    $Entries[] = new Entry();
    $count = 0; // 30
    while ($list = mysqli_fetch_assoc($resultOfSelect)) { // 33
      
      $Entries[] = new Entry(); //31
      // 32
      $Entries[$count]->setEntryId($list['ent_entry_id']);
      $Entries[$count]->setEntryLanguage($list['lan_lang_name']); // 19
      $Entries[$count]->setEntryText($list['ent_entry_text']);
//      $Entries[$count]->setEntryVerbatim($list['ent_entry_verbatim']);
//      $Entries[$count]->setEntryTranslit($list['ent_entry_translit']);
//      $Entries[$count]->setEntryAuthenStatusId($list['ent_entry_authen_status_id']);
//      $Entries[$count]->setEntryTranslOf($list['ent_entry_translation_of']);
//      $Entries[$count]->setEntryUserId($list['ent_entry_creator_id']);
//      $Entries[$count]->setEntryMediaId($list['ent_entry_media_id']);
//      $Entries[$count]->setEntryCommentId($list['ent_entry_comment_id']);
//      $Entries[$count]->setEntryRatingId($list['ent_entry_rating_id']);
//      $Entries[$count]->setEntryTags($list['ent_entry_tags']);
//      $Entries[$count]->setEntryAuthorId($list['ent_entry_author_id']);
//      $Entries[$count]->setEntrySourceId($list['ent_entry_source_id']);
//      $Entries[$count]->setEntryUse($list['ent_entry_use']);
//      $Entries[$count]->setEntryHttpLink($list['ent_entry_http_link']);
      $count++;
    } // 33
    // 34,35
    return $Entries;
  }

  /**
   * getEntryBrief($resultOfSelect)
   * To retrieve only some fields of one entry for the phrase search result page.
   * @param mysql_result $resultOfSelect
   * @return Entry $Entry
   */
  private function getEntryBrief($resultOfSelect) { // 23
    $Entry = new Entry();
    $i=0;
    //36,37,38,39
    $ary = mysqli_fetch_assoc($resultOfSelect); // 24
      // 40,41
      $Entry->setEntryId($ary['ent_entry_id']);
      $Entry->setEntryLanguage($ary['lan_lang_name']); // 19
      $Entry->setEntryText($ary['ent_entry_text']);
      //$Entry->setEntryVerbatim($ary['ent_entry_verbatim']);
      //$Entry->setEntryTranslit($ary['ent_entry_translit']);
      //$Entry->setEntryAuthenStatusId($ary[ent_entry_authen_status_id]);
      //$Entry->setEntryTranslOf($ary['ent_entry_translation_of']);
      //$Entry->setEntryUserId($ary['ent_entry_creator_id']);
      //$Entry->setEntryMediaId($ary['ent_entry_media_id']);
      //$Entry->setEntryCommentId($ary['ent_entry_comment_id']);
      //$Entry->setEntryRatingId($ary['ent_entry_rating_id']);
      //$Entry->setEntryTags($ary['ent_entry_tags']);
      //$Entry->setEntryAuthorId($ary['ent_entry_author_id']);
      //$Entry->setEntrySourceId($ary['ent_entry_source_id']);
      //$Entry->setEntryUse($ary['ent_entry_use']);
      //$Entry->setEntryHttpLink($ary['ent_entry_http_link']);
      //48,49,50
    return $Entry;
  }

  /**
   * getEntryFull($resultOfSelect)
   * To retrieve ALL the fields of one entry for the entry profile page.
   * @param type $resultOfSelect
   * @return \Entry
   */
  private function getEntryFull($resultOfSelect) {
    // 42,43,44
    $Entry = new Entry();
    // 45
    while ($list = mysqli_fetch_assoc($resultOfSelect)) {
      // 41
      $Entry->setEntryId($list['ent_entry_id']);
      $Entry->setEntryLanguageId(['ent_entry_language_id']);
      $Entry->setEntryText($list['ent_entry_text']);
      $Entry->setEntryVerbatim($list['ent_entry_verbatim']);
      $Entry->setEntryTranslit($list['ent_entry_translit']);
      $Entry->setEntryAuthenStatusId($list['ent_entry_authen_status_id']);
      $Entry->setEntryTranslOf($list['ent_entry_translation_of']);
      $Entry->setEntryUserId($list['ent_entry_creator_id']);
      $Entry->setEntryMediaId($list['ent_entry_media_id']);
      $Entry->setEntryCommentId($list['ent_entry_comment_id']);
      $Entry->setEntryRatingId($list['ent_entry_rating_id']);
      $Entry->setEntryTags($list['ent_entry_tags']);
      $Entry->setEntryAuthorId($list['ent_entry_author_id']);
      $Entry->setEntrySourceId($list['ent_entry_source_id']);
      $Entry->setEntryUse($list['ent_entry_use']);
      $Entry->setEntryHttpLink($list['ent_entry_http_link']);
    } // while
    return $Entry;
  }

}
