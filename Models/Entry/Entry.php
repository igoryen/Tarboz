<?php
  /*--------------------------------------
    bring in the files with classes
    -------------------------------------*/
//  include_once("./EntryAuthor.php");
//  include_once("./EntryDetails.php");
//  include_once("./EntrySource.php");
//  include_once("./AuthenStatus.php");
//  include_once("./User.php");

class Entry{
  /*-----------------------------------------
    instantiate the classes from the included files
    -----------------------------------------*/
//    $ea = new EntryAuthor();
//    $ed = new EntryDetails();
//    $es = new EntrySource();
//    $as = new AuthenStatus();
//    $u  = new User();
  /*------------------------------------------
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
    ------------------------------------------*/
  private $entry_id; // 10
  private $entry_text; // 15
  private $entry_verbatim; // 20
  private $entry_translit; // 23
  private $entry_transl_of;
  private $entry_tags;
  private $entry_meaning;
  private $entry_user_id; // 65  
  private $entry_authen_status_id; // 50
  private $entry_use; // 53
  private $entry_http_link; //53
  private $entry_comment_id; // 90
  private $entry_rating_id; // 70
  private $entry_media_id; // 93
  private $entry_author_id; // 25
  private $entry_source_id; // 100  
  
  /*----------------------------------
    functions for class Entry
    ---------------------------------*/

  /*getter & setter $id */
  public function getId() { return $this->entry_id; }
  public function setId($x){ $this->entry_id = $x; }

  /*getter & setter for $text */
  public function getText(){ return $this->entry_text; }
  public function setText($t){ $this->entry_text = $t; }

  /*getter & setter for $verbatim */
  public function getVerbatim(){ return $this->entry_verbatim; }
  public function setVerbatim($v){ $this->entry_verbatim = $v; }

  /*getter & setter for $translOf */
  public function getTranslOf(){ return $this->entry_transl_of; }
  public function setTranslOf($t){ $this->entry_transl_of = $t; }

  /*getter & setter for $tags */
  public function getTags(){ return $this->entry_tags; }
  public function setTags($t){ $this->entry_tags = $t; }
  
  /*getter & setter for $meaning */
  public function getMeaning(){ return $this->entry_meaning; }
  public function setMeaning($m){ $this->entry_meaning = $m; }
  
  /*--------------------------------------
    functions for class Entry -> User
    --------------------------------------*/
  /*getter & setter for $userId */
  public function getUserId(){ return $this->entry_user_id; }
  public function setUserId($x){ $this->entry_user_id = $x; }
  /*--------------------------------------
    functions for class Entry -> AuthenStatus
    --------------------------------------*/
  /*getter & setter for $authenStatusId */
  public function getAuthenStatusId(){ return $this->entry_authen_status_id; }
  public function setAuthenStatusId($a){ $this->entry_authen_status_id = $a; }
  /*--------------------------------------
    functions for class Entry -> EntryDetails
    --------------------------------------*/
  /*getter & setter for $use */
  public function getUse(){ return $this->entry_use; }
  public function setUse($u){ $this->entry_use = $u; }

  /*getter & setter for $httpLink */
  public function getHttpLink(){ return $this->entry_http_link; }
  public function setHttpLink($h){ $this->entry_http_link = $h; }

  /*--------------------------------------
    functions for class EntryDetails -> Comment
    --------------------------------------*/
  /*getter & setter for $commentId */
  public function getCommentId(){ return $this->entry_comment_id; }
  public function setCommentId($c){ $this->entry_comment_id = $c; }

  /*--------------------------------------
    functions for class EntryDetails -> Rating
    --------------------------------------*/
  /*getter & setter for $ratingId */
  public function getRatingId(){ return $this->entry_rating_id; }
  public function setRatingId($r){ $this->entry_rating_id = $r; }

  /*--------------------------------------
    functions for class EntryDetails -> Media
    --------------------------------------*/
  /*getter & setter for $mediaSet*/
  public function getMediaSet(){ return $this->entry_media_id; }
  public function setMediaSet($m){ $this->entry_media_id = $m; }

  /*--------------------------------------
    functions for class EntryDetails -> EntryAuthor
    --------------------------------------*/
  /*getter & setter for $authorId */
  public function getAuthorId(){ return $this->entry_author_id; }
  public function setAuthorId($a){ $this->entry_author_id = $a; }

  /*--------------------------------------
    functions for class EntryDetails -> EntrySource
    --------------------------------------*/  
  /*getter & setter for $sourceId */
  public function getSourceId(){ return $this->entry_source_id; }
  public function setSourceId($s){  $this->entry_source_id = $s; }

}
/*
  writing the Entry class
  some class members are instances of another class. How do I write them?

*/

?>