$(document).ready(function(){
$( "#hello" ).dialog({ autoOpen: false });
$( "#say_it" ).click(function() {
$( "#hello" ).dialog( "open" );
});
});