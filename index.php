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
                                        <li>This is a sentence 1</li>
                                        <li>This is a sentence 2</li>
                                        <li>This is a sentence 3</li>
                                        <li>This is a sentence 4</li>
                                        <li>This is a sentence 5</li>
                                        <li>This is a sentence 6</li>
                                        <li>This is a sentence 7</li>
                                        <li>This is a sentence 8</li>
                                        <li>This is a sentence 9</li>
                                        <li>This is a sentence 10</li>
                                    </ol>
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

