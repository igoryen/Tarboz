<?PHP
  require_once DATA_ACCESSOR_DIR_RATING . 'RatingDataAccessor.php';

  class RatingManager {
    
    public function addRating ($rating) {
      $ratingDataAccessor = new RatingDataAccessor();
      $last_inserted_id = $ratingDataAccessor->addRating($rating);
      return $last_inserted_id;
    }

    public function deleteRating($rating) {
      $ratingDataAccessor = new RatingDataAccessor();
      $result = $ratingDataAccessor->deleteRating($rating);
      return $result;
    }

    public function deleteRatingById($rating_id){
      $ratingDataAccessor = new RatingDataAccessor();
      $result = $ratingDataAccessor->deleteRatingById($rating_id);
      return $result;
    }

    public function getRatingById($id) {
      $ratingDataAccessor = new RatingDataAccessor();
      $result = $ratingDataAccessor->getRatingById($id);
      return $result;   
    }

    public function getRatingByDislikeUser($rating_dislike_user_id) {
      $ratingDataAccessor = new RatingDataAccessor();
      $result = $ratingDataAccessor->getRatingByDislikeUser($rating_dislike_user_id);
      return $result;   
    }

    public function getRatingByLikeUser($rating_like_user_id) {
      $ratingDataAccessor = new RatingDataAccessor();
      $result = $ratingDataAccessor->getRatingByLikeUser($rating_like_user_id);
      return $result;   
    }

    public function updateRating($rating) {
      $ratingDataAccessor = new RatingDataAccessor();
      $result = $ratingDataAccessor->updateRating($rating);
      return $result;
    }
  }
?>