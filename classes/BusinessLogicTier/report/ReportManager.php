<?PHP
  require_once DATA_ACCESSOR_DIR_REPORT . 'ReportDataAccessor.php';

  class ReportManager {

    public function addReport ($report) {
      $reportDataAccessor = new ReportDataAccessor();
      $last_inserted_id = $reportDataAccessor->addReport($report);
      return $last_inserted_id;
    }

    public function deleteReport($report) {
      $reportDataAccessor = new ReportDataAccessor();
      $result = $reportDataAccessor->deleteReport($report);
      return $result;
    }

    public function deleteReportById($report_id){
      $reportDataAccessor = new ReportDataAccessor();
      $result = $reportDataAccessor->deleteReportById($report_id);
      return $result;
    }

    public function getReportByEntity($entity_for_report) {
      $reportDataAccessor = new ReportDataAccessor();
      $result = $reportDataAccessor->getReportByEntity($entity_for_report);
      return $result;   
    }

    public function getReportByEntityId($report_entity_id) {
      $reportDataAccessor = new ReportDataAccessor();
      $result = $reportDataAccessor->getReportByEntityId($report_entity_id);
      return $result;   
    }

    public function getReportById($id) {
      $reportDataAccessor = new ReportDataAccessor();
      $result = $reportDataAccessor->getReportById($id);
      return $result;   
    }

    public function updateReport($report) {
      $reportDataAccessor = new ReportDataAccessor();
      $result = $reportDataAccessor->updateReport($report);
      return $result;
    }
  }
?>