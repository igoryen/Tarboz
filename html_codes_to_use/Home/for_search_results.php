<?php 
  require("../Shared/header.php");
  $dad_lang = "English";
  $dad_text = "Happy birthday to you";

  $house1_lang = "Russian";
  $house1_kid1_text = "С днем рождения тебя!";
  $house1_kid2_text = "Пусть бегут неуклюже!";

  $house2_lang = "Mandarin";
  $house2_kid1_text = "祝你生日快乐";
  $house2_kid2_text = "祝你快乐的生日";
?>
  
  <div id="land">
    <div id="village">

      <div id="dad_house">
        <div class="door"><?php echo $dad_lang;?></div>
        <div id="dad_room">
          <div id="dad_text"><?php echo $dad_text; ?></div>
          <div id="dad_profile_link">O</div>
          <div id="kids_num">18</div>
          <div id="add_kid">+</div>
        </div>
      </div><!-- dad_house -->

      <div class="kids_house">
        <div class="door"><?php echo $house1_lang; ?></div>

        <div class="kid_room">
          <div class="kid_text"><?php echo $house1_kid1_text; ?></div>
          <div class="kid_profile_link">T</div>
          <div class="kid_dad_link">O</div>
          <div class="kid_votes">+12 -3</div>
          <div class="kid_added_by">user123</div>
          <div class="is_mom">A</div>
        </div>

        <div class="kid_room">
          <div class="kid_text"><?php echo $house1_kid2_text; ?></div>
          <div class="kid_profile_link">T</div>
          <div class="kid_dad_link">O</div>
          <div class="kid_votes">+0 -10</div>
          <div class="kid_added_by">user456</div>
          <div class="is_mom"></div>
        </div>

      </div><!-- kids_house -->

      <div class="kids_house">
        <div class="door"><?php echo $house2_lang; ?></div>

        <div class="kid_room">
          <div class="kid_text"><?php echo $house2_kid1_text; ?></div>
          <div class="kid_profile_link">T</div>
          <div class="kid_dad_link">O</div>
          <div class="kid_votes">+25 -0</div>
          <div class="kid_added_by">user789</div>
          <div class="is_mom"></div>
        </div>

        <div class="kid_room">
          <div class="kid_text"><?php echo $house2_kid2_text; ?></div>
          <div class="kid_profile_link">T</div>
          <div class="kid_dad_link">O</div>
          <div class="kid_votes">+1 -15</div>
          <div class="kid_added_by">user111</div>
          <div class="is_mom">A</div>
        </div>

      </div><!-- kids_house -->

    </div><!-- village -->
  </div><!-- land -->

<?php require("../Shared/footer.php"); ?>