<?php
  // Include utility files
  require_once '../config.php';    
  require_once BUSINESS_DIR_COMMENT . 'CommentManager.php';
  require_once BUSINESS_DIR_USER. 'User.php';
  require_once BUSINESS_DIR_COMMENT . 'Comment.php';
  require_once BUSINESS_DIR_RATING . 'RatingManager.php';
  require_once BUSINESS_DIR_RATING . 'Rating.php';

  session_start();
  $user_logged_in = true;
  //$user = isset($_SESSION['user']) ? $_SESSION['user'] : "";
  $user_id = "";
  if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
      $user_id = $user->getUserId();
  } else {
    $user_logged_in = false;
    //redirect to homepage
    header("Location: http://localhost/tarboz/");
  }
  
  
?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>TESTING COMMENT PAGE</title>
    <link rel="shortcut icon" href="../images/watermelon8.png"/>
   
    <!-- Extra libraries -->
    <script src ="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script>
      $(document).ready(function(){
        $("#new_comment").submit(function(event){
            var formdata = $("#new_comment").serialize();            
            $.ajax({
                url: "new_comment.php",
                type: "POST",
                data: formdata,
                success: 
                  function(data, status) {
                    //alert(data);
                    if (data.indexOf('succeed') >0) {
                      document.getElementById('add_comment_result').innerHTML=formdata.substring(formdata.indexOf("=")+1);
                    } else if (data.indexOf( 'fail') >0) {
                      alert(data);
                    }
                    window.location.reload(true);
                  },
                error:
                  function() {
                      alert("ajax error");
                  }                
            }); //end $.ajax()
            event.preventDefault();
        });
          
        $("button").click( function(event) {
            var this_id = $(this).attr('id');
            var edit_id_num = this_id.substring(this_id.indexOf("_")+1);
            var textarea_id = "#editCommentText_"+edit_id_num;
            var input_hidden_id = "#editCommentId_"+edit_id_num;

            //alert("edit id:"+edit_id_num);
            //alert("textarea_id: "+textarea_id);
            //alert("input_hidden_id: "+input_hidden_id);
            //alert("edit comment text: "+$(textarea_id).val());
            //alert("edit comment id: "+$(input_hidden_id).val());
            
            var editCommentData = encodeURIComponent($.trim ($(textarea_id).val() ));
            var editCommentId = encodeURIComponent($(input_hidden_id).val());

            $.ajax({
                url: "edit_comment.php",
                type: "POST",
                cache: false,
                data: 
                {
                    editComment : editCommentData,
                    editCommentId: editCommentId
                },
                success:
                  function(data, status) {
                    //alert(data);
                    if(data.indexOf("succeed")>0) {                                   
                       location.reload(true);
                    } else if (data.indexOf("fail") >0) {
                      alert(data);
                    }                                
                  }, //end of function(data, status) and success function
                error:
                  function() {
                    alert("ajax error");  
                  } 
                
             });//end $.ajax()*/
            event.preventDefault();
          });
          
        $('.deleteComment').click(	function (event) {
            var delete_comment_id = $(this).attr('id');
            //alert("delete comment id: "+delete_comment_id);
            var delete_id = delete_comment_id.substring(delete_comment_id.indexOf("_")+1);
            //alert("delete id: "+delete_id);
            $.ajax({
                url: "delete_comment.php",
                type: "POST",
                data: 
                {
                    deleteCommentId : delete_id
                },
                success:
                  function(data, status) {
                    //alert(data);
                    if(data.indexOf("succeed")>0) {                                   
                       location.reload(true);                            
                    } else if (data.indexOf("fail") >0) {
                      alert(data);
                    }                                
                  }, //end of function(data, status) and success function
                error:
                  function() {
                    alert("ajax error");  
                  }                 
            });//end $.ajax()*/
            event.preventDefault();
        });

        $('.comment_like').click( function (event) {
            //$(this).css({'display': 'none'}); 
            //$(this).next().css({'display': ''})
            var this_id = $(this).attr('id');
            var user_id = this_id.substring(0,this_id.indexOf("_")); //alert("user id: "+user_id);
            var comment_id = this_id.substring(this_id.lastIndexOf("_")+1); //alert("comment id: "+comment_id);
            var is_like = "";
            //alert("inner text: "+$(this).text());
            if($(this).text() == "Like" ){
                is_like = "Y";
                $(this).text("Unlike");
            } else if ($(this).text() == "Unlike") {
                is_like = "N";
                $(this).text("Like");
            }
            $.ajax({
               url: "comment_rating.php",
               type: "POST",
               data: {
                    commentId : comment_id,
                    userId : user_id,
                    isLike : is_like
                },
                success:
                   function(data, status) {
                       //alert(data);
                       if(data.indexOf("succeed")>0) {
                           
                       } else  if (data.indexOf("fail") >0){
                           alert(data);
                       }
                   },
                error:
                  function() {
                    alert("ajax error");  
                  }
            });//end $.ajax()*/
            event.preventDefault();
        });

      });
            

    </script>
  </head>
  <body>


      
