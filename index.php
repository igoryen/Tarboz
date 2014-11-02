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

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); // 1
echo "the language: " . $lang;
$em = new EntryManager();
$aryOfEntry = $em->getListOfEntryBriefByLanguage($lang);
    
 ?>

	<div id="index_table_container" align="center">

		<div id="index_table">

			<div id="LeftCol">
				<object id="obj" type="text/html" 
                data="views/entry/search_phrase_examples.html">
				</object>
			</div><!--LeftCol-->

			<div id="MidCol">
				<table>
					<tr>
						<td>
							Top 10 Translations
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
						</td>
						<td>
							Translations Needed
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
						</td>
						<td>
              Original Entries in<br> <?php echo $aryOfEntry[0]->getEntryLanguage();?>
							<ol type="circle"><?php
              // TODO: add an if() in case the current request does not have the Accept-Language: header 
                  for($i = 0; $i < 10; $i++) {
                    echo '<li>';
                    echo '<a href="entryview.php?id='.$aryOfEntry[$i]->getEntryId() . '">'; 
                    echo substr($aryOfEntry[$i]->getEntryText(), 0, 15) . '...';
                    echo '</a>';
                    echo '</li>';  
                  }
							?></ol>
						</td>
					</tr>
					<tr>
						<td colspan=3>
							<p>Top 3 Contributors</p>
							<table id="innertbl">
								<tr>
									<td>
										<img src="images/topuser.jpg" caption="User001" width="40px" height="40px"><br><a href="#">User001</a>
									</td>
									<td>
										<img src="images/topuser.jpg" caption="User001" width="40px" height="40px"><br><a href="#">User001</a>
									</td>
									<td>
										<img src="images/topuser.jpg" caption="User001" width="40px" height="40px"><br><a href="#">User001</a>
									</td>
								</tr>
							</table><!--innertbl-->
						</td>
					</tr>
				</table>
			</div><!--MidCol-->

			<div id="RightCol">
				What<br><br>a<br><br>life<br><br><br>s<br><br>here<br><br>now:<br><br>testing:<br><br><br><br><br><br><br><br>this:<br><br>page<br><br>now<br><br><br>nothign<br><br>else<br> 
			</div><!--RightCol-->

		</div><!--index_table-->

	</div><!--"index_table_container"-->

<?php require("footer.php"); ?>

