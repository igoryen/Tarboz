<?PHP
class Rating {
		private id;
		private entity_id;
		private like_user_id;
		private dislike_user_id;
		private created_on;

		public function getId() {
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getEntityId() {
			return $this->entity_id;
		}

		public function setEntityId($entity_id){
			$this->entity_id = $entity_id;
		}

		public function getLikeUserId() {
			return $this->like_user_id;
		}

		public function setLikeUserId($like_user_id){
			$this->like_user_id = $like_user_id;
		}

		public function getDislikeUserId() {
			return $this->dislike_user_id;
		}

		public function setDislikeUserId($dislike_user_id){
			$this->dislike_user_id = $dislike_user_id;
		}

		public function getCreatedOn() {
			return $this->created_on;
		}

		public function setCreatedOn($created_on){
			$this->created_on = $created_on;
		}
}
?>