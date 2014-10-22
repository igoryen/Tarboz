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



// #) initialize manager class
$em = new EntryManager();
// #) try to make a search for dad
//echo "<hr>sr, verbatim:<br>" . $verbatim;
$dad = $em->getFatherByVerbatim($verbatim);
//echo "<hr>sr, dad's lang:<br>".$dad->getEntryLanguage();
// #) try to make a search for kids
// get one array of kids (Entry objects) by verbatim
$array_of_kids = $em->getListOfKidBriefByVerbatim($verbatim);


//=========================================================================
//echo '*******************************<br>';
//// remove a null object from the array
//// loop through the whole array
//echo 'attempt to remove null array elements<br>';
//foreach ($array_of_kids as $kid) {
//  echo 'inside the loop. ';
//  if (is_object($kid)){
//    echo 'the AE is an object. ';
//    
//    if (isset($kid)){
//      echo 'it is set. ';
//      
//      // Print out all props of the each object and their values
//      // var_dump(($kid));
//      
//      //Cannot use isset() on the result of a function call 
//      if(null == $kid->getEntryId()){
//        echo 'its id is null <br>';
//        //unset($array_of_kids($kid));
//      }
//      else {
//        echo 'its id is not null. ';
//        echo 'its id is ' . $kid->getEntryId() . ". ";
//        echo 'its text is ' . substr($kid->getEntryText(), 0, 25) . "<br>";
//      }      
//    }
//  }  
//}
//==========================================================================
?>
  
  <div id="land">
    <div id="village">

      <?php

//table_to_see_entry_values($dad, $array_of_kids, $verbatim);

$num_of_kids = count($array_of_kids);
// check if entry_id field is empty. If it is then the whole object is empty
// do we have a dad? -- no

