<?php
require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_ENTRY . 'Entry.php';
require_once(DB_CONNECTION . 'datainfo.php');
require_once DB_CONNECTION . 'constants.php';

class EntryDataAccessor {
  /**
   *
   * @param type $entry
   * @return type $last_inserted_id (the ID generated in the last query)
   */
  public function addEntry($entry) {

    $id =         $entry->getEntryId();
    $lang =       $entry->getEntryLanguage();
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
    $date =       $entry->getEntryCreationDate();

    // 15
    $query_insert = 'INSERT INTO '
      .ENTRY. ' ('
            . '`ent_entry_language_id`, '
            . '`ent_entry_text`, '
            . '`ent_entry_verbatim`, '
            . '`ent_entry_translit`, '
            . '`ent_entry_authen_status_id`, '
            . '`ent_entry_translation_of`, '
            . '`ent_entry_creator_id`, '
            . '`ent_entry_media_id`, '
            . '`ent_entry_comment_id`, '
            . '`ent_entry_rating_id`, '
            . '`ent_entry_tags`, '
            . '`ent_entry_author_id`, '
            . '`ent_entry_source_id`, '
            . '`ent_entry_use`, '
            . '`ent_entry_http_link`, '
            . '`ent_entry_creation_date`)'
      . ' VALUES('
      . '"' . $lang
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
      . '", "' . $date
      . '")';
    // 51
    echo "<br>eda::query_insert:<br>"; echo $query_insert;
    $dbHelper = new DBHelper();  // 18
    $last_inserted_id = $dbHelper->executeInsertQuery($query_insert); // 17
    //16
    return $last_inserted_id;
  }
  /**
   *
   * @param type $entry
   * @return $resultOfEntryUpdate
   */
  public function updateEntry($entry) {
    //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)
            or die("Error, failed to connect" . mysqli_error($this->connection));
    $con->set_charset("utf8");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
    $entryId = $entry->getEntryId();

    $text =     mysqli_real_escape_string($con, $entry->getEntryText());
    $verbatim = mysqli_real_escape_string($con, $entry->getEntryVerbatim());
    $translit = mysqli_real_escape_string($con, $entry->getEntryTranslit());
    //$authsid = $entry->getEntryAuthenStatusId();
    //$translOf = $entry->getEntryTranslOf();
    //$userId = $entry->getEntryUserId();
    // $mediaSet = $entry->getMediaSet();
    // $commentId = $entry->;
    // $ratingId = $entry->getEntryRatingId();
    $tags =     mysqli_real_escape_string($con, $entry->getEntryTags());
    $authorId = mysqli_real_escape_string($con, $entry->getEntryAuthorId());
    $sourceId = $entry->getEntrySourceId();
    $use =      mysqli_real_escape_string($con, $entry->getEntryUse());
    $httpLink = $entry->getEntryHttpLink();
    /*
     * Compose the MySQL link
     */
    $query = "UPDATE ".ENTRY." SET "
            . "ent_entry_text = '$text',"
            . "ent_entry_verbatim = '$verbatim',"
            . "ent_entry_translit = '$translit',"
            //. "ent_entry_authen_status_id = '$email',"
            //. "ent_entry_translation_of = '$translOf',"
            //. "ent_entry_creator_id = '$userId',"
            //  . "ent_entry_media_id = '$bla',"
            //  . "ent_entry_comment_id = '',"
            //  . "ent_entry_rating_id = '',"
            . "ent_entry_tags = '$tags',"
            //. "ent_entry_author_id = '$authorId',"
            . "ent_entry_source_id = '$sourceId',"
            . "ent_entry_use = '$use',"
            . "ent_entry_http_link = '$httpLink' "
            . "WHERE ent_entry_id = $entryId";
    //echo "<br>eda::updateEntry() query:<br>" . $query . "<br>";
    /*
     * using: require_once DB_CONNECTION . 'DBHelper.php';
     */
    //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
    if (!mysqli_query($con,$query)) {
      die('Error: ' . mysqli_error($con));
    }    
    if ($con) {
      $result = mysqli_query($con, $query);
    }    
    mysqli_close($con);
    //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
    
    return $result;
  }
  /**
   *
   * @param type $entryId
   * @return type $entryGottenById
   */
  public function getEntryById($entryId) {

    $query = "SELECT
                e.ent_entry_id,
                l.lan_lang_name,
                e.ent_entry_text,
                e.ent_entry_text,
                e.ent_entry_verbatim,
                e.ent_entry_translit,
                e.ent_entry_authen_status_id,
                e.ent_entry_translation_of,
                e.ent_entry_creator_id,
                e.ent_entry_media_id,
                e.ent_entry_comment_id,
                e.ent_entry_rating_id,
                e.ent_entry_tags,
                e.ent_entry_author_id,
                e.ent_entry_source_id,
                e.ent_entry_use,
                e.ent_entry_http_link,
                e.ent_entry_creation_date
              FROM ".ENTRY." e, ".LANGUAGE." l 
              WHERE e.ent_entry_language_id = l.lan_language_id 
              AND e.ent_entry_id = ". $entryId;
    // 52
    $dbHelper = new DBHelper();
    //********For Test Purpose:(((((())))))
    //echo $query;
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
    $query = "DELETE FROM ".ENTRY. 
             " WHERE ent_entry_id = $entryId";
    $dbHelper = new DBHelper();
    $resultOfDelete = $dbHelper->executeQuery($query); //47
    return $resultOfDelete;
  }

