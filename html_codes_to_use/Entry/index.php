  <?php require("../Shared/header.php");
    $text = "с днем рожденья тебя!<br>с днем рожденья тебя! <br>с днем рождения, Вася!<br>с днем рожденья тебя!";
    $translit = "s dnem rozhden'ya tebya!<br>s dnem rozhden'ya tebya! <br>s dnem rozhdeniya, Vasya!<br>s dnem rozhden'ya tebya!";
    $video_link = "https://www.youtube.com/v/CjD0KdRYyDo";
    $use = "A song to sing at birthday";
    $translator = "[unknown]";
    $time = "late 20th century";
    $country = "Russia";
    $form = "song";
    $user = "<a href='/Tarboz/Views/User/Index.php'>user123</a>";
  ?>

  <div id="entry_index_container">

    <div class="entry_record">
      <div class="entry_record_title">Text</div>
      <div class="entry_record_value"><?php echo $text; ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Translit</div>
      <div class="entry_record_value"><?php echo $translit; ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Video link</div>
      <div class="entry_record_value">
        <embed width="420" height="315" src="<?php echo $video_link; ?>">
      </div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Use</div>
      <div class="entry_record_value"><?php echo $use; ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Translated by</div>
      <div class="entry_record_value"><?php echo $translator; ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Time</div>
      <div class="entry_record_value"><?php echo $time; ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Country</div>
      <div class="entry_record_value"><?php echo $country; ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Form</div>
      <div class="entry_record_value"><?php echo $form; ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Added by user</div>
      <div class="entry_record_value"><?php echo $user; ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Comments</div>
      <div class="entry_record_value">...</div>
    </div>

  </div><!--entry_index_container-->
<?php require("../Shared/footer.php"); ?>