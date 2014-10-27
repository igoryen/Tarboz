<!DOCTYPE html>

<html>
<head>
	<title> Registration Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="../../plug-in/jqueryui/jquery-ui.css">
	<script src="../../plug-in/jqueryui/jquery.js"></script>
	<script src="../../plug-in/jqueryui/jquery-ui.js"></script>
	<script src="../../plug-in/autocomplete/jquery.js"></script>
	<script src="../../plug-in/autocomplete/jquery.autocomplete.js"></script>
	
	<link rel="stylesheet" href="./style.css">

	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
		<!-- for date picking purpose-->
	<script>
		$(function() {
			//$( "#dob" ).datepicker();
		});
	</script>

	<script>

		$(document).ready(function(){

	
		$("#city").autocomplete("../../user_test/form_search.php?q="+$("#city").val(), {

        selectFirst: true

  		});

		$("#city").change(function(){	

  		$.post("../../user_test/province_by_city_name.php",
			              {
			               // userid: $("#userlogin").val(),
			                city: $("#city").val(),
			                province: $("#province").val(),
			              },
		            	function(data,status){

		                      var mydata = data.split(",");

		                      $("#province").val(mydata[0]); 
		                      $("#country").val(mydata[1]);
		    });
  			});

		//Regex Patterns
		var pass = /^[a-z0-9\.\-\)\(\_)]+$/i;
		var uname = /^[a-z0-9\.\-]+$/i;
		var mname = /^[a-z ]+$/i;
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

		//When the Last Name texbox is changing this will be invoked
		$("#fname").change(function(){

			//comparing the above regex to the value in the texbox, if not from the box then send error
		 	if(!mname.test($("#fname").val())){
		 				
		 		//fill the textbox label with error
	            document.getElementById("fname_error").innerHTML="<font color='red' size='2px' family='verdana'>Invalid FirstName</font>";
	            $("#fname").css("border-color","rgba(255,0,0,.6)"); 

	            //Disable submit button
	            $('#submitbtn').attr('disabled','disabled'); 

	            }
	        else{
	            $("#fname").css("border-color","rgba(0,255,100,.6)"); 
	                document.getElementById("fname_error").innerHTML="";
	            }	

                });//end of fname onchange

				//When the Last Name texbox is changint this will be invoked
            	$("#lname").change(function(){

            		 //comparing the above regex to the value in the texbox
	            	if(!mname.test($("#lname").val())){
	            		
	            		//fill the textbox label with error
	            		document.getElementById("lname_error").innerHTML="<font color='red' size='2px' family='verdana'>Invalid LastName</font>";
	            	    $("#lname").css("border-color","rgba(255,0,0,.6"); 

	            	    //Disable submit button	
	            	    $('#submitbtn').attr('disabled','disabled'); 	

	            	}
	            	else{
	            		$("#lname").css("border-color","rgba(0,255,100,.6)"); 
	            		document.getElementById("lname_error").innerHTML="";
	            	}

				});//end of lname on change
		
				//When the userid textbox is chaning,this will be invoked
				$("#userid").change(function(){

                    //comparing the above regex to the value in the texbox                            		
	        	    if(!uname.test($("#userid").val())){
	        	    	//fill the textbox label with error
	            	   document.getElementById("userid_error").innerHTML="<font color='red' size='2px' family='verdana'>Invalid UserId</font>";

	            	   $("#userid").css("border-color","rgba(255,0,0,.6"); 

	            	   //disable the submit button
	            	   $('#submitbtn').attr('disabled','disabled'); 

	            	   } 
	            	else if($("#userid").val().length<4){

					   //fill the textbox label with error
	            	   document.getElementById("userid_error").innerHTML="<font color='red' size='2px' family='verdana'>Minimum user length is 4</font>";

	            	   $("#userid").css("border-color","rgba(255,0,0,.6"); 

	            	   //disable the submit button
	            	   $('#submitbtn').attr('disabled','disabled'); 

					   }

					else{
						$("#userid").css("border-color","rgba(0,0,0,.3)"); 

		            	$.post("../../user_test/user_email_test.php",
			              {
			               // userid: $("#userlogin").val(),
			                userid: $("#userid").val(),
			              },
		            	function(data,status){

		                      document.getElementById("userid_error").innerHTML=data; 

		                });
		            
		         		}
		        });//end of change

		        //When the userid textbox is chaning,this will be invoked
				$("#memail").change(function(){

                    //comparing the above regex to the value in the texbox                            		
	        	    if(!emailReg.test($("#memail").val())){

	        	    	//fill the textbox label with error
	            	   document.getElementById("email_error").innerHTML="<font color='red' size='2px' family='verdana'>Invalid Email</font>";

	            	   $("#memail").css("border-color","rgba(255,0,0,.6"); 

	            	   //disable the submit button
	            	   $('#submitbtn').attr('disabled','disabled'); 

		            	   } 
					else{
 
		            	$.post("../../user_test/user_email_test.php",
			              {
			               // userid: $("#userlogin").val(),
			                useremail: $("#memail").val(),
			              },
		            	function(data,status){

		                      document.getElementById("email_error").innerHTML=data;
		                      $("#userid").css("border-color","rgba(0,0,0,.3)"); 

		                });

		            
		         		}
		        });//end of change

				//When the userid textbox is chaning,this will be invoked
				$("#pwd2").change(function(){

					//checking length of the password
					if($("#pwd2").val().length<10){
						document.getElementById("pwd_error").innerHTML="<font color='red' size='2px' family='verdana'>Please enter a password minimum 10 characters</font>";
						$('#submitbtn').attr('disabled','disabled');
						$("#pwd1, pwd2").css("border-color","rgba(0,255,100,.6)"); 	
					}

					//checking if the password matches	
					else if($("#pwd1").val()!=$("#pwd2").val()){
						document.getElementById("pwd_error").innerHTML="<font color='red' size='2px' family='verdana'>Passwords do not match</font>";
						$('#submitbtn').attr('disabled','disabled');
						$("#pwd1, pwd2").css("border-color","rgba(0,255,100,.6)"); 	 

					}else{

						$("#pwd1, #pwd2").css("border-color","rgba(0,0,0,.3)");
						document.getElementById("pwd_error").innerHTML="";	

	                    //comparing the above regex to the value in the texbox and checking if the lenght is atleast 10                            		
		        	    if(!pass.test($("#pwd2").val())){
		        	    	//fill the textbox label with error
		            	   document.getElementById("pwd_error").innerHTML="<font color='red' size='1px' family='verdana'>Your password contains invalid character, Please use: a-z 0-9.( )_- only</font>";

		            	   $("#pwd1, #pwd2").css("border-color","rgba(255,0,0,.6"); 

		            	   //disable the submit button
		            	   $('#submitbtn').attr('disabled','disabled'); 

		            	   } 
						else{
							$("#pwd1 , #pwd2").css("border-color","rgba(0,255,100,.6)"); 	
			            
		         		}
		         	}
		        });//end of change
			});//end of document ready		
	</script>
