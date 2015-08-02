<?php
  require_once '../config.php';    
  require_once BUSINESS_DIR_RATING . 'RatingManager.php';
  require_once BUSINESS_DIR_USER. 'User.php';
  require_once BUSINESS_DIR_RATING . 'Rating.php';

  session_start();
  $user_logged_in = true;
  //$user = isset($_SESSION['user']) ? $_SESSION['user'] : "";
  if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
      $user_id = $user->getUserId();
  } else {
    $user_logged_in = false;
    //redirect to homepage
    //header("Location: http://localhost/tarboz/");
    header("Location: http://dev.tarboz.com/");
  }
  
  if ($user_logged_in) {

    //print_r($_POST);
    //echo "==========\n";
    if($_POST) {
        
        $comment_id = (isset($_POST['commentId']) && $_POST['commentId'] != 'undefined' ) ? $_POST['commentId'] : "";
        $user_id = (isset($_POST['userId']) && $_POST['userId'] != 'undefined' ) ? $_POST['userId'] : "";
        $is_like = (isset($_POST['isLike']) && $_POST['isLike'] != 'undefined') ? $_POST['isLike'] : "";
              
        $entity_id = "com".$comment_id;
        if ($comment_id != "" && $user_id !="" && $user_id > 0) {
            $rm = new RatingManager();
            $rating_like_exist = $rm->hasRatingByEntityLikeUser($entity_id, $user_id);
            $rating_dislike_exist = $rm->hasRatingByEntityDislikeUser($entity_id, $user_id);
            
            //echo "rating like exist id: ".$rating_like_exist; //$rm->hasRatingByEntityLikeUser($entity_id, $user_id);        
            //echo "rating dislike exist id: ".$rating_dislike_exist;
            
            //add new rating
            if ($rating_like_exist == 0 && $rating_dislike_exist == 0) { 
                if($is_like == "Y") {
                    $like_user_id = $user_id;
                    $dislike_user_id = NULL;
                } else if ($is_like == "N") {
                    $dislike_user_id = $user_id; 
                    $like_user_id = NULL;
                }
                
                //if ($comment_id != "" && $user_id !="") {
                    $new_rating = new Rating();
                    $new_rating->setEntityId($entity_id);
                    $new_rating->setLikeUserId($like_user_id); 
                    $new_rating->setDislikeUserId($dislike_user_id);
            
                    $new_rm = new RatingManager();
                    $new_rating_id = $new_rm->addRating($new_rating);
                    
                    if($new_rating_id >0) {
                        echo "Adding a new rating succeeded.";                        
                    } else {
                        echo "Adding a new rating failed.";
                    }          
               /*  } else {
                    echo "Passing comment id and user id are failed.";
                 }*/
            } 
            else if ($rating_like_exist == 1 || $rating_dislike_exist == 1){ //update a rating
                $ratingManager = new RatingManager();
                
                if($is_like == "Y") {
                    $like_user_id = $user_id;
                    $dislike_user_id = NULL;
                    $edited_rating = $ratingManager->getRatingByEntityDislikeUser($entity_id, $user_id);
                } else if ($is_like == "N") {
                    $like_user_id = NULL;
                    $dislike_user_id = $user_id;
                    $edited_rating = $ratingManager->getRatingByEntityLikeUser($entity_id, $user_id);
                }
                //if($comment_id != "" && $user_id !="") {
                    
                    $edited_rating = isset($edited_rating) ? $edited_rating : "";
                    $edited_rating->setLikeUserId($like_user_id);
                    $edited_rating->setDislikeUserId($dislike_user_id);
                    //echo "Updating rating #".$edited_rating->getId() ."\n";
                    //echo "Updating rating like id".$edited_rating->getLikeUserId() ."\n";
                    //echo "Updating rating dislike id".$edited_rating->getDislikeUserId() ."\n";
                
                    $updated_rating = $ratingManager->updateRating($edited_rating);
                    
                    if(!$updated_rating ){
                        echo "Updating rating #".$edited_rating->getId() ." failed.";
                    } else {
    
                    //$_SESSION["updated_rating"] = $edited_rating;
                    //print "edited comment text: ". $_SESSION["updated_comment"]->getText()."<br/>\n";
                    echo "Updating rating #".$edited_rating->getId() ." succeeded.";
                    echo "like_num=".$ratingManager->CountRatingByLikeEntity($entity_id);
                    }
               /* } else {
                    echo "Passing comment id and user id are failed.";
                }*/
            } //end else update a rating
        } else { 
            echo "Passing comment id and user id are failed.";
        } //end if ($comment_id != "" && $user_id !="")
    } else {
        echo "Post a rating is failed.";
    } //end if($_POST)




  } //end if ($user_logged_in)

?>