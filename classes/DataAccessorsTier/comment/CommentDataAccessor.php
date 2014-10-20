<?PHP

require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_COMMENT . 'Comment.php';
require_once(DB_CONNECTION . 'datainfo.php');

class CommentDataAccessor {

  public function addComment($comment) {

    $id = $comment->getId();
    $text = $comment->getText();
    $rating_id = $comment->getRatingId();
    $created_by = $comment->getCreatedBy();

    $query_insert = "INSERT INTO COMMENT VALUES ('', $text, $rating_id, $created_by)";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query_insert);
    $last_inserted_id = mysql_insert_id();
    return $last_inserted_id;
  }

  public function updataComment($comment) {
    $id = $comment->getId();
    $text = $comment->getText();
    $rating_id = $comment->getRatingId();
    $created_by = $comment->getCreatedBy();

    $query_update = "UPDATE COMMENT SET
        com_text = $text,
        com_rating_id = $rating_id,
        com_created_by = $created_by
      WHERE com_comment_id = $id
      ";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query_update);
    return $result;
  }

  public function deleteComment($comment) {
    $id = $comment->getId();
    $query_delete = "DELETE FROM COMMENT WHERE com_comment_id = $id";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query_delete);
    return $result;
  }

  public function deleteCommentById($comment_id) {
    $query_delete = "DELETE FROM COMMENT WHERE com_comment_id = $comment_id";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query_delete);
    return $result;
  }

  public function getCommentById($comment_id) {
    $query = "SELECT * FROM COMMENT WHERE com_comment_id = $comment_id";

    $dbHelper = new DBHelper();
    $comment = $dbHelper->executeQuery($query);
    return $comment;
  }

  public function getCommentByUser($comment_created_by) {
    $query = "SELECT * FROM COMMENT WHERE com_created_by = $comment_created_by";

    $dbHelper = new DBHelper();
    $comments_by_user = $dbHelper->executeQuery($query);
    return $comments_by_user;
  }

  public function getCommentByRating($comment_rating_id) {
    $query = "SELECT * FROM COMMENT WHERE com_rating_id = $comment_rating_id";

    $dbHelper = new DBHelper();
    $comments_by_user = $dbHelper->executeQuery($query);
    return $comments_by_user;
  }

}

?>