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
    //echo "TTT";
//    echo "<br>dbh::executeSelect(sql) sql:<br>" . $sql;
//    echo "<br>";
    
    $this->connectToDB();
    
    $result = mysqli_query($this->connection, $sql); // 1
    
    // TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
    //echo "<br><br>dbh::executeSelect() mysql_result:<br>";    
    //$assoc_array= $result->fetch_array(MYSQLI_ASSOC); // 2
    //print_r($assoc_array);
    // this is dangerous because these 2 lines change values in $result
    // LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
    
    $this->closeConnection();
    //echo "<br>LLL<br>";
    return $result; // 1
  }

  public function executeQuery($sql) {
    $this->connectToDB();
    if ($this->connection) {
      $result = mysqli_query($this->connection, $sql);
    }
    $this->closeConnection();
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

}

// DBHelper
?>