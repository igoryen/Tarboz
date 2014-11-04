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

//require DB_CONNECTION . 'DBHelper.php';
//require DB_CONNECTION . 'datainfo.php';

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
			<div id="LeftCol">
				<object id="obj" type="text/html" 
                data="views/entry/search_phrase_examples.html">
				</object>
			</div><!--LeftCol-->

			<div id="MidCol">
                <div>
                    <div class="container" style="border-collapse: inherit; width: 99%; font-size: 20px;">
                        <div class="heading">
                            <div class="col_33">
                               <h3 class="t_title">Top 10 Translations</h3>
                                    <ol type="circle">
<?php
    $query =   "SELECT *, count(rating.rat_like_user_id) AS num_like
                FROM 
                (SELECT orig.ent_entry_id AS orig_entry_id, orig.ent_entry_text AS orig_phrase, 
                        trans.ent_entry_id AS trans_entry_id, trans.ent_entry_text AS trans_phrase,
                        trans.ent_entry_creation_date AS trans_date
                 FROM 
                        (SELECT ent_entry_id, ent_entry_text, ent_entry_verbatim, ent_entry_translit, ent_entry_authen_status_id, 
                                ent_entry_translation_of, ent_entry_creation_date
                         FROM tbl_entry where ent_entry_authen_status_id = 1) AS orig
                 INNER JOIN 
                        (SELECT ent_entry_id, ent_entry_text, ent_entry_verbatim, ent_entry_translit, ent_entry_authen_status_id, 
                                ent_entry_translation_of, ent_entry_creation_date
                         FROM tbl_entry where ent_entry_authen_status_id = 2) AS trans
                 ON orig.ent_entry_id = trans.ent_entry_translation_of
                ) AS sub_entry
                LEFT JOIN tbl_rating AS rating
                ON rating.rat_entity_id = CONCAT('ent', sub_entry.trans_entry_id) 
                   AND rating.rat_like_user_id IS NOT NULL AND rating.rat_like_user_id >0
                GROUP BY sub_entry.trans_entry_id
                ORDER BY num_like DESC, sub_entry.trans_date DESC, sub_entry.trans_entry_id ASC";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $count = 0;
    while ($list = mysqli_fetch_assoc($result)) {
        $trans_phrase = $list['trans_phrase'];
        $orig_phrase = $list['orig_phrase'];
        $num_like = $list['num_like'];       
        if ($count< 5) {    
?>
                                        <li style = "font-size:11px;"><?php echo $trans_phrase;?>
                                            <p style="padding-left:5px;"><b>Translation of: </b><?php echo $orig_phrase;?></p>
                                            <p style="padding-left:5px;"><b>Rating: </b><?php echo $num_like;?></p></li>
<?php      if($count<4) { ?>
                                        <hr style="margin-left:-30px; margin-right:10px;"/>
<?php   
            }// end if $count<4
        } //end if  $count <5  
        $count ++ ;
    }//end while loop; 
?>
                                    </ol>
<?php if ($count >=5) { ?>
                                    <div><a href="searchresult.php">see more...</a>    </div>
<?php } //end if $count >=10 ?>
                             </div>
                            <div class="col_33" >
                                       <h3 class="t_title">Help translate these into <?php echo $aryOfTreq[0]->getTreqLang();?></h3>
                                        <ol type="circle">
                                <?php
                                              // TODO: add an if() in case the current request does not have the Accept-Language: header 
                                                  for($j = 0; $j < count($aryOfTreq); $j++) {
                                                    echo '<li>';
                                                    echo '<a href="entryview.php?id='.$aryOfTreq[$j]->getTreqEntryId() . '">'; 
                                                    echo substr($aryOfTreq[$j]->getTreqEntryLine(), 0, 25) . '...';
                                                    echo '</a>';
                                                    echo '</li>';  
                                }?>
                                        </ol>
                             </div>
                            <div class="col_33" >
                                <h3 class="t_title">Original Entries in <?php echo $aryOfEntry[0]->getEntryLanguage();?></h3>
                                <ol type="circle">
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
                                </ol>
                             </div>
                        </div>
                    </div>
                </div>    
                <div align="bottom">
                   <marquee behavior="alternate" direction="left">
                        <img src="images/flag/China.png" width="94" height="88"  />
                        <img src="images/flag/Canada.png" width="94" height="88"  />
                        <img src="images/flag/India.png" width="94" height="88"  />
                        <img src="images/flag/Russia.png" width="94" height="88" />
                        <img src="images/flag/Iraq.png" width="94" height="88" />
                        <img src="images/flag/France.png" width="94" height="88" />
                        <img src="images/flag/Uganda.png" width="94" height="88" />
                        <img src="images/flag/United-Arab-Emirates.png" width="94" height="88" />
                        <img src="images/flag/United-Kingdom.png" width="94" height="88" />
                        <img src="images/flag/United-States-of-America.png" width="94" height="88" />
                        <img src="images/flag/Switzerland.png" width="94" height="88" />
                        <img src="images/flag/Thailand.png" width="94" height="88" />
                        <img src="images/flag/Togo.png" width="94" height="88" />
                        <img src="images/flag/Tonga.png" width="94" height="88" />
                    </marquee>
                    <marquee behavior="alternate" direction="right">
                        <img src="images/flag/Trinidad-and-Tobago.png" width="94" height="88" />
                        <img src="images/flag/Tunisia.png" width="94" height="88" />
                        <img src="images/flag/Turkey.png" width="94" height="88" />
                        <img src="images/flag/Turkmenistan.png" width="94" height="88" />
                        <img src="images/flag/Tuvalu.png" width="94" height="88" />           
                        <img src="images/flag/Afghanistan.png" width="94" height="88" />
                        <img src="images/flag/Albania.png" width="94" height="88" />
                        <img src="images/flag/Algeria.png" width="94" height="88" />
                        <img src="images/flag/Antigua-and-Barbuda.png" width="94" height="88" />
                        <img src="images/flag/Georgia.png" width="94" height="88" />
                        <img src="images/flag/Grecee.png" width="94" height="88" />
                        <img src="images/flag/Guinea.png" width="94" height="88" />
                        <img src="images/flag/Kenya.png" width="94" height="88" />
                        <img src="images/flag/Jamaica.png" width="94" height="88" />
                    </marquee>
                </div>
			</div><!--MidCol-->

			<div id="RightCol">
                <div id="RightCol_Scroll">
				What<br><br>a<br><br>life<br><br><br>s<br><br>here<br><br>now:<br><br>testineeg:<br><br><br><br><br><br><br><br>this:<br><br>page<br><br>now<br><br><br>nothign<br><br>else<br> neeg:<br><br><br><br><br><br><br><br>this:<br><br>page<br><br>now<br><br><br>nothign<br><br>else<br> 
                </div>
			</div><!--RightCol-->

		</div><!--index_table-->

	</div><!--"index_table_container"-->

<?php require("footer.php"); ?>

