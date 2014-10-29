<?PHP

require_once DATA_ACCESSOR_DIR_SUBSCRIPTION . 'SubscriptionDataAccessor.php';

class SubscriptionManager {

  
  public function subscribe($email) {

    $subscriptionDataAccessor = new SubscriptionDataAccessor();

    $result = $subscriptionDataAccessor->subscribe($email);
  
    return $result;
  }

  public function unsubscribe($email) {

    $subscriptionDataAccessor = new SubscriptionDataAccessor();

    $result = $subscriptionDataAccessor->unsubscribe($email);
  
    return $result;
  }

  public function addSubscription($subscription) {
    $subscriptionDataAccessor = new SubscriptionDataAccessor();
    $last_inserted_id = $subscriptionDataAccessor->addSubscription($subscription);
    return $last_inserted_id;
  }

  public function deleteSubscription($subscription) {
    $subscriptionDataAccessor = new SubscriptionDataAccessor();
    $result = $subscriptionDataAccessor->deleteSubscription($subscription);
    return $result;
  }

  public function deleteSubscriptionById($subscription_id) {
    $subscriptionDataAccessor = new SubscriptionDataAccessor();
    $result = $subscriptionDataAccessor->deleteSubscriptionById($subscription_id);
    return $result;
  }

  public function getSubscriptionByEmail($subscription_email) {
    $subscriptionDataAccessor = new SubscriptionDataAccessor();
    $result = $subscriptionDataAccessor->getSubscriptionByEntity($subscription_email);
    return $result;
  }

  public function getSubscriptionById($id) {
    $subscriptionDataAccessor = new SubscriptionDataAccessor();
    $result = $subscriptionDataAccessor->getSubscriptionById($id);
    return $result;
  }

  public function getSubscriptionByLocation($subscriber_location) {
    $subscriptionDataAccessor = new SubscriptionDataAccessor();
    $result = $subscriptionDataAccessor->getSubscriptionByEntityId($subscriber_location);
    return $result;
  }

  public function getSubscriptionByName($subscriber_name) {
    $subscriptionDataAccessor = new SubscriptionDataAccessor();
    $result = $subscriptionDataAccessor->getSubscriptionByEntityId($subscriber_name);
    return $result;
  }

  public function updateSubscription($subscription) {
    $subscriptionDataAccessor = new SubscriptionDataAccessor();
    $result = $subscriptionDataAccessor->updateSubscription($subscription);
    return $result;
  }

}

?>