if (null == $dad->getEntryId()) {
  //echo "We have no dad ..";
  // check the number of kids. if $kids are ALSO empty
  if ($num_of_kids == 1) {
    //echo "and no kids.<br>";
    no_dad_no_kids("Seems we have no original or translations for this search.");
  } //if kids are not empty
  elseif ($num_of_kids > 1) {
    //echo ".. but we have one or more kids! <br> ";
    
    // a counter to use with every iteration
    $i = 0;
    // for every kid
    foreach($array_of_kids as $kid){
      //echo '----------- started the loop ----------- <br>';
      
      
      // are you first in the queue? -- yes
      if($kid == reset($array_of_kids)){
        //echo 'A: current == first <br>';
        // what's your language?
        $current_lang = $kid->getEntryLanguage();
        $next_lang = $array_of_kids[$i+1]->getEntryLanguage();
        
        //echo 'A: first language is >', $current_lang . '<<br>';
        //echo 'A: next language is >', $next_lang . '< !!!!!!!!!!! <br>';
        
        // open the house for the kids of this language
        // pass to it the name of the language of the current object
        //echo "A: opening a house for the current >". $current_lang . "<<br>";
        open_kids_house($current_lang);
        
        // make a room for the kid
        // collect things to put into the room 
        //echo "A: making a room<br>";
        $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
        make_kid_room($kid_room_array);
        
        //destroy the specified variables
        unset($current_lang);
        unset($next_lang);
      }// A 
      //are you last in the queue? -- yes
      elseif($kid == end($array_of_kids)){
        //echo 'Z: current == last <br>';
        // what's your language?
        
        //$prev_lang = substr(prev($array_of_kids)->getEntryId(),0,2);
        // NOTE: [$i--] doesn't work!
        $prev_lang = $array_of_kids[$i-1]->getEntryLanguage();
        $current_lang = $kid->getEntryLanguage();
        
        
        //echo 'Z: prev language is ', $prev_lang . '<br>';
        //echo 'Z: current language is ', $current_lang . '<br>';
        
        
        // your language is different from previous? - yes
        if ($current_lang !== $prev_lang){
          
          //echo 'Zd: prev language is ', $prev_lang . '<br>';
          //echo 'Zd: first kid with this lang ('. $current_lang .')<br>';          
          
          // close the previous house
          //echo 'Zd: closing the house for the previous >'.$prev_lang.'<<br>';
          close_kids_house();
          // open a new house
          //echo 'Zd: opening a new house for the current >'. $current_lang .'<<br>';
          open_kids_house($current_lang);
          
          // make a room for the kid
          // collect things to put into the room 
          //echo 'Zd: making a room<br>';
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);
          
          // close the current house
          //echo 'Zd: closing the house for the current >'.$current_lang.'<<br>';
          close_kids_house();
          // end of the queue
          //echo 'Zd: the end of the array!';
          //destroy the specified variables
          unset($current_lang);
          unset($prev_lang);
        } // your language is different from previous? - no (the same)
        else{
          $current_lang = $kid->getEntryLanguage();
          $prev_lang = $array_of_kids[$i-1]->getEntryLanguage();
          
          //echo 'Zs: the previous language >'.$prev_lang.
                  '< is same as current >'.$current_lang.'<<br>';          
          
          // make a room for the kid
          // collect things to put into the room 
          //echo 'Zs: making a room <br>';
          $kid_room_array['text'] = substr($kid->getEntryText(),0 ,55);
          make_kid_room($kid_room_array);
          
          // close the current house
          //echo 'Zs: closing the house for >'.$current_lang.'<<br>';
          close_kids_house();
          // end of the queue
          //echo 'Zs: the end of array!';
          
          //destroy the specified variables
          unset($current_lang);
          unset($prev_lang);
        } // last in the queue, lang is same
      } // last in the queue 
      // between first and last in the queue
      else{
        //echo 'current is between first (A) and last (Z) <br>';
        
        // what's your language?
        //$prev_lang = substr(prev($array_of_kids)->getEntryId(),0,2);
        $prev_lang = $array_of_kids[$i-1]->getEntryLanguage();
        $current_lang = $kid->getEntryLanguage();
        
        
        //echo 'previous language is >', $prev_lang . '< !!!!!!!!!!!!!!!!!!<br>';
        //echo 'current language is >', $current_lang . '< !!!!!!! <br>';
        
        
        // your language is different from previous? - yes
        if ($current_lang !== $prev_lang){
          //echo 'prev & current are NOT SAME !!!!!!!!<br>';
          
          // close the previous house
          //echo 'closing the house for the previous >'.$prev_lang.'<<br>';
          close_kids_house();
          
          // open a new house
          //echo 'opening a new house for the current >'.$current_lang.'<<br>';
          open_kids_house($current_lang);
          
          // make a room for the kid
          // collect things to put into the room 
          //echo 'making a room<br>';
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);
          // don't close the house, the next kid might have the same language
          
          //destroy the specified variables
          unset($current_lang);
          unset($prev_lang);
        } // lang is different from previous
        // your language is different from previous? - no (the same)
        else{
          // make a room for the kid
          // collect things to put into the room 
          //echo 'making a room<br>';
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);
          // don't close the house, the next kid might have the same language
          
          //destroy the specified variables
          unset($current_lang);
          unset($prev_lang);
        } // lang is the same as previous
      } // between first and last in the queue
      $i++;
    } // loop through each kiD
    
    
  }
} // if we have no dad
// do we have a dad? -- Yes
else {
  //echo "We have a dad ... ";
  // How many kids? -- no kids
  if ($num_of_kids == 1) {
    //echo "but no kids.";

    $ary['language'] = $dad->getEntryLanguage();
    $ary['text'] = substr($dad->getEntryText(), 0, 55);
    dad_house_dad_1($ary);
  } // How many kids? -- 1 or more kids
  elseif ($num_of_kids > 1) {
    //echo "and " . $num_of_kids . ' kids!<br>';
    
    $ary['language'] = $dad->getEntryLanguage();
    $ary['text'] = substr($dad->getEntryText(), 0, 55);
    dad_house_dad_1($ary);
    
    
    $i = 0;
    // for every kid
    foreach($array_of_kids as $kid){
      //echo '----------- started the loop ----------- <br>';
      
      
      // are you first in the queue? -- yes
      if($kid == reset($array_of_kids)){
        //echo 'A: current == first <br>';
        // what's your language?
        $current_lang = $kid->getEntryLanguage();
        $next_lang = next($array_of_kids)->getEntryLanguage();
        
        //echo 'A: first language is >', $current_lang . '<<br>';
        //echo 'A: next language is >', $next_lang . '< !!!!!!!!!!! <br>';
        
        // open the house for the kids of this language
        // pass to it the name of the language of the current object
        //echo "A: opening a house for the current >". $current_lang . "<<br>";
        open_kids_house($current_lang);
        
        // make a room for the kid
        // collect things to put into the room 
        //echo "A: making a room<br>";
        $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
        make_kid_room($kid_room_array);
        
        //destroy the specified variables
        unset($current_lang);
        unset($next_lang);
      }// A 
      //are you last in the queue? -- yes
      elseif($kid == end($array_of_kids)){
        //echo 'Z: current == last <br>';
        // what's your language?
        
        //$prev_lang = substr(prev($array_of_kids)->getEntryLanguageId(),0,2);
        // NOTE: [$i--] doesn't work!
        $prev_lang = $array_of_kids[$i-1]->getEntryLanguage();
        $current_lang = $kid->getEntryLanguage();
        
        
        //echo 'Z: prev language is ', $prev_lang . '<br>';
        //echo 'Z: current language is ', $current_lang . '<br>';
        
        
        // your language is different from previous? - yes
        if ($current_lang !== $prev_lang){
          
          //echo 'Zd: prev language is ', $prev_lang . '<br>';
          //echo 'Zd: first kid with this lang ('. $current_lang .')<br>';          
          
          // close the previous house
          //echo 'Zd: closing the house for the previous >'.$prev_lang.'<<br>';
          close_kids_house();
          // open a new house
          //echo 'Zd: opening a new house for the current >'. $current_lang .'<<br>';
          open_kids_house($current_lang);
          
          // make a room for the kid
          // collect things to put into the room 
          //echo 'Zd: making a room<br>';
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);
          
          // close the current house
          //echo 'Zd: closing the house for the current >'.$current_lang.'<<br>';
          close_kids_house();
          // end of the queue
          //echo 'Zd: the end of the array!';
          //destroy the specified variables
          unset($current_lang);
          unset($prev_lang);
        } // your language is different from previous? - no (the same)
        else{
          $current_lang = $kid->getEntryLanguageId();
          $prev_lang = $array_of_kids[$i-1]->getEntryLanguageId();
          
          //echo 'Zs: the previous language >'.$prev_lang.
                  '< is same as current >'.$current_lang.'<<br>';          
          
          // make a room for the kid
          // collect things to put into the room 
          //echo 'Zs: making a room <br>';
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);
          
          // close the current house
          //echo 'Zs: closing the house for >'.$current_lang.'<<br>';
          close_kids_house();
          // end of the queue
          //echo 'Zs: the end of array!';
          
          //destroy the specified variables
          unset($current_lang);
          unset($prev_lang);
        } // last in the queue, lang is same
      } // last in the queue 
      // between first and last in the queue
      else{
        //echo 'current is between first (A) and last (Z) <br>';
        
        // what's your language?
        //$prev_lang = substr(prev($array_of_kids)->getEntryId(),0,2);
        $prev_lang = $array_of_kids[$i-1]->getEntryLanguage();
        $current_lang = $kid->getEntryLanguage();
        
        
        //echo 'previous language is >', $prev_lang . '< !!!!!!!!!!!!!!!!!!<br>';
        //echo 'current language is >', $current_lang . '< !!!!!!! <br>';
        
        
        // your language is different from previous? - yes
        if ($current_lang !== $prev_lang){
          //echo 'prev & current are NOT SAME !!!!!!!!<br>';
          
          // close the previous house
          //echo 'closing the house for the previous >'.$prev_lang.'<<br>';
          close_kids_house();
          
          // open a new house
          //echo 'opening a new house for the current >'.$current_lang.'<<br>';
          open_kids_house($current_lang);
          
          // make a room for the kid
          // collect things to put into the room 
          //echo 'making a room<br>';
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);
          // don't close the house, the next kid might have the same language
          
          //destroy the specified variables
          unset($current_lang);
          unset($prev_lang);
        } // lang is different from previous
        // your language is different from previous? - no (the same)
        else{
          // make a room for the kid
          // collect things to put into the room 
          //echo 'making a room<br>';
          $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
          make_kid_room($kid_room_array);
          // don't close the house, the next kid might have the same language
          
          //destroy the specified variables
          unset($current_lang);
          unset($prev_lang);
        } // lang is the same as previous
      } // between first and last in the queue
      $i++;
    } // loop through each kiD
  } // one or more kids
} // we have a dad

      ?>



    </div><!-- village -->
  </div><!-- land -->

<?php require("../Shared/footer.php"); ?>