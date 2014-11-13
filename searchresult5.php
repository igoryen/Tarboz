<?php 
  require("header.php");
  require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
  require_once BUSINESS_DIR_ENTRY . "Entry.php";
  include "views/entry/search_result_cases.php";
  
// #) get the value of the search phrase from the search page
if(isset($_GET['v'])){
  $verbatim = $_GET['v'];
  //echo "<br>searchresult.php: GET['verbatim'] is set. it's " . $verbatim;
}
else{
  $verbatim = $_GET['v'];
  //echo "<br>searchresult.php: GET['verbatim'] is NOT set. " . $verbatim;
}

$search_text = isset($_GET['searchtext']) ? rawurldecode($_GET['searchtext']) : "";
$tgt_lang = isset($_GET['tgtlang']) ? $_GET['tgtlang'] : "";
$from_date = isset($_GET['fromdate']) ? $_GET['fromdate'] : "";
$end_date = isset($_GET['enddate']) ? $_GET['enddate'] : "";

//echo "<br>sr::verbatim is [".$verbatim . "]</br>";
//echo "<br>sr::search text is [".$search_text . "]</br>";
//echo "<br>sr::target language is [".$tgt_lang . "]</br>";
//echo "<br>sr::from date is [".$from_date . "]</br>";
//echo "<br>sr::end date is [".$end_date . "]</br>";

$em = new EntryManager(); // 1
$dad = $em->getFatherByVerbatim($verbatim); // 2
$array_of_kids = $em->getListOfKidBriefByVerbatim($verbatim); // 3
//echo "size of array_of_kids: ".count($array_of_kids)."</br>";
//echo "</br>dad entry id: ".$dad->getEntryId();
//var_dump($array_of_kids);
?>
  
  <div id="land" style="min-height: 400px;">
    <div id="village">

<?php

