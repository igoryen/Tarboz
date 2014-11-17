<?php

class Entry {

  private $entry_id; // 1
  private $entry_language_id;
  private $entry_language; // 13
  private $entry_text; // 2
  private $entry_verbatim; // 3
  private $entry_translit; // 4
  private $entry_authen_status_id; //5
  private $entry_transl_of;
  private $entry_user_id; // 6
  private $entry_media_id; // 7
  private $entry_comment_id; //8
  private $entry_rating_id; // 9
  private $entry_tags;
  private $entry_author_id; // 10
  private $entry_authors;
  private $entry_source_id; // 11
  private $entry_use; // 12
  private $entry_http_link; //12
  private $entry_creation_date;


  public function getEntryId() {
    return $this->entry_id;
  }

  public function setEntryId($x) {
    $this->entry_id = $x;
  }

  public function getEntryLanguageId() {
    return $this->entry_language_id;
  }

  public function setEntryLanguageId($x) {
    $this->entry_language_id = $x;
  }

   public function getEntryLanguage() {
    return $this->entry_language;
  }

  public function setEntryLanguage($x) {
    $this->entry_language = $x;
  }
  
  public function getEntryText() {
    return $this->entry_text;
  }

  public function setEntryText($t) {
    $this->entry_text = $t;
  }

  public function getEntryVerbatim() {
    return $this->entry_verbatim;
  }

  public function setEntryVerbatim($v) {
    $this->entry_verbatim = $v;
  }

  public function getEntryTranslit() {
    return $this->entry_translit;
  }

  public function setEntryTranslit($t) {
    $this->entry_translit = $t;
  }

  public function getEntryAuthenStatusId() {
    return $this->entry_authen_status_id;
  }

  public function setEntryAuthenStatusId($a) {
    $this->entry_authen_status_id = $a;
  }

  public function getEntryTranslOf() {
    return $this->entry_transl_of;
  }

  public function setEntryTranslOf($t) {
    $this->entry_transl_of = $t;
  }

  /* --------------------------------------
    functions for class Entry -> User
    -------------------------------------- */

  public function getEntryUserId() {
    return $this->entry_user_id;
  }

  public function setEntryUserId($x) {
    $this->entry_user_id = $x;
  }

  /* --------------------------------------
    functions for class EntryDetails -> Media
    -------------------------------------- */

  public function getEntryMediaId() {
    return $this->entry_media_id;
  }

  public function setEntryMediaId($m) {
    $this->entry_media_id = $m;
  }

  /* --------------------------------------
    functions for class EntryDetails -> Comment
    -------------------------------------- */

  public function getEntryCommentId() {
    return $this->entry_comment_id;
  }

  public function setEntryCommentId($c) {
    $this->entry_comment_id = $c;
  }

  /* --------------------------------------
    functions for class EntryDetails -> Rating
    -------------------------------------- */

  public function getEntryRatingId() {
    return $this->entry_rating_id;
  }

  public function setEntryRatingId($r) {
    $this->entry_rating_id = $r;
  }


  public function getEntryTags() {
    return $this->entry_tags;
  }

  public function setEntryTags($t) {
    $this->entry_tags = $t;
  }

  /* --------------------------------------
    functions for class EntryDetails -> EntryAuthor
    -------------------------------------- */

  public function getEntryAuthorId() {
    return $this->entry_author_id;
  }

  public function setEntryAuthorId($a) {
    $this->entry_author_id = $a;
  }
  
  public function getEntryAuthors() {
    return $this->entry_authors;
  }

  public function setEntryAuthors($a) {
    $this->entry_authors = $a;
  }

  /* --------------------------------------
    functions for class EntryDetails -> EntrySource
    -------------------------------------- */

  public function getEntrySourceId() {
    return $this->entry_source_id;
  }

  public function setEntrySourceId($s) {
    $this->entry_source_id = $s;
  }

  /* --------------------------------------
    functions for class Entry -> EntryDetails
    -------------------------------------- */

  public function getEntryUse() {
    return $this->entry_use;
  }

  public function setEntryUse($u) {
    $this->entry_use = $u;
  }

  public function getEntryHttpLink() {
    return $this->entry_http_link;
  }

  public function setEntryHttpLink($h) {
    $this->entry_http_link = $h;
  }
  
  public function getEntryCreationDate() {
    return $this->entry_creation_date;
  }

  public function setEntryCreationDate($x) {
    $this->entry_creation_date = $x;
  }

}

/*
  writing the Entry class
  some class members are instances of another class. How do I write them?

 */
