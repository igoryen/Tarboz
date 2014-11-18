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
    sub_subscribed = 0
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
    sub_subscribed = 1
    WHERE sub_email_address = '".$email."' ";

    $result = $dbHelper->executeQuery($query_update);

    return $result;
    }
    else{

    $query_insert = " INSERT INTO ". SUBSCRIPTION." (sub_email_address, sub_subscribed) VALUES ('".$email."', 1)";
    //echo "SDA insert query: ".$query_insert;
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

    $query_insert = "INSERT INTO". SUBSCRIPTION." (sub_sub_email_address, sub_name, sub_location_name) 
                    VALUES ('".$email."', '".$name."', '".$location_name."')";
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
        $subscribe->setSubscription($list['sub_subscribed']);

    } // while


    return $subscribe;
  }
    
      //A private function that takes, email,username and resetcode
  public function email($email,$body,$subject) {
    $returnMsg = "";
      
  //  echo $body_text;
    $mail = new PHPMailer;
    $body=$body;

    $mail->isSMTP();
    $mail->Host = "ssl://smtp.gmail.com"; 
    $mail->SingleTo = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = 'tarboz.com@gmail.com';
    $mail->Password = 'habibtarboz';
    $mail->setFrom ('tarboz.com@gmail.com', 'Tarboz.com NewsLetter');
    $mail->addReplyTo('lfan9@myseneca.ca', 'Tarboz.com Newsletter');
    $mail->addAddress($email, 'Tarboz Newsletter Subscriber');
    $mail->WordWrap = 50;
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
    

    //if Email was not sent it should return a true bool to the user
    if(!$mail->send()) {
      //$mail->ClearAddresses();
       $returnMsg = "Mailer Error!";
    } else {
       $returnMsg = "Message sent!";
    }


    //successfully sent, then it should sent a true bool
    return $returnMsg;

  }


}

?>