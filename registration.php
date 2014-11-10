
<?php
require_once './config.php';
require_once BUSINESS_DIR_LANG . 'LanguageManager.php';
//For getting the languages in the select
$Language = new LanguageManager();
$LanguageList = $Language->getLanguages();
?>
<!DOCTYPE html>

<html>
<head>
	<title> Registration Form</title>
	<!--<link rel="stylesheet" href="./style.css">-->
	<script src="plug-in/jquery.js"></script>
  	<link rel="stylesheet" type="text/css" href="views/registration/style.css">
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
	<!-- for date picking purpose-->
	<script>

	  $(document).ready(function(){

		var works=true;	

		//Coding for the captcha, to see if the user has typed the correct text
		$('#mycaptcha').on('keyup',function(){

			if($('#mycaptcha').val().length>=5){

				$.post("user_test/captcha_check.php",
					{
					// userid: $("#userlogin").val(),
					 mocaptcha: $("#mycaptcha").val(),
					},
					function(data,status){
					
						if(data==0){
							document.getElementById("final_error").innerHTML="Captcha did not match";
							works=false;	
						}
						if(data==1){
							works=true;
							document.getElementById("final_error").innerHTML="";
						}

					});
			}

			});

            //Works like a flag, if any mistake in the form it will turn to false

			//Coding the submit button...
			$('#submitbtn').on('click',function(){
				var arrLang = [];
				var arrPrf  = [];

				uid    		= $("#userid").val();
				capc 		= $('#mycaptcha').val();
				pwd   	    = $("#pwd1").val();
				fname   	= $("#fname").val();
				lname   	= $("#lname").val();
				email   	= $("#memail").val();
				pass    	= $("#pwd2, #pwd1").val();
				daysel  	= $('#dayselect').val();
				monthsel 	= $('#monthselect').val();
				yearsel 	= $('#yearselect').val();
				agree_term 	= $('#agree_box').prop('checked');

				 //checks if the textboxes are empty it will change the flag to false; 	
                if((!uid) || (!capc) ||(!fname) || (!lname) || (!email) || (!pass) || (!daysel) || (!monthsel) || (!yearsel) || (!agree_term)){

                 	works=false;
                }

                if(!works){

                    document.getElementById('final_error').innerHTML ="<font size='1.3px' color='red'>Please fill the form, accept the agreement and re-submit your form</font>";
                }
                else{

                   works=true;
                   //A jquery function, that goes through the array of selects and then adds them to the array called arrLang
                   $('[id=lang]').each(function (i, item) {
				   
		                   var lang = $(item).val();
		                   arrLang.push(lang);
						   
               		});
                   	//A jquery function, that goes through the array of select prof and then adds them to the array called arrprf
                    $('[id=prof]').each(function (i, item) {
					
		                   var prof = $(item).val();
		                   arrPrf.push(prof);
						   
               		});
                	var data0 = {fname: fname, mlname : lname, userid : uid,password:pwd, emailid : email, mylanguage : arrLang, proficient : arrPrf, dob : yearsel+"-"+monthsel+"-"+daysel};
                	//var json = JSON2.stringify(data0 ); 

                	$.post("Register_action.php",
						{
							// userid: $("#userlogin").val(),
							json: data0,
						},
					function(data,status){
						if(data==1){
							//alert(data);
							window.location = 'Registered.php';
						}
						document.getElementById("userid_error").innerHTML=data; 

					});
                }

			});

			//to open the agreement in a seperate page to read it..	
			$("#load_agreement").click(function () {                    
				   window.open("agreement.html", "PopupWindow", "width=600,height=600,scrollbars=yes,resizable=no");
			});


			//A code that loads, another page inside the agreement div	
			$( "#agreement" ).load( "agreement.html" );

			//This part here will keep generating, duplicate of the language and profeciency box, incase someone needs it
			$('#Add').click(function(){
				//we select the box clone it and insert it after the box
				$('#lang').clone().insertAfter("#lang").before('<br>');
				$('#prof').clone().insertAfter("#prof").before('<br>');
			});

			 //this part here generates number 1-31 and adds into month and days
			i=0;
			for(i=1; i<=31; i++){
				
				$('#dayselect').append($('<option>', {value:i, text:i}));

				if(i<=12){	
					$('#monthselect').append($('<option>', {value:i, text:i}));
				}
			}

			//this code here generates years, will work for the last, 120 years
			year=(new Date).getFullYear()-120;
			i = (new Date).getFullYear()-16;
			for(i; i>=year; i--){

				$('#yearselect').append($('<option>', {value:i, text:i}));
			}

			//Regex Patterns
			var pass = /^[a-z0-9\.\-\)\(\_)]+$/i;
			var uname = /^[a-z0-9\.\-]+$/i;
			var mname = /^[a-z ]+$/i;
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

			//When the Last Name texbox is changing this will be invoked
			$("#fname").keydown(function(){
			
					//comparing the above regex to the value in the texbox, if not from the box then send error
					if(!mname.test($("#fname").val())){
							
						//fill the textbox label with error
						document.getElementById("fname_error").innerHTML="<font color='red' size='2px' family='verdana'>Invalid FirstName</font>";
						$("#fname").css("border-color","rgba(255,0,0,.6)"); 

						works=false;
					}
					else{
						$("#fname").css("border-color","rgba(0,255,100,.6)"); 
							document.getElementById("fname_error").innerHTML="";
							works = true;
						}		
			});//end of fname onchange

			//When the Last Name texbox is changint this will be invoked
			$("#lname").keydown(function(){

				 //comparing the above regex to the value in the texbox
				if(!mname.test($("#lname").val())){
							
					//fill the textbox label with error
					document.getElementById("lname_error").innerHTML="<font color='red' size='2px' family='verdana'>Invalid LastName</font>";
					$("#lname").css("border-color","rgba(255,0,0,.6"); 

					works=false;

				}
				else{
					$("#lname").css("border-color","rgba(0,255,100,.6)"); 
					document.getElementById("lname_error").innerHTML="";
					works = true;
					}
			});//end of lname on change
			
			//When the userid textbox is chaning,this will be invoked
			$("#userid").keydown(function(){

				//comparing the above regex to the value in the texbox                            		
				if(!uname.test($("#userid").val())){
					//fill the textbox label with error
					document.getElementById("userid_error").innerHTML="<font color='red' size='2px' family='verdana'>Invalid UserId</font>";

					$("#userid").css("border-color","rgba(255,0,0,.6"); 
					works=false;

				} 
				/*
				else if($("#userid").val().length<4){

					//fill the textbox label with error
					document.getElementById("userid_error").innerHTML="<font color='red' size='2px' family='verdana'>Minimum user length is 4</font>";

					$("#userid").css("border-color","rgba(255,0,0,.6"); 

					//disable the submit button
					//$('#submitbtn').attr('disabled','disabled'); 
					works=false;

				}
					*/
				else{
					$("#userid").css("border-color","rgba(0,0,0,.3)"); 

					$.post("user_test/user_email_test.php",
						{
							// userid: $("#userlogin").val(),
							userid: $("#userid").val(),
						},
					function(data,status){
						document.getElementById("userid_error").innerHTML=data; 

					});
				works = true;
				}

			});//end of change

			//When the userid textbox is chaning,this will be invoked
			$("#memail").keydown(function(){

				//comparing the above regex to the value in the texbox                            		
				if(!emailReg.test($("#memail").val())){

					//fill the textbox label with error
					document.getElementById("email_error").innerHTML="<font color='red' size='2px' family='verdana'>Invalid Email</font>";

					$("#memail").css("border-color","rgba(255,0,0,.6"); 

					works=false;

				}
				
				else{
					works = true;
	 				
					$.post("./user_test/user_email_test.php",{

						useremail: $("#memail").val(),
					},
					function(data,status){

						document.getElementById("email_error").innerHTML=data;
						$("#memail").css("border-color","rgba(0,255,0,.3)"); 
						works = true;
				    });

						
					}
		
			});//end of change

			//When the userid textbox is chaning,this will be invoked
			$("#pwd2").keyup(function(){

				//checking length of the password
				if($("#pwd2").val().length<10){
					document.getElementById("pwd_error").innerHTML="<font color='red' size='2px' family='verdana'>Please enter a password minimum 10 characters</font>";
					//$('#submitbtn').attr('disabled','disabled');
					$("#pwd1, pwd2").css("border-color","rgba(0,255,100,.6)");
					works=false;
				}

				//checking if the password matches	
				else if($("#pwd1").val()!=$("#pwd2").val()){
					document.getElementById("pwd_error").innerHTML="<font color='red' size='2px' family='verdana'>Passwords do not match</font>";
					//$('#submitbtn').attr('disabled','disabled');
					works=false;
					$("#pwd1, pwd2").css("border-color","rgba(0,255,100,.6)"); 	 

				}
				else{

					$("#pwd1, #pwd2").css("border-color","rgba(0,0,0,.3)");
					document.getElementById("pwd_error").innerHTML="";	

					//comparing the above regex to the value in the texbox and checking if the lenght is atleast 10                            		
					if(!pass.test($("#pwd2").val())){
								
						//fill the textbox label with error
						document.getElementById("pwd_error").innerHTML="<font color='red' size='1px' family='verdana'>Your password contains invalid character, Please use: a-z 0-9.( )_- only</font>";

						$("#pwd1, #pwd2").css("border-color","rgba(255,0,0,.6"); 

						 works = false;	

					} 
					else{
						$("#pwd1 , #pwd2").css("border-color","rgba(0,255,100,.6)");
						works = true;
							
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

		    <form class="form" action="one.php" method="post">
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
		      <label>Date of Birth</label>
		      <select id="dayselect">
		      	<option selected=selected>Day</option>
		      </select>
		      <select id="monthselect">
		      	<option selected=selected>Month</option>
		      </select>

		      <select id="yearselect">
		      	<option selected=selected>Year</option>
		      </select>
		      <br/>
		       <div class="lang_profeciency">
		       		<div style="margin-top:5%;float:left;margin-right:20%;margin-left:3">Language<br>
                      <select id="lang" name="Languages_Select">
                      	<?php
                      	foreach ($LanguageList as $lang) { ?>
                      	<option value='<?php echo $lang->getLangId();?>'><?php echo $lang->getLangName();?></option>
                      	<?php  }  ?>
                      </select>
		       		</div>
		       	    <div style="float:left;margin-top:5%;">Proficiency&nbsp; &nbsp; <input type="button" value="Add"  id="Add"/><br>
		       	    	<select id="prof">
                      	<option>Native</option>
                      	<option>Advanced</option>
                      	<option>Professional</option>
                      	<option>Intermediate</option>
                      </select>
		       	    </div>
		       	    <br><br><br><br>
		       </div>
		       <div>&nbsp;</div>
		       <div id="agreement" style="height:100px;width:400px;overflow:scroll;font-size:10px;position: relative;">
		       </div>
		       <a href="#" id="load_agreement" style="font-size:10px;margin-top:0px;">Load the Agreement in seperate page </a>
		       <input type="checkbox" name="agree" id="agree_box"><label style="font-size:10px;margin-top:0px;font-weight:bold;">I agree to the term and conditions of Tarboz.com</label>
		       <br/>
		       <center>
		       	<input type="text" name="captcha" placeholder="Type the text here" id="mycaptcha"> <img src = "plug-in/captcha.php" style="margin-bottom:-1.5%;" id="captchapic">
		       </center>
		       <br/>
		       <span id="final_error"></span>
		       <br>
		      <input type="button" value="Next" class="button" id="submitbtn"/>
		    </form>
		  </div>
    </div>

</body>
</html>
