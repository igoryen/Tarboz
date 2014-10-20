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
    /*
     * Using: require_once BUSINESS_DIR_ENTRY . 'Entry.php';
     */

    // [ent_entry_text]
    // the text of the entry, e.g. "Happy Birthday To You"
    $text = $entry->getEntryText();

    /*
     * TODO: create the verbatim of $text using the Bing translator
     */
    // [ent_entry_verbatim]
    // the verbatim of entry
    // ~ pinyin: e.g. "s dnyom rozhdenia tebya"
    $verbatim = $entry->getEntryVerbatim();

    /*
     * TODO: transliterate the value of $text using ...
     */
    // [ent_entry_translit]
    // entry's transliteration, using roman alphabet
    $translit = $entry->getEntryTranslit();

    // [ent_entry_authen_status_id]
    // The authenticity status of the entry:
    // whether the entry is original, or a translation, or unauthenticated
    $authsid = $entry->getEntryAuthenStatusId();

    // [ent_entry_translation_of]
    // the hyperlink to the entry which is the "father" of the 'entry family'
    $translOf = $entry->getEntryTranslOf();

    // [ent_entry_creator_id]
    // the id of the creator-user who added the entry to the database
    $userId = $entry->getEntryUserId();

    // [ent_entry_media_id]
    // $mediaSet = $entry->getMediaSet();
    //
    // [ent_entry_comment_id]
    // the set of comments for this entry
    // $commentId = $entry->;
    //
    // [ent_entry_rating_id]
    // the rating of the entry
    // $ratingId = $entry->getEntryRatingId();
    //
    // [ent_entry_tags]
    // tags to make the entry search easier
    $tags = $entry->getEntryTags();

    // Whoever is the author of the text of the entry.
    // Why the id??? Author is not in our database
    $authorId = $entry->getEntryAuthorId();

    // which book or other work the entry is taken from
    $sourceId = $entry->getEntrySourceId();

    // when/in which situations it is appropriate to use the entry
    $use = $entry->getEntryUse();

    // the link to the video of the entry
    $httpLink = $entry->getEntryHttpLink();


    /*
     * compose the MySQL link
     */
    $query_insert = "INSERT INTO ENTRY VALUES('', '"
            . "$text', '"
            . "$verbatim','"
            . "$translit','"
            . "$authsid','"
            . "$translOf','"
            . "$userId','"
            // media
            // comment
            // rating
            . "$tags','"
            . "$authorId','"
            . "$sourceId','"
            . "$use','"
            . "$httpLink','"
            . ")";
    /*
     * using: require_once DB_CONNECTION . 'DBHelper.php';
     */
    $dbHelper = new DBHelper();
    // TRUE (if INSERT succeeded) or FALSE (if failed)
    $result = $dbHelper->executeQuery($query_insert);
    $last_inserted_id = mysql_insert_id();
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
    /*
     * What is the language of the query?
     * Which language table to go to?
     */
