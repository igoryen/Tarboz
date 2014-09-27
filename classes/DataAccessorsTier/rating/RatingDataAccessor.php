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
      $created_on = $rating->getCreatedOn();

      $query_insert="INSERT INTO RATING VALUES ('', $entity_id, $like_user_id, $dislike_user_id, $created_on)";

      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query_insert);
      $last_inserted_id = mysql_insert_id();
      return $last_inserted_id;
    }

    public function updataRating($rating) {
      $id = $rating->getId();
      $entity_id = $rating->getEntityId();
      $like_user_id = $rating->getLikeUserId();
      $dislike_user_id = $rating->getDislikeUserId();
      $created_on = $rating->getCreatedOn();

      $query_update = "UPDATE RATING SET 
        rat_entity_id = $entity_id,
        rat_like_user_id = $like_user_id,
        rat_dislike_user_id = $dislike_user_id,
        rat_created_on = $created_on
      WHERE rat_rating_id = $id
      ";

      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query_update);
      return $result;
    }

    public function deleteRating($rating) {
      $id = $rating->getId();
      $query_delete = "DELETE FROM RATING WHERE rat_rating_id = $id";
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query_delete);
      return $result;
    }

    public function deleteRatingById($rating_id) {
      $query_delete = "DELETE FROM RATING WHERE rat_rating_id = $rating_id";
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query_delete);
      return $result;
    }

    public function getRatingById($rating_id) {
      $query = "SELECT * FROM RATING WHERE rat_rating_id = $rating_id";
      $dbHelper = new DBHelper();
      $rating = $dbHelper->executeQuery($query);
      return $rating;
    }

    public function getRatingByLikeUser($rating_like_user_id) {
      $query = "SELECT * FROM RATING WHERE rat_like_user_id = $rating_like_user_id";
      $dbHelper = new DBHelper();
      $ratings_by_like_user = $dbHelper->executeQuery($query);
      return $ratings_by_like_user;
    }

    public function getRatingByDislikeUser($rating_dislike_user_id) {
      $query = "SELECT * FROM RATING WHERE rat_dislike_user_id = $rating_dislike_user_id";
      $dbHelper = new DBHelper();
      $ratings_by_dislike_user = $dbHelper->executeQuery($query);
      return $ratings_by_dislike_user;
    }

  }

?>