<?php require("../Shared/header.php"); ?>

  <div id="entry_create_form">
    <div class="entry_create_row">
      <div id="entry_create_form_title">Create entry
        <div class="note">
          Note: fields marked with the red asterisk (<span class="Painted_red">*</span>) are mandatory.
        </div>
      </div>
    </div>
    

    <div class="entry_create_row">
      <div class="entry_create_record_title">Source language <span class="Painted_red">*</span>
        <!--<div class="entry_create_record_title_explanation">
          The language in which the text of your phrase is written
        </div>-->
      </div>
      <div class="entry_create_record_value">
        <select name="entry_source_lang">
          <option selected="selected">Choose one...</option>
          <option>English</option>
          <option>Russian</option>
          <option>Chinese</option>
        </select>
      </div>
    </div>

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

    <div class="entry_create_row">
      <div class="entry_create_record_title">
        Text of the phrase <span class="Painted_red">*</span> 
      </div>
      <div class="entry_create_record_value">
        <textarea rows="4" cols="50" placeholder="Enter the text of the phrase"></textarea>
      </div>
    </div>
    
    <div class="entry_create_row">
      <div class="entry_create_record_title">
         Translation <span class="Painted_red">*</span> 
      </div>
      <div class="entry_create_record_value">
        <textarea rows="4" cols="50" placeholder="Enter the translation of the phrase"></textarea>
      </div>
    </div>

    <div class="entry_create_row">
      <div class="entry_create_record_title">Authenticity status <span class="Painted_red">*</span> </div>
      <div class="entry_create_record_value">
        <select name="entry_auth_status">
          <option selected="selected">Choose one...</option>
          <option>Original</option>
          <option>Translation</option>
          <option>Unknown</option>
        </select>
      </div>
    </div>

    <div class="entry_create_row">
      <div class="entry_create_record_title">
         Source
      </div>
      <div class="entry_create_record_value">
         <select name="entry_source">
          <option selected="selected">Choose one...</option>
          <option>Book</option>
          <option>Speech</option>
          <option>Song</option>
          <option>Movie</option>
          <option>Poem</option>
        </select>
      </div>
    </div>

    <div class="entry_create_row">
      <div class="entry_create_record_title">
        Country
      </div>
      <div class="entry_create_record_value">
        <select name="entry_country">
          <option selected="selected">Choose one...</option>
          <option>Russia</option>
          <option>China</option>
          <option>Persia</option>
        </select>      
      </div>
    </div>

    <div class="entry_create_row">
      <div class="entry_create_record_title">
        Phrase use  <span class="Painted_red">*</span> 
      </div>
      <div class="entry_create_record_value">
        <textarea rows="4" cols="50"
          placeholder="Describe how to use this phrase"></textarea>
      </div>
    </div>

    <div class="entry_create_buttons">
      <button type="submit">Submit</button>
      <button type="reset">Reset</button>
    </div>

  </div>

<?php require("../Shared/footer.php"); ?>
