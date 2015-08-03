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
    <div>
      <input type="text" name="txtString"  id="txtString"  class="keyboardInput"
             placeholder="Example: Go ahead, make my day.">
    </div><!--1-->
    <?php //echo $translator->response->languageSelectBox; ?>

    <!-- 3 -->
  

    <p style="font-size:20px; text-align: left; color:#3B8DFF">
    <select name="tgt_lang" id="tgtlang">
      <option value="">Search in ...</option><?php
          //$langs = $lm->getListOfLang();
          $langs = $lm->getLanguages();
          foreach ($langs as $lang) {
            echo '<option value="';
            echo $lang->getLangId();
            echo '">';
            echo $lang->getLangName();
            echo '</option>';
          }?></select>
    <b>Authen:</b> 
    <select name="auth" id="authst">
      <option value="">Select one:</option>
      <option value="1">Original</option>
      <option value="2">Translation</option>
      <option value="3">Unknown</option>
    </select>  
    <b>From:</b> <input type="date" id="fromdate" name="startdate">
    <b>To:</b> <input type="date" id="todate" name="enddate">
    <button  class="search_button" href="#" id="getdata-button">Search</button>
    </p>
</div></div>
    <script>
      $("#showdata").bind("DOMSubtreeModified", function() {
        //alert("tree changed");
        var lang = document.getElementById("tgtlang").value;
        var auth = document.getElementById("authst").value;
        var from = document.getElementById("fromdate").value;
        var to = document.getElementById("todate").value;
        var verbatim = document.getElementById("showdata").innerHTML; 
        var searchStr = document.getElementById("txtString").innerHTML; 
        
        // using POST
//        $.post('searchresult.php',{
//            tgtlang: lang,
//            auth: auth,
//            from: from,
//            to: to,
//            verbatim: verbatim
//          },function(response){
//            $('#showdata').html(response);
//          });
          
        // using GET
        window.location.href ='searchresult.php'+
          '?l=' + lang +
          '&a=' + auth +
          '&f=' + from +
          '&t=' + to +
          '&v='+ verbatim +
          '&s=' + searchStr;          
      });
    </script>
    
</div>
  <div id="searchDialog" title="Search Alert!" style="display:none;">
    <p>Please input at least <b>one</b> of these:</p>
    <ul>
      <li>a search phrase</li>
      <li>a search language</li>
      <li>a time frame (<b>From:</b> and <b>To:</b>)</li>
    </ul>
  </div>

    