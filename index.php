<?php 
require("header.php");

//TTTTTTTTTTT for the translator TTTTTTTTTTTTTTTTTT
require_once('plug-in/translate/config.inc.php');
require_once('plug-in/translate/class/ServicesJSON.class.php');
require_once('plug-in/translate/class/MicrosoftTranslator.class.php');


$translator = new MicrosoftTranslator(ACCOUNT_KEY);
$selectbox = array('id'=> 'txtLang','name'=>'txtLang');
$translator->getLanguagesSelectBox($selectbox);
//LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
require("search.php");

require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
require_once BUSINESS_DIR_TRANSLREQ . "TranslationRequestManager.php";

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); // 1
//$lang = 'ru';
//echo "the language: " . $lang;
$em = new EntryManager();
$trm = new TranslationRequestManager();

$aryOfEntry = $em->getListOfEntryBriefByLanguage($lang);
$aryOfTreq = $trm->getListOfTreqByLang($lang);
    
 ?>

<div id="index_table_container" align="center">
  <div>
    
    <!-- left column -->
    <div id="LeftCol">
      
      <object id="obj" 
              type="text/html" 
              data="views/entry/search_phrase_examples.html">
      </object>
    </div><!--LeftCol-->

    <!-- middle column -->
    <div id="MidCol">
      <div>
        <div class="container" style="border-collapse: inherit; width: 99%; font-size: 20px;">
          <div class="heading">
            
            <div class="col_33">
              <h3 class="t_title">Top 10 Translations</h3>
              <ul>
                <li>entry 1</li>
                <li>entry 2</li>
                <li>entry 3</li>
                <li>entry 4</li>
                <li>entry 5</li>
                <li>entry 6</li>
                <li>entry 7</li>
                <li>entry 8</li>
                <li>entry 9</li>
                <li>entry 10</li>
              </ul>
            </div>
            
            <!-- translations needed -->
            <div class="col_33" >
              <h3 class="t_title">To be translated into <?php echo $aryOfTreq[0]->getTreqLang();?></h3>
                <ul>
<?php
// TODO: add an if() in case the current request does not have the Accept-Language: header 
for($j = 0; $j < count($aryOfTreq); $j++) {
  echo '<li>';
  echo '<a href="entryview.php?id='.$aryOfTreq[$j]->getTreqEntryId() . '">'; 
  echo substr($aryOfTreq[$j]->getTreqEntryLine(), 0, 25) . '...';
  echo '</a>';
  echo '</li>';  
}?>
                </ul>
            </div>
            
            <!-- originals in the language of the browser -->
            <div class="col_33" >
              <h3 class="t_title">Original Entries in <?php echo $aryOfEntry[0]->getEntryLanguage();?></h3>
              <ul type="circle">
<?php
// TODO: add an if() in case the current request does not have the Accept-Language: header 
for($i = 0; $i < 3; $i++) {
  echo '<li>';
  echo '<a href="entryview.php?id='.$aryOfEntry[$i]->getEntryId() . '">'; 
  echo substr($aryOfEntry[$i]->getEntryText(), 0, 25) . '...';
  echo '</a>';
  echo '</li>';  
}
?>
              </ul>
            </div>
            
            
          </div><!-- heading -->
        </div><!-- container-->
      </div>    
                
      <div>
        <h2>Top 3 Contributors</h2>
        
        <table id="innertbl">
          <tr>
            <td>
              <img src="images/topuser.jpg" caption="User001" width="60" height="auto">
              <br><br>
              <a href="#">User001</a>
            </td>
            <td>
              <img src="images/topuser.jpg" caption="User001" width="60px" height="auto">
              <br><br>
              <a href="#">User002</a>
            </td>
            <td>
              <img src="images/topuser.jpg" caption="User001" width="60px" height="auto">
              <br><br>
              <a href="#">User003</a>
            </td>
          </tr>
         </table><!--innertbl-->
         
        </div>
      </div><!--MidCol-->

      <!-- right column -->
      <div id="RightCol">
        <div id="RightCol_Scroll">
          Testing1<br><br><br><br>
          Testing2<br><br><br><br>
          Testing3<br><br><br><br>
          Testing4<br><br><br><br>
          Testing5<br><br><br><br>
          Testing6<br><br><br><br>
          Testing7<br><br><br><br>
          Testing8<br><br><br><br>
          Testing9<br><br><br><br>
          Testing10<br><br><br><br>
          Testing11<br><br><br><br>
          Testing12<br><br><br><br>
          Testing13<br><br><br><br>
          Testing14<br><br><br><br>
        </div>
      </div><!--RightCol-->

    </div><!--index_table-->

  </div><!--"index_table_container"-->

<?php require("footer.php"); ?>

