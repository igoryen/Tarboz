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

$em = new EntryManager();
function is_full($entry){
  // if entry is good (i.e. not null), then return TRUE
  return (!null == $entry->getEntryId());
}

//function is_full2($family){
//  // if entry is good (i.e. not null), then return TRUE
//  return (!null == $family[0]->getEntryId());
//}

//$entries[] = new Entry();

$entries = $em->getListOfEntryBriefBySearch($v, $l, $f, $t, $a);
echo "<br>count(entries)=" . count($entries);
//var_dump($entries);


//$family[] = new Entry();
//Case 3 - time frame
  //can have 0> dads and 0> kids


// TTTTTTT sort entries by authenticity status TTTTTTTTTT
// 7
function cmpAuth($a, $b){
  return strcmp($a->getEntryAuthenStatusId(), $b->getEntryAuthenStatusId());
}
// 6
function cmpLang($a, $b){
  return strcmp($a->getEntryLanguage(), $b->getEntryLanguage());
}
//echo "<br><br>Entries are being sorted...";
usort($entries, "cmpAuth");
echo "<br>Entries are sorted by authen status!";
echo "<br>*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*";


//LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL




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
  $families[] = new Entry();
  $orphans[] = new Entry();
  // LOOP BEGINS
  $cc = 0;
  //--------------------------------------------------------------------
  //tbl_head();
  // *13
  $entries = array_filter($entries, 'is_full');
  // *14

  foreach($entries as $entry){ // 8
    // 21

    //$family[] = new Entry();// 9
    if($entry->getEntryAuthenStatusId() == 1){ // 1

      $dad = $entry;
      // 15*
      $family[] = new Entry();// 9
      // 16*
      //tbl_head();
      foreach($entries as $entry){
        if($entry->getEntryTranslOf() == $dad->getEntryId()){ // 1
          // 17*
          //tbl_row($entry);
          if($entry->getEntryId() !== NULL){
            // 18*
            array_push($family, $entry);
          }
          if($entry->getEntryId() == NULL){
            echo "<br>Skipping the null entry";
          }
          // 29*
        }//1
      }// look for kids
      //tbl_foot();

      if(count($family) > 1){
        // 19*
        usort($family, "cmpLang"); // 6
        // 20*, 22*
        $family = array_filter($family, 'is_full'); //35
        array_unshift($family, $dad); // 34
        // 23, 24*
      }
      elseif(count($family) == 1){
        // 25*, 26*
        $family = array_filter($family, 'is_full'); // 35
        array_unshift($family, $dad); // 34
        // 27*, 28*
      }

      array_push($families, $family); // 30
      // 31*

      $family = null; // 33
      // 32*
    }// 1
    elseif($entry->getEntryAuthenStatusId() == 2 && $entry->getEntryTranslOf()==NULL){ // 36
      // TODO: sort orphans by matching verbatim
      //echo "<br>we have an orphan";
      //echo "<br> text: " . $entry->getEntryText();
      //open_family();
      //tbl_head(); tbl_row($entry); tbl_foot();
      array_push($orphans, $entry);
      //close_family();
    }

    $cc++;
  }//8
  tbl_foot();
//-------------------------------------------------------------
//
  echo "<br>============================================================";
  echo "<br> print out the families";
  echo "<br>============================================================";
  echo "<br>count(families)=" . count($families);

  //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
    //$families = array_filter($families, 'is_full');

  //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL

//  var_dump($families);
//  print_r($families);

?>
  <div id="land">
    <div id="village">
