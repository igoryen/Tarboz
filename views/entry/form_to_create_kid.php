<?php
function form_to_create_kid($dad){
  ?>
  <!-- 1 -->
  <form action="" method="post">
    
    <?php    
//    date_default_timezone_set('America/Toronto');
//    echo "<br>Today: " . date("Y-m-d H:i:s");
    ?>
    <br>views/entry/form_to_<mark>create</mark>_kid.php
    <div id="entry_create_form">
      
      <div class="entry_create_row">
        <div id="entry_create_form_title">Create a translation
          <div class="note">
            Note: fields marked with the red asterisk (<span class="Painted_red">*</span>) are mandatory.
          </div>
        </div>
      </div>
      
      <!-- ent_entry_text -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">Text of the original</div>
        <div class="entry_create_record_value">
          <textarea rows="10" cols="50" readonly><?php
            echo nl2br($dad->getEntryText());
          ?></textarea>
        </div>
      </div>
      
      
      
      <!-- language -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">In what language? <span class="Painted_red">*</span></div>
        <div class="entry_create_record_value">
          <select name="language">
            <option value="" selected="selected">This is in ...</option>
            <option value="3">Chinese</option><!-- 4 -->
            <option value="1">English</option>
            <option value="2">Russian</option>
          </select>
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
          Text of the phrase <span class="Painted_red">*</span> 
        </div>
        <div class="entry_create_record_value">
          <textarea name="text" 
                    id="txtString2"  
                    rows="10" cols="50"></textarea>
        </div>
      </div>
      
      <!-- ent_entry_verbatim will be created automatically -->
      <div class="entry_create_row">
        
        <div class="entry_create_record_title">
          <a href="#" id="create-verbatim-button">Create verbatim</a><br>
        </div>
        <div class="entry_create_record_value">
          <textarea name="verbatim" 
                    id="verbatim"  
                    rows="3" cols="50" readonly ></textarea>
        </div>
      </div>      
      
      <!-- ent_entry_translit -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">
          Transliteration <span class="Painted_red">*</span> 
        </div>
        <div class="entry_create_record_value">
          <textarea name="translit" rows="10" cols="50"></textarea>
        </div>
      </div>


      <!-- entry_authen_status_id -->
      <input name="authen" value="2" hidden/><!-- 1 -->

      <!-- the value of ent_entry_translation_of will be dealt with separately -->
      <input name="translOf" value="<?php echo $dad->getEntryId(); ?>" hidden/>
      
      <!-- the value of ent_entry_creator_id will be supplied automatically -->
      <!-- the value of ent_entry_media_id will be delivered ... -->
      <!-- the value of ent_entry_comment_id willl be .... -->
      <!-- the value of ent_entry_rating_id willl be .... -->

      <!-- ent_entry_tags -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">Tags</div>
        <div class="entry_create_record_value">
          <textarea name="tags" rows="2" cols="50"></textarea>
        </div>
      </div>


      <!-- ent_entry_author_id -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">This was written by</div>
        <div class="entry_create_record_value">
          <textarea name="author" rows="2" cols="50"></textarea>
        </div>
      </div>



      <!-- ent_entry_source_id -->
<!--      <div class="entry_create_row">
        <div class="entry_create_record_title">Source [enter 1]</div>
        <div class="entry_create_record_value">
          <input name="source" type="text" size="50"/>      
        </div>
      </div>-->


      <!-- ent_entry_use -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">Phrase use</div>
        <div class="entry_create_record_value">
          <textarea name="use" rows="2" cols="50"></textarea>
        </div>
      </div>


      <!-- ent_entry_http_link -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">Http link</div>
        <div class="entry_create_record_value">
          <textarea name="link" rows="2" cols="50"></textarea>      
        </div>
      </div>    


      <div class="entry_create_buttons">
        <!-- 5 -->
        <button name ="submit" type="submit">Submit</button>
        <button type="reset">Reset</button>
      </div>

    </div>
  </form>

<?php 
}