  public function deleteEntryVirtual($entryId){
    $query = "UPDATE ". ENTRY
           . " SET ent_entry_deleted = 1 "
           . "WHERE ent_entry_id = '{$entryId}'";
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
            . " AND e.ent_entry_deleted = 0"
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
    $Entries[] = array();
    //
    $count = 0; // 30
    while ($list = mysqli_fetch_assoc($resultOfSelect)) {

      $Entries[$count] = new Entry(); // 31
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
    $query = "SELECT
                e.ent_entry_id,
                l.lan_lang_name,
                e.ent_entry_text,
                e.ent_entry_creator_id
              FROM ".ENTRY." e, ".LANGUAGE." l
              WHERE e.ent_entry_language_id = l.lan_language_id
                AND MATCH(e.ent_entry_verbatim)
                AGAINST('".$verbatim ."' IN NATURAL LANGUAGE MODE )
                AND e.ent_entry_deleted = 0
                AND e.ent_entry_authen_status_id = 1";
    //echo "</br>EDA getFatherByVerbatim query: ".$query;
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query); // 20
    // 25,26,27
    $fatherGottenByVerbatim = $this->getEntryBrief($result); // 22
    //28,29
    return $fatherGottenByVerbatim;
  }
  public function getListOfKidBriefByVerbatim($verbatim) {
    /*$query = "SELECT 
                e.ent_entry_id, 
                l.lan_lang_name, 
                e.ent_entry_text,
                e.ent_entry_creator_id,
                MATCH(e.ent_entry_verbatim)
                AGAINST('".$verbatim."' IN NATURAL LANGUAGE MODE)
                AS relevance
              FROM tbl_entry e, tbl_language l
              WHERE e.ent_entry_language_id = l.lan_language_id
                AND MATCH(e.ent_entry_verbatim)
                    AGAINST('".$verbatim."' IN NATURAL LANGUAGE MODE)
                AND e.ent_entry_authen_status_id = 2
                AND e.ent_entry_deleted = 0
              HAVING relevance >= 1
              ORDER BY l.lan_lang_name";*/
    $query = "SELECT 
                e.ent_entry_id, 
                l.lan_lang_name, 
                e.ent_entry_text,
                e.ent_entry_creator_id,
                MATCH(e.ent_entry_verbatim) 
                AGAINST('".$verbatim."' IN NATURAL LANGUAGE MODE)
                AS relevance
              FROM ".ENTRY." e, ".LANGUAGE." l
              WHERE e.ent_entry_language_id = l.lan_language_id 
                AND MATCH(e.ent_entry_verbatim) 
                AGAINST('".$verbatim."' IN NATURAL LANGUAGE MODE)
                AND e.ent_entry_authen_status_id = 2
                AND e.ent_entry_deleted = 0
              ORDER BY l.lan_lang_name";
    //echo "</br>EDA getListOfKidBriefByVerbatim query: ".$query;
    $dbHelper = new DBHelper();
    $resultOfSelect = $dbHelper->executeSelect($query);
    // the current EntryDataAccessor object = $this
    $arrayOfKidsGottenByVerbatim = $this->getListOfKidBrief($resultOfSelect);
    return $arrayOfKidsGottenByVerbatim;
  }

