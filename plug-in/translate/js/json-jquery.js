$(document).ready(function(){ 
    //alert(document.getElementById('txtLang').value);
	//attach a jQuery live event to the button
	//$('#loader').ajaxLoader();
	$('#getdata-button').click( function(){
        //alert("here");
    	//$('#loader').ajaxLoader();
    	var text = encodeURIComponent(document.getElementById('txtString').value);
        var tgt_lang = $('#tgt_lang').val();
        var from_date = $('#startdate').val();
        var end_date = $('#enddate').val();
    	//var lang = document.getElementById('txtLang').value;
        //alert("text: " + text +";<br/> target language:"+tgt_lang+";<br/>from date:"+from_date+";<br/>end date:"+end_date);
        var lang = 'en'; // 141029
        var json_url = 'translator.php?text='+ text +'&to='+lang;
        //alert('json_url: ' + json_url);
        
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
            verbatim = verbatim.replace(/\s/g, ", ");
            
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
            window.location.href = 'searchresult.php?verbatim='+ verbatim+'&searchtext='+text
                                   +'&tgtlang='+tgt_lang+'&fromdate='+from_date+'&enddate='+end_date; 
            
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




