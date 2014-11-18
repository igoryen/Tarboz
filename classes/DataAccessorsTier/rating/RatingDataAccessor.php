<?PHP

require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_RATING . 'Rating.php';
require_once(DB_CONNECTION . 'datainfo.php');

class RatingDataAccessor {

  public function addRating($rating) {

    $id = $rating->getId();
    $entity_id = $rating->getEntityId();
    $like_user_id = $rating->getLikeUserId();
    $dislike_user_id = $rating->getDislikeUserId();
    //echo "RatingDataAccessor->addRating dislike_user_id: ".$dislike_user_id;

    $query_insert = "INSERT INTO ".RATING." (rat_entity_id, rat_like_user_id, rat_dislike_user_id, rat_created_on)
                     VALUES ('".$entity_id."', '".$like_user_id."', '".$dislike_user_id."', NOW())";
    //echo "RatingDataAccessor->addRating insert query: ".$query_insert."\n";
    $dbHelper = new DBHelper();
    $last_inserted_id = $dbHelper->executeInsertQuery($query_insert);
    return $last_inserted_id;
  }

  public function updateRating($rating) {
    $id = $rating->getId();
    $entity_id = $rating->getEntityId();
    $like_user_id = $rating->getLikeUserId();
    $dislike_user_id = $rating->getDislikeUserId();
    
    $curr_datetime  = date('Y-m-d H:i:s');
    if(isset($like_user_id)) {
        $query_update = "UPDATE ".RATING." SET 
            rat_like_user_id = '".$like_user_id.
            "', rat_dislike_user_id = NULL, rat_created_on = '".$curr_datetime. 
            "' WHERE rat_rating_id = '".$id."' AND rat_entity_id = '".$entity_id."'";
    } else if (isset($dislike_user_id)) {
        $query_update = "UPDATE ".RATING." SET 
            rat_like_user_id = NULL, rat_dislike_user_id = '".$dislike_user_id.
            "', rat_created_on = '".$curr_datetime. 
            "' WHERE rat_rating_id = '".$id."' AND rat_entity_id = '".$entity_id."'";
    }
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query_update);
    return $result;
  }

  public function deleteRating($rating) {
    $id = $rating->getId();
    $query_delete = "DELETE FROM ".RATING." WHERE rat_rating_id = $id";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query_delete);
    return $result;
  }

  public function deleteRatingById($rating_id) {
    $query_delete = "DELETE FROM ".RATING." WHERE rat_rating_id = $rating_id";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query_delete);
    return $result;
  }

  public function getRatingById($rating_id) {
    $query = "SELECT * FROM ".RATING." WHERE rat_rating_id = '".$rating_id."'";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    $rating = $this->getRating($result);
    return $rating;
  }

  public function CountRatingByLikeUser($rating_like_user_id) {
    $query = "SELECT * FROM ".RATING." WHERE rat_like_user_id = '".$rating_like_user_id."'";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    $ratings_by_like_user = $this->CountRatings($result);
    return $ratings_by_like_user;
  }

  public function CountRatingByDislikeUser($rating_dislike_user_id) {
    $query = "SELECT * FROM ".RATING." WHERE rat_dislike_user_id = '".$rating_dislike_user_id."'";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    $ratings_by_dislike_user = $this->CountRatings($result);
    return $ratings_by_dislike_user;
  }
    
  public function CountRatingByLikeEntity($entity_id) {
      $query = "SELECT * FROM ".RATING." WHERE rat_entity_id = '".$entity_id.
               "' AND (rat_like_user_id IS NOT NULL AND rat_like_user_id > 0)";
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $ratings_by_like_entity = $this->CountRatings($result);
      return $ratings_by_like_entity;
  }
    
  public function CountRatingByDislikeEntity($entity_id) {
      $query = "SELECT * FROM ".RATING." WHERE rat_entity_id = '".$entity_id.
               "' AND (rat_dislike_user_id IS NOT NULL AND rat_dislike_user_id > 0)";
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $ratings_by_dislike_entity = $this->CountRatings($result);
      return $ratings_by_dislike_entity;
  }
    
  public function getRatingByEntityLikeUser ($entity_id, $like_user_id) {
      $query = "SELECT * FROM ".RATING." WHERE rat_entity_id = '".$entity_id.
               "' AND rat_like_user_id = '".$like_user_id."'";
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $ratings_by_entity_like_user = $this->getRating($result);
      return $ratings_by_entity_like_user;
  }
    
  public function getRatingByEntityDislikeUser ($entity_id, $dislike_user_id) {
      $query = "SELECT * FROM ".RATING." WHERE rat_entity_id = '".$entity_id.
               "' AND rat_dislike_user_id = '".$dislike_user_id."'";
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $ratings_by_entity_dislike_user = $this->getRating($result);
      return $ratings_by_entity_dislike_user;
  }
    
  public function hasRatingByEntityLikeUser ($entity_id, $like_user_id) {
      $query = "SELECT * FROM ".RATING." WHERE rat_entity_id = '".$entity_id.
               "' AND rat_like_user_id = '".$like_user_id."'";
      $dbHelper = new DBHelper();
      $has_ratings = $dbHelper->getNumOfRows($query);
      //echo "RatingDataAccessor->has_ratings".$has_ratings;
      return $has_ratings;
  }
    
  public function hasRatingByEntityDislikeUser ($entity_id, $dislike_user_id) {
      $query = "SELECT * FROM ".RATING." WHERE rat_entity_id = '".$entity_id.
               "' AND rat_dislike_user_id = '".$dislike_user_id."'";
      $dbHelper = new DBHelper();
      $has_ratings = $dbHelper->getNumOfRows($query);
      //echo "RatingDataAccessor->has_ratings".$has_ratings;
      return $has_ratings;
  }
  
   public function getRating($selectResult) {
        $rating = new Rating();
        while($list = mysqli_fetch_assoc($selectResult)){
            $rating->setId($list['rat_rating_id']);
            $rating->setEntityId($list['rat_entity_id']);
            $rating->setLikeUserId($list['rat_like_user_id']);
            $rating->setDislikeUserId($list['rat_dislike_user_id']);
            $rating->setCreatedOn($list['rat_created_on']);
        }//end while
        
        return $rating;
    }
      
    public function getRatingList($selectResult) {
        $ratings = array();
        $count = 0;
        while ($list = mysqli_fetch_assoc($selectResult)) {
            $ratings[$count] = new Rating();
            $ratings[$count]->setId($list['rat_rating_id']);
            $ratings[$count]->setEntityId($list['rat_entity_id']);
            $ratings[$count]->setLikeUserId($list['rat_like_user_id']);
            $ratings[$count]->setDislikeUserId($list['rat_dislike_user_id']);
            $ratings[$count]->setCreatedOn($list['rat_created_on']);
            $count++;
        }
        return $ratings;      
    }
    
    public function CountRatings($selectResult) {
        $ratings = array();
        $count = 0;
        while ($list = mysqli_fetch_assoc($selectResult)) {
            $ratings[$count] = new Rating();
            $ratings[$count]->setId($list['rat_rating_id']);
            $ratings[$count]->setEntityId($list['rat_entity_id']);
            $ratings[$count]->setLikeUserId($list['rat_like_user_id']);
            $ratings[$count]->setDislikeUserId($list['rat_dislike_user_id']);
            $ratings[$count]->setCreatedOn($list['rat_created_on']);
            $count++;
        }
        return count($ratings);        
    }

}

?>