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
      //echo "we have GET[id], it is " . $_GET['id'] . "<br>";
      $entryId = $_GET['id'];
    }
    elseif(isset($_POST['id'])){
      echo "we have POST[id], it is " . $_POST['id'] . "<br>";
      $entryId = $_POST['id'];
    }

    $em = new EntryManager();
    $trm = new TranslationRequestManager();
    $entry = $em->getEntryById($entryId); // 1
    $treqs = $trm->getTreqByEntryId($entry->getEntryId());

    $lm = new LanguageManager();
    $um = new UserManager();
    
    
    //$userId = 3; // the id of the current logged-in user
    $loggedIn_userId = "";
    $loggedIn_userType = "";
    $user_logged_in = true;
    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
      $loggedIn_userId = $user->getUserId();
      $loggedIn_userType = $user->getUserType();
      //echo "logged in user id==".$loggedIn_userId;
    } else {
      $user_logged_in = false;
    }
    
    $language = $entry->getEntryLanguage();
    $text = nl2br(trim($entry->getEntryText()));
    $verbatim = $entry->getEntryVerbatim();
    $translit = nl2br(trim($entry->getEntryTranslit()));
    $authen = $entry->getEntryAuthenStatusId();
    $translOf = $entry->getEntryTranslOf();
    $user_id = $entry->getEntryUserId();
    $user_login = $um->getUserByUserId($user_id)->getLogin();
    $media = $entry->getEntryMediaId();
    //$author = $entry->getEntryAuthorId();
    $authors = $entry->getEntryAuthors();
    $source = $entry->getEntrySourceId();
    $tags = trim($entry->getEntryTags());
    $use = trim($entry->getEntryUse());
    $video = trim($entry->getEntryHttpLink());
    $date = $entry->getEntryCreationDate();
    //table_to_see_entry_values($entry); // for debugging

    //$user_logged_in = true;
    //$user = isset($_SESSION['user']) ? $_SESSION['user'] : "";
    //$user_id = "";
    //if (isset($_SESSION['user'])) {
        //$user = $_SESSION['user'];
        //$user_id = $user->getUserId();
    //} else {
    //  $user_logged_in = false;
    //}

  ?>

  <div id="entry_index_container">    
<!--
    <mark>index</mark>.php
    
    <div class="entry_record" style="display: none;">
      <div class="entry_record_title">id</div>
      <div class="entry_record_value">
          <?php echo $entryId; ?>
        </div>
    </div>
-->
        <!--Display user name who added this entry-->
    <div class="entry_record">
<!--
      <div class="entry_record_title">
        Entry added by
        <span class="question" id="entryaddedby" >?</span>
      </div>
-->
      <div class="entry_record_value" style="background: LightGoldenRodYellow">

    <?php 
        //echo $user_id."</br>"; 
        $userManager = new UserManager();
        $user  = $userManager->getUserByUserId($user_id);
        $fname = $user->getFirstName();
        $lname = $user->getLastName();
    ?>
      <!--<a href="other_user.php?id=<?php echo $user_id;?>&name=<?php echo $fname;?>" style="color:#000000;" >
              <?php echo $fname." ".$lname; ?>
          </a> -->
        <span style="color: #939690">
          Contributor:
          <?php
          if ($user_logged_in ) { ?>
            <a href="other_user.php?id=<?php echo $user_id; 
              ?>&name=<?php echo $fname; ?>" 
              style="color:#000000;">
              <?php echo $user_login; ?>
             </a>
          <?php 
          } 
          else { 
            echo $user_login; 
          }?>. Entry creation date: <?php echo $date; ?>
        </span>
      </div>
    </div>
    <!--Display user name who added this entry end-->    
    
    <div class="entry_record">
      <div class="entry_record_title">
        <span>Language: <?php echo $language; ?></span>  
        <span> (<?php 
          //echo $authen."</br>"; 
          $query = "SELECT * FROM tbl_authen_status WHERE athn_authen_status_id = '".$authen."'";
          $dbHelper = new DBHelper();
          $result = $dbHelper->executeSelect($query);
          while ($list = mysqli_fetch_assoc($result)) {
            $authen_status = $list['athn_stat_name'];
            echo $authen_status;
          }
        ?>) 
          <span class="question" id="entryviewauthen" >?</span>
        </span>  
      </div>
      <div class="entry_record_value_for_text">
        <?php echo $text; ?>
      </div>
    </div>
    
    
    <!--Display video--> 
    <?php if(!null == $video){?>
        <div class="entry_record">
          <div class="entry_record_title">
            Video link
            <span class="question" id="entryviewvideo" >?</span>
          </div>
          <div class="entry_record_value">
            <embed width="700" height="400" src="<?php echo $video; ?>">
          </div>
        </div>
    <?php }?>
    <!--Display video end--> 
    
    
