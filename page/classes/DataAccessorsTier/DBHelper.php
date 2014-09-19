<?php
	require_once DATA_ACCESSOR_DIR . 'constants.php';

	class DBHelper{		
		private $connection;
		
		/**
		* Create a database connection to connect to a db server
		* and select a database to use
		*/
		private function connectToDB(){
		
			// Step 1. Create a Database connection
			$this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	
			if(!$this->connection)
			{
				die("Database connection failed:" . mysql_error());
			}
			
			// Step 2. Select a Database to use			
			$db_select = mysql_select_db(DB_NAME, $this->connection) or die("Cannot connect you now " .mysql_error());
			
			echo "The db connec: ".$db_select."<br>";
			
		}
		
		/**
		* Close database connection
		*/
		private function closeConnection(){
			// Step 5. Close connection
			if(isset($this->connection)){
				mysql_close($this->connection);
			}
		}
		
		public function executeSelect($sql){
			
			$this->connectToDB();
			
			$result = mysql_query($sql);
			
			$this->closeConnection();
			
			return $result;
		}
		
		public function executeQuery($sql){
			
			$this->connectToDB();
			
			$result = mysql_query($sql);
			
			$this->closeConnection();
			
			return $result;
		}
		
		// returns last inserted id
		public function executeInsertQuery($sql){
			
			$this->connectToDB();
			
			$result = mysql_query($sql);
			
			$last_inserted_id = mysql_insert_id();
			
			$this->closeConnection();
			
			return $last_inserted_id;
		}
		
		
		public function getNumOfRows($sql){  
		
			$this->connectToDB();
			
			$result = mysql_query($sql);
			
			$numOfRows = mysql_num_rows($result);
			
			$this->closeConnection();return $numOfRows;
			
			}		
	
	}
	
?>