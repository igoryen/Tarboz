<?php
  require("header.php");
  require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
  require_once BUSINESS_DIR_ENTRY . "Entry.php";
  include "views/entry/search_result_cases.php";

//TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
// UTILITY FUNCTIONS
// 7 - TO SORT ENTRIES BY AUTHENTICITY STATUS
function cmpAuth($a, $b){
  return strcmp($a->getEntryAuthenStatusId(), $b->getEntryAuthenStatusId());
}
// 6- TO SORT ENTRIES BY LANGUAGE
function cmpLang($a, $b){
  return strcmp($a->getEntryLanguage(), $b->getEntryLanguage());
}

function tbl_head(){
  echo "<table class='search2'>";
  echo "<tr class='gray'>";
  echo "<td>status</td>";
  echo "<td>id</td>";
  echo "<td>lang</td>";
  echo "<td>txt</td>";
  echo "<td>translOf</td>";
  echo "</tr>";
}

function tbl_row($entry){
  echo "<tr>";
  echo "<td>" . $entry->getEntryAuthenStatusId()."</td>";
  echo "<td><mark>". $entry->getEntryId()."</mark></td>";
  echo "<td>" . $entry->getEntryLanguage()."</td>";
  echo "<td>" . substr($entry->getEntryText(),0,100)."</td>";
  echo "<td><b><mark>" . $entry->getEntryTranslOf() . "</mark></b></td>";
  echo "</tr>";
}

function tbl_foot(){
  echo "</table>";
  //echo "*****************************************<br>";
}

function is_full($entry){
  // if entry is good (i.e. not null), then return TRUE
  return (!null == $entry->getEntryId());
}

function is_full2($family){
  foreach($family as $entry){
    return (!null == $entry->getEntryId());
  }
  // if entry is good (i.e. not null), then return TRUE
  
}
//LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
  
//TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
// CHECKING  THE VALUES IN THE SUPERGLOBAL ARRAYS  
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
//LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL

$em = new EntryManager();


//function is_full2($family){
//  // if entry is good (i.e. not null), then return TRUE
//  return (!null == $family[0]->getEntryId());
//}

//$entries[] = new Entry();

$entries = $em->getListOfEntryBriefBySearch($v, $l, $f, $t, $a);
//echo "<br>count(entries)=" . count($entries);
//var_dump($entries);

// SORT THE ENTRIES BY AUTHENTICITY STATUS
usort($entries, "cmpAuth");
//echo "<br>Entries are sorted by authen status!";
//echo "<br>*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*";

//$family[] = new Entry();
//Case 3 - time frame
  //can have 0> dads and 0> kids


//version 2, better
//
//CREATE NON_ORPHANS ARRAY// temp array
$non_orphans[] = new Entry();
//CREATE KIDS ARRAY// for kids whose dads exist in the db but not retrieved
$kids[] = new Entry();
//CREATE ORPHANS ARRAY// for kids whose dads don't exist in the db
$orphans[] = new Entry();
//CREATE DADS ARRAY// for dads whose kids don't exist in the db or were not retrieved
$dads[] = new Entry();
//CREATE FAMILIES ARRAY // for dads with their kids
$families[] = new Entry();
//
//LOOP THROUGH ALL
foreach($entries as $entry){
//  IF ENTRY IS A KID 
  if($entry->getEntryTranslOf() == NULL){
    
    // AND THE KID IS AN ORPHAN
    if($entry->getEntryAuthenStatusId() ==2){
    
  //  ADD THE ENTRY TO ORPHANS ARRAY
      array_push($orphans, $entry);
    }
  }
//  ELSE // IF ENTRY IS A NON_ORPHAN
  else{
//    ADD TO NON_ORPHANS ARRAY
    array_push($non_orphans, $entry);
  }
}
//LOOP THROUGH ALL
foreach($entries as $entry){
//  IF ENTRY IS A DAD
  if($entry->getEntryAuthenStatusId()==1){
//    PUT THE DAD ASIDE
    $dad = $entry;
//    CREATE A FAMILY ARRAY
    $family[] = new Entry();
//
//    LOOP THROUGH NON_ORPHANS
    foreach($non_orphans as $i => $non_orphan){
//      IF NON-ORPHAN MATCHES THE DAD
      if($non_orphan->getEntryTranslOf() == $dad->getEntryId()){
//        ADD THE NON-ORPHAN TO THE FAMILY ARRAY
        array_push($family, $non_orphan);
        unset($non_orphans[$i]);
      }
    }
    // REMOVE THE EMPTIES
    $family = array_filter($family, 'is_full');
//    IF THE FAMILY ARRAY COMES UP EMPTY //dad's kids either don't exist in the db or were not retrieved
    if(count($family)<1){
//      ADD THE DAD TO THE DADS ARRAY
      array_push($dads, $dad);
    }
//    ELSE // IF THE FAMILY ARRAY HAS 1 OR MORE NON-ORPHAN THAT MATCHES THE DAD
    else{
//      SORT THE NON-ORPHANS IN THE FAMILY BY LANGUAGE
      usort($family, 'cmpLang');
//      ADD THE DAD ON TOP OF THE FAMILY ARRAY
      array_unshift($family, $dad);
//      ADD THE FAMILY ARRAY TO THE FAMILIES ARRAY
      array_push($families, $family);
    }
//    NULLIFY THE FAMILY ARRAY
    $family = NULL;
  }
}
//LOOP THROUGH NON-ORPHANS
/*
foreach($non_orphans as $non_orphan){
//  LOOP THROUGH ALL
  foreach($entries as $entry){
//    IF NON-ORPHANS HAS NO DAD
    if($entry->getEntryAuthenStatusId() == 1){
      if($non_orphan->getEntryTranslOf() !== $entry->getEntryId()){
//      ADD THE NON-ORPHAN TO THE KIDS ARRAY
        array_push($kids, $non_orphan);
      }
    }
    
  }
}
*/
//-----------------------------------
// REMOVE THE EMPTIES FROM ARRAYS
$families = array_filter($families, 'is_full2');
$dads = array_filter($dads, 'is_full');
//$kids = array_filter($kids, 'is_full');
$non_orphans = array_filter($non_orphans, 'is_full');
$orphans = array_filter($orphans, 'is_full');
//-----------------------------------
//[SORT THE ARRAYS]
//SORT THE DADS BY LANGUAGE
usort($dads, 'cmpLang');
//SORT THE KIDS BY LANGUAGE
//usort($kids, 'cmpLang');
usort($non_orphans, 'cmpLang');
//SORT THE ORPHANS BY LANGUAGE
usort($orphans, 'cmpLang');