<?php if(!null == $translit){?>
    <div class="entry_record">
      <div class="entry_record_title">
        Translit
        <span class="question" id="entrytranslit" >?</span>
      </div>
      <div class="entry_record_value"><?php echo $translit; ?></div>
    </div>
<?php }?>
    
    
    <div class="entry_record" style="display: none;"><!-- 2 -->
      <div class="entry_record_title">Verbatim</div>
      <div class="entry_record_value"><?php echo $verbatim; ?></div>
    </div>


    <!--Display author name--> 
<?php if ($authors !== "" && $authors !== null){ ?>
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
<?php } ?>
    <!--Display author name end--> 

    
    <!--Display use--> 
    <?php if(!null == $use){?>
        <div class="entry_record">
          <div class="entry_record_title">
            Use
            <span class="question" id="entryuse" >?</span>
          </div>
          <div class="entry_record_value"><?php echo $use; ?></div>
        </div>
    <?php }?>
    <!--Display use end--> 
    
    
<?php
  if($entry->getEntryAuthenStatusId() == 1){
        // 1*
    ?>
    <div class="entry_record">
      <div class="entry_record_title">Translate this entry into <?php
        // TODO: What if there are >1 requests (i.e. >1 languages) to translate this entry?
        $treqLang = $treqs[0]->getTreqLang();
        //echo "<br>treqLang[0] = " . $treqLang;
        if(!null==$treqs[0]->getTreqLang()){
          //echo "<br>array is not empty";
          //echo "People have asked to translate this entry into ";
          foreach($treqs as $treq){
            $treqLang = $treq->getTreqLang();
            if($treqLang != null || $treqLang != ""){
              //echo "-lang not null >";
              echo $treqLang . " or ";
            }            
          }       
        } //end else ?> a language you know 
        <span class="question" id="entrytranslate" >?</span>
      </div>
      <div class="entry_record_value"><?php
        if (isset($_SESSION['user'])) {?>
        <a href="entrycreate.php?id=<?php echo $entryId; ?>&a=t">Create a translation</a>
        <?php
        }
        else{
          echo "<i>Please login to create an entry</i>";
        }?>
      </div>
    </div>
    <?php } //end if($entry->getEntryAuthenStatusId() == 1) ?>
    <!--Display Translate into end-->  
    
    

    <!--Display translation of /original phrase-->
    <?php if(!null == $translOf){?>
    <div class="entry_record">
      <div class="entry_record_title">Translation of</div>
      <div class="entry_record_value">
        <a href="entryview.php?id=<?php echo $translOf; ?>"><i>See the original</i></a>
      </div>
    </div>
    <?php }?>
    <!--Display translation of /original phrase end-->  
    
    <!--Display media-->
<!--
    <div class="entry_record">
      <div class="entry_record_title">
        Media
        <span class="question" id="entrymedia" >?</span>
      </div>
      <div class="entry_record_value">
    <?php 
        //echo $media."</br>";
//        $query = "SELECT * FROM tbl_media WHERE med_media_id = '".$media."'";
//        $dbHelper = new DBHelper();
//        $result = $dbHelper->executeSelect($query);
//        while ($list = mysqli_fetch_assoc($result)) {
//            $media_desc = $list['med_desc'];
//            echo $media_desc;
//        }
    ?>
      </div>
    </div>
-->
    <!--Display media end-->
    <!--Display tags-->     
    <?php if(!null == $tags){?>
    <div class="entry_record">
      <div class="entry_record_title">Tags</div>
      <div class="entry_record_value">
    <?php 
        echo $tags."</br>";
//        $query = "SELECT * FROM tbl_entry WHERE ent_entry_id = '".$tags."'";
//        $dbHelper = new DBHelper();
//        $result = $dbHelper->executeSelect($query);
//        while ($list = mysqli_fetch_assoc($result)) {
//            $entry_tag_desc = $list['ent_entry_tags'];
//            echo $entry_tag_desc;
//        }
    ?>
      </div>
    </div>
    <!--Display tags end--> 
    
    <?php } //end if (!null == $tags)?>
    
    

        
    
    <!--Display source-->      
