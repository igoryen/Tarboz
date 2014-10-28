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
    //$delete_comment_id = '';
    //var_dump($_GET);
    //print_r($_POST);
    if($_POST) {

        $delete_comment_id = isset($_POST['deleteCommentId']) ? $_POST['deleteCommentId'] : "";
        print "post comment id: ". $delete_comment_id."<br/>\n";
        
        if ($delete_comment_id != "") {
          $commentManager = new CommentManager();
          $comment_to_delete = $commentManager->getCommentById($delete_comment_id);
          //print "deleted comment id: ". $comment_to_delete->getId()."<br/>\n";
           
          //Delete comment
          $deleted_coment = $commentManager->DeleteComment($comment_to_delete);
            
          if(!$deleted_coment ){
              echo "Deleting comment #".$delete_comment_id ." failed.";
          } else {
              echo "Deleting comment #".$delete_comment_id ." succeeded.";
          }
          
        } else {
           echo "Finding a comment to delete failed."; 
        }
        
    } else {
        echo "Posting a deleted comment failed.";
    } //end if($_POST)


 } 

?>