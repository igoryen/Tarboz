<?php
  require("../../header.php");
?>

  <div class="User_profile">
    <?php 
  // echo "dirname SCRIPT_NAME: " . dirname($_SERVER['SCRIPT_NAME']) . "<br>"; 
  // echo "dirname  DOCUMENT_ROOT: " . dirname($_SERVER['DOCUMENT_ROOT']) . "<br>"; 
  // echo "dirname  __FILE__  " . dirname(__FILE__) . "<br>"; 
  // echo "basename  __FILE__ : " . basename(__FILE__) . "<br>"; 
  // $pathInPieces = explode('/', dirname($_SERVER['SCRIPT_NAME']));
  // echo $pathInPieces[1];
  ?>

    <div class="Left_panel">

      <div id="user_photo_id">
        <div id="user_photo">
          <img src="../../Images/hubert.jpg" alt="User" height="142">
        </div>
        <div id="user_id">
          <div id="user_name">Hubert Humphrey</div>
          <div id="user_country">from Canada</div>
          <div id="user_langs">knows Russian, English, Mandarin, Pharsi, Hindi</div>
          <div id="user_contributions_no">made 130+ contributions</div>
        </div>
      </div>

      <div id="user_contributions">
        Recent contributions:
        <ul>
          <li>I'm a man who's suffering from the narzan.</li>
          <li>We will be helped from abroad!</li>
          <li>Come back, you abortion!</li>
          <li>It's a sin to eat cabbage like this without vodka!</li>
        </ul>
        More ...
      </div>

    </div>

    <div class="Right_panel">
      bbb
    </div>

  </div>
<?php require("../../footer.php"); ?>