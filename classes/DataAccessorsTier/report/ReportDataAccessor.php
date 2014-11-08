<?PHP

require_once DB_CONNECTION . 'DBHelper.php';
require_once BUSINESS_DIR_REPORT . 'Report.php';
require_once DB_CONNECTION . 'datainfo.php';
require_once BUSINESS_DIR_COMMENT . 'CommentManager.php';
require_once BUSINESS_DIR_USER. 'UserManager.php';
require PHP_MAILER.'PHPMailerAutoload.php';

class ReportDataAccessor {

  public function addReport($report) {
    $dbHelper = new DBHelper();
    $dbHelper->connectToDB();

    //$id = $report->getId();
    $reason = mysqli_real_escape_string($dbHelper->getConnection(), $report->getReason());
    $dbHelper->closeConnection();
    $entity_for_report = $report->getEntityForReport();
    $entity_id = $report->getEntityId();
    $reported_by = $report->getReportedBy();

    $query_insert = "INSERT INTO ".REPORT." (rep_reason, rep_entity_for_report, rep_entity_id, rep_reported_by, rep_reported_on) 
                     VALUES ('".$reason."', '".$entity_for_report."', '".$entity_id."', '".$reported_by."', NOW())";

    $last_inserted_id = $dbHelper->executeInsertQuery($query_insert);
    return $last_inserted_id;
  }

  public function updateReport($report) {
    $dbHelper = new DBHelper();
    $dbHelper->connectToDB();
      
    $id = $report->getId();
    $reason = mysqli_real_escape_string($dbHelper->getConnection(),$report->getReason());
    $dbHelper->closeConnection();
      
    $entity_for_report = $report->getEntityForReport();
    $entity_id = $report->getEntityId();
    $reported_by = $report->getReportedBy();
    $curr_datetime  = date('Y-m-d H:i:s');

    $query_update = "UPDATE ".REPORT." SET
        rep_reason = '".$reason."',
        rep_entity_for_report = '".$entity_for_report."',
        rep_entity_id = '".$entity_id."', 
        rep_reported_by = '".$reported_by."', 
        rep_reported_on = '".$curr_datetime."'   
        WHERE rep_report_id = '".$id."'";

    $result = $dbHelper->executeQuery($query_update);
    return $result;
  }

  /*public function deleteReport($report) {
    $id = $report->getId();
    $query_delete = "DELETE FROM REPORT WHERE rep_report_id = $id";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query_delete);
    return $result;
  }

  public function deleteReportById($report_id) {
    $query_delete = "DELETE FROM REPORT WHERE rep_report_id = $report_id";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query_delete);
    return $result;
  }*/

  public function getReportById($report_id) {
    $query = "SELECT * FROM ".REPORT." WHERE rep_report_id = '".$report_id."'";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    $report = $this->getReport($result);
    return $report;
  }

  public function getReportByEntity($entity_for_report) {
    $query = "SELECT * FROM ".REPORT." WHERE rep_entity_for_report = '".$entity_for_report."' ORDER BY rep_reported_on DESC";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    $reports_by_entity = $this->getReportList($result);
    return $reports_by_entity;
  }

  public function getReportByEntityId($report_entity_id) {
    $query = "SELECT * FROM ".REPORT." WHERE rep_entity_id = '".$report_entity_id."' ORDER BY rep_reported_on DESC";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    $reports_by_entity_id = $this->getReportList($result);
    return $reports_entity_id;
  }

  public function getReportByUser($reported_by) {
    $query = "SELECT * FROM ".REPORT." WHERE rep_reported_by = '".$reported_by."' ORDER BY rep_reported_on DESC";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    $reports_by_user = $this->getReportList($result);
    return $reports_user;
  }
    
  public function getReportByReason($reason) {
    $query = "SELECT * FROM ".REPORT." WHERE rep_reason LIKE '%".$reason."%' ORDER BY rep_reported_on DESC";
    $dbHelper = new DBHelper();
    $result = $dbHelper->executeQuery($query);
    $reports_by_reason = $this->getReportList($result);
    return $reports_reason;
  }
    
  public function getReport($selectResult) {
    $report = new Report();
    while ($list = mysqli_fetch_assoc($selectResult) ) {
        $report->setId($list['rep_report_id']);
        $report->setReason($list['rep_reason']);
        $report->setEntityForReport($list['rep_entity_for_report']);
        $report->setEntityId($list['rep_entity_id']);
        $report->setReportedBy($list['rep_reported_by']);
        $report->setReportedOn($list['rep_reported_on']);
    }
    return $report;
  }
    
  public function getReportList($selectResult) {
    $reports = array();
    $count = 0;
    while ($list = mysqli_fetch_assoc($selectResult) ) {
        $report[$count] = new Report();
        $report[$count]->setId($list['rep_report_id']);
        $report[$count]->setReason($list['rep_reason']);
        $report[$count]->setEntityForReport($list['rep_entity_for_report']);
        $report[$count]->setEntityId($list['rep_entity_id']);
        $report[$count]->setReportedBy($list['rep_reported_by']);
        $report[$count]->setReportedOn($list['rep_reported_on']);
        $count++;
    }
    return $reports;
  }
    
  //A private function that takes, email,username and resetcode
  public function email($report) {
    $report_reason = $report->getReason();
    $entity_for_report = $report->getEntityForReport();
    $entity_id = $report->getEntityId();
    $reported_by_user_id = $report->getReportedBy();
    $reported_on = $report->getReportedOn();
    
    $userManager = new UserManager();
    $report_user = $userManager->getUserByUserId($reported_by_user_id);
    $report_user_name = $report_user->getLogin();
    
    $returnMsg = "";
      
  //  echo $body_text;
    $mail = new PHPMailer;
    $body="Dear Admin, <br>User who has the login name of ".$report_user_name." has a report for a ".$entity_for_report." having id#: ".$entity_id.
          " with the reason of ".$report_reason.", on ".$reported_on.".<br>Please process this report at your earliest convienence. Thank you!<br><br>Tarboz Team";

    $mail->isSMTP();
    $mail->Host = "ssl://smtp.gmail.com"; 
    $mail->SingleTo = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = 'tarboz.com@gmail.com';
    $mail->Password = 'habibtarboz';
    $mail->setFrom ('tarboz.com@gmail.com', 'Tarboz.com Report Team');
    $mail->addReplyTo('lfan9@myseneca.ca', 'Tarboz.com Report Team');
    $mail->addAddress('lilylinpeifan@gmail.com', 'Tarboz Admin Team');
    $mail->WordWrap = 50;
    $mail->isHTML(true);
    $mail->Subject = 'User Report for a '.$entity_for_report;
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