  public function getListOfEntryBriefByLanguage($language){

    $query ="SELECt e.ent_entry_id, l.lan_lang_name, e.ent_entry_text 
              FROM ".ENTRY." e, ".LANGUAGE." l 
              WHERE e.ent_entry_language_id = l.lan_language_id 
              AND e.ent_entry_deleted = 0
              AND LOWER(SUBSTR(l.lan_lang_name, 1, 2)) = '{$language}'";
    $dbHelper = new DBHelper();
    $resultOfSelect = $dbHelper->executeSelect($query);
    $arrayOfEntryGottenByLanguage = $this->getListOfEntryBrief($resultOfSelect);
    return $arrayOfEntryGottenByLanguage;
  }
  //---------------------------------------------
  public function getListOfEntryBriefBySearch($v,$l,$f,$t,$a){
    if($v==NULL){ // if no verbatim
    //echo "<br>eda::getListOfEntryBriefBySearch(): no verbatim";
      if ($l==NULL) { // if no language
        //echo "<br>eda::getListOfEntryBriefBySearch(): no language";
        if($f==NULL || $t==NULL){
          /*if no time frame, then #1-2. no search*/
          //echo "<br>eda::getListOfEntryBriefBySearch(): no time frame";
          //echo "<br>eda::getListOfEntryBriefBySearch(): no authen";
        }
        elseif($f!==NULL && $t!==NULL){ // if HAVE time frame
          //echo "<br>eda::getListOfEntryBriefBySearch(): case 3: we have a time frame";
          if($a==null){
            /*#3*/
            //echo "<br>eda::getListOfEntryBriefBySearch(): no authen";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e, tbl_language l
                      WHERE
                        e.ent_entry_language_id = l.lan_language_id
                      AND
                        e.ent_entry_creation_date BETWEEN '{$f}' AND '{$t}'";
          }
          else{
            /* #4 */
            //echo "<br>eda::getListOfEntryBriefBySearch(): case 4: authen + time frame";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e, tbl_language l
                      WHERE
                        e.ent_entry_language_id = l.lan_language_id
                      AND
                        e.ent_entry_creation_date BETWEEN '{$f}' AND '{$t}'
                      AND
                        e.ent_entry_authen_status_id = {$a}";
          }
        } // have time frame
      } // no language
      else{ // if we HAVE language
        //echo "<br>eda::getListOfEntryBriefBySearch(): l!==NULL";
        if($f==NULL || $t==NULL){ // if no time frame
          //echo "<br>eda::getListOfEntryBriefBySearch(): f==NULL || t==NULL";
          if($a==NULL){ // if no auth
            // #5 - only target language
            //echo "<br>eda::getListOfEntryBriefBySearch() case 5: target language";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e, tbl_language l
                      WHERE
                        e.ent_entry_language_id = l.lan_language_id
                      AND
                        e.ent_entry_language_id = {$l}";
          }
          else{ // if we HAVE auth
            //echo "<br>eda::getListOfEntryBriefBySearch(): a!==NULL";
            // #6 - target language + authenticity status
            //echo "<br>eda::getListOfEntryBriefBySearch() case 6: target language + authenticity status";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e,
                        tbl_language l
                      WHERE
                        e.ent_entry_language_id = l.lan_language_id
                      AND
                        e.ent_entry_language_id = {$l}
                      AND
                        e.ent_entry_authen_status_id = {$a}";
          }
        } // if no dateframe
        else{ //if we HAVE time frame
          //echo "<br>eda::getListOfEntryBriefBySearch(): we have time frame";
          if($a==NULL){ // if no auth
            // #7 - language + time frame
            //echo "<br>eda::getListOfEntryBriefBySearch() case 7: language + time frame";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e, tbl_language l
                      WHERE
                        e.ent_entry_language_id = l.lan_language_id
                      AND
                        e.ent_entry_language_id = {$l}
                      AND
                        e.ent_entry_creation_date BETWEEN '{$f}' AND '{$t}'";
          }
          else{ // if HAVE auth
            // #8 - language + time frame + auth
            //echo "<br>eda::getListOfEntryBriefBySearch() case 8: language + time frame + auth";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e,
                        tbl_language l
                      WHERE
                        e.ent_entry_language_id = l.lan_language_id
                      AND
                        e.ent_entry_language_id = {$l}
                      AND
                        e.ent_entry_creation_date BETWEEN '{$f}' AND '{$t}'
                      AND
                        e.ent_entry_authen_status_id = {$a}";
          }

        }
      }
    } // #1-16. if no verbatim
    else{//#17. if we HAVE verbatim
      if ($l==NULL) { // if no language
        if($f==NULL || $t==NULL){ // if no time frame
          if($a==NULL){ // if no auth
            //#9 - search phrase
            //echo "<br>eda::getListOfEntryBriefBySearch() case 9: verbatim";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e,
                        tbl_language l
                      WHERE
                        e.ent_entry_language_id = l.lan_language_id
                      AND
                        MATCH(e.ent_entry_verbatim)
                        AGAINST('{$v}' IN NATURAL LANGUAGE MODE )";

          }
          else{ // if we HAVE auth
            // #10 - search phrase + authen
            //echo "<br>eda::getListOfEntryBriefBySearch() case 10: search phrase + authen";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e,
                        tbl_language l
                      WHERE
                        e.ent_entry_language_id = l.lan_language_id
                      AND
                        MATCH(e.ent_entry_verbatim)
                        AGAINST('{$v}' IN NATURAL LANGUAGE MODE )
                      AND
                        e.ent_entry_authen_status_id = {$a}";
          }
          // #1-2. no search
        }
        elseif($f!==NULL && $t!==NULL){ // if HAVE time frame
          if($a==null){ //if NO auth
            // #11 - verbatim + time frame
            //echo "<br>eda::getListOfEntryBriefBySearch() case 11: verbatim + time frame";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e, tbl_language l
                      WHERE
                       e.ent_entry_language_id = l.lan_language_id
                      AND
                        MATCH(e.ent_entry_verbatim)
                        AGAINST('{$v}' IN NATURAL LANGUAGE MODE )
                      AND
                        e.ent_entry_creation_date BETWEEN '{$f}' AND '{$t}'";
          }
          else{ // if we HAVE auth
            // #12 - verbatim + time frame + authen
            //echo "<br>eda::getListOfEntryBriefBySearch() case 12: verbatim + time frame + authen";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e,
                        tbl_language l
                      WHERE
                        e.ent_entry_language_id = l.lan_language_id
                      AND
                        MATCH(e.ent_entry_verbatim)
                        AGAINST('{$v}' IN NATURAL LANGUAGE MODE )
                      AND
                        e.ent_entry_creation_date BETWEEN '{$f}' AND '{$t}'
                      AND
                        e.ent_entry_authen_status_id = {$a}";
          }
        }
      } // no language
      else{ // if we HAVE language
        if($f==NULL || $t==NULL){ // if no time frame
          if($a==NULL){ // if no auth
            // #13 - verbatim + language
            //echo "<br>eda::getListOfEntryBriefBySearch() case 13: verbatim + language";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e,
                        tbl_language l
                      WHERE
                        e.ent_entry_language_id = l.lan_language_id
                      AND
                        MATCH(e.ent_entry_verbatim)
                        AGAINST('{$v}' IN NATURAL LANGUAGE MODE )
                      AND
                        e.ent_entry_language_id = {$l}";

          }
          else{ // if we HAVE auth
            // #14 - verbatim + language + authen
            //echo "<br>eda::getListOfEntryBriefBySearch() case 14";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e, tbl_language l
                      WHERE
                        e.ent_entry_language_id = l.lan_language_id
                      AND
                        MATCH(e.ent_entry_verbatim)
                        AGAINST('{$v}' IN NATURAL LANGUAGE MODE )
                      AND
                        e.ent_entry_language_id = {$l}
                      AND
                        e.ent_entry_authen_status_id = {$a}";
          }
        } // if no dateframe
        else{ //if we HAVE time frame
          if($a==NULL){ // if no auth
            // #15 - verbatim + language + time frame
            //echo "<br>eda::getListOfEntryBriefBySearch() case 15: verbatim + language + time frame";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e,
                        tbl_language l
                      WHERE
                        e.ent_entry_language_id = l.lan_language_id
                      AND
                        MATCH(e.ent_entry_verbatim)
                        AGAINST('{$v}' IN NATURAL LANGUAGE MODE )
                      AND
                        e.ent_entry_language_id = {$l}
                      AND
                        e.ent_entry_creation_date BETWEEN '{$f}' AND '{$t}'";
          }
          else{ // if HAVE auth
            // #16 - verbatim + language + time frame + authen
            //echo "<br>eda::getListOfEntryBriefBySearch() case 16: verbatim + language + time frame + authen";
            $query = "SELECT
                        e.ent_entry_id,
                        l.lan_lang_name,
                        e.ent_entry_text,
                        e.ent_entry_authen_status_id,
                        e.ent_entry_translation_of
                      FROM
                        tbl_entry e,
                        tbl_language l
                      WHERE
                        e.ent_entry_language_id = l.lan_language_id
                      AND
                        MATCH(e.ent_entry_verbatim)
                        AGAINST('{$v}' IN NATURAL LANGUAGE MODE )
                      AND
                        e.ent_entry_authen_status_id = {$a}
                      AND
                        e.ent_entry_language_id = {$l}
                      AND
                        e.ent_entry_creation_date BETWEEN '{$f}' AND '{$t}'";
          }
        }
      }
    }//#17-32
    $dbHelper = new DBHelper();
    $resultOfSelect = $dbHelper->executeSelect($query);
    $arrayOfEntryGottenByLanguage = $this->getListOfEntryBrief2($resultOfSelect);
    return $arrayOfEntryGottenByLanguage;
  }
  //---------------------------------------------
  /**
   *
   * @param type $resultOfSelect
   * @return array of Entry objects
   */
  private function getListOfKidBrief($resultOfSelect) {
    $Entries[] = array(); //$Entries[] = new Entry(); 
    $count = 0; // 30
    while ($list = mysqli_fetch_assoc($resultOfSelect)) { // 33
   
      $Entries[$count] = new Entry(); //31
      // 32
      $Entries[$count]->setEntryId($list['ent_entry_id']);
      $Entries[$count]->setEntryLanguage($list['lan_lang_name']); // 19
      $Entries[$count]->setEntryText($list['ent_entry_text']);
//      $Entries[$count]->setEntryVerbatim($list['ent_entry_verbatim']);
//      $Entries[$count]->setEntryTranslit($list['ent_entry_translit']);
//      $Entries[$count]->setEntryAuthenStatusId($list['ent_entry_authen_status_id']);
//      $Entries[$count]->setEntryTranslOf($list['ent_entry_translation_of']);
      $Entries[$count]->setEntryUserId($list['ent_entry_creator_id']);
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
  private function getListOfEntryBrief($resultOfSelect) {
    $Entries[] = new Entry();
    $count = 0; // 30
    while ($list = mysqli_fetch_assoc($resultOfSelect)) { // 33

      $Entries[] = new Entry(); //31
      // 32
      $Entries[$count]->setEntryId($list['ent_entry_id']);
      $Entries[$count]->setEntryLanguage($list['lan_lang_name']);
      $Entries[$count]->setEntryText($list['ent_entry_text']);
      $count++;
    } // 33
    // 34,35
    return $Entries;
  }

  private function getListOfEntryBrief2($resultOfSelect) {
    $Entries[] = new Entry();
    $count = 0; // 30
    while ($list = mysqli_fetch_assoc($resultOfSelect)) { // 33

      $Entries[] = new Entry(); //31
      // 32
      $Entries[$count]->setEntryId($list['ent_entry_id']);
      $Entries[$count]->setEntryLanguage($list['lan_lang_name']);
      $Entries[$count]->setEntryText($list['ent_entry_text']);
      $Entries[$count]->setEntryAuthenStatusId($list['ent_entry_authen_status_id']);
      $Entries[$count]->setEntryTranslOf($list['ent_entry_translation_of']);
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
      $Entry->setEntryUserId($ary['ent_entry_creator_id']);
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
      $Entry->setEntryId(             $list['ent_entry_id']);
      $Entry->setEntryLanguage(       $list['lan_lang_name']); //53
      $Entry->setEntryText(           $list['ent_entry_text']);
      $Entry->setEntryVerbatim(       $list['ent_entry_verbatim']);
      $Entry->setEntryTranslit(       $list['ent_entry_translit']);
      $Entry->setEntryAuthenStatusId( $list['ent_entry_authen_status_id']);
      $Entry->setEntryTranslOf(       $list['ent_entry_translation_of']);
      $Entry->setEntryUserId(         $list['ent_entry_creator_id']);
      $Entry->setEntryMediaId(        $list['ent_entry_media_id']);
      $Entry->setEntryCommentId(      $list['ent_entry_comment_id']);
      $Entry->setEntryRatingId(       $list['ent_entry_rating_id']);
      $Entry->setEntryTags(           $list['ent_entry_tags']);
      $Entry->setEntryAuthorId(       $list['ent_entry_author_id']);
      $Entry->setEntrySourceId(       $list['ent_entry_source_id']);
      $Entry->setEntryUse(            $list['ent_entry_use']);
      $Entry->setEntryHttpLink(       $list['ent_entry_http_link']);
      $Entry->setEntryCreationDate(   $list['ent_entry_creation_date']);
    } // while
    return $Entry;
  }
    
  public function getDadEntryListByLangDate($in_lang, $in_from_date, $in_end_date) {
      $from_date = $in_from_date != "" ? $in_from_date : "2000-01-01";
      $end_date = $in_end_date != "" ? $in_end_date : "2100-01-01";
      if ($in_lang =="") {
        $query = "SELECT e.*, l.lan_lang_name 
                  FROM ".ENTRY." e
                  INNER JOIN ".LANGUAGE." l 
                  ON e.ent_entry_language_id = l.lan_language_id 
                  WHERE ent_entry_authen_status_id =1 AND 
                        e.ent_entry_creation_date >= '".$from_date."' AND 
                        e.ent_entry_creation_date <= '".$end_date."'
                  ORDER BY e.ent_entry_language_id, e.ent_entry_creation_date DESC";  
      } else {
        $query = "SELECT e.*, l.lan_lang_name 
                  FROM ".ENTRY." e
                  INNER JOIN ".LANGUAGE." l 
                  ON e.ent_entry_language_id = l.lan_language_id 
                  WHERE ent_entry_authen_status_id =1 AND 
                        e.ent_entry_language_id = '".$in_lang."' AND 
                        e.ent_entry_creation_date >= '".$from_date."' AND 
                        e.ent_entry_creation_date <= '".$end_date."'
                  ORDER BY e.ent_entry_language_id, e.ent_entry_creation_date DESC"; 
      }
      
      //echo "<br/>EAD getDadEntryListByLangDate query: ".$query;
      $dbHelper = new DBHelper();
      $resultOfSelect = $dbHelper->executeSelect($query);
      $arrayOfEntryByLangDate = $this->getListOfEntrySearch($resultOfSelect);
      return $arrayOfEntryByLangDate;
      
  }
  public function getKidEntryListByDadLangDate($dad_entryId, $in_lang, $in_from_date, $in_end_date) {
      $from_date = $in_from_date != "" ? $in_from_date : "2000-01-01";
      $end_date = $in_end_date != "" ? $in_end_date : "2100-01-01";
      if ($in_lang =="") {
        $query = "SELECT e.*, l.lan_lang_name 
                  FROM ".ENTRY." e
                  INNER JOIN ".LANGUAGE." l 
                  ON e.ent_entry_language_id = l.lan_language_id 
                  WHERE e.ent_entry_authen_status_id =2 AND 
                        e.ent_entry_translation_of = '".$dad_entryId."' AND
                        e.ent_entry_creation_date >= '".$from_date."' AND  
                        e.ent_entry_creation_date <= '".$end_date."'
                  ORDER BY e.ent_entry_language_id, e.ent_entry_creation_date DESC";  
      } else {
        $query = "SELECT e.*, l.lan_lang_name 
                  FROM ".ENTRY." e
                  INNER JOIN ".LANGUAGE." l 
                  ON e.ent_entry_language_id = l.lan_language_id 
                  WHERE ent_entry_authen_status_id =2 AND 
                        e.ent_entry_translation_of = '".$dad_entryId."' AND
                        e.ent_entry_language_id = '".$in_lang."' AND 
                        e.ent_entry_creation_date >= '".$from_date."' AND 
                        e.ent_entry_creation_date <= '".$end_date."'
                  ORDER BY e.ent_entry_language_id, e.ent_entry_creation_date DESC"; 
      }
      
      //echo "<br/>EAD getKidEntryListByDadLangDate query: ".$query;
      $dbHelper = new DBHelper();
      $resultOfSelect = $dbHelper->executeSelect($query);
      $arrayOfEntryByLangDate = $this->getOriginalKidsNum($dad_entryId) > 0 ? $this->getListOfEntrySearch($resultOfSelect)
                                                                        : array();
      return $arrayOfEntryByLangDate;
      
  }

  // get entry by user id
  public function getEntryByUserId($UserId) {

    $query = "SELECT * FROM ".ENTRY." WHERE ent_entry_creator_id = '".$UserId."'";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $entryListById = $this->getListOfFathers($result);
    return $entryListById;
      
  }

public function getEntryListByNoDadLangDate($in_lang, $in_from_date, $in_end_date) {
      $from_date = $in_from_date != "" ? $in_from_date : "2000-01-01";
      $end_date = $in_end_date != "" ? $in_end_date : "2100-01-01";
      if ($in_lang =="") {
        $query = "SELECT e.*, l.lan_lang_name 
                  FROM ".ENTRY." e
                  INNER JOIN ".LANGUAGE." l 
                  ON e.ent_entry_language_id = l.lan_language_id 
                  WHERE ent_entry_authen_status_id =2 AND 
                        e.ent_entry_creation_date >= '".$from_date."' AND 
                        e.ent_entry_creation_date <= '".$end_date."'
                  ORDER BY e.ent_entry_language_id, e.ent_entry_creation_date DESC";  
      } else {
        $query = "SELECT e.*, l.lan_lang_name 
                  FROM ".ENTRY." e
                  INNER JOIN ".LANGUAGE." l 
                  ON e.ent_entry_language_id = l.lan_language_id 
                  WHERE ent_entry_authen_status_id =2 AND 
                        e.ent_entry_language_id = '".$in_lang."' AND 
                        e.ent_entry_creation_date >= '".$from_date."' AND 
                        e.ent_entry_creation_date <= '".$end_date."' AND 
                        (e.ent_entry_translation_of IS NULL OR NOT(ent_entry_translation_of > ''))
                  ORDER BY e.ent_entry_language_id, e.ent_entry_creation_date DESC"; 
      }
      
      //echo "<br/>EAD getEntryListByNoDadLangDate query: ".$query;
      $dbHelper = new DBHelper();
      $resultOfSelect = $dbHelper->executeSelect($query);
      $arrayOfEntryByLangDate = $this->getListOfEntrySearch($resultOfSelect);
      return $arrayOfEntryByLangDate;
      
  }
    
  private function getListOfEntrySearch($resultOfSelect) {
    $Entries[] = array();
    $count = 0; 
    while ($list = mysqli_fetch_assoc($resultOfSelect)) {       
      $Entries[$count] = new Entry(); 
      $Entries[$count]->setEntryId(             $list['ent_entry_id']);
      $Entries[$count]->setEntryLanguage(       $list['lan_lang_name']); 
      $Entries[$count]->setEntryText(           $list['ent_entry_text']);
      $Entries[$count]->setEntryVerbatim(       $list['ent_entry_verbatim']);
      $Entries[$count]->setEntryTranslit(       $list['ent_entry_translit']);
      $Entries[$count]->setEntryAuthenStatusId( $list['ent_entry_authen_status_id']);
      $Entries[$count]->setEntryTranslOf(       $list['ent_entry_translation_of']);
      $Entries[$count]->setEntryUserId(         $list['ent_entry_creator_id']);
      $Entries[$count]->setEntryCreationDate(   $list['ent_entry_creation_date']);
      $count++;
    } 
    
    return $Entries;
  }
    
  public function getOriginalKidsNum($entryId) {
      $query = "SELECT * 
                FROM ".ENTRY."
                WHERE ent_entry_authen_status_id = 2 AND 
                ent_entry_translation_of = '".$entryId."' 
                ORDER BY ent_entry_language_id, ent_entry_creation_date DESC";
      //echo "<br/>EAD getOriginalKidsNum query: ".$query;
      $dbHelper = new DBHelper();
      $resultOfSelect = $dbHelper->executeSelect($query);
      $entries = array();
      $count = 0;
        while ($list = mysqli_fetch_assoc($resultOfSelect)) {
            $entries[$count] = new Entry();
            $count++;
        }
        return count($entries);      
  }
    
  public function getEntryLikeNumByEntry($entryId) {
      $query = "SELECT count(rating.rat_like_user_id) AS likeNum
                FROM ".ENTRY." AS entry INNER JOIN ".RATING." AS rating
                ON rating.rat_entity_id = CONCAT('ent', '".$entryId."') 
                    AND rating.rat_like_user_id IS NOT NULL AND rating.rat_like_user_id >0
                GROUP BY entry.ent_entry_id 
                HAVING entry.ent_entry_id='".$entryId."'";
      //echo "<br/>EAD getEntryLikeNum query: ".$query;
      $dbHelper = new DBHelper();
      $resultOfSelect = $dbHelper->executeSelect($query);
      $like_num = "";
      $count = 0;
        while ($list = mysqli_fetch_assoc($resultOfSelect)) {
            $like_num = $list['likeNum'];
            $count++;
        }
        return $like_num;      
  }

}
