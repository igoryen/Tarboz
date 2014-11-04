<?php
// for translator
//require("header.php");
require_once('plug-in/translate/config.inc.php');
require_once('plug-in/translate/class/ServicesJSON.class.php');
require_once('plug-in/translate/class/MicrosoftTranslator.class.php');
require_once BUSINESS_DIR_LANG . "LanguageManager.php";
require_once BUSINESS_DIR_LANG . "Language.php";

$lm = new LanguageManager();

$translator = new MicrosoftTranslator(ACCOUNT_KEY);
$selectbox = array('id'=> 'txtLang','name'=>'txtLang');
$translator->getLanguagesSelectBox($selectbox);

?>
<div id="wrapper">
<div id="search" >
  <div align="center">
  <div style="width:980px;">        
    <div><input type="text" name="txtString"  id="txtString"  class="keyboardInput"></div><!--1-->
      <br />
    <div align="center">
            <a  class="search_button" href="#" id="getdata-button">Search</a>
    </div>
    <?php //echo $translator->response->languageSelectBox; ?>



    <!-- 3 -->
    <!--<div class="bgwhite width500" id="showdata"></div>-->

    <p style="font-size:20px; text-align: left">
    <select name="tgt_lang">
      <option value="">Search in ...</option><?php
          $langs = $lm->getListOfLang();
          foreach ($langs as $lang) {
            echo '<option value="';
            echo $lang->getLangId();
            echo '">';
            echo $lang->getLangName();
            echo '</option>';
          }
  ?></select>
    <b>From:</b> <input type="date" name="startdate" placeholder="Start Date">
    <b>To:</b> <input type="date" name="enddate" placeholder="End Date">
    </p>
</div></div>
</div><!--search-->
    <!--</div>header-->

    