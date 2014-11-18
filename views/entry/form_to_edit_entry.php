<?php
require_once BUSINESS_DIR_LANG . "LanguageManager.php";
require_once BUSINESS_DIR_LANG . "Language.php";

function form_to_edit_entry($entry){
  $lm = new LanguageManager();
  $auth = $entry->getEntryAuthenStatusId();
  $status = ($auth == 1 ? '1' : "not 1");
  echo "<br>ftee:: status = " . $status;
  ?>
  <!-- 1 -->
  <form action="" method="post">
  <!--<form action="entryview.php" method="post">-->
  
    <?php    
    //if($_GET['id']){ // 2
      //$em = new EntryManager(); // 3
      //$entry = $em->getEntryById($_GET['id']);
    //}// 2

    ?>
Entry/form_to_<mark>edit</mark>_entry.php
    <div id="entry_create_form">
      
      <div class="entry_create_row">
        <div id="entry_create_form_title">Edit an entry
          <div class="note">
            Note: fields marked with the red asterisk (<span class="Painted_red">*</span>) are mandatory.
          </div>
        </div>
      </div>      
      
      <!-- ent_entry_id -->
      <div class="entry_create_row" style="display: none;">
        <div class="entry_create_record_title">Id</div>
        <div class="entry_create_record_value">
          <!--<?php //echo $entry->getEntryId(); ?>-->
          <input name="id" 
                 type="text" 
                 value="<?php echo $entry->getEntryId(); ?>" readonly /><!--Lily 141029-->
        </div>
      </div>      
      <!-- lan_lang_name -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">
          Language
          <span class="question" id="entrycreatelang" >?</span>
        </div>
        <div class="entry_create_record_value">
          <select name="langid">
            <option value="">This is in ...</option><?php
              //$langs = $lm->getListOfLang();
              $langs = $lm->getLanguages();
              $lang_of_this_entry = $entry->getEntryLanguage();
              foreach ($langs as $lang) {
                echo '<option value="';
                echo $lang->getLangId();
                echo '"';
                echo $lang->getLangName() == $lang_of_this_entry ? ' selected="selected"' : '';
                echo '>';
                echo $lang->getLangName();
                echo '</option>';
       }?></select>
        </div>
      </div>

      <!-- Not sure if we need this
      <div class="entry_create_row">
        <div class="entry_create_record_title">Target language <span class="Painted_red">*</span> </div>
        <div class="entry_create_record_value">
          <select name="entry_target_lang">
            <option selected="selected">Choose one...</option>
            <option>English</option>
            <option>Russian</option>
            <option>Chinese</option>
          </select>
        </div>
      </div>
      -->
      <!-- ent_entry_text -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">
          Text <span class="Painted_red">*</span>
          <span class="question" id="entrycreatetext" >?</span> 
        </div>
        <div class="entry_create_record_value">
          <textarea name="text"
                    id="txtString2"
                    rows="10" cols="50"><?php
          echo $entry->getEntryText();
          ?></textarea>
        </div>
      </div>

      <!-- commented out because we are not creating 
      the dad and a kid together, but either the dad OR a kid
      <div class="entry_create_row">
        <div class="entry_create_record_title">
           Translation <span class="Painted_red">*</span> 
        </div>
        <div class="entry_create_record_value">
          <textarea rows="4" cols="50" placeholder="Enter the translation of the phrase"></textarea>
        </div>
      </div>
      -->

      <!-- ent_entry_verbatim to be created automatically -->
      <!-- ent_entry_verbatim will be created automatically -->
      <div class="entry_create_row">
        
        <div class="entry_create_record_title">
          <a href="#" id="create-verbatim-button">Recreate<br>verbatim</a>
          <span class="Painted_red">*</span>
          <span class="question" id="entryrecreateverbatim" >?</span>
          <br>
        </div>
        <div class="entry_create_record_value">
          <textarea name="verbatim" 
                    id="verbatim"  
                    rows="3" cols="50" readonly ><?php
          echo $entry->getEntryVerbatim();
                    ?></textarea>
        </div>
      </div>
      

      <!-- ent_entry_translit -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">
          Transliteration
          <span class="question" id="entrycreatetranslit" >?</span>
        </div>
        <div class="entry_create_record_value">
          <textarea name="translit" rows="10" cols="50"><?php
          echo $entry->getEntryTranslit();
          ?></textarea>
        </div>
      </div>


      <!-- entry_authen_status_id -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">
          Authenticity
          <span class="question" id="entrycreateauthen" >?</span>
        </div>
        <div class="entry_create_record_value">
          <input name="authen"
                 type="text"
                 value="<?php 
                 if($entry->getEntryAuthenStatusId() == 1){
                   echo "original";
                 }
                 elseif($entry->getEntryAuthenStatusId() == 2){
                   echo "translation";
                 }
                 elseif($entry->getEntryAuthenStatusId() == 3)
                   echo "unknown";?>" readonly=""/>
        </div>
      </div>

      <!-- the value of ent_entry_translation_of will be supplied automatically -->
      
      <!-- the value of ent_entry_creator_id will be supplied automatically -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">Added by</div>
        <div class="entry_create_record_value">
          <input name="creator" value="<?php echo $entry->getEntryUserId(); ?>"/>
        </div>
      </div>
      
      
      <!-- the value of ent_entry_media_id will be delivered ... -->
      <!-- the value of ent_entry_comment_id willl be .... -->
      <!-- the value of ent_entry_rating_id willl be .... -->

      <!-- ent_entry_tags -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">
          Tags
          <span class="question" id="entrycreatetags" >?</span>
        </div>
        <div class="entry_create_record_value">
          <input name="tags" type="text" size="50" value="<?php
            echo $entry->getEntryTags();
          ?>"/>
        </div>
      </div>


      <!-- ent_entry_author_id --><!--
      <div class="entry_create_row">
        <div class="entry_create_record_title">
           Author [enter '3']
        </div>
        <div class="entry_create_record_value">
          <input name="author" type="text" size="50" value="<?php
            echo $entry->getEntryAuthorId();
          ?>"/>
        </div>
      </div>-->

          
      <!-- ent_entry_authors-->
      <div class="entry_create_row">
        <div class="entry_create_record_title">
           Authors
          <span class="question" id="entrycreateauthors" >?</span>
        </div>
        <div class="entry_create_record_value">
          <input name="authors" type="text" size="50" value="<?php
            echo $entry->getEntryAuthors();
          ?>"/>
        </div>
      </div>


      <!-- ent_entry_source_id -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">Source [enter 1]</div>
        <div class="entry_create_record_value">
          <input name="source" type="text" size="50" value="<?php
          echo $entry->getEntrySourceId();
          ?>"/>      
        </div>
      </div>


      <!-- ent_entry_use -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">
          Phrase use
          <span class="question" id="entrycreateuse" >?</span>
        </div>
        <div class="entry_create_record_value">
          <input name="use" value="<?php 
            echo $entry->getEntryUse(); 
          ?>">
        </div>
      </div>


      <!-- ent_entry_http_link -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">
          Http link
          <span class="question" id="entrycreatelink" >?</span>
        </div>
        <div class="entry_create_record_value">
          <input name="link" type="text" size="50" value="<?php
          echo $entry->getEntryHttpLink();
          ?>"/>      
        </div>
      </div>    


      <div class="entry_create_buttons">
        <!-- 5 -->
        <button name ="submit" type="submit">Submit</button>
        <input type="button" value="Back" onclick="window.history.go(-1); return false;" />
      </div>

    </div>
  </form>
<?php

}
