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
<div id="search" >
  <div align="center">
  <div style="width:980px;">        
    <div><input type="text" name="txtString"  id="txtString"  class="keyboardInput"></div><!--1-->
    <div style="height:40px; text-align:center; ">
        <button  class="search_button" id="getdata-button" style="cursor:pointer;">Search</button>
    </div>
    <?php //echo $translator->response->languageSelectBox; ?>

    <!-- 3 -->
    <!--<div class="bgwhite width500" id="showdata"></div>-->

    <p style="width: 965px; font-size:20px; text-align: left; margin:-12px 0px 8px 20px;">
    <select id="tgt_lang" name="tgt_lang">
      <option value="">Search in ...</option><?php
          //$langs = $lm->getListOfLang();
          $langs = $lm->getLanguages();
          foreach ($langs as $lang) {
            echo '<option value="';
            echo $lang->getLangId();
            echo '">';
            echo $lang->getLangName();
            echo '</option>';
          }
  ?></select>
    <b style="font-size: 16px;">From:</b> <input type="date" id="startdate" name="startdate" placeholder="Start Date">
    <b style="font-size: 16px;">To:</b> <input type="date" id="enddate" name="enddate" placeholder="End Date">
    </p>
</div></div></div>

    