<?php
  //$families = array_filter($families, 'is_full2');
  $ee = 0;
  $i = 0; //<~~~~~~~~~~
  foreach($families as $family){
    //open_family();
    //var_dump($family);
    //if(!null == $family[0]->getEntryId()){


    $family_members_num = count($family);
    echo "<br><b><mark>Family " . $ee . "</mark></b> (". $family_members_num." members)<br>";
      //tbl_head();
      //open_family();



    if($family_members_num == 1){ // 41
      //open_family();

      //echo "<br>CASE 1: there is just one member in the family";
      echo "<br><b>A</b>";
      echo "<br>family " . $ee;

      foreach ($family as $entry){
        echo "<br><b>AA</b>";
        //open_family($entry->getEntryText());
        open_family();

        //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
        //if($entry->getEntryAuthenStatusId() == 1){ // 38

          echo "<br><b>AAA</b>";
          //echo "<br>we have a dad!";
          $ary['id'] = $entry->getEntryId();
          $ary['language'] = $entry->getEntryLanguage();
          $ary['text'] = substr($entry->getEntryText(), 0, 55);
          $ary['user'] = $entry->getEntryUserId();
          dad_house_dad_1($ary);

          close_family($entry->getEntryText());
        //}// 38
        //elseif($entry->getEntryAuthenStatusId() == 2){
          //echo "<br><b>AAB</b>";
          //echo "<br>we have a kid!";
          //echo "<br>kid text = ".substr($entry->getEntryText(), 0, 55);

          //close_family($entry->getEntryText());
        //}
        //else{
          //echo "<br><b>AAC</b>";
          //echo "</div>";
        //}
          //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
      //close_family();
      }
    }// 41
    elseif($family_members_num > 1){ // 42 - of there are >1 members
      //open_family();
      echo "<br><b>B</b>";
      echo " family " . $ee;
      //echo "<br>CASE 2-3 there is >1 members in the family";


      $j = 0; //<=============
      //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
      foreach($family as $entry){ //
        echo "<br><b>BA</b>. ";

        /*
        // FAILS:
        $prev_entry = prev($family);
        //$prev_lang = prev($family)->getEntryLanguage();// A 29
        $prev_lang = $prev_entry->getEntryLanguage();// A 29
        //$current_lang = $entry->getEntryLanguage();// A
        $current_lang = $prev_entry->getEntryLanguage();// A
        //$prev_text = substr(prev($family)->getEntryText(),0,50);// A 29
        $prev_text = substr($prev_entry->getEntryText(),0,50);// A 29
        */

        //$i = 0; //<=============
        //echo "<br>loop starts----------------";
        echo "<mark>family member #".$j. "</mark>. ";
        echo 'j=' . $j;
        //echo ", erat " . prev($family)->getEntryLanguage(); // fails
        echo ", curr <b>". $entry->getEntryLanguage() . "</b>";
        //echo ", fiat <b>". next($family)->getEntryLanguage()."</b>"; // fails
        //if($entry->getEntryId() !== NULL){ // 37!
          //$i = 0; //<=============
        $kids_house_lang = $entry->getEntryLanguage();



        //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
        if($entry->getEntryAuthenStatusId() == 1){ // 38
          echo "<br><b>BAA</b>. curr: <b>" .$entry->getEntryLanguage().'</b>';
          echo ". text: " . substr($entry->getEntryText(),0,50);
          echo ", next <b>".next($family)->getEntryLanguage()."</b>";
          //echo ", text: " . next($family)->getEntryText();
          echo ', j=' . $j;


          //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
          //BAA
          $baa_prev_entry = prev($family);
          //$prev_lang = prev($family)->getEntryLanguage();// A 29
          $baa_prev_lang = $baa_prev_entry->getEntryLanguage();// A 29
          //$current_lang = $entry->getEntryLanguage();// A
          $baa_current_lang = $entry->getEntryLanguage();// A
          //$prev_text = substr(prev($family)->getEntryText(),0,50);// A 29
          $baa_prev_text = substr($baa_prev_entry->getEntryText(),0,50);// A 29
          //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL

          open_family();
          //echo "CASE2-3: <b>dad</b>";

          //echo "<br>family member # ".$j;
          $ary['id'] = $entry->getEntryId();
          $ary['language'] = $entry->getEntryLanguage();
          $ary['text'] = substr($entry->getEntryText(), 0, 55);
          $ary['user'] = $entry->getEntryUserId();
          dad_house_dad_1($ary);

          $j++;//BAA

          //close_family($entry->getEntryText());
        }// 38
        //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
        //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
        //else{ // if kid
        elseif($entry->getEntryAuthenStatusId() == 2){
        //if($entry->getEntryAuthenStatusId() == 2){
          echo "<br><b>BAB</b>. ";
          //echo "<br>erat: <b>" .$family[$j--]->getEntryLanguage().'</b>';
          //echo "<br>erat: <b>" .prev($family)->getEntryLanguage().'</b>';

          //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
          // FAILS
          /*
          $bab_prev_entry = prev($family);
          //$prev_lang = prev($family)->getEntryLanguage();// A 29
          $bab_prev_lang = $bab_prev_entry->getEntryLanguage();// A 29
          //$current_lang = $entry->getEntryLanguage();// A
          $bab_current_lang = $bab_prev_entry->getEntryLanguage();// A
          //$prev_text = substr(prev($family)->getEntryText(),0,50);// A 29
          $bab_prev_text = substr($bab_prev_entry->getEntryText(),0,50);// A 29
          */
          //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL

          echo "prev: <b>" .$baa_prev_entry->getEntryLanguage().'</b>. ';
          echo "curr: <b>" .$entry->getEntryLanguage().'</b>. ';
          echo 'j=' . $j;


          $curr_text = substr($entry->getEntryText(),0,50);// A 29
          // 141110 10:11
          //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
          $last_entry = end($family);
          //current($family);
          //$last_entry = $family[$family_members_num-1];
          //if($entry === $last_entry){
          if($entry == end($family)){ // kid, last -- 40
            //$i = 0; //<=============
            // sr:  26*,14,39
            echo "<br><b>BABA</b>. kid, last. ";

            //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT

            $prev_entry = prev($family);
            //$prev_entry = $family[-1];
            current($family);
            //$prev_lang = prev($family)->getEntryLanguage();// A 29
            $prev_lang = $prev_entry->getEntryLanguage();// A 29
            //$current_lang = $entry->getEntryLanguage();// A
            $current_lang = $entry->getEntryLanguage();// A
            //$prev_text = substr(prev($family)->getEntryText(),0,50);// A 29
            $prev_text = substr($prev_entry->getEntryText(),0,50);// A 29

            //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
             //echo "<br>current entry lang = " . $entry->getEntryLanguage();
            //$prev_lang = $family[$j--]->getEntryLanguage();// A 29
            //$prev_lang = prev($family)->getEntryLanguage();// A 29
            //$current_lang = $entry->getEntryLanguage();// A
            echo ". j=" . $j.". ";
            //echo "prev member text: " . substr(prev($family)->getEntryText(), 0,50);
            //echo "Z: erat <b>" . $prev_lang . '</b>, fuerit <b>' . $current_lang . "</b>";
            // sr:  30*,31*
            //echo ". curr text = " . substr($entry->getEntryText(),0,50);
            echo ". curr text = " . $curr_text;
            //echo ". prev text = " . substr(prev($family)->getEntryText(),0,50);//FAILS



            //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
            // 43
            if ($current_lang !== $prev_lang){ // kid, last, diff lang -- sr:  32
                    // sr: 33*,34*,35,36*
              echo "<br><b>BABAA</b>. kid, last, lang changed. ";
              echo 'prev lang and curr lang are DIFF. ';
              echo 'erat <b>', $prev_lang.'</b>, fuerit <b>'.$current_lang.'</b>';
              echo '(1st kid in '.$current_lang .')<br>';

              echo 'Zd: closing the house for the previous >'.$prev_lang.'<<br>';
              close_kids_house();
                    // sr:  37,38*
              echo 'Zd: opening a new house for the current >'. $current_lang .'<<br>';
              open_kids_house($current_lang);
                    // sr:  20,21,41*
              echo 'Zd: making a room<br>';
              $kid_room_array['id'] = $entry->getEntryId();
              $kid_room_array['text'] = substr($entry->getEntryText(), 0, 55);
              $kid_room_array['user'] = $entry->getEntryUserId();
              make_kid_room($kid_room_array);
              // sr:  42,43*
              echo 'Zd: closing the house for the current >'.$current_lang.'<<br>';
              close_kids_house();
              // sr:  44,45*,23
              echo 'Zd: the end of the array!';
              unset($current_lang);
              unset($prev_lang);
              echo "<br>destroyed cur and prev lang. <br>Zd.loop ends************";
              close_family($entry->getEntryText());
              //$j++;//BABAA
            } //kid, last, lang changed-  sr:  47
                  //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
                  //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
            else{ // 44
              echo "<br><b>BABAB</b>";
              $current_lang = $entry->getEntryLanguage();
              //$prev_lang = $family[$j--]->getEntryLanguage();
              echo ", last, lang same";
              //echo "languages: " . $prev_lang ." <-> ". $current_lang;
                    // sr: 48,20,21,51
              $kid_room_array['id'] = $entry->getEntryId();
              $kid_room_array['text'] = substr($entry->getEntryText(), 0, 55);
              $kid_room_array['user'] = $entry->getEntryUserId();
              make_kid_room($kid_room_array);
                    // sr:  42,53
              close_kids_house();
                    // sr:  44,55,23
              //close_family();
              unset($current_lang);
              unset($prev_lang);
              echo "<br>destroyed cur and prev lang. <br>.loop ends************";
              close_family($entry->getEntryText());
              //$j++; //BABAB
            } // kid, last, lang same -- 44, sr:  25, 47
            $j++; //BABA
                  //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
          } // a kid, last
                //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
                //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
          else{ // kid, not last, sr:  56
                  // sr: 57*,14
            echo "<br><b>BABB</b>";
            //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
            //BABB
            $prev_entry = prev($family); //var_dump($prev_entry);
            $curr_entry = current($family); //var_dump($curr_entry);
            //var_dump($prev_entry);
            //$prev_lang = prev($family)->getEntryLanguage();// A 29
            $prev_lang = $baa_prev_entry->getEntryLanguage();// A 29
            //$current_lang = $entry->getEntryLanguage();// A
            $current_lang = $entry->getEntryLanguage();// A
            //$prev_text = substr(prev($family)->getEntryText(),0,50);// A 29
            $prev_text = substr($prev_entry->getEntryText(),0,40);// A 29
            $curr_text = substr($curr_entry->getEntryText(),0,40);
            //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
            echo ' prev <b>', $prev_lang . '</b>, ';
            echo ' curr <b>', $current_lang . '</b>. ';


            //echo " kid, not last; ";
            //echo "fuerit: <b>" .$entry->getEntryLanguage().'</b>. ';
            //echo 'current not the last, but is between first (A) and last (Z) <br>';
            echo ', j=' . $j . ". ";
            //$prev_lang = $family[$j--]->getEntryLanguage(); // A
            //$prev_lang = prev($family)->getEntryLanguage(); // A
            echo 'j=' . $j . ". ";
            //$current_lang = $entry->getEntryLanguage(); // A
                  // sr: 60*,61*,32

            //echo "prev text = " . substr(prev($family)->getEntryText(),0,50);
            echo "prev text: " . $prev_text;
            echo ', curr text: ' . $curr_text;

                  //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
            if ($current_lang !== $prev_lang){ // kid, not last, lang changed -- 46
            //if($entry->getEntryLanguage() !== prev($family)->getEntryLanguage()){
              // sr: 62*,35,64,37
              echo "<br><b>BABBA</b>. ";
              //echo "kid, not last, lang changed; ";
              echo 'prev & curr are diff';
              echo ', j=' . $j;
              //echo '(erat <b>'. prev($family)->getEntryLanguage() . '</b>,';
              echo '(prev <b>'. $prev_lang . '</b>,';
              echo ', curr <b>', $entry->getEntryLanguage() . '</b>)<br>';

              $current_lang = $entry->getEntryLanguage();
              echo 'closing the house for the previous <b>'.$prev_lang.'</b>';
              close_kids_house();
                    // sr:  37,66*
              echo 'opening a new house for the current <b>'.$current_lang.'</b><br>';
              open_kids_house($current_lang);
                    // sr:  20,21,69*
              echo 'making a room<br>';
              $kid_room_array['id'] = $entry->getEntryId();
              $kid_room_array['text'] = substr($entry->getEntryText(), 0, 55);
              $kid_room_array['user'] = $entry->getEntryUserId();
              make_kid_room($kid_room_array);
                    // sr:  70,23
              unset($current_lang);
              unset($prev_lang);
              //$j++; // BABBA
            } // sr:  32
                  //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
                  //TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
            else{ // 47, sr:  47
                    // sr:  20,21,69*
              echo "<br><b>BABBB</b>. lang same. ";

              //echo '(erat <b>', prev($family)->getEntryLanguage() . '</b>,'
              //        . ' fuerit <b>', $entry->getEntryLanguage() . '</b>)<br>';
              echo '(prev <b>', $prev_lang . '</b>,'
                      . ' curr <b>', $current_lang . '</b>), ';
              //echo "<br> the languages are the same";
              echo 'j=' . $j;
              echo '<br>making a room<br>';

              $kid_room_array['id'] = $entry->getEntryId();
              $kid_room_array['text'] = substr($entry->getEntryText(), 0, 55);
              $kid_room_array['user'] = $entry->getEntryUserId();
              make_kid_room($kid_room_array);
                    // sr:  70,23
              unset($current_lang);
              unset($prev_lang);
              //$j++; //BABBB

            } // kid, not last, lang same -- sr:  47
            $j++;//BABB
          } // kid, not last - sr:  56
          //$j++;//BAB
        } // kid
              //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
            //} // sr:  74
            //LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
            //tbl_row($entry);
          //$i++;
        //} // 37! if not null
      //$j++;
      }
      //$j++;
    }// 42
    $ee++;
    $i++; //<~~~~~~~~
  } // each one family
      //tbl_foot();
  echo "end of family *****************<br>";
  //close_family();
  $ee++;
    //}
  //}
  echo "<br>============================================================";
  echo "<br> print out the orphans";
  echo "<br>============================================================";
  echo "<br>count(orphans)=" . count($orphans);

  $orphans = array_filter($orphans, 'is_full'); // 35
  usort($orphans, "cmpLang"); // 6
  open_family();
  tbl_head();
  foreach($orphans as $orphan){
    tbl_row($orphan);
  }
  tbl_foot();
  //close_family();
?>
    </div><!-- village -->
  </div><!-- land -->

<?php require("footer.php");

  echo "<br>*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*";
/*
 * a problem is that when i create a new array of Entry objects
 * the count(array) returns , even though it has just been created.
 * so there's always one element more.
 */