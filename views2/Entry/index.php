  <?php require("../Shared/header.php");
  
  include "../../config.php";
  include "lib.php";
  require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
  require_once BUSINESS_DIR_ENTRY . "Entry.php";

$entryId = $_GET['id'];
//$entryId = 26;

$em = new EntryManager();
$entry = $em->getEntryById($entryId); // 1

  
$text =       $entry->getEntryText();    
$translit =   $entry->getEntryTranslit();
$video_link = $entry->getEntryHttpLink();
$use =        $entry->getEntryUse();
$translator = $entry->getEntryAuthorId();
$time =       "late 20th century";
$country =    "Russia";
$form =       "song";
$user =       $entry->getEntryUserId();

//table_to_see_entry_values($entry); // for debugging

  ?>

  <div id="entry_index_container">    
    <mark>index</mark>.php
    
    <div class="entry_record">
      <div class="entry_record_title">id</div>
      <div class="entry_record_value"><?php echo $entry->getEntryId(); ?></div>
    </div>
    
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
    
    <a href="create.php?id=<?php echo $entryId; ?>">Edit the entry</a><!-- #1-->
    
    
  </div><!--entry_index_container-->
  
<?php require("../Shared/footer.php"); ?>