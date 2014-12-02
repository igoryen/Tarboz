(function($){
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
Sub_EmailCheck = function() {
        //comparing the above regex to the value in the texbox, if not from the box then send error
		 	if(!emailReg.test($("#sub_email_id").val())){
		 				
		 		//fill the textbox label with error
	            document.getElementById("sub_error").innerHTML="<font color='red' size='2px' family='verdana'>Invalid Email Address</font>";
	            $("#sub_email").css("border-color","rgba(255,0,0,.6)"); 

	            //Disable submit button
	            $('#submitbtn').attr('disabled','disabled'); 

	            }
	            else{

	            document.getElementById("sub_error").innerHTML="<font color='red' size='2px' family='verdana'></font>";
	            $("#sub_email").css("border-color","rgba(255,0,0,.6)"); 

	            //Disable submit button
	            $('#submitbtn').removeAttr('disabled'); 
	

	            }
}

UNSub_EmailCheck = function() {
    
    			//comparing the above regex to the value in the texbox, if not from the box then send error
    if(!emailReg.test($("#usub_email_id").val())){
		 				
		//fill the textbox label with error
	    document.getElementById("usub_error").innerHTML="<font color='red' size='2px' family='verdana'>Invalid Email</font>";
	    $("#sub_email").css("border-color","rgba(255,0,0,.6)"); 

	            //Disable submit button
	    $('#usubmitbtn').attr('disabled','disabled'); 

	    }
	    else{

	       document.getElementById("usub_error").innerHTML="<font color='red' size='2px' family='verdana'></font>";
	       $("#usub_email").css("border-color","rgba(255,0,0,.6)"); 

	       //Disable submit button
	       $('#usubmitbtn').removeAttr('disabled'); 
	
	   }
}


})(jQuery);