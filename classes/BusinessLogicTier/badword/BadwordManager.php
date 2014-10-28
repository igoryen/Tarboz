<?PHP
  require_once DATA_ACCESSOR_DIR_BADWORD . 'BadwordDataAccessor.php';

  class BadwordManager {

    public function getBadWordList() {
      $badwordDataAccessor = new BadwordDataAccessor();
      $result = $badwordDataAccessor->getBadWordList();
      return $result;
    }
    
    public function getBadWordNum() {
      $badwordDataAccessor = new BadwordDataAccessor();
      $result = $badwordDataAccessor->getBadWordNum();
      return $result;
    }
      
    public function getReplacementList() {
        $replacement = array();        
        for($i=0; $i<$this->getBadWordNum(); $i++) {
        //for($i=0; $i<10; $i++) {
            $replacement[$i] = "!!";
        }
        return $replacement;
    }

 
  }
?>