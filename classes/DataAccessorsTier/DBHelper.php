<?php

require_once DB_CONNECTION . 'constants.php';

class DBHelper {

  private $connection;

  /**
   * Create a database connection to connect to a db server
   * and select a database to use
   * @return type
   */
  public function getConnection() {
    return $this->connection;
  }

  /**
   * Create a DB connection and set the default character set
   */
  private function connectToDB() {
    $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)
      or die("Error, failed to connect" . mysqli_error($this->connection));
    $this->connection->set_charset("utf8"); // 555
    //$db_select = mysqli_select_db("prj666", $this->connection)
    // or die("Can not connect to the database".mysqli_error($this->connection));
  }

  /**
   * Close database connection
   */
  private function closeConnection() {
    if (isset($this->connection)) {
      mysqli_close($this->connection);
    }
  }

  /**
   * Execute a SELECT query
   * @param string $sql
   * @return mysql_result $result
   */
  public function executeSelect($sql) {
    //103*
    $this->connectToDB();
    $result = mysqli_query($this->connection, $sql); // 101    
    $this->closeConnection();
    // 105*
    return $result; // 101
  }

  /**
   * Execute an SQL query
   * @param string $sql
   * @return type
   */
  public function executeQuery($sql) {
    // 106*
    $this->connectToDB();
    if ($this->connection) {
      $result = mysqli_query($this->connection, $sql);
      // 104*
    }
    $this->closeConnection();
    // 104*,105*
    return $result;
  }

  /**
   * Execute query and return ID
   * @param string $sql
   * @return mixed $last_inserted_id
   */
  public function executeInsertQuery($sql) {
    $this->connectToDB();
    $result           = mysqli_query($this->connection, $sql);
    $last_inserted_id = mysqli_insert_id($this->connection);
    $this->closeConnection();
    return $last_inserted_id;
  }

  /**
   * get number of rows
   * @param string $sql
   * @return type $numOfRows
   */
  public function getNumOfRows($sql) {
    $this->connectToDB();
    $result    = mysqli_query($this->connection, $sql);
    $numOfRows = mysqli_num_rows($result);
    $this->closeConnection();
    return $numOfRows;
  }

  /**
   * Escape the special characters
   * @param string $mystring
   * @return type $escapestring (escaped)
   */
  public function EscapeString($mystring) {
    $this->connectToDB();
    $escapestring = mysqli_real_escape_string($this->connection, $mystring);
    $this->closeConnection();
    return $escapestring;
  }

}

// DBHelper
