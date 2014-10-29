<html>
<head>
<script src="../plug-in/autocomplete/jquery.js"></script>	

</head>
<body>
<?php
// Include utility files
require_once '../config.php';
require_once BUSINESS_DIR_SUBSCRIPTION . 'Subscription.php';
require_once BUSINESS_DIR_SUBSCRIPTION . 'SubscriptionManager.php';

?>

<form action="" method="post">
	<label>Email</label><input type="text" name="sub_email" id="sub_email_id">
	<input type="Submit" value="Subscribe" id="submitbtn">
	<span id="sub_error"></span>
</form>

<form action="" method="post">
	<label>Email</label><input type="text" name="usub_email" id="usub_email_id">
	<input type="Submit" value="UnSubscribe" id="usubmitbtn">
	<span id="usub_error"></span>
</form>

<?php

$sub_email = isset($_POST['sub_email']) ? $_POST['sub_email'] : "";
$usub_email = isset($_POST['usub_email']) ? $_POST['usub_email'] : "";

$subscribe = new SubscriptionManager();

if($sub_email!=""){

	$subscribed = $subscribe->subscribe($sub_email);

	if($subscribed)
		echo "Subscribed successfully";
	else
		echo "Failed successfully";
}
else if($usub_email!=""){

	$subscribed = $subscribe->unsubscribe($usub_email);

	if($subscribed)
		echo "UnSubscribed successfully";
	else
		echo "Email does not exist";
}

?>

<script>
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;


		$(document).ready(function(){
		
        $("#sub_email_id").keydown(function(){

			//comparing the above regex to the value in the texbox, if not from the box then send error
		 	if(!emailReg.test($("#sub_email_id").val())){
		 				
		 		//fill the textbox label with error
	            document.getElementById("sub_error").innerHTML="<font color='red' size='2px' family='verdana'>invalid Email</font>";
	            $("#sub_email").css("border-color","rgba(255,0,0,.6)"); 

	            //Disable submit button
	            $('#submitbtn').attr('disabled','disabled'); 

	            }
	            else{

	            document.getElementById("sub_error").innerHTML="<font color='red' size='2px' family='verdana'></font>";
	            $("#sub_email").css("border-color","rgba(255,0,0,.6)"); 

	            //Disable submit button
	            $('#submitbtn').attr('disabled',''); 
	

	            }
		});

	  $("#usub_email_id").keydown(function(){

			//comparing the above regex to the value in the texbox, if not from the box then send error
		 	if(!emailReg.test($("#usub_email_id").val())){
		 				
		 		//fill the textbox label with error
	            document.getElementById("usub_error").innerHTML="<font color='red' size='2px' family='verdana'>invalid Email</font>";
	            $("#sub_email").css("border-color","rgba(255,0,0,.6)"); 

	            //Disable submit button
	            $('#usubmitbtn').attr('disabled','disabled'); 

	            }
	            else{

	            document.getElementById("usub_error").innerHTML="<font color='red' size='2px' family='verdana'></font>";
	            $("#usub_email").css("border-color","rgba(255,0,0,.6)"); 

	            //Disable submit button
	            $('#usubmitbtn').attr('disabled',''); 
	

	            }
		});
	});
	</script>

</body>
</html>