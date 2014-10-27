<?php 

$arr[] = array("Habib Khan","Salim Ullah khan","Najeeb ullah Khan","Love you Arzo","My babe gak dega");

$myarr = json_encode($arr);
$mystr2=str_replace("[[","[",$myarr);
$mystr3=str_replace("]]","]",$mystr2);

echo $mystr3;


?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery UI Autocomplete - Default functionality</title>
<link rel="stylesheet" href="./jqueryui/jquery-ui.css">
<script src="./jqueryui/jquery.js"></script>
<script src="./jqueryui/jquery-ui.js"></script>

<script>

$(function() {
var availableTags = '<?php echo $mystr3;?>'
$( "#tags" ).autocomplete({
source: availableTags
});
});
</script>
</head>
<body>
<div class="ui-widget">
<label for="tags">Tags: </label>
<input id="tags">
</div>
</body>
</html>