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
  
  $user_id = "";
  if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
      $user_id = $user->getUserId();
//      echo "user id==".$user_id;
  }
  $user_input_valid = true; // 2
  date_default_timezone_set('America/Toronto');
  // 3, 53*
  $text_error = "";
  //etc...  
  // 51*
  // 54
  $err_messages = array(
      "langid"    => "",
      "text"      => "",
      "verbatim"  => "",
      "translit"  => "",
      "authen"    => "",
      "translOf"  => "",
      "tags"      => "",
      "authors"   => "",
      "use"       => "",
      "link"      => ""
  );

  if($_POST){ // 4
    // 44*, 45*
    // 26 ------------------------------------------
    //========================================================================
    // regex for latin and non-latin characters. Surround with single quotes
    // for unicode explanation, see: http://www.regular-expressions.info/unicode.html
    //........................................
    $non_lat = '\p{Common}\p{Cyrillic}\p{Han}';
    //........................................
    // the 4 mandatory fields
    $rgx_for_langid =      '/^[0-9]+$/'; // only digits
    $rgx_for_authen =      '/^[0-9]+$/'; // only digits
    $rgx_for_verbatim =    '/^[0-9\p{L}'.'\p{M}'.'\p{P}'.'\p{Z}'.']+$/u';
    $rgx_for_text =        '/^[0-9A-Za-z'.'\p{P}'.'\p{Z}'.'\p{N}'.$non_lat.']+$/u';
    // the non-mandatory fields
    $rgx_for_translOf = "/^$|^[0-9]+$/"; // empty or same as langid
    $rgx_for_translit = '/^$|^[\p{L}'.'\p{M}'.'\p{P}'.$non_lat.'\p{Z}]+$/u'; // empty or latin only
    $rgx_for_tags =     '/^$|^[0-9A-Za-z'.'\p{P}'.'\p{Z}'.'\p{N}'.$non_lat.']+$/u';
    $rgx_for_authors =  '/^$|^[0-9A-Za-z'.'\p{P}'.'\p{Z}'.'\p{N}'.$non_lat.']+$/u';
    $rgx_for_use =      '/^$|^[0-9A-Za-z'.'\p{P}'.'\p{Z}'.'\p{N}'.$non_lat.']+$/u';
    $rgx_for_source =   "";
    //............................................
    // regex for the link
    // the regex borrowed from: http://stackoverflow.com/questions/3717115/regular-expression-for-youtube-links
    //$rgx_for_link = "~(^$)?|(?:https?://)?(?:www\.)?youtu(?:be\.com/watch\?(?:.*?&(?:amp;)?)?v=|\.be/)([\w‌​\-]+)(?:&(?:amp;)?[\w\?=]*)?~";
    //$rgx_for_link = "/https:\/\/(?:www\.)?youtu(?:be\.com/watch\?v=|\.be/)(\w*)(&(amp;)?[\w\?=]*)?/";
    //$rgx_for_link = "/^(http(?:s)?\:\/\/[a-zA-Z0-9\-]+(?:\.[a-zA-Z0-9\-]+)*\.[a-zA-Z]{2,6}(?:\/?|(?:\/[\w\-]+)*)(?:\/?|\/\w+\.[a-zA-Z]{2,4}(?:\?[\w]+\=[\w\-]+)?)?(?:\&[\w]+\=[\w\-]+)*)$/";
    $rgx_for_link = "/^$|^https?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%\"\,\{\}\\|\\\^\[\]`]+)?$/";
    //............................................
    $rgx_for_ = "";
    
    
    // for tbl_entry :: ent_entry_language_id
    echo "<br>checking langid";
    if(!preg_match($rgx_for_langid, $_POST['langid'])){
      //$errmsg_for_langid = "Language is invalid";
      $err_messages['langid'] = "Language tested invalid";
      echo " oops!";
      $user_input_valid = false;
    }
    // for tbl_entry :: ent_entry_text
    echo "<br>checking text";
    if(!preg_match($rgx_for_text, $_POST['text'])){
      //$errmsg_for_text = "Text is invalid";
      $err_messages['text'] = "Text is invalid";
      echo " oops!";
      $user_input_valid = false;
    }
    // for tbl_entry :: ent_entry_verbatim
    echo "<br>checking verbatim";
    if(!preg_match($rgx_for_verbatim, $_POST['verbatim'])){
      //$errmsg_for_verbatim = "Verbatim is invalid";
      $err_messages['verbatim'] = "Verbatim is invalid";
      echo " oops!";
      $user_input_valid = false;
    }
    // for tbl_entry :: ent_entry_translit
    echo "<br>checking translit";
    if(!preg_match($rgx_for_translit, $_POST['translit'])){
      //$errmsg_for_translit = "Transliteration is invalid";
      $err_messages['translit'] = "Transliteration is invalid";
      echo " oops!";
      $user_input_valid = false;
    }
    // for tbl_entry :: ent_entry_authen_status_id
    echo "<br>checking authen";
    if(isset($_POST['authen'])){
      echo " - authen is set: " . $_POST['authen'];
      if(!preg_match($rgx_for_authen, $_POST['authen'])){
        //$errmsg_for_authen = "Authenticity status is invalid";
        $err_messages['authen'] =  "Authenticity status is invalid";
        echo " oops!";
        $user_input_valid = false;
      }
    }
    
    // for tbl_entry :: ent_entry_translation_of
    echo "<br>checking translOf";
    if(isset($_POST['translOf'])){
      if(!preg_match($rgx_for_translOf, $_POST['translOf'])){
        //$errmsg_for_translOf = "translOf is invalid";
        $err_messages['translOf'] = "translOf is invalid";
        echo " oops!";
        $user_input_valid = false;
      }
    }
    
    // for tbl_entry :: ent_entry_creator_id

    // for tbl_entry :: ent_entry_media_id

    // for tbl_entry :: ent_entry_comment_id

    // for tbl_entry :: ent_entry_rating_id

    // for tbl_entry :: ent_entry_tags
    echo "<br>checking tags";
    if(!preg_match($rgx_for_tags, $_POST['tags'])){
      //$errmsg_for_tags = "Tags text is invalid";
      $err_messages['tags'] = "Tags text is invalid";
      echo " oops!";
      $user_input_valid = false;
    }
    // for tbl_entry :: ent_entry_authors
    echo "<br>checking authors";
    if(!preg_match($rgx_for_authors, $_POST['authors'])){
      //$errmsg_for_authors = "Authors text is invalid";
      $err_messages['authors'] = "Authors text is invalid";
      echo " oops!";
      $user_input_valid = false;
    }
    // for tbl_entry :: ent_entry_source_id
//    if(!preg_match($rgx_for_source, $_POST['source'])){
//      $errmsg_for_source = "Authenticity status is invalid";
//      $user_input_valid = false;
//    }
    // for tbl_entry :: ent_entry_use
    echo "<br>checking use";
    if(!preg_match($rgx_for_use, $_POST['use'])){
      //$errmsg_for_use = "use is invalid";
      $err_messages['use'] = "use is invalid";
      echo " oops!";
      $user_input_valid = false;
    }
    // for tbl_entry :: ent_entry_http_link
    echo "<br>checking link";
    if(!preg_match($rgx_for_link, trim($_POST['link']))){
      //$errmsg_for_link = "link is invalid";
      $err_messages['link'] = "link is invalid";
      echo " oops!";
      $user_input_valid = false;
    }
    // for tbl_entry :: ent_entry_creation_date

    // end of 26 ---------------------------------------    

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
        $entry->setEntryText(htmlentities($_POST['text']));
        $entry->setEntryVerbatim($_POST['verbatim']);
        $entry->setEntryTranslit(htmlentities($_POST['translit']));
        //$entry->setEntryAuthenStatusId($_POST['authen']);
        $entry->setEntryTranslOf(   NULL); // $_POST['transl_of']);
        //$entry->setEntryUserId(     '3'); //$_POST['creator']);
        $entry->setEntryUserId($user_id);
        $entry->setEntryMediaId(    '1');//($_POST['media_id']);
        $entry->setEntryCommentId(  '2'); //$_POST['comment_id'];
        $entry->setEntryRatingId(   '1'); //($_POST['rating_id']);
        $entry->setEntryTags(htmlentities($_POST['tags']));
        $entry->setEntryAuthors(htmlentities($_POST['authors']));
        $entry->setEntrySourceId(htmlentities($_POST['source'])); 
        $entry->setEntryUse(htmlentities($_POST['use']));
        $entry->setEntryHttpLink(htmlentities(str_replace("watch?v=", "v/", $_POST['link'])));
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
        //$entry->setEntryUserId('3');//$_POST['creator']);
        $entry->setEntryUserId($user_id);
        $entry->setEntryMediaId('1');//($_POST['media_id']);
        $entry->setEntryCommentId('2'); //$_POST['comment_id'];
        $entry->setEntryRatingId('1'); //($_POST['rating_id']);
        $entry->setEntryTags(htmlentities($_POST['tags']));
        $entry->setEntryAuthors(htmlentities($_POST['authors']));
        $entry->setEntrySourceId('1');//$_POST['source']); 
        $entry->setEntryUse(htmlentities($_POST['use']));
        $entry->setEntryHttpLink(htmlentities(str_replace("watch?v=", "v/", $_POST['link']))); //43
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
    else{ // if user's input is invalid
      if(isset($_GET['id'])){
        if(isset($_GET['a'])){
          // 48*
          $em = new EntryManager(); // 12
          $dad = $em->getEntryById($_GET['id']); // 36
          form_to_create_kid($dad, $err_messages);
        }
        else{
          //49*
          $em = new EntryManager(); // 12
          $entry = $em->getEntryById($_GET['id']); // 36
          form_to_edit_entry($entry, $err_messages); // 37
        }
      }
      else{
        form_to_create_entry($err_messages);
      }
    }
  }// 4
  else { // 17
    if(isset($_GET['id'])){ // 34

      if(isset($_GET['a'])){ // 42
        // 48*
        $em = new EntryManager(); // 12
        $dad = $em->getEntryById($_GET['id']); // 36
        form_to_create_kid($dad, $err_messages);
        
      }else{ // 47
        //49*
        $em = new EntryManager(); // 12
        $entry = $em->getEntryById($_GET['id']); // 36
        form_to_edit_entry($entry, $err_messages); // 37
      }      
    }
    else{ // 35
      form_to_create_entry($err_messages);
    }

}

require("footer.php");