<?PHP
  
  require_once DB_CONNECTION . 'DBHelper.php';
  require_once BUSINESS_DIR_BADWORD . 'Badword.php';
  require_once DB_CONNECTION . 'datainfo.php';

  class BadwordDataAccessor {

    public function getBadWordList() {

      $query = "SELECT * FROM ".BADWORD;
      $dbHelper = new DBHelper();
      $result = $dbHelper->executeQuery($query);
      $badword_all = $this->getBadwordPatterns($result);
      return $badword_all;

    }
      
    public function getBadWordNum() {
      $query = "SELECT * FROM ".BADWORD;
      $dbHelper = new DBHelper();
      $badword_num = $dbHelper->getNumOfRows($query);
      return $badword_num; 
    }

      
    public function getBadwordPatterns($selectResult) {
        $badwords = array();
        $count = 0;
        while ($list = mysqli_fetch_assoc($selectResult)) {            
            $badwords[$count] = "/".$list['bw_word']."/";
            $count++;
        }
        return $badwords;
        
    }

  }

?>