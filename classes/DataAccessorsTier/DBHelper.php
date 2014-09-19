<?php
	require_once DB_CONNECTION . 'constants.php';

	class DBHelper{		
		private $connection;
		
		/**
		* Create a database connection to connect to a db server
		* and select a database to use
		*/
		private function connectToDB(){
		
			// Step 1. Create a Database connection
			$this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS) or die("Error, failed to connect".mysqli_error());

		}
		
		/**
		* Close database connection
		*/
		private function closeConnection(){
		
			// Step 5. Close connection
			if(isset($this->connection)){
			
				mysqli_close($this->connection);
				
			}
		}
		
		public function executeSelect($sql){
			
			$this->connectToDB();
			
			$result = mysqli_query($this->connection,$sql);
			
			$this->closeConnection();
			
			return $result;
		}
		
		public function executeQuery($sql){
			
			$this->connectToDB();
			
			if($this->connection){
			
			$result = mysqli_query($this->connection,$sql);
			
			}
			
			echo "Result is: ".$result;
			
			$this->closeConnection();
			
			return $result;
		}
		
		// returns last inserted id
		public function executeInsertQuery($sql){
			
			$this->connectToDB();
			
			$result = mysqli_query($this->connection,$sql);
			
			$last_inserted_id = mysqli_insert_id($this->connection);
			
			$this->closeConnection();
			
			return $last_inserted_id;
		}
		
		
		public function getNumOfRows($sql){  
		
			$this->connectToDB();
			
			$result = mysqli_query($this->connection,$sql);
			
			$numOfRows = mysqli_num_rows($result);
			
			$this->closeConnection();
			
			return $numOfRows;
			
			}		
	
	}
	
?>