<!--
    <div class="entry_record">
      <div class="entry_record_title">Source</div>
      <div class="entry_record_value">
    <?php 
        //echo $source."</br>";
//        $query = "SELECT * FROM tbl_source WHERE sou_source_id = '".$source."'";
//        $dbHelper = new DBHelper();
//        $result = $dbHelper->executeSelect($query);
//        while ($list = mysqli_fetch_assoc($result)) {
//            $source_name = $list['sou_source_name'];
//            $source_form = $list['sou_source_form'];
//            $source_desc = $source_name."(".$source_form.")";
//            echo $source_desc;
//        }
    ?>
      </div>
    </div>
-->
    <!--Display source end--> 

      
    <!--Display Control-->  
    <?php if ($loggedIn_userId == $user_id || $loggedIn_userType == "1") { ?>
    <div class="entry_record">
      <div class="entry_record_title">Control</div>
      
      <div class="entry_record_value">
        
        <div class="button_room">
          <!-- the Edit Entry button -->
          <a href="entrycreate.php?id=<?php echo $entryId; ?>">
            Edit the entry
          </a><!-- #1-->
          &nbsp;
        </div><!-- Edit button room -->
        
        <div class="button_room"> <!-- the Delete Entry button --> 
          <button id="entryDeleteButton" class="en_button" style="width: 150px; font-size: 14px;">Delete this entry</button>
            <span id="entryDeleteResponse" style="display: none"></span>
            <div id="entryDeleteDialog" style="display: none">
              Really delete this entry?<?php //echo $entryId; ?>
              <span><form action="index.php">
                <button type="submit"
                        id="entryDeleteConfirm"
                        onclick="entryDelete(<?php echo $entryId; ?>)">Yes, delete it.</button>
              </form></span>
              <span><button name="entryDeleteCancel" 
                    id="entryDeleteCancel"
                    onclick="">No. Cancel</button></span>
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
        </div>  <!-- the Delete Entry button -->       
      </div><!-- entry record value -->
    </div><!-- Entry record-->    
    <?php } ?>
     <!-- end display the Control entry-->   
    
    <!--Display translation request-->
    <?php 
    if(isset($_SESSION['user'])){
    if($entry->getEntryAuthenStatusId() == 1){?>
    <div class="entry_record">
      <div class="entry_record_title">Request a translation into one of these languages</div>
      <div class="entry_record_value">
        <select 
          name="treqLang" 
          onchange="treqCreate(this.value,<?php echo $user_id.','.$entryId; ?>)">
          <option value="">Select a language:</option>
          <?php
          $langs = $lm->getLanguages();
          foreach ($langs as $lang) {
            echo '<option value="';
            echo $lang->getLangId();
            echo '">';
            echo $lang->getLangName();
            echo '</option>';
          } ?>
          </select>
        <span id="treqCreateResponse"></span>
      </div>
    </div>
    <?php } //end if($entry->getEntryAuthenStatusId() == 1)
    }?>
    <!--Display translation request end-->
    <!--- comments section start --->
  
    <div class="entry_record">
      <div class="entry_record_title">Comments</div>
      <div class="entry_record_value">
      <?php
          $commentManager = new CommentManager();
          $commentsByEntry = $commentManager->getCommentByEntry($entryId);
                
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
              $comment_like_id = $loggedIn_userId."_commentLike_".$id;
              $comment_likeNum_id = $loggedIn_userId."_commentLikeNum_".$id;
        
            //ratings    
              $ratingManager = new RatingManager();
              $rating_content = ""; 
              if ($ratingManager->hasRatingByEntityLikeUser("com".$id, $loggedIn_userId) ==1) {
                  $rating_content = "Unlike";
              } else if ($ratingManager->hasRatingByEntityDislikeUser("com".$id, $loggedIn_userId) == 1 || 
                         $ratingManager->hasRatingByEntityLikeUser("com".$id, $loggedIn_userId) == 0 || 
                         $ratingManager->hasRatingByEntityDislikeUser("com".$id, $loggedIn_userId) == 0){
                  $rating_content = "Like";
              }
              $likeRating = $ratingManager->CountRatingByLikeEntity("com".$id);
              $likeRating = $likeRating > 0 ? $likeRating : "";
                
              $comment_report_id = $loggedIn_userId."_reportCommentId_".$id;
      ?>

      <div> <!--div2-->
        <div style="display:table;">
          <div style="display:table-row;">
              <?php if ($user_logged_in ) { ?>
              <a href="other_user.php?id=<?php echo $created_by;?>"><?php echo $created_user_name.":"; ?></a> 
              <?php } else { echo $created_user_name.":"; } ?>
          </div>
          <div style="display:table-row;">
            <div style="display:table-cell; width:480px; padding-left:10px;">
                <span id="<?php echo $edit_comment_text_id; ?>" style="display:'';"><?php echo $text; ?></span>  
            </div>
            <?php if ($user_logged_in ) { //check if user logged in or not ?>
            <div style="display:table-cell;">
                <span id ="<?php echo $comment_like_id; ?>" name="<?php echo $comment_like_id; ?>" class="comment_like"
                      style="font-family:Tahoma;font-size:12px;" onmouseover="$(this).css({'cursor': 'pointer'});"><?php echo $rating_content."&nbsp;"?> 
                </span>
                <span id ="<?php echo $comment_likeNum_id; ?>" title ="<?php echo $likeRating;?> likes" style="font-family:Tahoma;font-size:12px;cursor:alias;" ><?php echo $likeRating;?></span>
            </div>
            
            <?php if ($created_by == $loggedIn_userId) { //show edit and delete icon if user is logged in?>
            <div style="display:table-cell;">
                <img src="images/edit.png" alt="Edit Icon" style="width:16px;height:16px" id="<?php echo $edit_icon_id; ?>" title="Edit"
                     onmouseover="$(this).css({'cursor': 'pointer'});" 
                     onclick = "$('#<?php echo $edit_area_id; ?>').css({'display': 'block'}); $('#<?php echo $edit_comment_text_id; ?>').css({'display': 'none'});"/>
                <img src="images/delete.png" alt="Delete Icon" style="width:16px;height:16px" id="<?php echo $delete_icon_id; ?>" title="Delete"
                         class="deleteComment" onmouseover="$(this).css({'cursor': 'pointer'});"/>
            </div>
        
            <?php } //if ($created_by == $loggedIn_userId)  ?>
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
                               value ="<?php echo $loggedIn_userId; ?>"/>
                        <button id="<?php echo 'reportCommentSub_'.$id; ?>" name="<?php echo 'reportCommentSub_'.$id; ?>" class="reportCommentSub" type="button" style="font-size:11px;">Submit</button>
                        <button id="<?php echo 'reportCommentCancel_'.$id; ?>" name="<?php echo 'reportCommentCancel_'.$id; ?>" class="reportCommentCancel" type="button" style="font-size:11px;">Cancel</button>
                    </form>
                </div> <!--end report comment div-->
            </div> <!--end table cell for report comment-->
            <?php
                  } //end if ($user_logged_in)
            ?>
            </div> <!--end of table row -->
            </div> <!--end of table -->
    
            <?php      if ($user_logged_in && $created_by == $loggedIn_userId) { //edit comment form       
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
        
            <?php       } //end if($user_logged_in && $created_by == $loggedIn_userId) edit comment form
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
          <textarea rows="3" cols="45" name="newComment" id="newComment" ></textarea><br/>
          <input type="hidden" id = "commentEntityId" name = "commentEntityId" value ="<?php echo $entryId;?>"/>
          <input type="hidden" id = "user_login_status" name = "user_login_status" value ="<?php echo $user_logged_status;?>"/>
          <button id="new_commentSub" name="new_commentSub" class="search_button" type="button" <?php if ($user_logged_in == false) echo " disabled"; ?> style="margin-top:5px;">Comment</button>
        </form>  
     </div> <!--entry_record_value-->
   </div> <!--entry_record_value-->
   <!--- comments section finish --->
      
   <!--- rating section start --->
   <?php if($user_logged_in) {  //check if user logged in, if yes, show rating and report part?>
    <div class="entry_record">
      <div class="entry_record_title">Do you like this entry?</div>
      <div class="entry_record_value">
       
      <?php
          //get the like number
          $rm = new RatingManager();
          $like_entry = "";
          if ($rm->hasRatingByEntityLikeUser("ent".$entryId, $loggedIn_userId) ==1) {
              $like_entry = "Unlike";
          } else if ($rm->hasRatingByEntityDislikeUser("ent".$entryId, $loggedIn_userId) == 1  
          //         ||  $rm->hasRatingByEntityLikeUser("ent".$entryId, $loggedIn_userId) == 0  
          //         ||  $rm->hasRatingByEntityDislikeUser("ent".$entryId, $loggedIn_userId) == 0
                    ){
              $like_entry = "Like";
          } else {
              $like_entry = "";
          }
          $likeRating = $rm->CountRatingByLikeEntity("ent".$entryId);
          $likeRating = $likeRating > 0 ? $likeRating : 0;
          $dislikeRating = $rm->CountRatingByDislikeEntity("ent".$entryId);
          $dislikeRating = $dislikeRating > 0 ? $dislikeRating : 0;

          if ($like_entry != "") {
      ?>
        <div style="display:inline-block; width: 280px;">
            <span id ="<?php echo $loggedIn_userId."_entryLike_".$entryId; ?>" name="<?php echo $loggedIn_userId."_entryLike_".$entryId; ?>" class="entry_like"
                style="cursor: pointer; color: #0066cc;"><?php echo $like_entry."&nbsp;"; ?></span>
        </div>
      <?php
          } else { ?>
        <div style="display:inline-block; width: 280px;">
            <span id ="<?php echo $loggedIn_userId."_entryLike_".$entryId; ?>" name="<?php echo $loggedIn_userId."_entryLike_".$entryId; ?>" class="entry_like"
                  style="cursor: pointer; color: #0066cc;">Like</span>
            <span> | </span>
            <span id ="<?php echo $loggedIn_userId."_disentryLike_".$entryId; ?>" name="<?php echo $loggedIn_userId."_disentryLike_".$entryId; ?>" class="entry_dislike"
                  style="cursor: pointer; color: #0066cc;">Dislike</span>
        </div>        
      <?php  }
      ?>
        <span class="entry_like_num" style="display:''; font-size:12px; margin-left: 20px;"><?php echo $likeRating; ?> </span>
        <span style="font-size:12px;"><?php echo "Like(s)";?></span>
        <span> | </span>
        <span class="entry_dislike_num" style="display:''; font-size:12px;"><?php echo $dislikeRating; ?> </span>
        <span style="font-size:12px;"><?php echo "Dislike(s)";?></span>
      </div><!--entry_record_value-->
    </div><!--entry_record_value-->
    <!--- rating section end --->  
      
    <!--- report section start --->  
    <div class="entry_record">
      <div class="entry_record_title">Report this entry</div>
      <div class="entry_record_value">
          <!--start report entry div-->
            <div style="display:table-cell; ">
                <div id="<?php echo $loggedIn_userId."_reportEntryId_".$entryId; ?>" 
                     class="reportEntry" title="Report to Admin" style="cursor: pointer; color: #0066cc;">Report</div>
                <div id ="<?php echo 'reportEntryDiv_'.$entryId;?>" style="display: none; ">
                    <form name ="<?php echo 'reportEntryForm_'.$entryId;?>" id="<?php echo 'reportEntryForm_'.$entryId;?>" method="POST">
                        <div style="font-size:14px; margin-top:5px;">Please input the reason:</div>
                        <textarea rows="2" cols="40" name="<?php echo 'reportEntryReason_'.$entryId; ?>" 
                                  id="<?php echo 'reportEntryReason_'.$entryId; ?>"></textarea><br/>
                        <input type="hidden" id="<?php echo 'reportEntryBy_'.$entryId; ?>" 
                               name="<?php echo 'reportEntryBy_'.$entryId; ?>" 
                               value ="<?php echo $loggedIn_userId; ?>"/>
                        <button id="<?php echo 'reportEntrySub_'.$entryId; ?>" name="<?php echo 'reportEntrySub_'.$entryId; ?>" class="reportEntrySub" type="button" style="font-size:12px; margin-top:8px;">Submit</button>
                        <button id="<?php echo 'reportEntryCancel_'.$entryId; ?>" name="<?php echo 'reportEntryCancel_'.$entryId; ?>" class="reportEntryCancel" type="button" style="font-size:12px;margin-top:8px;">Cancel</button>
                    </form>
                </div> <!--end report entry div inner-->
            </div> <!--end table cell for report en-->
          
      </div><!--entry_record_value-->
    </div><!--entry_record_value--> 
    <!--- report section end --->  
 <?php } //end if ($user_logged_in) ?>
</div> <!--entry_index_container-->

  
<?php require("footer.php"); ?>