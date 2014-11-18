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
var entry_lang = "The language in which this entry was originally created";
var entry_authen = "Whether this entry is an original or a translation of an original";
var entry_text = "The text of the entry";
var entry_video = "A video that demonstrates how to pronounce the phrase";
var entry_translit = "The text transliterated using the Latin alphabet to help with the pronunciation";
var entry_use = "When and why people use this phrase";
var entry_translate = "If you can, create a translation of this entry in another language";
var entry_added_by = "The user who added this entry to the database";
var entry_date = "When this entry was first added to the database";
var entry_media = "What kind of media...";


$(document).ready(function () {

  $("span#entrymedia").hover(function () {
    $(this).append('<div class="tooltip"><p>'+entry_media+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });
  
  $("span#entrydate").hover(function () {
    $(this).append('<div class="tooltip"><p>'+entry_date+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });

  $("span#entryaddedby").hover(function () {
    $(this).append('<div class="tooltip"><p>'+entry_added_by+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });

  $("span#entrytranslate").hover(function () {
    $(this).append('<div class="tooltip"><p>'+entry_translate+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  }); 

  $("span#entryuse").hover(function () {
    $(this).append('<div class="tooltip"><p>'+entry_use+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });  

  $("span#entrytranslit").hover(function () {
    $(this).append('<div class="tooltip"><p>'+entry_translit+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });  

  $("span#entryviewvideo").hover(function () {
    $(this).append('<div class="tooltip"><p>'+entry_video+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });  
  
  $("span#entryviewtext").hover(function () {
    $(this).append('<div class="tooltip"><p>'+entry_text+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });
  
  $("span#entryviewauthen").hover(function () {
    $(this).append('<div class="tooltip"><p>'+entry_authen+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });
  
  $("span#entryviewlang").hover(function () {
    $(this).append('<div class="tooltip"><p>'+entry_lang+'</p></div>');
  }, function () {
    $("div.tooltip").remove();
  });
  
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