//    $query = "SELECT * FROM " . ENTRY .
//            " WHERE ent_entry_id = ' $entryId ';";

    $query = 'SELECT *
              FROM tbl_entry_russian
              WHERE ent_entry_id = "'.$entryId.'"

              UNION ALL

              SELECT *
              FROM  tbl_entry_mandarin
              WHERE ent_entry_id = "'.$entryId.'"

              UNION ALL

              SELECT *
              FROM  tbl_entry_english
              WHERE ent_entry_id = "'.$entryId.'";';

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);

    // the current EntryDataAccessor object = $this
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
    // TRUE or FALSE
    $resultOfDelete = $dbHelper->executeQuery($query);
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
    //the counter keeps count of the entries
    $count = 0;
    while ($list = mysqli_fetch_assoc($resultOfSelect)) {
      // an array of class Entry objects
      $Entries[] = new Entry();
      // assign the value of each key of the assoc.array
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
  public function getFatherByVerbatim($verbatim) {
    //$fatherGottenByVerbatim = new Entry();
    // # search all language tables for the original entry whose verbatim
    // is close to the user-provided verbatim
    $query = 'SELECT ent_entry_id, ent_entry_text
            FROM tbl_entry_russian
            WHERE
              MATCH(ent_entry_verbatim)
              AGAINST("' . $verbatim . '" IN BOOLEAN MODE )
              AND ent_entry_authen_status_id = 1
            UNION ALL
            SELECT  ent_entry_id, ent_entry_text
            FROM  tbl_entry_mandarin
            WHERE
              MATCH(ent_entry_verbatim)
              AGAINST("' . $verbatim . '" IN BOOLEAN MODE )
              AND ent_entry_authen_status_id = 1
            UNION ALL
            SELECT  ent_entry_id, ent_entry_text
            FROM  tbl_entry_english
            WHERE
              MATCH(ent_entry_verbatim)
              AGAINST("' . $verbatim . '" IN BOOLEAN MODE )
              AND ent_entry_authen_status_id = 1';
    $dbHelper = new DBHelper();
    $resultOfSelect = $dbHelper->executeSelect($query);
    // the current EntryDataAccessor object = $this
    $fatherGottenByVerbatim = $this->getEntryBrief($resultOfSelect);
    return $fatherGottenByVerbatim;
  }

  public function getListOfKidBriefByVerbatim($verbatim) {
    $query = 'SELECT ent_entry_id, ent_entry_text, relevance FROM
          (SELECT ent_entry_id, ent_entry_text, relevance FROM(

            # Russian
            (SELECT ent_entry_id, ent_entry_text,
              MATCH(ent_entry_verbatim)
              AGAINST("' . $verbatim . '" IN NATURAL LANGUAGE MODE)
              AS relevance
              FROM tbl_entry_russian
              WHERE
              MATCH(ent_entry_verbatim)
              AGAINST("' . $verbatim . '" IN NATURAL LANGUAGE MODE)
              AND ent_entry_authen_status_id = 2
              HAVING Relevance > 0
              ORDER BY relevance DESC
            ) # Russian

            UNION ALL

            # English
            (SELECT ent_entry_id, ent_entry_text,
              MATCH(ent_entry_verbatim)
              AGAINST("' . $verbatim . '" IN NATURAL LANGUAGE MODE)
              AS relevance
              FROM  tbl_entry_english
              WHERE
              MATCH(ent_entry_verbatim)
              AGAINST("' . $verbatim . '" IN NATURAL LANGUAGE MODE)
              AND ent_entry_authen_status_id = 2
              HAVING Relevance > 0
              ORDER BY relevance DESC
            )# English

            UNION ALL

            # Mandarin
            (SELECT ent_entry_id, ent_entry_text,
              MATCH(ent_entry_verbatim)
              AGAINST("' . $verbatim . '" IN NATURAL LANGUAGE MODE)
              AS relevance
              FROM  tbl_entry_mandarin
              WHERE
              MATCH(ent_entry_verbatim)
              AGAINST("' . $verbatim . '" IN NATURAL LANGUAGE MODE)
              AND ent_entry_authen_status_id = 2
              HAVING Relevance > 0
              ORDER BY relevance DESC
            ) # Mandarin

          ) AS UnionTable
          GROUP BY ent_entry_id ASC
        ) AS TableToOrderById';

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
    //the counter keeps count of the entries
    $count = 0;
    while ($list = mysqli_fetch_assoc($resultOfSelect)) {
      // an array of class Entry objects
      $Entries[] = new Entry();
      // assign the value of each key of the assoc.array
      $Entries[$count]->setEntryId($list['ent_entry_id']);
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
    } // while
    // to filter the array and remove empty values (DOESN'T WORK)
    //return array_filter($Entries);
    return $Entries;
  }

  /**
   * getEntryBrief($resultOfSelect)
   * To retrieve only some fields of one entry for the phrase search result page.
   * @param type $resultOfSelect
   * @return \Entry
   */
  private function getEntryBrief($resultOfSelect) {
    // private: to be accessed by member functions only
    // $resultOfSelect is the result from executing a SELECT query
    // create an empty Entry object
    $Entry = new Entry();
    // Fetch the result of SELECT as an associative array
    while ($list = mysqli_fetch_assoc($resultOfSelect)) {
      /*
        `ent_entry_id`
        `ent_entry_text`
        `ent_entry_verbatim`
        `ent_entry_translit`
        `ent_entry_authen_status_id`
        `ent_entry_translation_of`
        `ent_entry_creator_id`
        `ent_entry_media_id`
        `ent_entry_comment_id`
        `ent_entry_rating_id`
        `ent_entry_tags`
        `ent_entry_author_id`
        `ent_entry_source_id`
        `ent_entry_use`
        `ent_entry_http_link`
       */
      // assign the value of each key of the assoc.array
      $Entry->setEntryId($list['ent_entry_id']);
      $Entry->setEntryText($list['ent_entry_text']);
      //$Entry->setEntryVerbatim($list['ent_entry_verbatim']);
      //$Entry->setEntryTranslit($list['ent_entry_translit']);
      //$Entry->setEntryAuthenStatusId($list[ent_entry_authen_status_id]);
      //$Entry->setEntryTranslOf($list['ent_entry_translation_of']);
      //$Entry->setEntryUserId($list['ent_entry_creator_id']);
      //$Entry->setEntryMediaId($list['ent_entry_media_id']);
      //$Entry->setEntryCommentId($list['ent_entry_comment_id']);
      //$Entry->setEntryRatingId($list['ent_entry_rating_id']);
      //$Entry->setEntryTags($list['ent_entry_tags']);
      //$Entry->setEntryAuthorId($list['ent_entry_author_id']);
      //$Entry->setEntrySourceId($list['ent_entry_source_id']);
      //$Entry->setEntryUse($list['ent_entry_use']);
      //$Entry->setEntryHttpLink($list['ent_entry_http_link']);
    } // while
    return $Entry;
  }
  /**
   * getEntryFull($resultOfSelect)
   * To retrieve ALL the fields of one entry for the entry profile page.
   * @param type $resultOfSelect
   * @return \Entry
   */
  private function getEntryFull($resultOfSelect) {
    // private: to be accessed by member functions only
    // $selectResult is the result from executing a SELECT query
    // create an empty object
    $Entry = new Entry();
    // Fetch a result row as an associative array
    while ($list = mysqli_fetch_assoc($resultOfSelect)) {
      /*
        `ent_entry_id`
        `ent_entry_text`
        `ent_entry_verbatim`
        `ent_entry_translit`
        `ent_entry_authen_status_id`
        `ent_entry_translation_of`
        `ent_entry_creator_id`
        `ent_entry_media_id`
        `ent_entry_comment_id`
        `ent_entry_rating_id`
        `ent_entry_tags`
        `ent_entry_author_id`
        `ent_entry_source_id`
        `ent_entry_use`
        `ent_entry_http_link`
       */
      // assign the value of each key of the assoc.array
      $Entry->setEntryId($list['ent_entry_id']);
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
