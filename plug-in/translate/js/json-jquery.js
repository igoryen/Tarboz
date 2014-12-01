$(document).ready(function(){ 
    //alert(document.getElementById('txtLang').value);
	//attach a jQuery live event to the button
	//$('#loader').ajaxLoader();
    $("#searchDialog").dialog({
        autoOpen: false
    });
  $('#getdata-button').click(function(){
  //$('#getdata-button').live("click", function(){
    	//$('#loader').ajaxLoader();
    	var text = encodeURIComponent(document.getElementById('txtString').value);
        var tgtlang = $('#tgtlang').val();
        var auth = $('#authst').val();
        var from = $('#fromdate').val();
        var to = $('#todate').val();
    	//var lang = document.getElementById('txtLang').value;
        //alert("text: " + text +";<br/> target language:"+tgtlang+";<br/>from date:"+from+";<br/>end date:"+to);
        var lang = 'en'; // 141029
        var json_url = 'translator.php?text='+ text +'&to='+lang;
        //alert('json_url: ' + json_url);
        if (tgtlang=="" && (from=="" || to=="") && text=="") { 
            //$('#searchDialog').css({'display': 'block'});
            $( "#searchDialog" ).dialog("open");

        }
        
		$.getJSON(json_url, function(data) {	
            var verbatim = "";
			//alert(data); //uncomment this for debug
			//alert (data.item1+" "+data.item2+" "+data.item3); //further debug
		    if(data.translation){
			//$('#showdata').html("<p class='bdr'>"+data.translation+"</p>");
                    
            // remove the surrounding xml tags from the string
            verbatim = data.translation;
            var left = /<string xmlns[^>]+\>[^A-Za-z0-9_ ]*/g;
            var right = /\<\/string\>/g;
            var verbatim = verbatim.replace(left, '');
            verbatim = verbatim.replace(right, '');
            verbatim = verbatim.replace(/\s/g, ", "); // replace spaces with commas
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
            //window.location.href = 'searchresult.php?verbatim='+ verbatim+'&searchtext='+text
             //                                     +'&fromdate='+from_date+'&todate='+to_date;
            }
		    else {
			  //$('#showdata').html("<p>Error ="+data.errorReason+"</p>");
			  //$('#loader').ajaxLoaderRemove();
              //alert("Error ="+data.errorReason);
            } 
            //alert("verbatim2: "+verbatim);
//            window.location.href = 'searchresult.php?v='+ verbatim+'&searchtext='+text
//                                   +'&tgtlang='+tgt_lang+'&fromdate='+from_date+'&enddate='+end_date;
            if (!(tgtlang=="" && (from=="" || to=="") && verbatim=="") ){
            window.location.href ='searchresult.php'+
              '?l=' + tgtlang +
              '&a=' + auth +
              '&f=' + from +
              '&t=' + to +
              '&v='+ verbatim +
              '&s=' + text; 
           }   
		});
    
	}); // ('#getdata-button')
    //-----------------------------------------
    $("#txtString").keypress(function(e){
      if(e.which == 13){//Enter key pressed
        $('#getdata-button').click();//Trigger search button click event
      }
    });
    //-------------------------------------------
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




