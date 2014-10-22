<?php

/* --------------------------------------
  bring in the files with classes
  ------------------------------------- */

//  include_once("./EntryAuthor.php");
//  include_once("./EntryDetails.php");
//  include_once("./EntrySource.php");
//  include_once("./AuthenStatus.php");
//  include_once("./User.php");

class Entry {
  /* -----------------------------------------
    instantiate the classes from the included files
    ----------------------------------------- */

//    $ea = new EntryAuthor();
//    $ed = new EntryDetails();
//    $es = new EntrySource();
//    $as = new AuthenStatus();
//    $u  = new User();
  /* ------------------------------------------
    10) ent_entry_id
    15) ent_entry_text
    20) ent_entry_verbatim
    23) ent_entry_translit
    25) of class EntryAuthor. better than $authorName?
    50) of class AuthenStatus
    53) of class EntryDetails
    65) of class User
    70) of class Rating. why not "ratingSet" or "ratingSetId" ???
    90) why not "commentSetId" ??
    93) of class Media. why not "mediaSetId" ??
    100) of class EntrySource. source = a piece of lit. work
    ------------------------------------------ */
  private $entry_id; // 10
  private $entry_language;
  private $entry_text; // 15
  private $entry_verbatim; // 20
  private $entry_translit; // 23
  private $entry_authen_status_id; // 50
  private $entry_transl_of;
  private $entry_user_id; // 65
  private $entry_media_id; // 93
  private $entry_comment_id; // 90
  private $entry_rating_id; // 70
  private $entry_tags;
  private $entry_author_id; // 25
  private $entry_source_id; // 100
  private $entry_use; // 53
  private $entry_http_link; //53
  private $entry_creation_date;

  /* ----------------------------------
    functions for class Entry
    --------------------------------- */

  /* getter & setter $id */

  public function getEntryId() {
    return $this->entry_id;
  }

  public function setEntryId($x) {
    $this->entry_id = $x;
  }

   public function getEntryLanguage() {
    return $this->entry_language;
  }

  public function setEntryLanguage($x) {
    $this->entry_language = $x;
  }
  
  /* getter & setter for $text */

  public function getEntryText() {
    return $this->entry_text;
  }

  public function setEntryText($t) {
    $this->entry_text = $t;
  }

  /* getter & setter for $verbatim */

  public function getEntryVerbatim() {
    return $this->entry_verbatim;
  }

  public function setEntryVerbatim($v) {
    $this->entry_verbatim = $v;
  }

  /* getter & setter for $translit */

  public function getEntryTranslit() {
    return $this->entry_translit;
  }

  public function setEntryTranslit($t) {
    $this->entry_translit = $t;
  }

  /* --------------------------------------
    functions for class Entry -> AuthenStatus
    -------------------------------------- */
  /* getter & setter for $authenStatusId */

  public function getEntryAuthenStatusId() {
    return $this->entry_authen_status_id;
  }

  public function setEntryAuthenStatusId($a) {
    $this->entry_authen_status_id = $a;
  }

  /* getter & setter for $translOf */

  public function getEntryTranslOf() {
    return $this->entry_transl_of;
  }

  public function setEntryTranslOf($t) {
    $this->entry_transl_of = $t;
  }

  /* --------------------------------------
    functions for class Entry -> User
    -------------------------------------- */
  /* getter & setter for $userId */

  public function getEntryUserId() {
    return $this->entry_user_id;
  }

  public function setEntryUserId($x) {
    $this->entry_user_id = $x;
  }

  /* --------------------------------------
    functions for class EntryDetails -> Media
    -------------------------------------- */
  /* getter & setter for $mediaSet */

  public function getEntryMediaId() {
    return $this->entry_media_id;
  }

  public function setEntryMediaId($m) {
    $this->entry_media_id = $m;
  }

  /* --------------------------------------
    functions for class EntryDetails -> Comment
    -------------------------------------- */
  /* getter & setter for $commentId */

  public function getEntryCommentId() {
    return $this->entry_comment_id;
  }

  public function setEntryCommentId($c) {
    $this->entry_comment_id = $c;
  }

  /* --------------------------------------
    functions for class EntryDetails -> Rating
    -------------------------------------- */
  /* getter & setter for $ratingId */

  public function getEntryRatingId() {
    return $this->entry_rating_id;
  }

  public function setEntryRatingId($r) {
    $this->entry_rating_id = $r;
  }

  /* getter & setter for $tags */

  public function getEntryTags() {
    return $this->entry_tags;
  }

  public function setEntryTags($t) {
    $this->entry_tags = $t;
  }

  /* --------------------------------------
    functions for class EntryDetails -> EntryAuthor
    -------------------------------------- */
  /* getter & setter for $authorId */

  public function getEntryAuthorId() {
    return $this->entry_author_id;
  }

  public function setEntryAuthorId($a) {
    $this->entry_author_id = $a;
  }

  /* --------------------------------------
    functions for class EntryDetails -> EntrySource
    -------------------------------------- */
  /* getter & setter for $sourceId */

  public function getEntrySourceId() {
    return $this->entry_source_id;
  }

  public function setEntrySourceId($s) {
    $this->entry_source_id = $s;
  }

  /* --------------------------------------
    functions for class Entry -> EntryDetails
    -------------------------------------- */
  /* getter & setter for $use */

  public function getEntryUse() {
    return $this->entry_use;
  }

  public function setEntryUse($u) {
    $this->entry_use = $u;
  }

  /* getter & setter for $httpLink */

  public function getEntryHttpLink() {
    return $this->entry_http_link;
  }

  public function setEntryHttpLink($h) {
    $this->entry_http_link = $h;
  }
  
  public function getCreationDate() {
    return $this->entry_creation_date;
  }

  public function setCreationDate($x) {
    $this->entry_creation_date = $x;
  }

}

/*
  writing the Entry class
  some class members are instances of another class. How do I write them?

 */