<?php
 //Get all comments
  $commentManager = new CommentManager();
  $comments = $commentManager->getAllComments();

  echo "<br/><br/><br/><b>See All Comments</b><br>";
  $commentCount = count($comments);            

  if($commentCount > 0){
    foreach($comments as $coms){    

      $id         =   $coms->getId();
      $text       =   $coms->getText();
      $rating_id  =   $coms->getRatingId();
      $created_by =   $coms->getCreatedBy();

    echo "The comment is: ".$text."<br>"; 

    } // end of foreach loop
  } else {
      echo "There is not comments in database.";
  }// end of if statement
  //reset $commentCount
  $commentCount = 0;
  echo "<br/><br/><br/><b>************************</b><br>";

  //Get comments by user
  $commentManager = new CommentManager();

  if ($user_logged_in) {
      echo "<br/>=======Retrieve commment by user=====<br/> ";
      echo "user id: ".$user_id;
      $commentsByUser = $commentManager->getCommentByUser($user_id);
    
      $commentCount = count($commentsByUser);
      if ($commentCount > 0){
        echo "<br/><br/><b>Comments by ".$user->getFirstName()." </b><br/>";
        foreach($commentsByUser as $coms){
          $id         =   $coms->getId();
          $text       =   $coms->getText();
          $rating_id  =   $coms->getRatingId();
          $created_by =   $coms->getCreatedBy();
    
       
        echo "comment text: ". $text."<br/>";    
      } //end of foreach loop
      } else {
        echo "This user do not have any comments.";
      }// end if 
      //reset $commentCount
      $commentCount = 0;
      echo "<br/><br/><br/><b>************************</b><br>";
  } else {
      echo "Please log in to view the comments by user.";
  }
  //Get comment by entry
  $commentManager = new CommentManager();
  echo "<br/>=======Retrieve commment by entry=====<br/> ";
  $entry_id = "eng1";
  echo "Entry id: ".$entry_id."<br/>";
  $commentsByEntry = $commentManager->getCommentByEntry($entry_id);

  $commentCount = count($commentsByEntry);
  if ($commentCount > 0) {
    foreach($commentsByEntry as $coms){
      $id         =   $coms->getId();
      $text       =   $coms->getText();
      $rating_id  =   $coms->getRatingId();
      $created_by =   $coms->getCreatedBy();   
      echo "comment text: ". $text."<br/>";    
  } //end of foreach loop
  } else {
    echo "No comments for this entry.";
  } //end if 
  //reset $commentCount
  $commentCount = 0;
  echo "<br/><br/><br/><b>************************</b><br>";

  //Create a new comment
  echo "<br/>=======Create a commment=====<br/><br/> ";

?>
      
  <form name="new_comment" id="new_comment" >
      <textarea rows="3" cols="60" name="newComment" id="newComment"></textarea><br/>
<?php if($user_logged_in) { ?>
      <input type="submit" id="commentSub" value="Comment">
<?php } else { ?>
      <input type="submit" id="commentSub" value="Comment" disabled>
<?php } ?>
  </form>
  <div id="add_comment_result" style="display:none;"></div>
        
