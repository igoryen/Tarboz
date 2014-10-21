<?php 

//session_start();
//
//if(isset($_SESSION['user'])){ // 1  

  require("../Shared/header.php"); 
  include "../../config.php";
  require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
  include_once "lib.php";  // 25
  
  $user_input_valid = true; // 2
  
  // 3
  $text_error = "";
  //etc...
  
  //$language = "english";
  
    
  if($_POST){ // 4
    echo '$_POST is populated';
 
    //------------------------------------------
    // 26
    //
    //
    //------------------------------------------
    

    //if($user_input_valid){ // 3
      
      // 6, 7, 8, 9, 10
      
      //table_to_see_POST_values(); // 27      
      
      // 11
      $entry = new Entry();
      
      $language =   $_POST['language'];
      
      $entry->setEntryId($_POST['id']);
      $entry->setEntryText($_POST['text']);
      $entry->setEntryVerbatim($_POST['verbatim']);
      $entry->setEntryTranslit($_POST['translit']);
      $entry->setEntryAuthenStatusId($_POST['authen']);
      $entry->setEntryTranslOf(NULL); // $_POST['transl_of']);
      $entry->setEntryUserId('3'); //$_POST['creator']);
      $entry->setEntryMediaId('1');//($_POST['media_id']);
      $entry->setEntryCommentId('2'); //$_POST['comment_id'];
      $entry->setEntryRatingId('1'); //($_POST['rating_id']);
      $entry->setEntryTags($_POST['tags']);
      $entry->setEntryAuthorId($_POST['author']);
      $entry->setEntrySourceId($_POST['source']); 
      $entry->setEntryUse($_POST['use']);
      $entry->setEntryHttpLink($_POST['link']);      
      
      $em = new EntryManager(); // 12      
      $result = $em->createEntry($entry); // 13
      echo "<br> create::the result of the insert query => ". $result;
      
      // 
            
      //if($_GET['id']){ // 14
        
        //$query = "UPDATE ..."; // 15
      //}
      //else{ // 16
        
      
      //} // create a query for INSERT operation
    //} // 6
  }// 4
  else { // 17
    form_to_create_entry();
     // 18
  //$em = new EntryManager();

  // 19
  // 20
  //$language = 'english';
  // 21
  //$greatest_id = '10';
  //$next_id_num = '11';
  // 22 
  //$new_id = $language . '_' . $next_id_num;

  //}// 4  
  
//} // 1
//else{ // 23
  // 
  // 24
  //header('Location: ... login.php');
//}
      //$language = 'english';

}

require("../Shared/footer.php");