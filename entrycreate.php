<?php 

//session_start();
//if(isset($_SESSION['user'])){ // 1  

  require("header.php"); 
  require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
  //include_once "lib.php";  // 25
  include_once 'views/entry/form_to_edit_entry.php';
  include_once 'views/entry/form_to_create_entry.php';
  
  $user_input_valid = true; // 2
  date_default_timezone_set('America/Toronto');
  //echo "<br>Today: " . date("Y-m-d H:i:s");
  // 3
  $text_error = "";
  //etc...  
    
  if($_POST){ // 4
    echo 'entrycreate.php: $_POST is populated';
 
    //------------------------------------------
    // 26
    //------------------------------------------    

    if($user_input_valid){ // 6       
            
      if(isset($_GET['id'])){ // 14
        // 41
        $em = new EntryManager(); // 12
        // 7, 8, 9, 10
      
        //table_to_see_POST_values(); // 27      
        $entry = new Entry(); // 32
        // 11, 29, 39 
        $entry->setEntryId(         $_GET['id']);
        //$entry->setEntryLanguage($_POST['language']); // 30 (?)
        $entry->setEntryText(mysql_real_escape_string((($_POST['text']))));
        //$entry->setEntryVerbatim($_POST['verbatim']);
        $entry->setEntryTranslit(mysql_real_escape_string((($_POST['translit']))));
        //$entry->setEntryAuthenStatusId($_POST['authen']);
        $entry->setEntryTranslOf(   NULL); // $_POST['transl_of']);
        //$entry->setEntryUserId(     '3'); //$_POST['creator']);
        $entry->setEntryMediaId(    '1');//($_POST['media_id']);
        $entry->setEntryCommentId(  '2'); //$_POST['comment_id'];
        $entry->setEntryRatingId(   '1'); //($_POST['rating_id']);
        $entry->setEntryTags(       $_POST['tags']);
        $entry->setEntryAuthorId('1');   //$_POST['author']);
        $entry->setEntrySourceId(   $_POST['source']); 
        $entry->setEntryUse(        $_POST['use']);
        $entry->setEntryHttpLink(   $_POST['link']);
        // add logic to create today's date
        $entry->setEntryCreationDate("2014-10-23");
        // 40
        
        $resultOfEntryUpdate = $em->updateEntry($entry); // 33
        echo "<script type='text/javascript'>
              window.onload = function () { 
                top.location.href = 'entryview.php?id={$_GET['id']}'; 
              };
             </script>";
      }
      else{ // 16
        // 11
        $em = new EntryManager(); // 12
        // 7, 8, 9, 10
      
        //table_to_see_post_values(); // 27      
        $entry = new Entry(); // 32
        // 11, 29
        //$entry->setEntryId($_POST['id']);
        $entry->setEntryLanguage($_POST['language']); // 30 (?)
        $entry->setEntryText(htmlentities($_POST['text']));
        // create verbatim, for now use 'entry_translit'
        $entry->setEntryVerbatim(htmlentities($_POST['translit']));
        $entry->setEntryTranslit(htmlentities($_POST['translit']));
        $entry->setEntryAuthenStatusId($_POST['authen']);
        $entry->setEntryTranslOf(NULL); // $_POST['transl_of']);
        $entry->setEntryUserId('3');//$_POST['creator']);
        $entry->setEntryMediaId('1');//($_POST['media_id']);
        $entry->setEntryCommentId('2'); //$_POST['comment_id'];
        $entry->setEntryRatingId('1'); //($_POST['rating_id']);
        $entry->setEntryTags($_POST['tags']);
        $entry->setEntryAuthorId('1');//$_POST['author']);
        $entry->setEntrySourceId('1');//$_POST['source']); 
        $entry->setEntryUse($_POST['use']);
        // change video link for embedding
        $entry->setEntryHttpLink(str_replace("watch?v=", "v/", $_POST['link']));
        // creation date is today's date 
        $entry->setEntryCreationDate(date("Y-m-d H:i:s"));
        
        $id = $em->createEntry($entry); // 13
        echo "<br> entrycreate.php: the result of the insert query = ". $id;
        //header("Location: index.php?id=" . $id); // 31
        echo "<script type='text/javascript'>
              window.onload = function () { 
                top.location.href = 'entryview.php?id={$id}'; 
              };
             </script>";
        
      } // create a query for INSERT operation
    } // 6
  }// 4
  else { // 17
    if(isset($_GET['id'])){ // 34
      echo "the id of the entry you want to edit is " . $_GET['id'];
      $em = new EntryManager(); // 12
      $entry = $em->getEntryById($_GET['id']); // 36
      form_to_edit_entry($entry); // 37
      
    }
    else{ // 35
      form_to_create_entry();
    }

}

require("footer.php");