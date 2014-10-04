<?PHP
  
  require_once DB_CONNECTION . 'DBHelper.php';
  require_once BUSINESS_DIR_REPORT . 'Report.php';
  require_once(DB_CONNECTION . 'datainfo.php');

  class ReportDataAccessor {

    public function addReport($report) {

      $id = $report->getId();
      $reason = $report->getReason();
      $entity_for_report = $report->getEntityForReport();
      $entity_id = $report->getEntityId();

      $query_insert="INSERT INTO ".REPORT." VALUES ('', ".$reason"., ".$entity_for_report", ".$entity_id);
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query_insert);
      $last_inserted_id = mysql_insert_id();
      return $last_inserted_id;
    }

    public function updataReport($report) {
      $id = $report->getId();
      $reason = $report->getReason();
      $entity_for_report = $report->getEntityForReport();
      $entity_id = $report->getEntityId();

      $query_update = "UPDATE ".REPORT." SET 
        rep_reason = $reason,
        rep_entity_for_report = $entity_for_report,
        rep_entity_id = $entity_id
      WHERE rep_report_id = $id
      ";

      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query_update);
      return $result;
    }

    public function deleteReport($report) {
      $id = $report->getId();
      $query_delete = "DELETE FROM ".REPORT." WHERE rep_report_id = ".$id;
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query_delete);
      return $result;
    }

    public function deleteReportById($report_id) {
      $query_delete = "DELETE FROM ".REPORT." WHERE rep_report_id = ".$report_id;
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query_delete);
      return $result;
    }
      
    public function getAllReports() {
      $query = "SELECT * FROM ".REPORT.;
      $dbHelper = new DBHelper();
      $result = $dbHelpler->executeQuery($query);
      $report_all = $this->getReportList($result);
      return $report_all;
    }

    public function getReportById($report_id) {
      $query = "SELECT * FROM ".REPORT." WHERE rep_report_id = ".$report_id;
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $report_by_id = $this->getReportList($result);
      return $report_by_id;
    }
      
    public function getReportByReason($reason) {
      $query = "SELECT * FROM ".REPORT." WHERE rep_reason LIKE %".$entity_for_report."%";
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $reports_by_entity = $this->getReportList($result);
      return $reports_by_entity;
    }

    public function getReportByEntity($entity_for_report) {
      $query = "SELECT * FROM ".REPORT." WHERE rep_entity_for_report = ".$entity_for_report;
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $reports_by_entity = $this->getReportList($result);
      return $reports_by_entity;
    }

    public function getReportByEntityId($report_entity_id) {
      $query = "SELECT * FROM ".REPORT." WHERE rep_entity_id = ".$report_entity_id;
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $reports_by_entity_id = $this->getReportList($result);
      return $reports_entity_id;
    }
    
    public function getReportList($selectResult) {
        $reports = array();
        $count = 0;
        while($list = mysqli_fetch_assoc($selectResult){
            $reports[$count] = new Report();
            $reports[$count]->setId($list['rep_report_id']);
            $reports[$count]->setReason($list['rep_reason']);
            $reports[$count]->setEntityForReport($list['rep_entity_for_report']);
            $reports[$count]->setEntityId($list['rep_entity_id']);
            $count++;
        }
        return $reports;
    }

  }

?>