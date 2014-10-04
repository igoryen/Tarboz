<?PHP
  
  require_once DB_CONNECTION . 'DBHelper.php';
  require_once BUSINESS_DIR_SUBSCRIPTION . 'Subscription.php';
  require_once(DB_CONNECTION . 'datainfo.php');

  class SubscriptionDataAccessor {

    public function addSubscription($subscription) {

      $id = $subscription->getId();
      $email = $subscription->getEmail();
      $name = $subscription->getName();
      $location_name = $subscription->getLocationName();

      $query_insert="INSERT INTO ".SUBSCRIPTION." VALUES ('', $email, $name, ".$location_name.")";
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query_insert);
      $last_inserted_id = mysql_insert_id();
      return $last_inserted_id;
    }

    public function updataSubscription($subscription) {
      $id = $subscription->getId();
      $email = $subscription->getEmail();
      $name = $subscription->getName();
      $location_name = $subscription->getLocationName();

      $query_update = "UPDATE ".SUBSCRIPTION." SET 
        sub_email_address = ".$email.",
        sub_name = ".$name.",
        sub_location_name = ".$location_name."
        WHERE sub_subscribe_id = ".$id
      ;

      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query_update);
      return $result;
    }

    public function deleteSubscription($subscription) {
      $id = $subscription->getId();
      $query_delete = "DELETE FROM ".SUBSCRIPTION." WHERE sub_subscribe_id = ".$id;

      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query_delete);
      return $result;
    }

    public function deleteSubscriptionById($subscription_id) {
      $query_delete = "DELETE FROM ".SUBSCRIPTION." WHERE sub_subscribe_id = ".$subscription_id;

      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query_delete);
      return $result;
    }i
      
    public function getAllSubscriptions() {
      $query = "SELECT * FROM ".SUBSCRIPTION;
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $subscription_all = $this->getSubscriptionList($result);
      return $subscription_all;
    }

    public function getSubscriptionById($subscription_id) {
      $query = "SELECT * FROM ".SUBSCRIPTION." WHERE sub_subscription_id = ".$subscription_id;
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $subscription_by_id = $this->getSubscriptionList($result);
      return $subscription;
    }

    public function getSubscriptionByEmail($subscription_email) {
      $query = "SELECT * FROM ".SUBSCRIPTION." WHERE sub_email_address = ".$subscription_email;
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $subscriptions_by_email = $this->getSubscriptionList($result);
      return $subscriptions_by_email;
    }

    public function getSubscriptionByName($subscriber_name) {
      $query = "SELECT * FROM ".SUBSCRIPTION." WHERE sub_name = ".$subscriber_name;
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $subscriptions_by_name = $this->getSubscriptionList($result);
      return $subscriptions_by_name;
    }

    public function getSubscriptionByLocation($subscriber_location) {
      $query = "SELECT * FROM ".SUBSCRIPTION." WHERE sub_location_name = ".$subscriber_location;
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $subscriptions_by_location = $this->getSubscriptionList($result);
      return $subscriptions_by_location;
    }
      
    public function getSubscriptionList($selectResult) {
      $subscriptions = array();
      $count = 0;
      while($list = mysqli_fetch_assoc($selectResult) {
        $subscriptions[$count] = new Subscription();
        $subscription[$count]->setId($list['sub_subscribe_id']);
        $subscription[$count]->setEmail($list['sub_email_address']);
        $subscription[$count]->setName($list['sub_name']);
        $subscription[$count]->setLocationName($list['sub_location_name']);
        $count++;
      }
      return $subscriptions;
    }

  }

?>