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
  
  if ($user_logged_in) {
    $new_comment_id = '';

    //print_r($_POST);
    if($_POST) {

        $comment_text = isset($_POST['newComment']) ? $_POST['newComment'] : "";
        if ($comment_text != "") {
          $new_comment = new Comment();
          $new_comment->setText($comment_text); 
          $new_comment->setCreatedBy($user->getUserId());
          $new_comment->setRatingId('');
          //$com_entry_id = $entryId;
          $com_entry_id = 'eng2';
          $new_comment->setEntryId($com_entry_id);
        
          $commentManager = new CommentManager();
          $new_comment_id = $commentManager->addComment($new_comment);
          
        } 
    }

    if($new_comment_id >0) {
        echo "Adding a new comment succeeded.";
    } else {
        echo "Adding a new comment failed.";
    }


  } //end if($_POST)

?>