<?php
  require_once("config.php");
  // echo "dirname  DOCUMENT_ROOT: " . dirname($_SERVER['DOCUMENT_ROOT']) . "<br>"; 
  // echo "dirname  __FILE__  " . dirname(__FILE__) . "<br>"; 
  // echo "basename  __FILE__ : " . basename(__FILE__) . "<br>"; 
  // //$pathInPieces = explode('/', dirname($_SERVER['SCRIPT_NAME']));
  // echo "dirname SCRIPT_NAME: " . dirname($_SERVER['SCRIPT_NAME']) . "<br>"; 
  // $pathInPieces = explode('\\', dirname(__FILE__));
  // $root = "/" . $pathInPieces[3];



require_once BUSINESS_DIR_USER. 'User.php';

session_start();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : "";

//echo $user->getFirstName();
//echo $_SESSION['user']->getFirstName();
?>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/Tarboz/packages/virtual_keyboard/keyboard.css">
  <link rel="stylesheet" type="text/css" href="style/css/style.css"/>
  <link rel="shortcut icon" href="../../images/watermelon8.png"/>
   
   <!-- Extra libraries -->
   <script src ="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

   <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
   <script>
      
      $(document).ready(function(){
           document.getElementById("forgotpwd").innerHTML="<a href='#'>Forgot Password</a>";
        $("#forgotdiv").hide();
      //var log_div =document.getElementById("call_it").innerHTML;

      $( "#login" ).dialog({ autoOpen: false });
      $( "#call_it" ).click(function() {
        if(document.getElementById("call_it").innerHTML=="Login"){
          $( "#login" ).dialog( "open" );
            
        }
        else{
          document.getElementById("call_it").innerHTML="Login";
          document.getElementById("user_name").innerHTML="";
          <?php session_destroy(); $user=""; ?>
        }

      });

      $("#forgotpwd").click(function(){
         $("#forgotdiv").show();
         $("#login_form").hide();

      });

        
       $("#sub").click(function(){
        //To keep count of the number of times, requested
         
        $.post("user_test/login.php",
          {
            userid: $("#userlogin").val(),
            password: $("#userpassword").val(),
          },
        function(data,status){

          alert(data);
          if(data==1){
            document.getElementById("ftest").innerHTML="<?php echo LOGIN_SUCCESS; ?>";
            document.getElementById("forgotpwd").innerHTML="";

            //When username and password is right it will change the text to Logout
            document.getElementById("call_it").innerHTML="Logout";

            //When Successful it will print the user's name beside the logout
            document.getElementById("user_name").innerHTML="<?php if($user) echo $user->getFirstName(); ?>";
            //When logged in successful, it will close the window
            $( "#login" ).dialog( "close" );

            }
            else {
              document.getElementById("ftest").innerHTML="<?php echo LOGIN_FAIL; ?>";
            } 
        });

      });
  
      });

  </script>


  <title>WWG</title>
</title>
<body>
  <div id="wrapper">

    <div id="header">
      <div class="header_row">
        <div class="table-cell" style="text-align: left;"><a href=""><img src="images/logo.png" height="50"></a></div>
        <nav id="navigation">
          <a href="/Tarboz/Views/Home/Index.php">Home</a> 
          <a href="/Tarboz/Views/Home/Result.php">Result</a> 
          <a href="/Tarboz/Views/Entry/Index.php">Entry Index</a>  
          <a href="/Tarboz/Views/Entry/Create.php">Entry Create</a>
          <a href="/Tarboz/Views/User/Index.php">User Index</a>     
        </nav>
         <div class="table-cell" style="text-align: right;"><a href="#" id="call_it" class="login_button">Login</a> </div>
        <div style="width:100px;" title="Login Window" id="login">
          <div id="login_form">
           <p>
            <input type="text" id="userlogin" placeholder="Username" class="login_input">
           </p> 
           <p>
            <input type="password" id="userpassword" placeholder="Password" class="login_input">
           </p>
           <p>

              <div><button class="lw_button">Login</button></div>            
              <div style="top: 9.1em; position: absolute; left: 12em;"><button class="lw_button">Register</button></div>
              <div id="or">or</div>
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
      </div>
    


    </div><!--"header"-->

