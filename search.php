<?php
// for translator
require_once('plug-in/translate/config.inc.php');
require_once('plug-in/translate/class/ServicesJSON.class.php');
require_once('plug-in/translate/class/MicrosoftTranslator.class.php');

$translator = new MicrosoftTranslator(ACCOUNT_KEY);
$selectbox = array('id'=> 'txtLang','name'=>'txtLang');
$translator->getLanguagesSelectBox($selectbox);

?>
<div id="wrapper">
<div id="search">
    <div>
      <div>
        
        <div><input type="text" name="txtString"  id="txtString"  class="keyboardInput"></div><!--1-->
          <br />
        <div align="center">
                <a  class="search_button" href="#" id="getdata-button">Search</a>
        </div>
        <?php //echo $translator->response->languageSelectBox; ?>
    
        
        
        <!-- 3 -->
        <!--<div class="bgwhite width500" id="showdata"></div>-->
         
        <p style="font-size:20px; ">
          <!--
        <select name="src_lang">
          <option>Source Language</option>
          <option>English</option>
          <option>Russian</option>
          <option>Mandarin</option>
          <option>Farsi</option>
        </select>-->
        <select name="tgt_lang">
          <option>Target Language</option>
          <option>English</option>
          <option>Russian</option>
          <option>Mandarin</option>
          <option>Farsi</option>
        </select>
        <b>From:</b> <input type="date" name="startdate" placeholder="Start Date">
        <b>To:</b> <input type="date" name="enddate" placeholder="End Date">
        </p>
    </div>
  </div>
</div><!--search-->
    <!--</div>header-->

    