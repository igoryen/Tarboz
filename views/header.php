<?php
  require_once("../../config.php");
  // echo "dirname  DOCUMENT_ROOT: " . dirname($_SERVER['DOCUMENT_ROOT']) . "<br>"; 
  // echo "dirname  __FILE__  " . dirname(__FILE__) . "<br>"; 
  // echo "basename  __FILE__ : " . basename(__FILE__) . "<br>"; 
  // //$pathInPieces = explode('/', dirname($_SERVER['SCRIPT_NAME']));
  // echo "dirname SCRIPT_NAME: " . dirname($_SERVER['SCRIPT_NAME']) . "<br>"; 
  // $pathInPieces = explode('\\', dirname(__FILE__));
  // $root = "/" . $pathInPieces[3];



require_once BUSINESS_DIR_USER. 'User.php';
require_once BUSINESS_DIR_USER_LOGIN . 'UserLoginManager.php';

session_start();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : ""; 


//echo $user->getFirstName();
//echo $_SESSION['user']->getFirstName();
?>
<html>
<head>
  <meta charset="UTF-8">
  <!--search bar keyboard -->
  <link rel="stylesheet" type="text/css" href="plug-in/virtual_keyboard/keyboard.css">
  <script type="text/javascript" src="plug-in/virtual_keyboard/keyboard.js" charset="UTF-8"></script>
  <!--   End    -->
  <link rel="stylesheet" type="text/css" href="../../style/css/style.css"/>
  <link rel="shortcut icon" href="../images/watermelon8.png"/>
   
   <!-- Extra libraries -->
   <script src ="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   
   <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
   <script src="plug-in/translate/js/jquery.ajaxLoader.js" type="text/javascript"></script>
   <script src="plug-in/translate/js/json-jquery.js" type="text/javascript"></script>
   <script src="plug-in/translate/js/json-jquery2.js" type="text/javascript"></script>
   
   <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
   <script>    
      $(document).ready(function(){

          //adding a link of forgot pasword the the dialogue box
          document.getElementById("forgotpwd").innerHTML="<a href='#'>Forgot Password</a>";
          $("#forgotdiv").hide();

          //var log_div =document.getElementById("call_it").innerHTML;
          $( "#login" ).dialog({ autoOpen: false });

          $( "#call_it" ).click(function() {

            $("#forgotpwd").show();
            //resetting, some of the usertexboxes and the messages
            document.getElementById("ftest").innerHTML="";
            $('#userlogin').val('');
            $('#userpassword').val('');
                //resetting the texboxes
              if(document.getElementById("call_it").innerHTML=="Login"){
                  $( "#login" ).dialog( "open" );     
                }
              else{
                  document.getElementById("call_it").innerHTML="Login";
                  document.getElementById("user_name").innerHTML="";
                  <?php session_destroy(); $user=""; ?>
                }

          });//end if call_it onlick event

          $("#forgotpwd").click(function(){

             $("#forgotdiv").show();
             $("#login_form").hide();

          }); //end of forgotpwd onlick event function

            
           $("#sub").click(function(){
            //To keep count of the number of times, requested
             
            $.post("../user_test/login.php",
              {
                userid: $("#userlogin").val(),
                password: $("#userpassword").val(),
              },
            function(data,status){
              //this sets the session variable of username inside the variable username
              var username="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']->getFirstName(); ?>"

              if(data==1 || data==2){


                document.getElementById("ftest").innerHTML="<?php echo LOGIN_SUCCESS; ?>";
                
                document.getElementById("forgotpwd").innerHTML="";

                //When username and password is right it will change the text to Logout
                document.getElementById("call_it").innerHTML="Logout";

                //When Successful it will print the user's name beside the logout
                document.getElementById("user_name").innerHTML=username;
                
                //When logged in successful, it will close the window
                $( "#login" ).dialog("close");

                }
                else {
                  document.getElementById("ftest").innerHTML="<?php echo LOGIN_FAIL; ?>";
                } 
              });//end of the function(data,status)

          });//end of the login button onlick event
  
      });
      
  </script>
  
  <!-- for translator -->
  <style>
div.jquery-ajax-loader {
	background: #FFFFFF url(img/ajax-loader.gif) no-repeat 50% 50%;
	opacity: .6;
	width:250px !important;
}

div.showdata{
    width:250px;
}
.bgblack{
    background: white
}
.bgwhite {
    background: #FFFFFF 
}
.black {
    color:black;
}
.pl10{
    padding-left:10px;
}
.width500 {
    width:500px;
}
.bdr {
 border:1px solid black;
}
</style>

  <title>Tarboz</title>
</head>

<body>
  <div id="wrapper">

    <div id="header">

        <div class="header_row">
          <div class="table-cell" style="text-align: left;">
            <a href=""><img src="../../images/logo.png" height="50"></a>
          </div>
          <nav id="navigation">
              <a href="/Tarboz/index.php">Home</a> 
              <a href="/Tarboz/entrycreate.php">Create an Entry</a>
              <a href="/Tarboz/userviewhtml.php">[user view]</a>
              <a href="/views/profile/profile.php">[user view 2]</a>
          </nav>
          <div class="table-cell" style="text-align: right;">
            <a href="#" id="call_it" class="login_button">Login</a> 
          </div>
          <div id="user_name"></div>

          <div style="width:100px;" title="Login Window" id="login">
             <!--start of the login form div-->
              <div id="login_form">
                 <p>
                    <input type="text" id="userlogin" placeholder="Username" class="login_input">
                 </p> 
                 <p>
                    <input type="password" id="userpassword" placeholder="Password" class="login_input">
                 </p>
                 <p>
                    <!--Login button                     <div><button class="lw_button" id="sub">Login</button></div>            
                    <div style="top: 9.1em; position: absolute; left: 12em;"><button class="lw_button">Register</button></div>
                    <div id="or">or</div>-->
                    <div style="margin-left: 1em;"><button class="lw_button" id="sub">Login</button>
                      <b id="or">or</b>
                        <button class="lw_button">Register</button></div> 
                 </p> 
                 <p id="ftest"></p>
                 <p style="margin-left: 1em;" id="forgotpwd"></p>
              </div>

              <!---forgot password window-->
              <div id="forgotdiv">

                  Email Address <input type="text" id="forgotemail">
                   <button id="forgotbtn">Forgot</button> 
                   <p>Please type the email address associated with your account in the above box</p>
              </div>
          </div>
        <!--  <div id="links"><a href="/Tarboz/Views/Login/Index.php">Login</a></div>-->

        <!-- A section for resetting the forgot password -->

        <?php 
         //$_GET['security']="0vLalqY93y";
          //If the security variable has something, then assign it otherwise keep the variable empty
          $reset=(isset($_GET['security']))?$_GET['security']:""; 

          //Pattern to avoid some weird hackers  
          $m_reg="/^[a-zA-Z0-9\.\@\(\)]+$/";

          //matchin the pattern and checking if the variable is also not empty
          if(($reset!="") && preg_match($m_reg,$reset)){
            echo $reset;

            $userLoginManager = new UserLoginManager();

            $logged = $userLoginManager->getLoginReset($reset);
            }

            if (isset($logged)) {
              echo "sent";
            }
            else {
              echo "fail";
            }


        ?>
        </div>

    </div><!--"header"-->
