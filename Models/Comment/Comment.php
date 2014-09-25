<?PHP
class Comment{
  private $id;
  private $text;
  private $rating_id;
  private $created_by;

  public function getId() {
    return $this->id;
  } 

  public function setId($id) {
    $this->id = $id;
  } 

  public function getText() {
    return $this->text;
  }

  public function setText($text) {
    $this->text = $text;
  }

  public function getRatingId() {
    return $this->rating_id;
  }

  public function setRatingId($rating_id) {
    $this->rating_id = $rating_id;
  }

  public function getCreatedBy() {
    return $this->created_by;
  }

  public function setCreatedBy($created_by) {
    $this->created_by = $created_by;
  }

}

?>