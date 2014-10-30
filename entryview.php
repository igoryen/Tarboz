  <?php require("header.php");
  
  require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
  require_once BUSINESS_DIR_ENTRY . "Entry.php";

  if(!isset($_GET['id']) && !isset($_POST['id'])){
    echo "neither (GET['id']) nor (POST['id'])";
  }
  if(isset($_GET['id'])){
    echo "we have GET[id], it is " . $_GET['id'] . "<br>";
    $entryId = $_GET['id'];
  }
  elseif(isset($_POST['id'])){
    echo "we have POST[id], it is " . $_POST['id'] . "<br>";
    $entryId = $_POST['id'];
  }

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
      <div class="entry_record_title">Language</div>
      <div class="entry_record_value"><?php echo $entry->getEntryLanguage(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Text</div>
      <div class="entry_record_value"><?php echo $entry->getEntryText(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Verbatim</div>
      <div class="entry_record_value"><?php echo $entry->getEntryVerbatim(); ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Translit</div>
      <div class="entry_record_value"><?php echo $entry->getEntryTranslit(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Authenticity status</div>
      <div class="entry_record_value"><?php echo $entry->getEntryAuthenStatusId(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Translation of</div>
      <div class="entry_record_value"><?php echo $entry->getEntryTranslOf(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Entry added by</div>
      <div class="entry_record_value"><?php echo $entry->getEntryUserId(); ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Media</div>
      <div class="entry_record_value"><?php echo $entry->getEntryMediaId(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Comment</div>
      <div class="entry_record_value"><?php echo $entry->getEntryCommentId(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Rating</div>
      <div class="entry_record_value"><?php echo $entry->getEntryRatingId(); ?></div>
    </div>
    
    
    <div class="entry_record">
      <div class="entry_record_title">Tags</div>
      <div class="entry_record_value"><?php echo $entry->getEntryTags(); ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Author</div>
      <div class="entry_record_value"><?php echo $entry->getEntryAuthorId(); ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Source</div>
      <div class="entry_record_value"><?php echo $entry->getEntrySourceId(); ?></div>
    </div>

    <div class="entry_record">
      <div class="entry_record_title">Use</div>
      <div class="entry_record_value"><?php echo $entry->getEntryUse(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Video link</div>
      <div class="entry_record_value">
        <embed width="420" height="315" src="<?php echo $entry->getEntryHttpLink(); ?>">
      </div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Creation date</div>
      <div class="entry_record_value"><?php echo $entry->getEntryCreationDate(); ?></div>
    </div>
    
    <div class="entry_record">
      <div class="entry_record_title">Edit</div>
      <div class="entry_record_value">
        <a href="entrycreate.php?id=<?php echo $entryId; ?>">Edit the entry</a><!-- #1-->
      </div>      
    </div>
    
    
    
  </div><!--entry_index_container-->
  
<?php require("footer.php"); ?>