</head>
<body>
	<div id="bg">
		  <div class="module">
		    <ul>
		      <li class="tab activeTab"><img src="http://i.imgur.com/Fk1Urva.png" alt="" class="icon"/></li>
		      <li class="tab" ><img src="http://i.imgur.com/ZsRgIDD.png" alt="" class="icon"/></li>
		      <li class="tab" ><img src="http://i.imgur.com/34Q50wo.png" alt="" class="icon"/></li>
		      <li class="tab" ><img src="http://i.imgur.com/LCCJ06E.png" alt="" class="icon"/></li>
		    </ul>
		    
		    <form class="form">
		    	<span class="error_box" id="fname_error"></span>
		      <input type="text" placeholder="First Name" class="textbox" id="fname"/>
		      <span class="error_box" id="lname_error"></span>
		      <input type="text" placeholder="Last Name" class="textbox" id="lname"/>
		      <span class="error_box" id="userid_error"></span>
		      <input type="text" placeholder="User Name" class="textbox" id="userid" />
		      <span class="error_box" id="email_error"></span>
		      <input type="text" placeholder="Email Address" class="textbox" id="memail"/>
		      <span class="error_box" id="pwd_error"></span>
		      <input type="password" placeholder="Password" class="textbox" id="pwd1"/>
		      <input type="password" placeholder="Retype Password" class="textbox" id="pwd2"/>
		      <input type="checkbox" placeholder="Date of Birth" class="textbox" id="dob"/>
		      <input type="text" placeholder="City" class="textbox" id="city" />
		      <input type="text" placeholder="Province" class="textbox" id="province" />
		      <input type="text" placeholder="Country" class="textbox" id="country" />
		      <br/>
		       <div class="checkbox">
		       		<input type="checkbox" class="cb_data"> <label class="cb_data">English</label><input type="checkbox" class="cb_data"> <label class="cb_data">Persian</label>
		       		<input type="checkbox" class="cb_data"> <label class="cb_data">Russian</label><input type="checkbox" class="cb_data"> <label class="cb_data">Mandarin</label>
		       		<input type="checkbox" class="cb_data"> <label class="cb_data">Japanese</label><input type="checkbox" class="cb_data"> <label class="cb_data">Hindi</label>
		       		<input type="checkbox" class="cb_data"> <label class="cb_data">English</label><input type="checkbox" class="cb_data"> <label class="cb_data">English</label> 
		       </div>
		       <br>
		      <input type="button" value="Next" class="button" id="submitbtn"/>
		    </form>
		  </div>
    </div>

</body>
</html>

