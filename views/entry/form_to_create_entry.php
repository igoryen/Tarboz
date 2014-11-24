<?php
require_once BUSINESS_DIR_LANG . "LanguageManager.php";
require_once BUSINESS_DIR_LANG . "Language.php";
require_once BUSINESS_DIR_AUTHEN . "Authen.php";
require_once BUSINESS_DIR_AUTHEN . "AuthenManager.php";

function form_to_create_entry($err_messages){
  //$errmsg_for_ = "Hi!";
  $lm = new LanguageManager();
  $am = new AuthenManager();
  ?>
  <!-- 1 -->
 <div align="center">
     <div style="width: 850px">
  <form action="" method="post" style="text-align: right; display: block;">

    <?php
//    date_default_timezone_set('America/Toronto');
//    echo "<br>Today: " . date("Y-m-d H:i:s");
    ?>
<!--    <br>views/entry/form_to_<mark>create</mark>_entry.php-->
    <div id="entry_create_form">

      <div class="entry_create_row">
        <div id="entry_create_form_title">Create an entry
          <div class="note">
            Note: fields marked with the red asterisk (<span class="Painted_red">*</span>) are mandatory.
          </div>
        </div>
      </div>



      <!-- language -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">
          Language <span class="Painted_red">*</span>
          <span class="question" id="entrycreatelang" >?</span>
        </div>
        <div class="entry_create_record_value">
          <select name="langid">
            <option value="">This will be in ...</option><?php
              //$langs = $lm->getListOfLang();
              $langs = $lm->getLanguages();
              if(isset($_POST['langid'])){
                $this_langid = $_POST['langid'];
                foreach ($langs as $lang) {
                  echo '<option value="';
                  echo $lang->getLangId();
                  echo '"';
                  echo $this_langid == $lang->getLangId() ? ' selected="selected"' : '';
                  echo '">';
                  echo $lang->getLangName();
                  echo '</option>';
                }
              }
              else{
                foreach ($langs as $lang) {
                  echo '<option value="';
                  echo $lang->getLangId();
                  echo '">';
                  echo $lang->getLangName();
                  echo '</option>';
                }
              }
        ?></select>
          <strong style=" color: #FF365D;"><?php echo $err_messages['langid']; ?></strong>
        </div>
      </div>


      <!-- entry_authen_status_id -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">Authenticity
          <span class="Painted_red">*</span>
          <span class="question" id="entrycreateauthen" >?</span>
        </div>
        <div class="entry_create_record_value">
          <select name="authen" id="inputAuthen">
            <option value="">This phrase is ...</option><?php
              $authens = $am->getAuthens();
              if(isset($_POST['authen'])){
                $this_authen_id = $_POST['authen'];
                foreach ($authens as $authen) {
                  echo '<option value="';
                  echo $authen->getAuthenId();
                  echo '"';
                  echo $this_authen_id == $authen->getAuthenId() ? ' selected="selected"' : '';
                  echo '">';
                  echo $authen->getAuthenName();
                  echo '</option>';
                }
              }
              else{
                foreach ($authens as $authen) {
                  echo '<option value="';
                  echo $authen->getAuthenId();
                  echo '">';
                  echo $authen->getAuthenName();
                  echo '</option>';
                }
       }?></select>
          <strong style=" color: #FF365D;"><?php echo $err_messages['authen']; ?></strong>
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
            if(isset($_POST['text'])){
              echo $_POST['text'];
            }
        ?></textarea><br />
          <strong style=" color: #FF365D;"><?php echo $err_messages['text']; ?></strong>
        </div>
      </div>

      <!-- ent_entry_verbatim will be created automatically -->
      <div class="entry_create_row">

        <div class="entry_create_record_title">
          <a href="#" id="create-verbatim-button">Create verbatim</a>
          <span class="Painted_red">*</span>
          <span class="question" id="entrycreateverbatim" >?</span>
          <br>
        </div>
        <div class="entry_create_record_value">
          <textarea name="verbatim"
                    id="verbatim"
                    rows="3" cols="50" readonly ><?php
            if(isset($_POST['verbatim'])){
              echo $_POST['verbatim'];
            }
        ?></textarea>
          <strong style=" color: #FF365D;"><?php echo $err_messages['verbatim']; ?></strong>
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
            if(isset($_POST['translit'])){
              echo $_POST['translit'];
            }
        ?></textarea>
          <strong style=" color: #FF365D;"><?php echo $err_messages['translit']; ?></strong>
        </div>
      </div>




      <!-- the value of ent_entry_translation_of will be dealt with separately -->
      <input name="translOf" value="" hidden/>
      <!-- the value of ent_entry_creator_id will be supplied automatically -->
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
          <textarea name="tags" rows="2" cols="50"><?php
            if(isset($_POST['tags'])){
              echo $_POST['tags'];
            }
        ?></textarea>
          <strong style=" color: #FF365D;"><?php echo $err_messages['tags']; ?></strong>
        </div>
      </div>


      <!-- ent_entry_authors -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">
          Authors
          <span class="question" id="entrycreateauthors" >?</span>
        </div>
        <div class="entry_create_record_value">
          <textarea name="authors" rows="2" cols="50"><?php
            if(isset($_POST['authors'])){
              echo $_POST['authors'];
            }
        ?></textarea>
          <strong style=" color: #FF365D;"><?php echo $err_messages['authors']; ?></strong>
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
        <div class="entry_create_record_title">
          Phrase use
          <span class="question" id="entrycreateuse" >?</span>
        </div>
        <div class="entry_create_record_value">
          <textarea name="use" rows="2" cols="50"><?php
            if(isset($_POST['use'])){
              echo $_POST['use'];
            }
        ?></textarea>
          <strong><?php echo $err_messages['use']; ?></strong>
        </div>
      </div>


      <!-- ent_entry_http_link -->
      <div class="entry_create_row">
        <div class="entry_create_record_title">
          Http link
          <span class="question" id="entrycreatelink" >?</span>
        </div>
        <div class="entry_create_record_value">
          <textarea name="link" rows="2" cols="50"><?php
            if(isset($_POST['link'])){
              echo trim($_POST['link']);
            }
        ?></textarea>
          <strong style=" color: #FF365D;"><?php echo $err_messages['link']; ?></strong>
        </div>
      </div>

      <div class="entry_create_row">
          <div class="entry_create_buttons">
            <!-- 5 -->
            <button name ="submit" type="submit" class="en_button">Submit</button>
            <button type="reset"  class="en_button"
                    onclick="window.location='entrycreate.php';">Reset</button>
    <!--        <input type="button" value="Back" onclick="window.history.go(-1); return false;" />-->
          </div>
      </div>      
        
    </div>
  </form>
</div>
</div>

<?php
}