//var_dump($families);

?>
  <div id="land">
    <div id="village">
<?php
  
//[DISPLAY THE ARRAYS]
//IF NONE OF THE ARRAYS IS FULL
if((!is_object(reset($families))) 
        && (!is_object(reset($dads))) 
        && (!is_object(reset($non_orphans))) 
        && (!is_object(reset($orphans)))){
  echo "<br><i>no results</i><rb>";
}
//DISPLAY THE FAMILIES ARRAY
if(is_object(reset($families))){
  echo "<mark>";
  echo "ORIGINALS AND THEIR TRANSLATIONS ('FAMILIES') (originals with 1 or more translations)";
  echo "</mark>";
  echo "<br>";
  $ff = 1;
  foreach($families as $family){
    echo "family " . $ff;
    echo "<br>";
    $f = 1;
    foreach($family as $entry){
      echo $f .". ". substr($entry->getEntryText(),0,60);
      echo "<br>";
      $f++;
    }
    echo "<br>";
    echo "<hr>";
    $ff++;
  }
  echo "<hr>";
}

//DISPLAY THE DADS ARRAY
if(is_object(reset($dads))){
  echo "<mark>";
  echo "ORIGINALS ('DADS') (originals whose translations don't exist in the db or were not retrieved)";
  echo "</mark>";
  echo "<br>";
  $d = 1;
  foreach($dads as $dad){
    echo $d .". ". substr($dad->getEntryText(),0,60);
    echo "<br>";
    $d++;
  }
  echo "<hr>";
  
}
//DISPLAY THE KIDS ARRAY
if(is_object(reset($non_orphans))){
  echo "<mark>";
  echo "TRANSlATIONS WITHOUT ORIGINALS ('KIDS') (translations whose originals exist in the DB but were not returned in this search)";
  echo "</mark>";
  echo "<br>";
  $k = 1;
  foreach($non_orphans as $non_orphan){
    echo $k .". ". substr($non_orphan->getEntryText(),0,60);
    echo "<br>";
    $k++;
  }
  echo "<hr>";
}
if(is_object(reset($orphans))){
  echo "<mark>";
  //DISPLAY THE ORPHANS ARRAY
  echo "TRANSLATIONS WHOSE ORIGINALS ARE NOT IN OUR DB ('ORPHANS') (translations whose originals do not exist in the DB)";
  echo "</mark>";
  echo "<br>";
  $o = 1;
  foreach($orphans as $orphan){
    echo $o .". ". substr($orphan->getEntryText(),0,60);
    echo "<br>";
    $o++;
  }
}
?>
    </div><!-- village -->
  </div><!-- land -->

<?php require("footer.php");

  //echo "<br>*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*";
/*
 * a problem is that when i create a new array of Entry objects
 * the count(array) returns , even though it has just been created.
 * so there's always one element more.
 */