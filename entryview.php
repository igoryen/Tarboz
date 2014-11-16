  <?php require("header.php");
  
    require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
    require_once BUSINESS_DIR_ENTRY . "Entry.php";
    
    require_once BUSINESS_DIR_COMMENT . 'CommentManager.php';
    require_once BUSINESS_DIR_USER. 'User.php';
    require_once BUSINESS_DIR_USER. 'UserManager.php';
    require_once BUSINESS_DIR_COMMENT . 'Comment.php';
    require_once BUSINESS_DIR_RATING . 'RatingManager.php';
    require_once BUSINESS_DIR_RATING . 'Rating.php';
    require_once BUSINESS_DIR_TRANSLREQ . 'TranslationRequestManager.php';
    require_once BUSINESS_DIR_TRANSLREQ . 'TranslationRequest.php';
    require_once BUSINESS_DIR_LANG . "LanguageManager.php";
    require_once BUSINESS_DIR_LANG . "Language.php";
  
    //Check if user is logged in or not
   
    if(!isset($_GET['id']) && !isset($_POST['id'])){
    echo "neither (GET['id']) nor (POST['id'])";
    }
    if(isset($_GET['id'])){
    echo "we have GET[id], it is " . $_GET['id'] . "<br>";
    $entryId = $_GET['id'];
    }
    elseif(isset($_POST['id'])){
    echo "we have POST[id], it is " . $_POST['id'] . "<br>";
    $entryId = $_POST['id'];
    }

    $em = new EntryManager();
    $trm = new TranslationRequestManager();
    $entry = $em->getEntryById($entryId); // 1
    $treq = $trm->getTreqByEntryId($entry->getEntryId());
    $lm = new LanguageManager();
    $userId = 3; // the id of the current logged-in user
    
    $language = $entry->getEntryLanguage();
    $text = nl2br(trim($entry->getEntryText()));
    $verbatim = $entry->getEntryVerbatim();
    $translit = nl2br(trim($entry->getEntryTranslit()));
    $authen = $entry->getEntryAuthenStatusId();
    $translOf = $entry->getEntryTranslOf();
    $user_id = $entry->getEntryUserId();
    $media = $entry->getEntryMediaId();
    //$author = $entry->getEntryAuthorId();
    $authors = $entry->getEntryAuthors();
    $source = $entry->getEntrySourceId();
    $tags = trim($entry->getEntryTags());
    $use = trim($entry->getEntryUse());
    $video = trim($entry->getEntryHttpLink());
    $date = $entry->getEntryCreationDate();
    //table_to_see_entry_values($entry); // for debugging

  ?>

  <div id="entry_index_container">    
    <mark>index</mark>.php
    
    <div class="entry_record">
      <div class="entry_record_title">id</div>
      <div class="entry_record_value"><?php echo $entryId; ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Language</div>
      <div class="entry_record_value"><?php echo $language; ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Text</div>
      <div class="entry_record_value"><?php echo $text; ?></div>
    </div>
    
    <div class="entry_record" style="display: none;"><!-- 2 -->
      <div class="entry_record_title">Verbatim</div>
      <div class="entry_record_value"><?php echo $verbatim; ?></div>
    </div>

    <?php if(!null == $translit){?>
    <div class="entry_record">
      <div class="entry_record_title">Translit</div>
      <div class="entry_record_value"><?php echo $translit; ?></div>
    </div>
    <?php }?>

    <!--Display authenticity status-->
    <div class="entry_record">
      <div class="entry_record_title">Authenticity status</div>
      <div class="entry_record_value">
    <?php 
        echo $authen."</br>"; 
        $query = "SELECT * FROM tbl_authen_status WHERE athn_authen_status_id = '".$authen."'";
        $dbHelper = new DBHelper();
        $result = $dbHelper->executeSelect($query);
        while ($list = mysqli_fetch_assoc($result)) {
            $authen_status = $list['athn_stat_name'];
            echo $authen_status;
        }
    ?>
      </div>
    </div>
    <!--Display authenticity status end-->
    <!--Display translation of /original phrase-->
    <?php if(!null == $translOf){?>
    <div class="entry_record">
      <div class="entry_record_title">Translation of</div>
      <div class="entry_record_value">
    <?php 
        echo $translOf."</br>"; 
        $query = "SELECT * FROM tbl_entry WHERE ent_entry_id = '".$translOf."'";
        $dbHelper = new DBHelper();
        $result = $dbHelper->executeSelect($query);
        while ($list = mysqli_fetch_assoc($result)) {
            $entry_orig_text = $list['ent_entry_text'];
            echo $entry_orig_text;
        }
    ?>
    </div>
    </div>
    <?php }?>
    <!--Display translation of /original phrase end-->  
    <!--Display user name who added this entry-->
    <div class="entry_record">
      <div class="entry_record_title">Entry added by</div>
      <div class="entry_record_value">
    <?php 
        //echo $user_id."</br>"; 
        $userManager = new UserManager();
        $user = $userManager->getUserByUserId($user_id);
        echo $user->getFirstName()." ".$user->getLastName();
    ?>
      </div>
    </div>
    <!--Display user name who added this entry end-->
    <!--Display media-->
    <div class="entry_record">
      <div class="entry_record_title">Media</div>
      <div class="entry_record_value">
    <?php 
        echo $media."</br>";
        $query = "SELECT * FROM tbl_media WHERE med_media_id = '".$media."'";
        $dbHelper = new DBHelper();
        $result = $dbHelper->executeSelect($query);
        while ($list = mysqli_fetch_assoc($result)) {
            $media_desc = $list['med_desc'];
            echo $media_desc;
        }
    ?>
      </div>
    </div>
    <!--Display media end-->
    <!--Display tags-->     
    <?php if(!null == $tags){?>
    <div class="entry_record">
      <div class="entry_record_title">Tags</div>
      <div class="entry_record_value">
    <?php 
        echo $tags."</br>";
        $query = "SELECT * FROM tbl_entry WHERE ent_entry_id = '".$tags."'";
        $dbHelper = new DBHelper();
        $result = $dbHelper->executeSelect($query);
        while ($list = mysqli_fetch_assoc($result)) {
            $entry_tag_desc = $list['ent_entry_tags'];
            echo $entry_tag_desc;
        }
    ?>
      </div>
    </div>
    <!--Display tags end--> 
    
    <?php } //end if (!null == $tags)?>
    
    
    <!--Display author name--> 
