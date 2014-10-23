<?php
  require_once '../config.php';    
  require_once BUSINESS_DIR_COMMENT . 'CommentManager.php';
  require_once BUSINESS_DIR_USER. 'User.php';
  require_once BUSINESS_DIR_COMMENT . 'Comment.php';

  session_start();
  $user_logged_in = true;
  //$user = isset($_SESSION['user']) ? $_SESSION['user'] : "";
  if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
      $user_id = $user->getUserId();
  } else {
    $user_logged_in = false;
    //redirect to homepage
    header("Location: http://localhost/tarboz/");
  }
 
  //echo "here: ".$_SERVER['REQUEST_METHOD'];
  if ($user_logged_in) {
    //$edit_comment_id = '';
    //var_dump($_GET);
    //print_r($_POST);
    if($_POST) {

        $comment_text = isset($_POST['editComment']) ? $_POST['editComment'] : "";
        //print "post comment text: ". $comment_text."<br/>\n";
        
        $edit_comment_id = isset($_POST['editCommentId']) ? $_POST['editCommentId'] : "";
        //print "post comment id: ". $edit_comment_id."<br/>\n";
        if ($edit_comment_id != "") {
          $commentManager = new CommentManager();
          $edited_comment = $commentManager->getCommentById($edit_comment_id);
          //print "edited comment id: ". $edited_comment->getId()."<br/>";
          //print "edited comment text: ". $edited_comment->getText()."<br/>";
          //print "edited comment rating: ". $edited_comment->getRatingId()."<br/>";
          //print "edited comment user: ". $edited_comment->getCreatedBy()."<br/>";
          //print "edited comment entry id: ". $edited_comment->getEntryId()."<br/>";
            
          $edited_comment->setText($comment_text); 
          
          $updated_comment = $commentManager->updateComment($edited_comment);
            
          if(!$updated_comment ){
              echo "Updating comment #".$edit_comment_id ." failed.";
          } else {

              $_SESSION["updated_comment"] = $edited_comment;
              //print "edited comment text: ". $_SESSION["updated_comment"]->getText()."<br/>\n";
              echo "Updating comment #".$edit_comment_id ." succeeded.";
          }
          
        } else {
           echo "Finding a comment to edit failed."; 
        }
        
    } else {
        echo "Posting an edited comment failed.";
    } //end if($_POST)


 } 

?>