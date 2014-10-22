<?php
  // Include utility files
  require_once '../config.php';    
  require_once BUSINESS_DIR_COMMENT . 'CommentManager.php';
  require_once BUSINESS_DIR_USER. 'User.php';
  require_once BUSINESS_DIR_COMMENT . 'Comment.php';

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
      $edit_icon_id = "edit_icon_".$id;
      $edit_area_id = "edit_area_".$id;
      $edit_comment_text_id = "comment_text_id_".$id;
      $form_name = "formEditComment_".$id;
      $edit_comment_textarea = "editCommentText_".$id;
      $edit_comment_input_hidden = "editCommentId_".$id;
      $edit_comment_submit = "editCommentSub_".$id;
        
?>
    
    <div> 
        <div>The comment is: <span id="<?php echo $edit_comment_text_id; ?>"><?php echo $text; ?></span> 
        
<?php if ($user_logged_in && $created_by == $user_id) { ?>
            <img src="../images/edit.png" alt="Edit Icon" style="width:16px;height:16px" id="<?php echo $edit_icon_id ?>" 
                 class="<?php echo $edit_icon_id ?>" onmouseover="$(this).css({'cursor': 'pointer'});" 
                 onclick = "$('#<?php echo $edit_area_id ?>').css({'display': 'block'});"/>
<?php } //end if 
      //if ($user_logged_in && 
      if ($user_logged_in && $created_by == $user_id) {       
?>
        </div>
        <div id="<?php echo $edit_area_id ?>" class="<?php echo $edit_area_id ?>" style="display:none;">
                <script>
                    var sendData = function() { 
                        //var form_id = "#"+"<?php echo $form_name; ?>";
                        var textarea_id = "#"+"<?php echo $edit_comment_textarea; ?>";
                        var input_hidden_id = "#"+"<?php echo $edit_comment_input_hidden; ?>";
                        //var submit_id = "#"+"<?php echo $edit_comment_submit; ?>";
                        
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
                    };
                </script>
            <form name="<?php echo $form_name; ?>" id="<?php echo $form_name; ?>" method="POST">
                <textarea rows="2" cols="40" name="<?php echo $edit_comment_textarea; ?>" 
                                             id="<?php echo $edit_comment_textarea; ?>"><?php echo $text; ?></textarea><br/>
                <input type="hidden" id="<?php echo $edit_comment_input_hidden; ?>" 
                                     name="<?php echo $edit_comment_input_hidden; ?>" 
                                     value ="<?php echo $id; ?>"/>
                <button id="<?php echo $edit_comment_submit; ?>" name="<?php echo $edit_comment_submit; ?>" type="button" onclick="sendData();">Submit</button>
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
