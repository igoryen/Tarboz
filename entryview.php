  <?php require("header.php");
  
  require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
  require_once BUSINESS_DIR_ENTRY . "Entry.php";

  require_once BUSINESS_DIR_COMMENT . 'CommentManager.php';
  require_once BUSINESS_DIR_USER. 'User.php';
  require_once BUSINESS_DIR_USER. 'UserManager.php';
  require_once BUSINESS_DIR_COMMENT . 'Comment.php';
  require_once BUSINESS_DIR_RATING . 'RatingManager.php';
  require_once BUSINESS_DIR_RATING . 'Rating.php';

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


//table_to_see_entry_values($entry); // for debugging

  ?>

  <div id="entry_index_container">    
    <mark>index</mark>.php
    
    <div class="entry_record">
      <div class="entry_record_title">id</div>
      <div class="entry_record_value"><?php echo $entry->getEntryId(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Language</div>
      <div class="entry_record_value"><?php echo $entry->getEntryLanguage(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Text</div>
      <div class="entry_record_value"><?php echo nl2br($entry->getEntryText()); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Verbatim</div>
      <div class="entry_record_value"><?php echo $entry->getEntryVerbatim(); ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Translit</div>
      <div class="entry_record_value"><?php echo nl2br($entry->getEntryTranslit()); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Authenticity status</div>
      <div class="entry_record_value"><?php echo $entry->getEntryAuthenStatusId(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Translation of</div>
      <div class="entry_record_value"><?php echo $entry->getEntryTranslOf(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Entry added by</div>
      <div class="entry_record_value"><?php echo $entry->getEntryUserId(); ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Media</div>
      <div class="entry_record_value"><?php echo $entry->getEntryMediaId(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Comment
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
    
    <div> 
        <div>
            <div style="display:table;">
            <div style="display:table-row;"><?php echo $created_user_name.":"; ?> </div>
            <div style="display:table-row;">
                
                <div style="display:table-cell; width:340px; padding-left:10px;">
                    <span id="<?php echo $edit_comment_text_id; ?>" style="display:'';"><?php echo $text; ?></span>  
                </div>
                <div style="display:table-cell;">
                    <span id ="<?php echo $comment_like_id; ?>" name="<?php echo $comment_like_id; ?>" class="comment_like"
                          style="font-family:Tahoma;font-size:12px;" onmouseover="$(this).css({'cursor': 'pointer'});">
                              <?php if($rating_content == "Like") { echo $rating_content."&nbsp;".$likeRating; } else {echo $rating_content."&nbsp;"; } ?>
                    </span>
                </div>
            
<?php if ($user_logged_in && $created_by == $user_id) { ?>
                <div style="display:table-cell;">
                    <img src="images/edit.png" alt="Edit Icon" style="width:16px;height:16px" id="<?php echo $edit_icon_id; ?>" title="Edit"
                         onmouseover="$(this).css({'cursor': 'pointer'});" 
                         onclick = "$('#<?php echo $edit_area_id; ?>').css({'display': 'block'}); $('#<?php echo $edit_comment_text_id; ?>').css({'display': 'none'});""/>
                    <img src="images/delete.png" alt="Delete Icon" style="width:16px;height:16px" id="<?php echo $delete_icon_id; ?>" title="Delete"
                         class="deleteComment" onmouseover="$(this).css({'cursor': 'pointer'});"/>
                </div>
        
<?php } //end if ($user_logged_in && $created_by == $user_id)
      else {   
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
                    </div>
                </div>
<?php
      } //end else if if ($user_logged_in && $created_by == $user_id)
?>
            </div> <!--end of table row -->
            </div> <!--end of table -->
    
<?php      if ($user_logged_in && $created_by == $user_id) {       
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
        
<?php } //end if($user_logged_in && $created_by == $user_id) ?>
    </div>        
    <br> 
<?php        
        
    } //end of foreach loop
  } else {
    echo "No comments for this entry.";
  } //end if 

 $user_logged_status = $user_logged_in ? "Y" : "N";
?>
      <form name="new_comment" id="new_comment" >
        <textarea rows="3" cols="60" name="newComment" id="newComment"></textarea><br/>
        <input type="hidden" id = "commentEntityId" name = "commentEntityId" value ="<?php echo $entryId;?>"/>
        <input type="hidden" id = "user_login_status" name = "user_login_status" value ="<?php echo $user_logged_status;?>"/>
        <button id="new_commentSub" name="new_commentSub" type="button">Comment</button>
      </form>
      <!--<div id="add_comment_result" style="display:none;"></div>-->
      </div>
    </div>
    
    <div class="entry_record" style="margin-left:0px">
      <div >Entry
        <?php
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
              onmouseover="$(this).css({'cursor': 'pointer'});">
              <?php if($like_entry == "Like") { echo $like_entry."&nbsp;"; } else {echo $like_entry."&nbsp;"; } ?>
        </span>
        <span class="entry_like_num" style="display:'';"><?php echo $likeRating; ?></span>
      </div>
    </div>
    
    
    <div class="entry_record" style="margin-left:0px">
      <div class="entry_record_title">Tags</div>
      <div class="entry_record_value"><?php echo $entry->getEntryTags(); ?></div>
    </div>

    <div class="entry_record" style="margin-left:0px">
      <div class="entry_record_title">Author</div>
      <div class="entry_record_value"><?php echo $entry->getEntryAuthorId(); ?></div>
    </div>

    <div class="entry_record" style="margin-left:0px">
      <div class="entry_record_title">Source</div>
      <div class="entry_record_value"><?php echo $entry->getEntrySourceId(); ?></div>
    </div>

    <div class="entry_record" style="margin-left:0px">
      <div class="entry_record_title">Use</div>
      <div class="entry_record_value"><?php echo $entry->getEntryUse(); ?></div>
    </div>
    
    <div class="entry_record" style="margin-left:0px">
      <div class="entry_record_title">Video link</div>
      <div class="entry_record_value">
        <embed width="420" height="315" src="<?php echo $entry->getEntryHttpLink(); ?>">
      </div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Creation date</div>
      <div class="entry_record_value"><?php echo $entry->getEntryCreationDate(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Edit</div>
      <div class="entry_record_value">
        <a href="entrycreate.php?id=<?php echo $entryId; ?>">Edit the entry</a><!-- #1-->
      </div>      
    </div>
    
    <?php
    if($entry->getEntryAuthenStatusId() == 1){
    // 1*
  ?><div class="entry_record">
      <div class="entry_record_title">Translate this into&nbsp;<?php
        // TODO: What if there are >1 requests (i.e. >1 languages) to translate this entry?
        $treqLang = $treq->getTreqLang();
        if(!null == $treqLang){
          echo $treq->getTreqLang();
        }else{
          echo "a language you know";
          
   }?></div>
      <div class="entry_record_value">
        <a href="entrycreate.php?id=<?php echo $entryId; ?>&a=t">Create a translation</a>
      </div>
    </div><?php
    }?>
    
  </div><!--entry_index_container-->
  
<?php require("footer.php"); ?>