if (trim($search_text) == "" ) { //browse mode if there is no search words
    include "browseresult.php";
    
} else {    //search mode mode if there are search words

//table_to_see_entry_values($dad, $array_of_kids, $verbatim); // 4

    $num_of_kids = count($array_of_kids);
    if ($num_of_kids == 1) {
        $no_found_verb = count(reset($array_of_kids)) ==0? true : false;
    }
    
    if (null == $dad->getEntryId()) { // 5 No dad situation
      // 6,7
    //echo "==================NO DAD here================";
      if (isset($no_found_verb) && $no_found_verb) { //no found search
        // 8
        no_dad_no_kids("Seems we have no original or translations for this search.");
      } // 5
      else { //found search
        // 9
        $i = 0; // 10
        $kidsNum = count($array_of_kids);
        foreach($array_of_kids as $kid){ // 24
          // 11,12
          if($kid == $array_of_kids[0]){
             
            // 13,14
            $current_lang = $kid->getEntryLanguage();
            //$next_lang = $array_of_kids[$i+1]->getEntryLanguage();
            if ($array_of_kids[$i+1] === false) {
                $next_lang = "";
            } else {
                $kid_next = $array_of_kids[$i+1];
                $next_lang = $kid_next->getEntryLanguage();
            }
            // 15,16,17,18,19
            open_kids_house($current_lang);
            // 20,21,22
            $kid_room_array['id'] = $kid->getEntryId();
            $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
            $kid_room_array['user'] = $kid->getEntryUserId();
            make_kid_room($kid_room_array); 
            //close_kids_house();
            //23
            unset($current_lang);
            unset($next_lang);
          }// 12
          elseif($kid == $array_of_kids[$kidsNum-1]){ // 25
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
              $kid_room_array['id'] = $kid->getEntryId();
              $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
              $kid_room_array['user'] = $kid->getEntryUserId();
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
              $kid_room_array['id'] = $kid->getEntryId();
              $kid_room_array['text'] = substr($kid->getEntryText(),0 ,55);
              $kid_room_array['user'] = $kid->getEntryUserId();
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
              $kid_room_array['id'] = $kid->getEntryId();
              $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
              $kid_room_array['user'] = $kid->getEntryUserId();
              make_kid_room($kid_room_array);
              //close_kids_house();
              // 70, 23
              unset($current_lang);
              unset($prev_lang);
            } // 32        
            else{ // 47
              // 20,21,69
              $kid_room_array['id'] = $kid->getEntryId();
              $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
              $kid_room_array['user'] = $kid->getEntryUserId();
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
    else { // 27 Has dad situation
      // 71,72
      // echo "==================HAS DAD here================";
      if (isset($no_found_verb) && $no_found_verb) { //No kids situation
        // 73
        //echo "==================HAS DAD NO KIDS================";
        $ary['id'] = $dad->getEntryId();
        $ary['language'] = $dad->getEntryLanguage();
        $ary['text'] = substr($dad->getEntryText(), 0, 55);
        $ary['user'] = $dad->getEntryUserId();
        dad_house_dad_1($ary);
      }
      elseif ($num_of_kids == 1 && isset($no_found_verb) && !$no_found_verb) { //only one kid situation
        $ary['id'] = $dad->getEntryId();
        $ary['language'] = $dad->getEntryLanguage();
        $ary['text'] = substr($dad->getEntryText(), 0, 55);
        $ary['user'] = $dad->getEntryUserId();
        dad_house_dad_1($ary);
          
        $i = 0;
        foreach($array_of_kids as $kid){ // 24
          //11, 12
            //echo "==================Has dad here================";
            //13,14
            $current_lang = $kid->getEntryLanguage();
            //15,16,17,18,19
            open_kids_house($current_lang);        
            // 20, 21,22
            $kid_room_array['id'] = $kid->getEntryId();
            $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
            $kid_room_array['user'] = $kid->getEntryUserId();
            make_kid_room($kid_room_array);
            close_kids_house();
            // 23
            unset($current_lang);
        } //end loop
      } elseif ($num_of_kids > 1) { //74 Has more kids situation
        // 75
        $ary['id'] = $dad->getEntryId();
        $ary['language'] = $dad->getEntryLanguage();
        $ary['text'] = substr($dad->getEntryText(), 0, 55);
        $ary['user'] = $dad->getEntryUserId();
        dad_house_dad_1($ary);
        
        $i = 0;
        foreach($array_of_kids as $kid){ // 24
          //11, 12
          if($kid == reset($array_of_kids)){ //first element of the array
            //echo "<br/>==================More kids first element================".var_dump(next($array_of_kids));
            //13,14
            $current_lang = $kid->getEntryLanguage();
            $next_lang = next($array_of_kids)->getEntryLanguage();  
            
            //15,16,17,18,19
            open_kids_house($current_lang);        
            // 20, 21,22
            $kid_room_array['id'] = $kid->getEntryId();
            $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
            $kid_room_array['user'] = $kid->getEntryUserId();
            make_kid_room($kid_room_array);
            // 23
            unset($current_lang);
            unset($next_lang);
          }// 12
          elseif($kid == end($array_of_kids)){ // 25 last element of the array
            //echo "<br/>==================here last element================".next($array_of_kids);
            //26,14,39,29
            $prev_lang = $array_of_kids[$i-1]->getEntryLanguage();
            $current_lang = $kid->getEntryLanguage();
            // 30,31
            if ($current_lang !== $prev_lang){ // 32 current kid entry is in different languages from previous kid
              //33,34,35,36
              close_kids_house();
              // 37,38
              open_kids_house($current_lang);          
              // 20,21,41
              $kid_room_array['id'] = $kid->getEntryId();
              $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
              $kid_room_array['user'] = $kid->getEntryUserId();
              make_kid_room($kid_room_array);          
              // 42,43
              close_kids_house();
              // 44,45,23
              unset($current_lang);
              unset($prev_lang);
            } // 47
            else{                           //current kid entry is in same languages as previous kid
              //echo "<br/>+++++++++++Same language++++++++++++++".var_dump($kid);          
              $current_lang = $kid->getEntryLanguage();
              $prev_lang = $array_of_kids[$i-1]->getEntryLanguage();
              //48,20,21,51
              $kid_room_array['id'] = $kid->getEntryId();
              $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
              $kid_room_array['user'] = $kid->getEntryUserId();
              make_kid_room($kid_room_array);          
              // 42,53
              close_kids_house();
              // 44,55,23
              unset($current_lang);
              unset($prev_lang);
            } // 25, 47
          } // 25      
          else{ // 56  middle element of the array
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
              $kid_room_array['id'] = $kid->getEntryId();
              $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
              $kid_room_array['user'] = $kid->getEntryUserId();
              make_kid_room($kid_room_array);
              // 70,23
              unset($current_lang);
              unset($prev_lang);
            } // 32
            else{ // 47
              // 20,21,69
              $kid_room_array['id'] = $kid->getEntryId();
              $kid_room_array['text'] = substr($kid->getEntryText(), 0, 55);
              $kid_room_array['user'] = $kid->getEntryUserId();
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
} // end else (trim($search_text) == "" )
?>



    </div><!-- village -->
  </div><!-- land -->

<?php require("footer.php"); ?>