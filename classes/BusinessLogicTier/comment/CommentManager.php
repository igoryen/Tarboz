<?PHP
  require_once DATA_ACCESSOR_DIR_COMMENT . 'CommentDataAccessor.php';

  class CommentManager {
    /* page a - (for update & edit)
    part of the entry profile page & user profile page
    ---------------------------*/
    public function updateComment($comment) {
      $commentDataAccessor = new CommentDataAccessor();
      $result = $commentDataAccessor->updateComment($comment);
      return $result;
    }

    public function addComment($comment) {
      $commentDataAccessor = new CommentDataAccessor();
      $last_inserted_id = $commentDataAccessor->addComment($comment);
      return $last_inserted_id;
    }
    /* page b - (for the admin)*/
    public function deleteComment($comment) {
      $commentDataAccessor = new CommentDataAccessor();
      $result = $commentDataAccessor->deleteComment($comment);
      return $result;
    }

    public function deleteCommentById($comment_id){
      $commentDataAccessor = new CommentDataAccessor();
      $result = $commentDataAccessor->deleteCommentById($comment_id);
      return $result;
    }
      
    public function getAllComments(){
      $commentDataAccessor = new CommentDataAccessor();
      $result = $commentDataAccessor->getAllComments();
      $return $result;
    }

    public function getCommentById($id) {
      $commentDataAccessor = new CommentDataAccessor();
      $result = $commentDataAccessor->getCommentById($id);
      return $result;   
    }

    public function getCommentByRating($comment_rating_id) {
      $commentDataAccessor = new CommentDataAccessor();
      $result = $commentDataAccessor->getCommentByRating($comment_rating_id);
      return $result;   
    }

    public function getCommentByUser($comment_created_by) {
      $commentDataAccessor = new CommentDataAccessor();
      $result = $commentDataAccessor->getCommentByUser($comment_created_by);
      return $result;   
    }


  }
?>