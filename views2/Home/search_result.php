<?php 
  require("../Shared/header.php");
  include "../../config.php";
  include "lib.php";
  require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
  require_once BUSINESS_DIR_ENTRY . "Entry.php";
  include "search_result_cases.php";
  
// #) get the value of the search phrase from the search page
$search_phrase = "Happy Birthday to you";

// #) create a verbatim of the search phrase (P1.1.1.)
//======================================================================
// $verbatim = '';
// Options of verbatim string for testing. To test, comment out all but one.

// CASE 1: no dad, no kids
// Original: doesn't exist in the database. Variants: don't exist
// $verbatim = 'bla bla bla';

// CASE 2: no dad, 6 kids (2 per language)
// Original: doesn't exist. Variants: 2 English, 2 Russian, 2 Mandarin
// $verbatim = 'god son loved world life';

// CASE 3: One dad, no kids
// Original: exists. Variants: don't exist.
// $verbatim = 'that question';

// CASE 4: one dad, one or more kids
// Original exists. Variants: exist.
// 
// 4A: one dad, 1 English kid
// Original: Russian. Variants: 1 in English
// $verbatim = 'boring sad hand';
//
// 4B: one dad, 6 kids (2 per language)
// Original: English. Variants: 2 in English, 2 in Russian, 2 in Mandarin
 $verbatim = 'happy birth day to you';
//
// 4C: one dad, 4 kids (2 per language)
// Original: Russian. Variants: 2 in English, 2 in Mandarin.
// $verbatim = 'pears apples Katyusha fog river';
//
// 4D: one dad, one kid (Russian)
// Original: Chinese. Variants: 1 in Russian.
// $verbatim = 'break wok sink boats';
//=====================================================================

$em = new EntryManager(); // 1
$dad = $em->getFatherByVerbatim($verbatim); // 2
$array_of_kids = $em->getListOfKidBriefByVerbatim($verbatim); // 3

?>
  
  <div id="land">
    <div id="village">

      <?php

//table_to_see_entry_values($dad, $array_of_kids, $verbatim); // 4

$num_of_kids = count($array_of_kids);

if (null == $dad->getEntryId()) { // 5
  // 6,7
  if ($num_of_kids == 1) {
    // 8
    no_dad_no_kids("Seems we have no original or translations for this search.");
  } // 5
  elseif ($num_of_kids > 1) {
    // 9
    $i = 0; // 10
    
    foreach($array_of_kids as $kid){ // 24
      // 11,12
      if($kid == reset($array_of_kids)){
        // 13,14
        $current_lang = $kid->getEntryLanguage();
        $next_lang = $array_of_kids[$i+1]->getEntryLanguage();
        // 15,16,17,18,19
        open_kids_house($current_lang);
        // 20,21,22
        $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
        make_kid_room($kid_room_array);        
        //23
        unset($current_lang);
        unset($next_lang);
      }// 12
      elseif($kid == end($array_of_kids)){ // 25
        // 26,14,28,29
        $prev_lang = $array_of_kids[$i-1]->getEntryLanguage();
        $current_lang = $kid->getEntryLanguage();
        // 30,31,32
        if ($current_lang !== $prev_lang){
          // 33,34,35,36
          close_kids_house();
          // 37, 38
          open_kids_house($current_lang);
          // 20,21,41
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);
          // 42,43
          close_kids_house();
          // 44,45,23
          unset($current_lang);
          unset($prev_lang);
        } // 47
        else{
          $current_lang = $kid->getEntryLanguage();
          $prev_lang = $array_of_kids[$i-1]->getEntryLanguage();          
          //48,20,21,51
          $kid_room_array['text'] = substr($kid->getEntryText(),0 ,55);
          make_kid_room($kid_room_array);          
          // 42,53
          close_kids_house();
          // 44,55,23
          unset($current_lang);
          unset($prev_lang);
        } // 25, 47
      } // 25
      else{ //56
        // 57,14,59
        $prev_lang = $array_of_kids[$i-1]->getEntryLanguage();
        $current_lang = $kid->getEntryLanguage();
        // 60,61,32
        if ($current_lang !== $prev_lang){
          // 62,35,64
          close_kids_house();
          // 37,66
          open_kids_house($current_lang);
          // 20,21,69
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);
          // 70, 23
          unset($current_lang);
          unset($prev_lang);
        } // 32        
        else{ // 47
          // 20,21,69
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);
          // 70,23
          unset($current_lang);
          unset($prev_lang);
        } // 47
      } // 56
      $i++;
    } // 24    
  }
} // 5
else { // 27
  // 71,72
  if ($num_of_kids == 1) {
    // 73
    $ary['language'] = $dad->getEntryLanguage();
    $ary['text'] = substr($dad->getEntryText(), 0, 55);
    dad_house_dad_1($ary);
  }
  elseif ($num_of_kids > 1) { //74
    // 75    
    $ary['language'] = $dad->getEntryLanguage();
    $ary['text'] = substr($dad->getEntryText(), 0, 55);
    dad_house_dad_1($ary);
    
    $i = 0;
    foreach($array_of_kids as $kid){ // 24
      //11, 12
      if($kid == reset($array_of_kids)){
        //13,14
        $current_lang = $kid->getEntryLanguage();
        $next_lang = next($array_of_kids)->getEntryLanguage();        
        //15,16,17,18,19
        open_kids_house($current_lang);        
        // 20, 21,22
        $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
        make_kid_room($kid_room_array);
        // 23
        unset($current_lang);
        unset($next_lang);
      }// 12
      elseif($kid == end($array_of_kids)){ // 25
        //26,14,39,29
        $prev_lang = $array_of_kids[$i-1]->getEntryLanguage();
        $current_lang = $kid->getEntryLanguage();
        // 30,31
        if ($current_lang !== $prev_lang){ // 32
          //33,34,35,36
          close_kids_house();
          // 37,38
          open_kids_house($current_lang);          
          // 20,21,41
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);          
          // 42,43
          close_kids_house();
          // 44,45,23
          unset($current_lang);
          unset($prev_lang);
        } // 47
        else{
          $current_lang = $kid->getEntryLanguageId();
          $prev_lang = $array_of_kids[$i-1]->getEntryLanguageId();
          //48,20,21,51
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);          
          // 42,53
          close_kids_house();
          // 44,55,23
          unset($current_lang);
          unset($prev_lang);
        } // 25, 47
      } // 25      
      else{ // 56
        //57,14
        $prev_lang = $array_of_kids[$i-1]->getEntryLanguage();
        $current_lang = $kid->getEntryLanguage();
        //60,61,32
        if ($current_lang !== $prev_lang){
          //62,35,64,37
          close_kids_house();          
          // 37,66
          open_kids_house($current_lang);          
          // 20,21,69
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);
          // 70,23
          unset($current_lang);
          unset($prev_lang);
        } // 32
        else{ // 47
          // 20,21,69
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);
          // 70,23
          unset($current_lang);
          unset($prev_lang);
        } // 47
      } // 56
      $i++;
    } // 24
  } // 74
} // 27

      ?>



    </div><!-- village -->
  </div><!-- land -->

<?php require("../Shared/footer.php"); ?>