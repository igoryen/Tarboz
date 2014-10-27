<?PHP

require_once DATA_ACCESSOR_DIR_RATING . 'RatingDataAccessor.php';

class RatingManager {

  public function addRating($rating) {
    $ratingDataAccessor = new RatingDataAccessor();
    $last_inserted_id = $ratingDataAccessor->addRating($rating);
    return $last_inserted_id;
  }
    
  public function updateRating($rating) {
    $ratingDataAccessor = new RatingDataAccessor();
    $result = $ratingDataAccessor->updateRating($rating);
    return $result;
  }

  public function deleteRating($rating) {
    $ratingDataAccessor = new RatingDataAccessor();
    $result = $ratingDataAccessor->deleteRating($rating);
    return $result;
  }

  public function deleteRatingById($rating_id) {
    $ratingDataAccessor = new RatingDataAccessor();
    $result = $ratingDataAccessor->deleteRatingById($rating_id);
    return $result;
  }

  public function getRatingById($id) {
    $ratingDataAccessor = new RatingDataAccessor();
    $result = $ratingDataAccessor->getRatingById($id);
    return $result;
  }
    
  public function CountRatingByLikeUser($rating_like_user_id) {
    $ratingDataAccessor = new RatingDataAccessor();
    $result = $ratingDataAccessor->CountRatingByLikeUser($rating_like_user_id);
    return $result;
  }

  public function CountRatingByDislikeUser($rating_dislike_user_id) {
    $ratingDataAccessor = new RatingDataAccessor();
    $result = $ratingDataAccessor->CountRatingByDislikeUser($rating_dislike_user_id);
    return $result;
  }

  public function CountRatingByLikeEntity($entity_id) {
    $ratingDataAccessor = new RatingDataAccessor();
    $result = $ratingDataAccessor->CountRatingByLikeEntity($entity_id);
    return $result;
  }
    
  public function CountRatingByDislikeEntity($entity_id) {
    $ratingDataAccessor = new RatingDataAccessor();
    $result = $ratingDataAccessor->CountRatingByDislikeEntity($entity_id);
    return $result;
  }

  public function getRatingByEntityLikeUser ($entity_id, $like_user_id) {
    $ratingDataAccessor = new RatingDataAccessor();
    $result = $ratingDataAccessor->getRatingByEntityLikeUser($entity_id, $like_user_id);
    return $result; 
  }
    
  public function getRatingByEntityDislikeUser ($entity_id, $dislike_user_id) {
    $ratingDataAccessor = new RatingDataAccessor();
    $result = $ratingDataAccessor->getRatingByEntityDislikeUser($entity_id, $dislike_user_id);
    return $result; 
  }
    
  public function hasRatingByEntityLikeUser ($entity_id, $like_user_id) {
    $ratingDataAccessor = new RatingDataAccessor();
    $result = $ratingDataAccessor->hasRatingByEntityLikeUser($entity_id, $like_user_id);
    return $result; 
  }
    
  public function hasRatingByEntityDislikeUser ($entity_id, $dislike_user_id) {
    $ratingDataAccessor = new RatingDataAccessor();
    $result = $ratingDataAccessor->hasRatingByEntityDislikeUser($entity_id, $dislike_user_id);
    return $result; 
  }

}

?>