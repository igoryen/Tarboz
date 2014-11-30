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
//require("search.php");

require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
require_once BUSINESS_DIR_TRANSLREQ . "TranslationRequestManager.php";
require_once BUSINESS_DIR_SUBSCRIPTION . 'Subscription.php';
require_once BUSINESS_DIR_SUBSCRIPTION . 'SubscriptionManager.php';
require_once BUSINESS_DIR_USER. 'User.php';
require_once BUSINESS_DIR_USER_LOGIN . 'UserLoginManager.php';

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
  <!-- left column -->
  <div>
    <div id="LeftCol">
      <object id="obj" 
              type="text/html" 
              data="views/entry/search_phrase_examples.html">
      </object>
    </div><!--LeftCol-->
			<div id="MidCol">
                <div>
                    <div class="container" style="border-collapse: inherit; width: 99%; font-size: 20px;">
                        <div class="heading">
                            <div class="col_33">
                               <h3 class="t_title">Top 10 Translations</h3>
                                 <div class="mid_scoll">
                                    <ol type="circle" style="padding: 0px 5px; margin: 0px">
                                        <!-Display top 10 translations-->
                                        <?php
                                            $query =   "SELECT *, count(rating.rat_like_user_id) AS num_like
                                                        FROM 
                                                        (SELECT orig.ent_entry_id AS orig_entry_id, orig.ent_entry_text AS orig_phrase, 
                                                                trans.ent_entry_id AS trans_entry_id, trans.ent_entry_text AS trans_phrase,
                                                                trans.ent_entry_creation_date AS trans_date
                                                         FROM 
                                                                (SELECT ent_entry_id, ent_entry_text, ent_entry_verbatim, ent_entry_translit, ent_entry_authen_status_id, 
                                                                        ent_entry_translation_of, ent_entry_creation_date
                                                                 FROM tbl_entry where ent_entry_authen_status_id = 1 AND ent_entry_deleted = 0) AS orig
                                                         INNER JOIN 
                                                                (SELECT ent_entry_id, ent_entry_text, ent_entry_verbatim, ent_entry_translit, ent_entry_authen_status_id, 
                                                                        ent_entry_translation_of, ent_entry_creation_date
                                                                 FROM tbl_entry where ent_entry_authen_status_id = 2 AND ent_entry_deleted = 0) AS trans
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
                                                $trans_entry_id = $list['trans_entry_id'];
                                                $num_like = $list['num_like'];       
                                                if ($count< 10) {    
                                        ?>
                                        <li>
<!--                                            <div>-->
                                                <div  class="text_shortcut"><a href="entryview.php?id=<?php echo $trans_entry_id;?>"><?php echo $trans_phrase;?></a><span style="float:right; postion:"><?php echo $num_like;?> Likes</span></div>
                                                
<!--                                            </div>-->
                                        </li>
                                            <?php      if($count<9) { ?>
<!--                                            <hr />-->
                                            <?php   
                                                        }// end if $count<4
                                                    } //end if  $count <5  
                                                    $count ++ ;
                                                }//end while loop; 
                                            ?>
                                    </ol>
                                    <?php if ($count >=10) { ?>
                                    <div style="text-align:right" ><a href="browseresult.php?toptranslation=y">see more...</a></div>
                                    <?php } //end if $count >=10 ?>
                                     <br />
                                 </div>
                             </div>
                            <!--end of display top 10 translation-->
                            <div class="col_33" >
                                       <h3 class="t_title">Help translate these into <?php echo $aryOfTreq[0]->getTreqLang();?></h3>
                                <div class="mid_scoll">
                                    <ol type="circle" style="padding: 0px 5px; margin-top:0px">
                                <?php
                                              // TODO: add an if() in case the current request does not have the Accept-Language: header 
                                                  for($j = 0; $j < count($aryOfTreq)-1; $j++) {
                                                    echo '<li class="trans_list">';
                                                    echo '<div  class="text_shortcut">';  
                                                    echo '<a href="entryview.php?id='.$aryOfTreq[$j]->getTreqEntryId() . '">'; 
                                                    echo $aryOfTreq[$j]->getTreqEntryLine();
                                                    echo '</a>';
//                                                    echo '<span style="float:right">'.$num_like.' Likes</span>';
                                                    echo '</div>';  
                                                    echo '</li>';  
                                }?>
                                    </ol>
                                </div>
                             </div>
                            <div class="col_33" >
                                <h3 class="t_title">Original Entries in <?php echo $aryOfEntry[0]->getEntryLanguage();?></h3>
                                <div class="mid_scoll">
                                    <ol type="circle" style="padding: 0px 5px; margin-top:0px">
                         <?php
                              // TODO: add an if() in case the current request does not have the Accept-Language: header 
                                  for($i = 0; $i < 3; $i++) {
                                    echo '<li>';
                                    echo '<div  class="text_shortcut">';   
                                    echo '<a href="entryview.php?id='.$aryOfEntry[$i]->getEntryId() . '">'; 
                                    echo $aryOfEntry[$i]->getEntryText();
                                    echo '</a>';
                                    echo '</div>';   
                                    echo '</li>';  
                                  }
                        ?>
                        </ol>
                     </div>
                </div>
            </div>
        </div> 
        <!--
        <div>
            <h3>Top 4 Contributors</h3>
			<table id="innertbl">
                <tr>
                    <td>
                        <img src="images/topuser.jpg" caption="User001" width="60px" height="auto"><br><br><a href="#">User001</a>
                    </td>
                    <td>
                        <img src="images/topuser.jpg" caption="User001" width="60px" height="auto"><br><br><a href="#">User002</a>
                    </td>
                    <td>
                        <img src="images/topuser.jpg" caption="User001" width="60px" height="auto"><br><br><a href="#">User003</a>
                    </td>
                    <td>
                        <img src="images/topuser.jpg" caption="User001" width="60px" height="auto"><br><br><a href="#">User004</a>
                    </td>
                </tr>
            </table>
          </div>
        -->
        </div>
    </div><!--MidCol-->

      <!-- right column -->
    <div id="RightCol">
        <div id="RightCol_Scroll">
          <div id="subscribeLink" style="cursor: pointer; color: #0066cc; font-size: 13px;">Subscribe a newsletter</div><br>
          <div id="subscribeDialog" title="Subscribe A Newsletter!" style="display:none;">
            <form action="user_test/subscribe.php" method="post">
	           <label>Email: </label><input type="text" name="sub_email" id="sub_email_id">
               <input type="hidden" id="sub_success" name="sub_success" value="N">
	           <input type="Submit" value="Subscribe" id="submitbtn" style="margin-top: 15px;">
               
            </form>   
          </div>
          <div id="unsubscribeLink" style="cursor: pointer; color: #0066cc; font-size: 13px;">Unsubscribe a newsletter</div><br>
          <div id="unsubscribeDialog" title="Unsubscribe A Newsletter!" style="display:none;  width: 500px;">
            <form action="user_test/subscribe.php" method="post">
                <label>Email: </label><input type="text" name="usub_email" id="usub_email_id">
                <input type="hidden" id="unsub_success" name="unsub_success" value="N">
                <input type="Submit" value="UnSubscribe" id="usubmitbtn" style="margin-top: 15px;"></br>
            </form> 
          </div>
         </div> <!--did="RightCol_Scroll"--> 
    </div><!--RightCol-->

    </div><!--index_table-->

  </div><!--"index_table_container"-->
<?php require("footer.php"); ?>

