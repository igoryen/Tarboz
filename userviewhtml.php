<?php
  require("header.php");
  $photo_url = "images/hubert.jpg";
  $name = "Hubert Humphrey";
  $country = "Canada";
  $languages = "Russian, English, Pharsi, Mandarin, English";
  $contributions = "<ul><li><a href='/Tarboz/Views/Entry/Index.php'>С днем рождения тебя!</a></li><li>I'm a man who's suffering from the narzan.</li><li>We will be helped from abroad!</li><li>Come back, you abortion!</li><li>It's a sin to eat cabbage like this without vodka!</li></ul>More ...";
?>

  <div id="user_profile_container">
    <?php 
  // echo "dirname SCRIPT_NAME: " . dirname($_SERVER['SCRIPT_NAME']) . "<br>"; 
  // echo "dirname  DOCUMENT_ROOT: " . dirname($_SERVER['DOCUMENT_ROOT']) . "<br>"; 
  // echo "dirname  __FILE__  " . dirname(__FILE__) . "<br>"; 
  // echo "basename  __FILE__ : " . basename(__FILE__) . "<br>"; 
  // $pathInPieces = explode('/', dirname($_SERVER['SCRIPT_NAME']));
  // echo $pathInPieces[1];
  ?>
    <div id="user_profile">

      <div id="user_left_panel">
        left panel
      </div>

      <div id="user_middle_panel">

        <div id="user_pers_info">

          <div id="user_pers_info_photo">
            <img src="<?php echo $photo_url; ?>" alt="User" height="142">
          </div>

          <div id="user_pers_info_desc">

            <!-- row 1 -->
            <div class="user_pers_info_desc_row">
              <div class="user_pers_info_desc_row_title">Name</div>
              <div class="user_pers_info_desc_row_value"><?php echo $name; ?></div>
            </div>

            <!-- row 2 -->
            <div class="user_pers_info_desc_row">
              <div class="user_pers_info_desc_row_title">Country</div>
              <div class="user_pers_info_desc_row_value"><?php echo $country; ?></div>
            </div>

            <!-- row 3 -->
            <div class="user_pers_info_desc_row">
              <div class="user_pers_info_desc_row_title">Knows</div>
              <div class="user_pers_info_desc_row_value"><?php echo $languages; ?></div>
            </div>

          </div><!-- user_pers_info_desc -->

        </div><!-- user_pers_info -->

        <div id="user_contrib">
          <div id="user_contrib_title">Contributed</div>
          <div id="user_contrib_values"><?php echo $contributions; ?></div>
        </div> <!--user_contrib-->

      </div><!--user_middle_panel-->

      <div id="user_right_panel">
        right panel
      </div>

    </div><!-- user_profile-->

  </div><!--user_profile_container-->
<?php require("footer.php"); ?>