<?PHP
class Report {
  private id;
  private reason;
  private entity_for_report;
  private entity_id;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getReason() {
    return $this->reason;
  }

  public function setReason($reason) {
    $this->reason = $reason;
  }

  public function getEntityForReport() {
    return $this->entity_for_report;
  }

  public function setEntityForReport($entity_for_report) {
    $this->entity_for_report = $entity_for_report;
  }

  public function getEntityId() {
    return $this->entity_id;
  }

  public function setEntityId($entity_id) {
    $this->entity_id = $entity_id;
  }
}
?>