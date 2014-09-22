<?php require("../../header.php"); ?>

  <div id="entry_create_form">
    Create entry
    <div class="Note">
      Note: fields marked with the red asterisk (<span class="Painted_red">*</span>) are mandatory.
    </div>

    <div class="Entry_create_row">
      <div class="Row_lable">Source language <span class="Painted_red">*</span> </div>
      <div class="Row_value">
        <select name="entry_source_lang">
          <option selected="selected">Choose one...</option>
          <option>English</option>
          <option>Russian</option>
          <option>Chinese</option>
        </select>
      </div>
    </div>

    <div class="Entry_create_row">
      <div class="Row_lable">Target language <span class="Painted_red">*</span> </div>
      <div class="Row_value">
        <select name="entry_target_lang">
          <option selected="selected">Choose one...</option>
          <option>English</option>
          <option>Russian</option>
          <option>Chinese</option>
        </select>
      </div>
    </div>

    <div class="Entry_create_row">
      <div class="Row_lable">
        Text of the phrase <span class="Painted_red">*</span> 
      </div>
      <div class="Row_value">
        <textarea rows="4" cols="50" placeholder="Enter the text of the phrase"></textarea>
      </div>
    </div>
    
    <div class="Entry_create_row">
      <div class="Row_lable">
         Translation <span class="Painted_red">*</span> 
      </div>
      <div class="Row_value">
        <textarea rows="4" cols="50" placeholder="Enter the translation of the phrase"></textarea>
      </div>
    </div>

    <div class="Entry_create_row">
      <div class="Row_lable">Authenticity status <span class="Painted_red">*</span> </div>
      <div class="Row_value">
        <select name="entry_auth_status">
          <option selected="selected">Choose one...</option>
          <option>Original</option>
          <option>Translation</option>
          <option>Unknown</option>
        </select>
      </div>
    </div>

    <div class="Entry_create_row">
      <div class="Row_lable">
         Source
      </div>
      <div class="Row_value">
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

    <div class="Entry_create_row">
      <div class="Row_lable">
        Country
      </div>
      <div class="Row_value">
        <select name="entry_country">
          <option selected="selected">Choose one...</option>
          <option>Russia</option>
          <option>China</option>
          <option>Persia</option>
        </select>      
      </div>
    </div>

    <div class="Entry_create_row">
      <div class="Row_lable">
        Phrase use  <span class="Painted_red">*</span> 
      </div>
      <div class="Row_value">
        <textarea rows="4" cols="50"
          placeholder="Describe how to use this phrase"></textarea>
      </div>
    </div>

    <div class="Form_management_buttons">
      <button type="submit">Submit</button>
      <button type="reset">Reset</button>
    </div>

  </div>

<?php require("../../footer.php"); ?>