<?PHP

require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_SUBSCRIPTION . 'Subscription.php';
require_once(DB_CONNECTION . 'datainfo.php');

class SubscriptionDataAccessor {

public function unsubscribe($email) {

    if($email==""){

        return false;
    }

    $dbHelper = new DBHelper();

    $emailexist= $this->getSubscriptionByEmail($email);

    if($emailexist->getId()!=""){

    //to unsubscribe the email
    $query_update = "UPDATE ".SUBSCRIPTION." SET
    subscribed = 0
    WHERE sub_email_address = '".$email."' ";

    $result = $dbHelper->executeQuery($query_update);

    return $result;
  }

  return false;
}


public function subscribe($email) {

    if($email==""){

        return false;
    }

    $dbHelper = new DBHelper();

    $emailexist= $this->getSubscriptionByEmail($email);

    if($emailexist->getId()!=""){

    $query_update = "UPDATE ".SUBSCRIPTION." SET
    subscribed = 1
    WHERE sub_email_address = '".$email."' ";

    $result = $dbHelper->executeQuery($query_update);

    return $result;
    }
    else{

    $query_insert = " INSERT INTO ". SUBSCRIPTION." VALUES ('', '$email',null,null,1)";

    $result = $dbHelper->executeQuery($query_insert);
    
    return $result;

    }

    return false;
}


  public function addSubscription($subscription) {

    $id = $subscription->getId();
    $email = $subscription->getEmail();
    $name = $subscription->getName();
    $location_name = $subscription->getLocationName();

    $query_insert = "INSERT INTO". SUBSCRIPTION." VALUES ('', $email, $name, $location_name)";
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

    $query_update = "UPDATE SUBSCRIPTION SET
        sub_email_address = $email,
        sub_name = $name,
        sub_location_name = $location_name
      WHERE sub_subscribe_id = $id
      ";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query_update);
    return $result;
  }

  public function deleteSubscription($subscription) {
    $id = $subscription->getId();
    $query_delete = "DELETE FROM SUBSCRIPTION WHERE sub_subscribe_id = $id";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query_delete);
    return $result;
  }

  public function deleteSubscriptionById($subscription_id) {
    $query_delete = "DELETE FROM SUBSCRIPTION WHERE sub_subscribe_id = $subscription_id";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query_delete);
    return $result;
  }

  public function getSubscriptionById($subscription_id) {
    $query = "SELECT * FROM SUBSCRIPTION WHERE sub_subscription_id = $subscription_id";

    $dbHelper = new DBHelper();
    $subscription = $dbHelper->executeQuery($query);
    return $subscription;
  }

  public function getSubscriptionByEmail($subscription_email) {

    $query = "SELECT * FROM ".SUBSCRIPTION." WHERE sub_email_address = '".$subscription_email."'";

    $dbHelper = new DBHelper();

    $subscriptions_by_email = $dbHelper->executeQuery($query);

    $result = $this->getSuscriber($subscriptions_by_email);


    return $result;
  }

  public function getSubscriptionByName($subscriber_name) {
    $query = "SELECT * FROM SUBSCRIPTION WHERE sub_name = $subscriber_name";

    $dbHelper = new DBHelper();
    $subscriptions_by_name = $dbHelper->executeQuery($query);
    return $subscriptions_by_name;
  }

  public function getSubscriptionByLocation($subscriber_location) {
    $query = "SELECT * FROM SUBSCRIPTION WHERE sub_location_name = $subscriber_location";

    $dbHelper = new DBHelper();

    $subscriptions_by_location = $dbHelper->executeQuery($query);

    $this->getSuscriber($subscriptions_by_location);

    //$subscriber = $this->getCommentList($result);

    return $subscriber;
  }

  //to return an object of subscribed email
  private function getSuscriber($selectResult) {

    $subscribe = new Subscription();

    while ($list = mysqli_fetch_assoc($selectResult))
    {

        $subscribe->setId($list['sub_subscribe_id']);
        $subscribe->setEmail($list['sub_email_address']);
        $subscribe->setName($list['sub_name']);
        $subscribe->setLocationName($list['sub_location_name']);
        $subscribe->setSubscription($list['subscribed']);

    } // while


    return $subscribe;
  }

}

?>