<?php

require_once DB_CONNECTION . 'constants.php';

class DBHelper {

  private $connection;

  /* -----------------------------------------------------
    Create a database connection to connect to a db server
    and select a database to use
    ---------------------------------------------------- */

  public function getConnection() {
    return $this->connection;
  }


  private function connectToDB() {
    // Step 1. Create a Database connection
    $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)
            or die("Error, failed to connect" . mysqli_error($this->connection));
    // Sets the default client character set
    // to be used when sending data from and to the database server
    $this->connection->set_charset("utf8");
    //$db_select = mysqli_select_db("prj666", $this->connection)
    // or die("Can not connect to the database".mysqli_error($this->connection));
  }

  /* ------------------------------------
    Close database connection
    --------------------------------- */

  private function closeConnection() {
    // Step 5. Close connection
    if (isset($this->connection)) {
      mysqli_close($this->connection);
    }
  }
  /**
   * 
   * @param string $sql
   * @return mysql_result $result
   */
  public function executeSelect($sql) {
    //103*
    #echo "<br>dbh::executeSelect(sql) sql:<br>" . $sql;
    $this->connectToDB();
    $result = mysqli_query($this->connection, $sql); // 101    
    $this->closeConnection();
    // 105
    return $result; // 101
  }

  public function executeQuery($sql) {
    #echo $sql;
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

  // returns last inserted id
  public function executeInsertQuery($sql) {
    $this->connectToDB();
    $result = mysqli_query($this->connection, $sql);
    $last_inserted_id = mysqli_insert_id($this->connection);
    $this->closeConnection();
    return $last_inserted_id;
  }

  public function getNumOfRows($sql) {
    $this->connectToDB();
    $result = mysqli_query($this->connection, $sql);
    $numOfRows = mysqli_num_rows($result);
    $this->closeConnection();
    return $numOfRows;
  }

  //A function that receives a string and then escapes the special characters and returns the result.
  public function EscapeString($mystring){
    $this->connectToDB();

    $escapestring=mysqli_real_escape_string($this->connection, $mystring);  

    $this->closeConnection();
    
     return $escapestring;

  }

}

// DBHelper
?>