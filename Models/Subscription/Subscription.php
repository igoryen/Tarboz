<?PHP
class Subscription {
  private id;
  private email;
  private name;
  private location_name;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }
  
  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }
  
  public function getLocationName() {
    return $this->location_name;
  }

  public function setLocationName($location_name) {
    $this->location_name = $location_name;
  }

}
?>