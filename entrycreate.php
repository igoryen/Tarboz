<?php 

//session_start();
//if(isset($_SESSION['user'])){ // 1  

  require("header.php"); 
  require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
  //include_once "lib.php";  // 25
  include_once 'views/entry/form_to_edit_entry.php';
  include_once 'views/entry/form_to_create_entry.php';
  include_once 'views/entry/form_to_create_kid.php';
  // TTTT for translator TTTTTTTTTTTTTTTTTTTTTTTT
  require_once('plug-in/translate/config.inc.php');
  require_once('plug-in/translate/class/ServicesJSON.class.php');
  require_once('plug-in/translate/class/MicrosoftTranslator.class.php');
  
  $translator = new MicrosoftTranslator(ACCOUNT_KEY);
  $selectbox = array('id'=> 'txtLang','name'=>'txtLang');
  $translator->getLanguagesSelectBox($selectbox);
  //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
  
  
  $user_input_valid = true; // 2
  date_default_timezone_set('America/Toronto');
  // 3, 53*
  $text_error = "";
  //etc...  
  // 51*
  if($_POST){ // 4
    // 44*, 45*
    //------------------------------------------
    // 26
    //------------------------------------------    

    if($user_input_valid){ // 6       
            
      if(isset($_GET['id']) && !isset($_GET['a'])){ // 14
        // 41*, 46*
        
        $em = new EntryManager(); // 12
        // 7, 8, 9, 10
      
        //table_to_see_POST_values(); // 27      
        $entry = new Entry(); // 32
        // 11, 29, 39 
        $entry->setEntryId(         $_GET['id']);
        $entry->setEntryLanguageId($_POST['langid']); // 30 (?)
        $entry->setEntryText($_POST['text']);
        $entry->setEntryVerbatim($_POST['verbatim']);
        $entry->setEntryTranslit($_POST['translit']);
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
        $entry->setEntryHttpLink(str_replace("watch?v=", "v/", $_POST['link']));
        // 40*, 50
        
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
        $entry->setEntryLanguageId($_POST['langid']); // 30 (?)
        $entry->setEntryText(htmlentities($_POST['text']));
        $entry->setEntryVerbatim(htmlentities($_POST['verbatim']));
        $entry->setEntryTranslit(htmlentities($_POST['translit']));
        $entry->setEntryAuthenStatusId($_POST['authen']);
        $entry->setEntryTranslOf($_POST['translOf']);
        $entry->setEntryUserId('3');//$_POST['creator']);
        $entry->setEntryMediaId('1');//($_POST['media_id']);
        $entry->setEntryCommentId('2'); //$_POST['comment_id'];
        $entry->setEntryRatingId('1'); //($_POST['rating_id']);
        $entry->setEntryTags($_POST['tags']);
        $entry->setEntryAuthorId('1');//$_POST['author']);
        $entry->setEntrySourceId('1');//$_POST['source']); 
        $entry->setEntryUse($_POST['use']);
        $entry->setEntryHttpLink(str_replace("watch?v=", "v/", $_POST['link'])); //43
        $entry->setEntryCreationDate(date("Y-m-d H:i:s"));
        
        $id = $em->createEntry($entry); // 13
        // 52*
        //header("Location: index.php?id=" . $id); // 31
        echo "<script type='text/javascript'>
              window.onload = function () { 
                top.location.href = 'entryview.php?id={$id}'; 
              };
             </script>";
        
      } // 16
    } // 6
  }// 4
  else { // 17
    if(isset($_GET['id'])){ // 34

      if(isset($_GET['a'])){ // 42
        // 48*
        $em = new EntryManager(); // 12
        $dad = $em->getEntryById($_GET['id']); // 36
        form_to_create_kid($dad);
        
      }else{ // 47
        //49*
        $em = new EntryManager(); // 12
        $entry = $em->getEntryById($_GET['id']); // 36
        form_to_edit_entry($entry); // 37
      }      
    }
    else{ // 35
      form_to_create_entry();
    }

}

require("footer.php");