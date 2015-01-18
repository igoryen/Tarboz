<?php
    

    //show more top translations:
    $top_translation = isset($_GET['toptranslation'] ) ? $_GET['toptranslation'] : "";
    if ($top_translation == "y") {
      require("header.php");
      $query =   "SELECT *, 
            count(rating.rat_like_user_id) AS num_like
          FROM 
            (SELECT 
              orig.ent_entry_id             AS orig_entry_id, 
              orig.ent_entry_text           AS orig_phrase, 
              trans.ent_entry_id            AS trans_entry_id, 
              trans.ent_entry_text          AS trans_phrase,
              trans.ent_entry_creator_id    AS trans_creator,
              trans.ent_entry_creation_date AS trans_date
              
              FROM 
                (SELECT 
                  ent_entry_id, 
                  ent_entry_text, 
                  ent_entry_verbatim, 
                  ent_entry_translit, 
                  ent_entry_authen_status_id, 
                  ent_entry_translation_of, 
                  ent_entry_creator_id, 
                  ent_entry_creation_date
                   
                  FROM 
                    tbl_entry 
                  WHERE 
                    ent_entry_authen_status_id = 1 AND 
                    ent_entry_deleted = 0
                ) AS orig
                
                INNER JOIN 
                  (SELECT 
                    ent_entry_id, 
                    ent_entry_text, 
                    ent_entry_verbatim, 
                    ent_entry_translit, 
                    ent_entry_authen_status_id, 
                    ent_entry_translation_of, 
                    ent_entry_creator_id, 
                    ent_entry_creation_date
                  FROM 
                    tbl_entry 
                  WHERE 
                    ent_entry_authen_status_id = 2 AND 
                    ent_entry_deleted = 0
                  ) AS trans
                ON 
                  orig.ent_entry_id = trans.ent_entry_translation_of
            ) AS sub_entry
          LEFT JOIN 
            tbl_rating AS rating
          ON 
            rating.rat_entity_id = CONCAT('ent', sub_entry.trans_entry_id) 
            AND 
            rating.rat_like_user_id IS NOT NULL 
            AND 
            rating.rat_like_user_id >0
          GROUP BY 
            sub_entry.trans_entry_id
          ORDER BY 
            num_like DESC, 
            sub_entry.trans_date DESC, 
            sub_entry.trans_entry_id ASC";
      
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeSelect($query);
      $count = 0;
?>
<div align="center">
  
  <div id="toptranslationtable" 
       style="display:table; 
              width=1000px; 
              background-color:#3B8DFF; 
              color: #000000; 
              border:1px 
              solid #A99F9F;">
    
    <div id="toptranslationth" 
         style="display:table-header; 
                height:40px; 
                color: #ffffff;">
      
      <div  id="toptranslationthTrans" 
            style="display:inline-block; 
                   width:420px; 
                   font-weight:bold;
                   padding-top:8px; 
                   text-align: center;">
        Translation
      </div>   
      
      <div  id="toptranslationthOrig" 
            style="display:inline-block; 
                   width:420px; 
                   font-weight:bold;
                   padding-top:8px;  
                   text-align: center;">
        Original Phrase
      </div>
      
      <div id="toptranslationthCreator" 
           style="display:inline-block; 
                  width:130px; 
                  font-weight:bold;
                  padding-top:8px;  
                  text-align: center;">
        Added By
      </div>
      
      <div id="toptranslationthLikeNum" 
           style="display:inline-block; 
                  width:50px; 
                  font-weight:bold;
                  padding-top:8px;
                  text-align: center;">
        Likes
      </div>
      
    </div> <!--end div id="toptranslationth"-->
<?php

  while ($list = mysqli_fetch_assoc($result)) {
    $trans_phrase     = $list['trans_phrase'];
    $orig_phrase      = $list['orig_phrase'];
    $trans_entry_id   = $list['trans_entry_id'];
    $orig_entry_id    = $list['orig_entry_id'];
    $trans_creator_id = $list['trans_creator'];
    $num_like         = $list['num_like']; 

    $userManager = new UserManager();
    $added_user = $userManager->getUserByUserId($trans_creator_id);
    $added_user_name = $added_user->getLogin();
    $fname = $added_user->getFirstName();
    $lname = $added_user->getLastName();
    //$added_user_name = $fname." ".$lname;
    
    if ($count >= 10) {  
?>
      <div  id="toptranslationtr" 
            style="display:table-row; 
                   width:300px; 
                   padding: 5px; 
<?php 
  if($count%2 == 0) { // 1
    echo 'background-color: #ffffff;';
  } 
  else {
    echo 'background-color:#B5BBF2;';
  } 
?>">
        
        <div id="toptranslationtdTrans" 
             style="display:inline-block;
                    width:400px;
                    vertical-align: top;
                    margin: 5px; 
                    height:100px;
                    overflow:auto; 
                    padding: 10px; 
                    text-align: left;">
                    
          <a href="entryview.php?id=<?php echo $trans_entry_id;?>" 
             style="color:#000000;">
            <?php echo $trans_phrase;?>
          </a>
        </div>
        
        <div id="toptranslationtdOrig" 
             style="display:inline-block; 
                    width:400px;
                    vertical-align: top;
                    margin: 5px;
                    height:100px;
                    overflow:auto; 
                    padding: 10px; 
                    text-align: left;">
          <a href="entryview.php?id=<?php echo $orig_entry_id;?>" 
             style="color:#000000;" >
            <?php echo $orig_phrase;?>
          </a>
        </div>
        
        <div id="toptranslationtdCreator" 
             style="display:inline-block;
                    width:120px;
                    vertical-align: top;
                    margin: 5px;
                    height:100px;
                    padding: 10px; 
                    text-align: left;">
          <a href="other_user.php?id=<?php 
              echo $trans_creator_id;
                ?>&name=<?php 
              echo $fname;
                ?>" 
             style="color:#000000;" >
            <?php echo $added_user_name;?></a>
        </div>

        <div id="toptranslationtdLikeNum" 
             style="display:inline-block;
                    width:50px;
                    vertical-align: top;
                    margin: 5px;
                    height:100px; 
                    padding: 10px; 
                    text-align: left;">
          <?php echo $num_like;?>
        </div>

      </div><!--end div id="toptranslationtr"-->
        <?php
    }
    $count ++ ;
  } //end while loop ?>
  </div> <!--end div toptranslationtable  -->
</div>

<?php 
    require("footer.php");  
    } //end if ($top_translation == "y") 
    else {
    
        //echo "<br>bowseresult::search text is [".$search_text . "]</br>";
        //echo "<br>bowseresult::target language is [".$tgt_lang . "]</br>";
        //echo "<br>bowseresult::from date is [".$from_date . "]</br>";
        //echo "<br>bowseresult::end date is [".$end_date . "]</br>";
        
        $entryManager = new EntryManager();
        $dad_entryArr = $entryManager->getDadEntryListByLangDate($tgt_lang, $from_date, $end_date);
        //echo "</br>browse result ++++Entry Dad Array+++</br>";
        //var_dump($dad_entryArr);
        
        $dadsNum = count($dad_entryArr);
        if ($dadsNum == 1) {
            $no_found_dad = count(reset($dad_entryArr)) == 0 ? true : false;
        } else {
            $no_found_dad = false;
        }

        if (isset($no_found_dad) && $no_found_dad === false) {

            foreach($dad_entryArr as $i_dad) {
                //display dad entry
                $dad_arr = dad_house_has_dad($i_dad);
                
                $kids_entryArr = $entryManager->getKidEntryListByDadLangDate($dad_arr['id'], $tgt_lang, $from_date, $end_date);
                //echo "</br>browse result ++++Entry Kids Array+++</br>";
                //var_dump($kids_entryArr);
                
                $kidsNum = count($kids_entryArr); 
                if ($kidsNum == 1) {
                    $no_found_kid = count(reset($kids_entryArr)) ==0? true : false;
                } else {
                    $no_found_kid = false;
                }
                
                if (isset($no_found_kid) && $no_found_kid === false) { //Has kids
                    //echo "</br>browse result ++++has+++".$no_found_kid."</br>";
                    if ($kidsNum == 1) { //One kid
                        foreach ($kids_entryArr as $i_kid){                             
                        //    $e_m = new EntryManager();
                        //    $u_m = new UserManager();
        
                            $current_lang = $i_kid->getEntryLanguage();
            
                            open_kids_house($current_lang);                 

                            browse_kid_room($i_kid);
                            close_kids_house();
        
                            unset($current_lang);
                        } //end loop
                        
                    } //end if ($num_of_kids == 1)
                    else {  //More kids
                        $i=0;
                        foreach ($kids_entryArr as $i_kid){
                            //$u_m = new UserManager(); 
                            if($i_kid == $kids_entryArr[0]){   //first element of the array
                                //echo "<br/>==================More kids first element================".var_dump(next($kids_entryArr));
                                $current_lang = $i_kid->getEntryLanguage();
                                $next_lang = $kids_entryArr[$i+1]->getEntryLanguage();  
                                
                                open_kids_house($current_lang);        

                                browse_kid_room($i_kid);
        
                                unset($current_lang);
                                unset($next_lang);
                              } //end first element of the array
                              //elseif($i_kid == end($kids_entryArr)){ // last element of the array
                              elseif($i_kid == $kids_entryArr[$kidsNum-1]){ // last element of the array
                                //echo "<br/>==================More kids last element================".var_dump($i_kid);
                                //$prev_lang = prev($kids_entryArr)->getEntryLanguage();
                                $prev_lang = $kids_entryArr[$i-1]->getEntryLanguage();
                                $current_lang = $i_kid->getEntryLanguage();
        
                                if ($current_lang !== $prev_lang){ // current kid entry is in different languages from previous kid
                                //echo "<br/>+++++++++++More kids last element different language++++++++++++++";
                                  close_kids_house();
        
                                  open_kids_house($current_lang);          
        
                                  browse_kid_room($i_kid);          
        
                                  close_kids_house();
        
                                  unset($current_lang);
                                  if(isset($prev_lang)) unset($prev_lang);
                                }  //end different language
                                else{                           //current kid entry is in same languages as previous kid
                                  //echo "<br/>+++++++++++More kids last element same language++++++++++++++"; 
                                  //if (prev($kids_entryArr)){
                                   // $prev_lang = prev($kids_entryArr)->getEntryLanguage();
                                  //}
                                  $prev_lang = $kids_entryArr[$i-1]->getEntryLanguage();
                                  $current_lang = $i_kid->getEntryLanguage();

                                  browse_kid_room($i_kid);          
                    
                                  close_kids_house();
                               
                                  unset($current_lang);
                                  unset($prev_lang);
                                } //end same language 
                              }  //end last elment     
                              else{ // middle element of the array
                                //echo "<br/>==================More kids middle element================".var_dump($i_kid);
                                //$prev_lang = prev($kids_entryArr)->getEntryLanguage();
                                $prev_lang = $kids_entryArr[$i-1]->getEntryLanguage();
                                $current_lang = $i_kid->getEntryLanguage();
                      
                                if ($current_lang !== $prev_lang){
                                //echo "<br/>+++++++++++More kids middle element different language++++++++++++++";
                                  close_kids_house();          
                            
                                  open_kids_house($current_lang);          
                         
                                  browse_kid_room($i_kid);
                           
                                  unset($current_lang);
                                  unset($prev_lang);
                                } 
                                else{ 
                                 //echo "<br/>+++++++++++More kids middle element same language++++++++++++++";

                                  browse_kid_room($i_kid);
                
                                  unset($current_lang);
                                  unset($prev_lang);
                                } 
                              } //end middle elements of the array
                            
                              $i++;
                            
                        } //end loop
                        
                    } //end more kids
                    
                } // end if if (isset($no_found_verb) && !$no_found_kid)
                    
            }//end outer foreach
        }//end if(isset($no_found_dad) && !$no_found_dad)
        $noDad_entryArr = $entryManager->getEntryListByNoDadLangDate($tgt_lang, $from_date, $end_date);
        //echo "</br>browse result ++++Entry NO Dad Array+++</br>";
        foreach($noDad_entryArr as $i_noDad) {
            //display dad entry

            dad_house_no_dad($i_noDad);
        
        } //end foreach loop noDad
    }

	//defining functions for this file
	function dad_house_no_dad($i_noDad) {
		$entMan = new EntryManager();
		$userMan = new UserManager();
		$noDad_arr['id'] = $i_noDad->getEntryId();
		$noDad_arr['language'] = $i_noDad->getEntryLanguage();
		$noDad_arr['authen_status'] = "Translation";
		$noDad_arr['text'] = substr($i_noDad->getEntryText(), 0, 72);
		$noDad_arr['kid_num'] = "";
		$noDad_arr['like_num'] = $entMan->getEntryLikeNumByEntry($noDad_arr['id']);
		$noDad_arr['add_kid'] = "n";
		$noDad_arr['user'] = $userMan->getUserByUserId($i_noDad->getEntryUserId())->getLogin();
?>
		<div id="dad_house">
			<div class="dad_door"><span><?php echo $noDad_arr['language']; ?></span></div>
			<div id="dad_room">
			  <div id="dad_text">
				<a href="entryview.php?id=<?php echo $noDad_arr['id'];?>"><?php echo $noDad_arr['text']; ?></a>
			  </div>
			  <div id="dad_profile_link"><?php echo $noDad_arr['authen_status']; ?></div>
			  <div id="likes_num" style="display:inline-block;margin-left:8px;cursor:alias;" 
				   title="<?php echo $noDad_arr['like_num']; ?> users like"><?php if($noDad_arr['like_num']>0) echo '+'.$noDad_arr['like_num']; ?></div>
			  <div class="kid_added_by" style="display:inline-block; margin-left:3px;text-align:right;" >
				<a href="profile.php?id=<?php echo $noDad_arr['user']; ?>"><?php echo $noDad_arr['user']; ?></a>
			  </div>
			</div>
		 </div><!-- dad_house -->
<?php 
		return $noDad_arr;
	} //end dad_house_no_dad function 
  
	function dad_house_has_dad($i_dad) { 
			$entMan = new EntryManager();
            $userMan = new UserManager();
            $dad_arr['id'] = $i_dad->getEntryId();
            $dad_arr['language'] = $i_dad->getEntryLanguage();
            $dad_arr['authen_status'] = "Original";
            $dad_arr['text'] = substr($i_dad->getEntryText(), 0, 72);
            $dad_arr['kid_num'] = $entMan->getOriginalKidsNum($dad_arr['id']);
            $dad_arr['like_num'] = $entMan->getEntryLikeNumByEntry($dad_arr['id']);
            $dad_arr['add_kid'] = "y";
            $dad_arr['user'] = $userMan->getUserByUserId($i_dad->getEntryUserId())->getLogin();
?>
        <div id="dad_house">
            <div class="dad_door"><span><?php echo $dad_arr['language']; ?></span></div>
            <div id="dad_room">
              <div id="dad_text">
                <a href="entryview.php?id=<?php echo $dad_arr['id'];?>"><?php echo $dad_arr['text']; ?></a>
              </div>
              <div id="dad_profile_link"><?php echo $dad_arr['authen_status']; ?></div>
              <div style="display:inline-block;width:50px"></div>
              <div id="kids_num" title="There are <?php echo $dad_arr['kid_num']; ?> translations for this phrase"><?php echo $dad_arr['kid_num']; ?></div>
              <div id="add_kid"><a href="entrycreate.php" title="Add a new translation"><?php if($dad_arr['add_kid'] == 'y') echo "+";?></a></div>
              <div class="kid_added_by">
                <a href="profile.php?id=<?php echo $dad_arr['user']; ?>"><?php echo $dad_arr['user']; ?></a>
              </div>
            </div>
         </div><!-- dad_house -->

<?php 	
		return $dad_arr;
	}  //end dad_house_has_dad function       

	function browse_kid_room($i_kid){
		$e_m = new EntryManager();
		$u_m = new UserManager(); 
		$kid_array['id'] = $i_kid->getEntryId();
		$kid_array['text'] = substr($i_kid->getEntryText(), 0, 72);
		$kid_array['authen_status'] = "Translation";
		$kid_array['kid_votes'] = $e_m->getEntryLikeNumByEntry($kid_array['id']);
		$kid_array['user'] = $u_m->getUserByUserId($i_kid->getEntryUserId())->getLogin(); 

?>
		 <div class="kid_room">
			<div class="kid_text">
			  <a href="entryview.php?id=<?php echo $kid_array['id'];?>"><?php echo $kid_array['text'];?></a>
			</div>
			<div class="kid_profile_link"><?php echo $kid_array['authen_status']; ?></div>
		<!--    <div class="kid_dad_link">O</div>-->
			<div class="kid_votes"><span style="cursor: alias;" title="<?php echo $kid_array['kid_votes']; ?> users like"><?php if ($kid_array['kid_votes']>0) echo '+'.$kid_array['kid_votes']; ?></span> 
		<!--        <span style="cursor: alias;" title="3 users dislike">-3</span> -->
			</div>
			<div class="kid_added_by">
			  <a href="profile.php?id=<?php echo $kid_array['user']; ?>"><?php echo $kid_array['user'];?></a>
			</div>
		<!--	<div class="is_mom">A</div>  -->
		 </div>
<?php 
		return $kid_array;
	} //end function browse_kid_room 
?>

