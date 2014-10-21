  <?php require("../Shared/header.php");
  
  include "../../config.php";
  include "lib.php";
  require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
  require_once BUSINESS_DIR_ENTRY . "Entry.php";

// get entryId from a .. page
//$entryId = '';
// $entryId = 'eng1';
// $entryId = 'eng2';
// $entryId = 'eng3';
// $entryId = 'eng4';
// $entryId = 'eng5';
// $entryId = 'eng6';
//$entryId = 'eng7';
//$entryId = 'eng8';
//$entryId = 'eng9';

//$entryId = 'cmn1';
//$entryId = 'cmn2';
//$entryId = 'cmn3';
//$entryId = 'cmn4';
//$entryId = 'cmn5';
//$entryId = 'cmn6';
//$entryId = 'cmn7';
//$entryId = 'cmn8';
//$entryId = 'cmn9';

//$entryId = 'ru1';
// $entryId = 'ru2';
$entryId = 'ru3';
//$entryId = 'ru4';
//$entryId = 'ru5';
//$entryId = 'ru6';
//$entryId = 'ru7';
//$entryId = 'ru8';
//$entryId = 'ru9';
// #) initialize manager class
$em = new EntryManager();
// #) try to make a search for entry
$entry = $em->getEntryById($entryId);



  
    //$text = "с днем рожденья тебя!<br>с днем рожденья тебя! <br>с днем рождения, Вася!<br>с днем рожденья тебя!";
$text = $entry->getEntryText();    
//$translit = "s dnem rozhden'ya tebya!<br>s dnem rozhden'ya tebya! <br>s dnem rozhdeniya, Vasya!<br>s dnem rozhden'ya tebya!";
$translit = $entry->getEntryTranslit();
    //$video_link = "https://www.youtube.com/v/CjD0KdRYyDo";
$video_link = $entry->getEntryHttpLink();
    //$use = "A song to sing at birthday";
$use = $entry->getEntryUse();
    //$translator = "[unknown]";
$translator = $entry->getEntryAuthorId();
    $time = "late 20th century";
    $country = "Russia";
    $form = "song";
    //$user = "<a href='/Tarboz/Views/User/Index.php'>user123</a>";
$user = $entry->getEntryUserId();

table_to_see_entry_values($entry);

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
<?php //require("../Shared/footer.php"); ?>