<?php if ($authors !== ""){ ?>
    <div class="entry_record">
      <div class="entry_record_title">Author(s)</div>
      <div class="entry_record_value">
    <?php 
        echo $authors."</br>";
//        $query = "SELECT * FROM tbl_author WHERE aut_author_id = '".$author."'";
//        $dbHelper = new DBHelper();
//        $result = $dbHelper->executeSelect($query);
//        while ($list = mysqli_fetch_assoc($result)) {
//            $author_name = $list['aut_author_name'];
//            echo $author_name;
//        }
    ?>
      </div>
    </div>
    <!--Display author name end--> 
<?php } ?>
        
    
    <!--Display source-->      
    <div class="entry_record">
      <div class="entry_record_title">Source</div>
      <div class="entry_record_value">
    <?php 
        echo $source."</br>";
        $query = "SELECT * FROM tbl_source WHERE sou_source_id = '".$source."'";
        $dbHelper = new DBHelper();
        $result = $dbHelper->executeSelect($query);
        while ($list = mysqli_fetch_assoc($result)) {
            $source_name = $list['sou_source_name'];
            $source_form = $list['sou_source_form'];
            $source_desc = $source_name."(".$source_form.")";
            echo $source_desc;
        }
    ?>
      </div>
    </div>
    <!--Display source end--> 
    <!--Display use--> 
    <?php if(!null == $use){?>
        <div class="entry_record">
          <div class="entry_record_title">Use</div>
          <div class="entry_record_value"><?php echo $use; ?></div>
        </div>
    <?php }?>
    <!--Display use end--> 
      
    <!--Display video--> 
    <?php if(!null == $video){?>
        <div class="entry_record">
          <div class="entry_record_title">Video link</div>
          <div class="entry_record_value">
            <embed width="420" height="315" src="<?php echo $video; ?>">
          </div>
        </div>
    <?php }?>
    <!--Display video end--> 
    <!--Display creation date--> 
    <div class="entry_record">
      <div class="entry_record_title">Creation date</div>
      <div class="entry_record_value"><?php echo $date; ?></div>
    </div>
    <!--Display creation date end --> 
    <!--Display edit--> 
    <div class="entry_record">
      <div class="entry_record_title">Edit</div>
      <div class="entry_record_value">
        <a href="entrycreate.php?id=<?php echo $entryId; ?>">Edit the entry</a><!-- #1-->
      </div>      
    </div>
    <!--Display edit end--> 
    <!--Display Translate into--> 
    <!-- display the Delete button if the logged-in user is the creator of the entry-->
    <div class="entry_record">
      <div class="entry_record_title">Delete this entry</div>
      <div class="entry_record_value">
        
        <button id="entryDeleteButton">Delete this entry</button>
        <span id="entryDeleteResponse" style="display: none"></span>
        <div id="entryDeleteDialog" style="display: none">
          Are you sure you want to delete this entry ><?php echo $entryId; ?><br/>
          <form action="index.php">
            <button type="submit"
                    id="entryDeleteConfirm"
                    onclick="entryDelete(<?php echo $entryId; ?>)">Delete</button>
            <button name="entryDeleteCancel" 
                  id="entryDeleteCancel"
                  onclick="">Cancel</button>
          </form>
        </div>        
      </div>
      <script>
        $( "#entryDeleteButton" ).click(function() {
          $( "#entryDeleteDialog" ).show("fast");
        });
        $( "#entryDeleteCancel" ).click(function() {
          $( "#entryDeleteDialog" ).hide("fast");          
        });
        $( "#entryDeleteConfirm ").click(function(){
          $("#entryDeleteResponse").show("fast");
          $( "#entryDeleteDialog" ).hide("fast");
        });
      </script>  
    </div>
        
    
    <?php
        if($entry->getEntryAuthenStatusId() == 1){
        // 1*
    ?>
    <div class="entry_record">
      <div class="entry_record_title">Translate this into&nbsp;
	  <?php
        // TODO: What if there are >1 requests (i.e. >1 languages) to translate this entry?
        $treqLang = $treq->getTreqLang();
        if(!null == $treqLang){
          echo $treq->getTreqLang();
        }else{
          echo "a language you know";          
        } //end else ?>
      </div>
      <div class="entry_record_value">
        <a href="entrycreate.php?id=<?php echo $entryId; ?>&a=t">Create a translation</a>
      </div>
    </div>
    <?php } //end if($entry->getEntryAuthenStatusId() == 1) ?>
    <!--Display Translate into end-->  
    <!--Display translation request-->
    <?php if($entry->getEntryAuthenStatusId() == 1){?>
    <div class="entry_record">
      <div class="entry_record_title">Request a translation into one of these languages</div>
      <div class="entry_record_value">
        <select 
          name="treqLang" 
          onchange="treqCreate(this.value,<?php echo $userId.",".$entryId; ?>)">
          <option value="">Select a language:</option>
          <?php
          $langs = $lm->getListOfLang();
          foreach ($langs as $lang) {
            echo '<option value="';
            echo $lang->getLangId();
            echo '">';
            echo $lang->getLangName();
            echo '</option>';
          }
                                         }?></select>
        <span id="treqCreateResponse"></span>
      </div>
    </div>
    <!--Display translation request end-->
    <!--- comments section start --->
  
    <div class="entry_record">
      <div class="entry_record_title">Comments</div>
      <div class="entry_record_value">
      <?php
          $commentManager = new CommentManager();
          $commentsByEntry = $commentManager->getCommentByEntry($entryId);
        
          $user_logged_in = true;
          //$user = isset($_SESSION['user']) ? $_SESSION['user'] : "";
          $user_id = "";
          if (isset($_SESSION['user'])) {
              $user = $_SESSION['user'];
              $user_id = $user->getUserId();
          } else {
            $user_logged_in = false;
          }
        
          $commentCount = count($commentsByEntry);
          if ($commentCount > 0) {
            foreach($commentsByEntry as $coms){
              $id         =   $coms->getId();
              $text       =   $coms->getText();
              $rating_id  =   $coms->getRatingId();
              $created_by =   $coms->getCreatedBy();   
              //echo "comment text: ". $text."<br/>";
                
              //get the username who created the comment
              $userManager = new UserManager();
              $created_user = $userManager->getUserByUserId($created_by);
              $created_user_name = $created_user->getLogin();
                
            //define ids for html tags in the loop
              $edit_icon_id = "editIcon_".$id;
              $edit_area_id = "edit_area_".$id;
              $edit_comment_text_id = "comment_text_id_".$id;
              $form_name = "formEditComment_".$id;
              $edit_comment_textarea = "editCommentText_".$id;
              $edit_comment_input_hidden = "editCommentId_".$id;
              $edit_comment_submit = "editCommentSub_".$id;
              $delete_icon_id ="deleteIcon_".$id;
              $comment_like_id = $user_id."_commentLike_".$id;
        
            //ratings    
              $ratingManager = new RatingManager();
              $rating_content = "";
              if ($ratingManager->hasRatingByEntityLikeUser("com".$id, $created_by) ==1) {
                  $rating_content = "Unlike";
              } else if ($ratingManager->hasRatingByEntityDislikeUser("com".$id, $created_by) == 1 || 
                         $ratingManager->hasRatingByEntityLikeUser("com".$id, $created_by) == 0 || 
                         $ratingManager->hasRatingByEntityDislikeUser("com".$id, $created_by) == 0){
                  $rating_content = "Like";
              }
              $likeRating = $ratingManager->CountRatingByLikeEntity("com".$id);
              $likeRating = $likeRating > 0 ? $likeRating : "";
                
              $comment_report_id = $user_id."_reportCommentId_".$id;
      ?>

      <div> <!--div2-->
        <div style="display:table;">
          <div style="display:table-row;"><?php echo $created_user_name.":"; ?> </div>
          <div style="display:table-row;">
            <div style="display:table-cell; width:280px; padding-left:10px;">
                <span id="<?php echo $edit_comment_text_id; ?>" style="display:'';"><?php echo $text; ?></span>  
            </div>
            <div style="display:table-cell;">
                <span id ="<?php echo $comment_like_id; ?>" name="<?php echo $comment_like_id; ?>" class="comment_like"
                      style="font-family:Tahoma;font-size:12px;" onmouseover="$(this).css({'cursor': 'pointer'});"><?php if($rating_content == "Like") { echo $rating_content."&nbsp;".$likeRating; } else {echo $rating_content."&nbsp;"; } ?>
                </span>
            </div>
            
            <?php if ($user_logged_in && $created_by == $user_id) { //show edit and delete icon if user is logged in?>
            <div style="display:table-cell;">
                <img src="images/edit.png" alt="Edit Icon" style="width:16px;height:16px" id="<?php echo $edit_icon_id; ?>" title="Edit"
                     onmouseover="$(this).css({'cursor': 'pointer'});" 
                     onclick = "$('#<?php echo $edit_area_id; ?>').css({'display': 'block'}); $('#<?php echo $edit_comment_text_id; ?>').css({'display': 'none'});"/>
                <img src="images/delete.png" alt="Delete Icon" style="width:16px;height:16px" id="<?php echo $delete_icon_id; ?>" title="Delete"
                         class="deleteComment" onmouseover="$(this).css({'cursor': 'pointer'});"/>
            </div>
        
            <?php } //end if ($user_logged_in && $created_by == $user_id)
                  else {   //show report icon if user is not logged in
            ?>
            <div style="display:table-cell; width: 100px; position: relative;">
                <img src="images/arrow-down.png" alt="Arrow Down Icon" style="width:16px;height:16px" id="<?php echo $comment_report_id; ?>" 
                     class="reportComment" title="Report to Admin" onmouseover="$(this).css({'cursor': 'pointer'});"/>
                <div id ="<?php echo 'reportCommentDiv_'.$id;?>" style="display: none; overflow: hidden; position:absolute;">
                    <form name ="<?php echo 'reportCommentForm_'.$id;?>" id="<?php echo 'reportCommentForm_'.$id;?>" method="POST">
                        <div>Report reason:</div>
                        <textarea rows="2" cols="20" name="<?php echo 'reportCommentReason_'.$id; ?>" 
                                  id="<?php echo 'reportCommentReason_'.$id; ?>"></textarea><br/>
                        <input type="hidden" id="<?php echo 'reportCommentBy_'.$id; ?>" 
                               name="<?php echo 'reportCommentBy_'.$id; ?>" 
                               value ="<?php echo $user_id; ?>"/>
                        <button id="<?php echo 'reportCommentSub_'.$id; ?>" name="<?php echo 'reportCommentSub_'.$id; ?>" class="reportCommentSub" type="button" style="font-size:11px;">Submit</button>
                        <button id="<?php echo 'reportCommentCancel_'.$id; ?>" name="<?php echo 'reportCommentCancel_'.$id; ?>" class="reportCommentCancel" type="button" style="font-size:11px;">Cancel</button>
                    </form>
                </div> <!--end report comment div-->
            </div> <!--end table cell for report comment-->
            <?php
                  } //end else if if ($user_logged_in && $created_by == $user_id)
            ?>
            </div> <!--end of table row -->
            </div> <!--end of table -->
    
            <?php      if ($user_logged_in && $created_by == $user_id) { //edit comment form       
            ?>
        
            <div id="<?php echo $edit_area_id ?>" class="<?php echo $edit_area_id ?>" style="display:none;">
                <form name="<?php echo $form_name; ?>" id="<?php echo $form_name; ?>" method="POST">
                    <textarea rows="2" cols="40" name="<?php echo $edit_comment_textarea; ?>" 
                                                 id="<?php echo $edit_comment_textarea; ?>"><?php echo $text; ?></textarea><br/>
                    <input type="hidden" id="<?php echo $edit_comment_input_hidden; ?>" 
                                         name="<?php echo $edit_comment_input_hidden; ?>" 
                                         value ="<?php echo $id; ?>"/>
                    <button id="<?php echo $edit_comment_submit; ?>" name="<?php echo $edit_comment_submit; ?>" class="editCommentSub" type="button" >Submit</button>
               </form> 
            </div>
        
            <?php       } //end if($user_logged_in && $created_by == $user_id) edit comment form
            ?>
        </div>    <!--end div2-->    
        <br> 
        <?php               
            } //end of foreach loop
          } else {
            echo "No comments for this entry.</br>";
          } //end if 
         $user_logged_status = $user_logged_in ? "Y" : "N";
        ?> 
        <!--add a new comment form-->
        <form name="new_comment" id="new_comment" >
          <textarea rows="3" cols="45" name="newComment" id="newComment"></textarea><br/>
          <input type="hidden" id = "commentEntityId" name = "commentEntityId" value ="<?php echo $entryId;?>"/>
          <input type="hidden" id = "user_login_status" name = "user_login_status" value ="<?php echo $user_logged_status;?>"/>
          <button id="new_commentSub" name="new_commentSub" type="button">Comment</button>
        </form>  
     </div> <!--entry_record_value-->
   </div> <!--entry_record_value-->
   <!--- comments section finish --->
      
   <!--- rating section start --->     
    <div class="entry_record">
      <div class="entry_record_title">Entry Like</div>
      <div class="entry_record_value">
      <?php
          //get the like number
          $rm = new RatingManager();
          $like_entry = "";
          if ($rm->hasRatingByEntityLikeUser("ent".$entryId, $user_id) ==1) {
              $like_entry = "Unlike";
          } else if ($rm->hasRatingByEntityDislikeUser("ent".$entryId, $user_id) == 1 || 
                     $rm->hasRatingByEntityLikeUser("ent".$entryId, $user_id) == 0 || 
                     $rm->hasRatingByEntityDislikeUser("ent".$entryId, $user_id) == 0){
              $like_entry = "Like";
          }
          $likeRating = $rm->CountRatingByLikeEntity("ent".$entryId);
          $likeRating = $likeRating > 0 ? $likeRating : "";
      ?>
        <span id ="<?php echo $user_id."_entryLike_".$entryId; ?>" name="<?php echo $user_id."_entryLike_".$entryId; ?>" class="entry_like"
              style="cursor: pointer; color: #0066cc;"><?php echo $like_entry."&nbsp;"; ?></span>
        <span>Entry | </span>
        <span class="entry_like_num" style="display:'';"><?php echo $likeRating; ?> </span><span><?php if($likeRating>0) echo "LIKE(S)";?></span>
      </div><!--entry_record_value-->
    </div><!--entry_record_value-->
    <!--- rating section end --->  
      
    <!--- report section start --->  
    <div class="entry_record">
      <div class="entry_record_title">Entry Report</div>
      <div class="entry_record_value">
          <!--start report entry div-->
            <div style="display:table-cell; ">
                <div id="<?php echo $user_id."_reportEntryId_".$entryId; ?>" 
                     class="reportEntry" title="Report to Admin" style="cursor: pointer; color: #0066cc;">Report this entry</div>
                <div id ="<?php echo 'reportEntryDiv_'.$entryId;?>" style="display: none; ">
                    <form name ="<?php echo 'reportEntryForm_'.$entryId;?>" id="<?php echo 'reportEntryForm_'.$entryId;?>" method="POST">
                        <div style="font-size:14px; margin-top:5px;">Reason:</div>
                        <textarea rows="2" cols="20" name="<?php echo 'reportEntryReason_'.$entryId; ?>" 
                                  id="<?php echo 'reportEntryReason_'.$entryId; ?>"></textarea><br/>
                        <input type="hidden" id="<?php echo 'reportEntryBy_'.$entryId; ?>" 
                               name="<?php echo 'reportEntryBy_'.$entryId; ?>" 
                               value ="<?php echo $user_id; ?>"/>
                        <button id="<?php echo 'reportEntrySub_'.$entryId; ?>" name="<?php echo 'reportEntrySub_'.$entryId; ?>" class="reportEntrySub" type="button" style="font-size:11px;">Submit</button>
                        <button id="<?php echo 'reportEntryCancel_'.$entryId; ?>" name="<?php echo 'reportEntryCancel_'.$entryId; ?>" class="reportEntryCancel" type="button" style="font-size:11px;">Cancel</button>
                    </form>
                </div> <!--end report entry div inner-->
            </div> <!--end table cell for report en-->
          
      </div><!--entry_record_value-->
    </div><!--entry_record_value--> 
    <!--- report section end --->  
 
</div> <!--entry_index_container-->

  
<?php require("footer.php"); ?>