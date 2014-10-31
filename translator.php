<?php
/**
 * This file will retuen JSON response
 */
require_once('plug-in/translate/config.inc.php');
require_once('plug-in/translate/class/ServicesJSON.class.php');
require_once('plug-in/translate/class/MicrosoftTranslator.class.php');

$translator = new MicrosoftTranslator(ACCOUNT_KEY);
$text_to_translate = $_REQUEST["text"];
$to = $_REQUEST['to'];
//$from = $_REQUEST['from'];  //NOTICE:There is no "from" from URL;
$from='';
$format = '';
$to = 'en'; // the target language for verbatim will always be english (141029)
$translator->translate($from, $to, $text_to_translate, $format);
echo $translator->response->jsonResponse;