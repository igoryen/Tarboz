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
          <?php session_destroy();  ?>
        }

      });

      $("#forgotpwd").click(function(){
         $("#forgotdiv").show();
         $("#login_form").hide();

      });

        var count=0;
       $("#sub").click(function(){
        //To keep count of the number of times, requested
        count++;
        $.post("user_test/login.php",
        {   
          userid: $("#userlogin").val(),
          password: $("#userpassword").val(),
          
        },
        function(data,status){
            
          if(data==1){
            document.getElementById("ftest").innerHTML="<?php echo LOGIN_SUCCESS; ?>";
            document.getElementById("forgotpwd").innerHTML="";

            //When username and password is right it will change the text to Logout
            document.getElementById("call_it").innerHTML="Logout";

            //When Successful it will print the user's name beside the logout
            document.getElementById("user_name").innerHTML="<?php if($user!='') echo $user->getFirstName(); ?>";
            //When logged in successful, it will close the window
            $( "#login" ).dialog( "close" );

            }
            else {
              document.getElementById("ftest").innerHTML="<?php echo LOGIN_FAIL; ?>";
            
            if(count>3){
               document.getElementById("forgotpwd").innerHTML="<a href='#'>Forgot Password</a>";
            }
            } 
        });

      });
  
      });

  </script>


  <title>WWG</title>
</title>
<body>
  <div id="maindiv">

    <div id="header">
      <div class="header_row">
        <div id="logo"><a href=""><img src="../../images/logo.png" height="50"></a></div>
        <nav id="navigation">
          <a href="/Tarboz/Views/Home/Index.php">Home</a> 
          <a href="/Tarboz/Views/Home/Result.php">Result</a> 
          <a href="/Tarboz/Views/Entry/Index.php">Entry Index</a>  
          <a href="/Tarboz/Views/Entry/Create.php">Entry Create</a>
          <a href="/Tarboz/Views/User/Index.php">User Index</a>     
          <a href="#" id="call_it">Login</a> 
          <a href="#" id="user_name"></a> 
        </nav>
        <div style="width:100px;" title="Login Window" id="login">
          <div id="login_form">
            Login:     <input type="text" id="userlogin"><br>
            Password:  <input type="text" id="userpassword"><br>
            <button id="sub">Login</button>
            <p id="ftest"></p>
            <p id="forgotpwd"></p>
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

