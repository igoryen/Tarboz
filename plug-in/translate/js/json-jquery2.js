$(document).ready(function(){ 
    //alert(document.getElementById('txtLang').value);
  //attach a jQuery live event to the button
  //$('#loader').ajaxLoader();
  $('#create-verbatim-button').live("click", function(){
      //$('#loader').ajaxLoader();
      var text = document.getElementById('txtString2').value;
      text = text.replace(/(\r\n|\n|\r)/gm," "); // replace line breaks with commas
      //var lang = document.getElementById('txtLang').value;
      var lang = 'en'; // 141029
      var json_url = 'translator.php?text='+ text +'&to='+lang;  
    $.getJSON(json_url, function(data) {  
      //alert(data); //uncomment this for debug
      //alert (data.item1+" "+data.item2+" "+data.item3); //further debug
      if(data.translation){
      //$('#showdata').html("<p class='bdr'>"+data.translation+"</p>");
      //
        // remove the surrounding xml tags from the string
        var verbatim = data.translation;
        var left = /<string xmlns[^>]+\>[^A-Za-z0-9_ ]*/g;
        var right = /\<\/string\>/g;
        var verbatim = verbatim.replace(left, '');
        verbatim = verbatim.replace(right, '');
        verbatim = verbatim.replace(/\s/g, ", ");
        verbatim = verbatim.replace(/(\r\n|\n|\r)/gm,", "); // replace line breaks with commas
        
        var apostrophe = /'/g;
        var dblquotes = /"/g;
        // MySQL: An apostrophe (') inside a string quoted with apostrophes 
        // may be written as two apostrophes ('').
        verbatim = verbatim.replace(apostrophe, "\''"); 
        // MySQL: Double quotes (") inside a string quoted with double quotes 
        // may be written two sets of double quotes ("").
        verbatim = verbatim.replace(dblquotes, '\\""');
        //alert("verbatim = " + verbatim);
        //window.location.href = 'entrycreate.php?verbatim='+ verbatim;
        $('#verbatim').html(verbatim);
      }
      else
      $('#showdata').html("<p>Error ="+data.errorReason+"</p>");      
      //$('#loader').ajaxLoaderRemove();
    });
  });
    
    $("textarea").blur(function() {
        //$('#loader').ajaxLoader();
      var text = document.getElementById('txtString').value
      var lang = document.getElementById('txtLang').value;
      var json_url = 'translator.php?text='+ text +'&to='+lang;     
    /*$.getJSON(json_url, function(data) {  
        
      //alert(data); //uncomment this for debug
      //alert (data.item1+" "+data.item2+" "+data.item3); //further debug
      if(data.translation)
      $('#showdata').html("<p class='bdr'>"+data.translation+"</p>");
      else
      $('#showdata').html("<p>Error ="+data.errorReason+"</p>");      
      //$('#loader').ajaxLoaderRemove();
    });*/
    });     
    
    $("#txtLang").bind("change", function() {
        //$('#loader').ajaxLoader();
      var text = document.getElementById('txtString').value
      var lang = document.getElementById('txtLang').value;
      var json_url = 'translator.php?text='+ text +'&to='+lang; 
          
    /*$.getJSON(json_url, function(data) {  
        
      //alert(data); //uncomment this for debug
      //alert (data.item1+" "+data.item2+" "+data.item3); //further debug
      if(data.translation) {
      $('#showdata').html("<p class='bdr'>"+data.translation+"</p>");
      } else {
      $('#showdata').html("<p>Error ="+data.errorReason+"</p>");      
      //$('#loader').ajaxLoaderRemove();
      }
    });*/
    }); 
});




