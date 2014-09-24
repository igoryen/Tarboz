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

			$query_insert="INSERT INTO REPORT VALUES ('', $reason, $entity_for_report, $entity_id)";

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

			$query_update = "UPDATE REPORT SET 
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
		}

		public function getReportById($report_id) {
			$query = "SELECT * FROM REPORT WHERE rep_report_id = $report_id";

			$dbHelper = new DBHelper();

			$report = $dbHelper->executeQuery($query);

			return $report;
		}

		public function getReportByEntity($entity_for_report) {
			$query = "SELECT * FROM REPORT WHERE rep_entity_for_report = $entity_for_report";

			$dbHelper = new DBHelper();

			$reports_by_entity = $dbHelper->executeQuery($query);

			return $reports_by_entity;
		}

		public function getReportByEntityId($report_entity_id) {
			$query = "SELECT * FROM REPORT WHERE rep_entity_id = $report_entity_id";

			$dbHelper = new DBHelper();

			$reports_by_entity_id = $dbHelper->executeQuery($query);

			return $reports_entity_id;
		}

	}

?>