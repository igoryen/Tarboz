<?PHP
	require_once DATA_ACCESSOR_DIR_COMMENT . 'CommentDataAccessor.php';

	class CommentManager {

		public function addComment ($comment) {
			$commentDataAccessor = new CommentDataAccessor();

			$last_inserted_id = $commentDataAccessor->addComment($comment);

			return $last_inserted_id;
		}

		public function updateComment($comment) {
			$commentDataAccessor = new CommentDataAccessor();

			$result = $commentDataAccessor->updateComment($comment);

			return $result;
		}

		public function deleteComment($comment) {
			$commentDataAccessor = new CommentDataAccessor();

			$result = $commentDataAccessor->deleteComment($comment);

			return $result;
		}

		public function deleteCommentById($comment->id){
			$commentDataAccessor = new CommentDataAccessor();

			$result = $commentDataAccessor->deleteCommentById($comment->id);

			return $result;
		}

		public function getCommentById($id) {
			$commentDataAccessor = new CommentDataAccessor();

			$result = $commentDataAccessor->getCommentById($id);

			return $result;		
		}

		public function getCommentByUser($comment->created_by) {
			$commentDataAccessor = new CommentDataAccessor();

			$result = $commentDataAccessor->getCommentByUser($comment->created_by);

			return $result;		
		}

		public function getCommentByRating($comment->rating_id) {
			$commentDataAccessor = new CommentDataAccessor();

			$result = $commentDataAccessor->getCommentByRating($comment->rating_id);

			return $result;		
		}

	}

?>