<?php        
  //Edit comment
  echo "<br/><br/><br/><b>************************</b><br>";
  echo "<br/>=======Edit commment and Delete=====<br/><br/> ";
  $commentManager = new CommentManager();
  $comments = $commentManager->getAllComments();

  $commentCount = count($comments);            

  if($commentCount > 0){
    foreach($comments as $coms){    

      $id         =   $coms->getId();
      $text       =   $coms->getText();
      $rating_id  =   $coms->getRatingId();
      $created_by =   $coms->getCreatedBy();
    //define ids for html tags in the loop
      $edit_icon_id = "editIcon_".$id;
      $edit_area_id = "edit_area_".$id;
      $edit_comment_text_id = "comment_text_id_".$id;
      $form_name = "formEditComment_".$id;
      $edit_comment_textarea = "editCommentText_".$id;
      $edit_comment_input_hidden = "editCommentId_".$id;
      $edit_comment_submit = "editCommentSub_".$id;
      $delete_icon_id ="deleteIcon_".$id;
      $comment_like_id = $created_by."_commentLike_".$id;
      $comment_unlike_id = $created_by."_commentUnlike_".$id;
        
      $ratingManager = new RatingManager();
      $rating_content = "";
      if ($ratingManager->hasRatingByEntityLikeUser("com".$id, $created_by) ==1) {
          $rating_content = "Unlike";
      } else if ($ratingManager->hasRatingByEntityDislikeUser("com".$id, $created_by) == 1 || 
                 $ratingManager->hasRatingByEntityLikeUser("com".$id, $created_by) == 0 || 
                 $ratingManager->hasRatingByEntityDislikeUser("com".$id, $created_by) == 0){
          $rating_content = "Like";
      }
?>
    
    <div> 
        <div>
			<div>The comment is: </div><span id="<?php echo $edit_comment_text_id; ?>"><?php echo $text; ?></span>     
<?php if ($user_logged_in && $created_by == $user_id) { ?>
            <img src="../images/edit.png" alt="Edit Icon" style="width:16px;height:16px" id="<?php echo $edit_icon_id; ?>" 
                  onmouseover="$(this).css({'cursor': 'pointer'});" 
                 onclick = "$('#<?php echo $edit_area_id; ?>').css({'display': 'block'});"/>
            <img src="../images/delete.png" alt="Delete Icon" style="width:16px;height:16px" id="<?php echo $delete_icon_id; ?>" 
                 class="deleteComment" onmouseover="$(this).css({'cursor': 'pointer'});" 
                 />
            <span id ="<?php echo $comment_like_id; ?>" name="<?php echo $comment_like_id; ?>" class="comment_like"
                  style="font-family:Tahoma;font-size:12px;" onmouseover="$(this).css({'cursor': 'pointer'});"><?php echo $rating_content; ?></span>
        </div>
<?php } //end if 
      if ($user_logged_in && $created_by == $user_id) {       
?>
        
        <div id="<?php echo $edit_area_id ?>" class="<?php echo $edit_area_id ?>" style="display:none;">
            <form name="<?php echo $form_name; ?>" id="<?php echo $form_name; ?>" method="POST">
                <textarea rows="2" cols="40" name="<?php echo $edit_comment_textarea; ?>" 
                                             id="<?php echo $edit_comment_textarea; ?>"><?php echo $text; ?></textarea><br/>
                <input type="hidden" id="<?php echo $edit_comment_input_hidden; ?>" 
                                     name="<?php echo $edit_comment_input_hidden; ?>" 
                                     value ="<?php echo $id; ?>"/>
                <button id="<?php echo $edit_comment_submit; ?>" name="<?php echo $edit_comment_submit; ?>" class="editComment" type="button" >Submit</button>
           </form> 
        </div>
        
<?php } //end if ?>
    </div>        
    <br> 
<?php
    } // end of foreach loop
  } else {
      echo "There is not comments in database.";
  }// end of if statement
  //reset $commentCount
  $commentCount = 0;
?>

</body>
</html>
