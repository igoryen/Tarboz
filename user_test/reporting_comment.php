<?php
  require_once '../config.php';    
  require_once BUSINESS_DIR_REPORT . 'ReportManager.php';
  require_once BUSINESS_DIR_USER. 'User.php';
  require_once BUSINESS_DIR_REPORT . 'Report.php';
  require_once BUSINESS_DIR_BADWORD . 'BadwordManager.php';  
  require_once BUSINESS_DIR_BADWORD . 'Badword.php';  

  session_start();
  $user_logged_in = true;
  //$user = isset($_SESSION['user']) ? $_SESSION['user'] : "";
  if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
      $user_id = $user->getUserId();
  } else {
    $user_logged_in = false;
    //redirect to homepage
    header("Location: http://localhost/tarboz/");
  }
  
  if ($user_logged_in) {
    $new_report_id = 0;

    //print_r($_POST);
    if($_POST) {

        $report_reason = (isset($_POST['reportReason']) && $_POST['reportReason']!='undefined') ? $_POST['reportReason'] : "";
        $entity_for_report = (isset($_POST['entityForReport']) && $_POST['entityForReport'] != 'undefined') ? $_POST['entityForReport'] : "";
        $entity_id = (isset($_POST['entityId']) && $_POST['entityId'] != 'undefined') ? $_POST['entityId'] : "";
        $reported_by = (isset($_POST['reportedBy']) && $_POST['reportedBy']!='undefined')? $_POST['reportedBy'] : "";
        
        if ($report_reason != "" && $entity_for_report !="" 
            && $entity_id!="" && $reported_by!="" ) {
          
          //handle badword
          $bw_handler = new BadwordManager();
          $bw_list = $bw_handler->getBadWordList();
          //print_r($bw_list);
          $replacement = $bw_handler->getReplacementList();
          //print_r($replacement);
          $filtered_report_reason = preg_replace($bw_list, $replacement, $report_reason);
          //echo "new report filtered report: ".$filtered_report_reason;
        
          //Add a new record to report table
          $new_report = new Report(); 
          $new_report->setReason($filtered_report_reason); 
          $new_report->setEntityForReport($entity_for_report);
          $new_report->setEntityId($entity_id);
          $new_report->setReportedBy($reported_by);

        
          $reportManager = new ReportManager();
          $new_report_id = $reportManager->addReport($new_report);
            
          if($new_report_id >0) {
              echo "Adding a new comment succeeded.";
              
              //send a notification to admin
              $rm = new ReportManager();
              $new_report = $rm->getReportById($new_report_id);
              $result = $rm->sendNoteToAdmin($new_report);
              
              echo $result;              
          } else {
                echo "Adding a new comment failed.";
          }
          
        } else {
            echo "Posting all valid report fields is failed.";
        }
    } //end if($_POST)
    else {
        echo "Posting a report is failed.";
    }




  } //end if ($user_logged_in)

?>