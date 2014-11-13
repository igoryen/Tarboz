var families = "One or more groups that consist of "
        + "the original phrase (father) and one or more of its "
        + "translations (children) into one or more languages. AKA 'families'";
var dads = "The original phrases (fathers) "
        +"whose translations (children) don't exist in the db or were not retrieved)"
var kids = "Translations (children) whose originals (fathers) "
        +"exist in the DB but were not returned in this search";
var orphans = "Translations (children) whose originals (fathers) do not exist in our DB";
var orig = "This entry is an original (father). You can use it to make a new translation";
var tran = "This entry is a translation (child). Click 'O' to see the original (father)";
$(document).ready(function () {
  
  $("span#families").hover(function () {
    $(this).append('<div class="tooltip"><p>'+families+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });
  
  $("span#dads").hover(function () {
    $(this).append('<div class="tooltip"><p>'+dads+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });
  
  $("span#kids").hover(function () {
    $(this).append('<div class="tooltip"><p>'+kids+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });
  
  $("span#orphans").hover(function () {
    $(this).append('<div class="tooltip"><p>'+orphans+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });
  
  $("span#orig").hover(function () {
    $(this).append('<div class="tooltip"><p>'+orig+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });
  
  $("span#tran").hover(function () {
    $(this).append('<div class="tooltip"><p>'+tran+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });
  
});