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

if(isset($_GET['l'])){
  //echo "<br>sr::GET[l] is set, it is: <b>" . ($_GET['l']) . "</b>";
}else{
  echo "<br>sr::GET[l] is NOT even set";
}

if($_GET['l']===''){ $_GET['l'] = null;}
echo "<br>sr::GET[l] was nulled, it is: <b>" . ($_GET['l']) . "</b>";

echo "<br>sr::verbatim: >".$verbatim . "<";
$v = $verbatim;
echo "<br>sr::language: >".$_GET['l']."<";
$l = $_GET['l'];
echo "<br>sr::from: >".$_GET['f']."<";
$f = $_GET['f'];
echo "<br>sr::to: >".$_GET['t']."<";
$t = $_GET['t'];
echo "<br>sr::auth: >".$_GET['a']."<";
$a = $_GET['a'];

$em = new EntryManager(); // 1



//$entries[] = new Entry();

$entries = $em->getListOfEntryBriefBySearch($v, $l, $f, $t, $a);

//var_dump($entries);


$family[] = new Entry();
//Case 3 - time frame
  //can have 0> dads and 0> kids


// TTTTTTT sort entries by authenticity status TTTTTTTTTTT
// this will put gather the dads at the top of the array
// 7
function cmpAuth($a, $b){
  return strcmp($a->getEntryAuthenStatusId(), $b->getEntryAuthenStatusId());
}
// 6
function cmpLang($a, $b){
  return strcmp($a->getEntryLanguage(), $b->getEntryLanguage());
}
echo "<br><br>Entries are being sorted...";
usort($entries, "cmpAuth");
echo "<br>Entries are sorted!";
echo "<br>*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*";

//var_dump($entries);

//LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL


  $families[] = new Entry();
  
  // LOOP BEGINS
  $cc = 0;
  $family[] = new Entry();// 9
  foreach($entries as $entry){ // 8
    
    echo "<br><br><mark>Entry " . $cc . "</mark>";
    
    if($entry->getEntryAuthenStatusId() == 1){ // 1
      
      echo "<br>auth: " . $entry->getEntryAuthenStatusId();
      echo "<br>text: " . substr($entry->getEntryText(),0,100);
      echo "<br>id: ". $entry->getEntryId();
      $dad_id = $entry->getEntryId(); // 2
      echo "<br>translOf: " . $entry->getEntryTranslOf();
      echo "<br>";
      array_push($family, $entry); 
      
      foreach($entries as $entry){
      if($entry->getEntryTranslOf() == $dad_id){ // 1
      
        echo "<br>auth: " . $entry->getEntryAuthenStatusId();
        echo "<br>text: " . substr($entry->getEntryText(),0,100);      
        echo "<br>id: ". $dad_id;
        echo "<br>translOf: " . $entry->getEntryTranslOf();
        echo "<br>";
        array_push($family, $entry);      
      }
    }
      
      
    }
    
    
    
    
    
    $cc++;
  }
    
      if($entry->getEntryTranslOf() == $dad_id){
        echo "<br>auth: " . $entry->getEntryAuthenStatusId();
        echo ", text = " . substr($entry->getEntryText(),0,100);
        echo ", translOf=" . $entry->getEntryTranslOf();
        echo "<br>";
      }
      
    
      
      
      $dd = 0;
      //foreach($entries as $entry){ // 3
        echo ", entry " . $dd;
        if($entry->getEntryTranslOf() == $dad_id){ // 4
          echo "<br>entry translOf=" . $entry->getEntryTranslOf();
          echo "<br>entry translOf=" . $entry->getEntryTranslOf();
          array_push($family, $entry); // 5
        }// 4
        $dd++;
      //}// 3
      
      echo "<br><br>sorting kids in the family...";
      usort($family, "cmpLang"); // 10
      echo "<br>kids in the family sorted!";
      array_unshift($family, $entry); //11
      array_push($families, $family); // 12
    //}// 1
    $cc++;
  //}// 8
  //}
  // LOOP ENDS
  
  //var_dump($families);
  echo "<br>*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*";
//  $aa = 0;
//  foreach($families as $family){
//    echo "<br><b>Family " . $aa . "</b>";
//    $bb = 0;
//    foreach($family as $entry){
//      echo "<br>Entry " . $bb . "</br>";
//      echo "a=".$entry->getEntryAuthenStatusId().", l=".$entry->getEntryLanguage().
//              ", txt=".substr($entry->getEntryText(),0,150)."<br>";
//      $bb++;
//    }
//    $aa++;
//  