<?php
  //require("include/config.php");
  // echo "dirname  DOCUMENT_ROOT: " . dirname($_SERVER['DOCUMENT_ROOT']) . "<br>"; 
  // echo "dirname  __FILE__  " . dirname(__FILE__) . "<br>"; 
  // echo "basename  __FILE__ : " . basename(__FILE__) . "<br>"; 
  // //$pathInPieces = explode('/', dirname($_SERVER['SCRIPT_NAME']));
  // echo "dirname SCRIPT_NAME: " . dirname($_SERVER['SCRIPT_NAME']) . "<br>"; 
  // $pathInPieces = explode('\\', dirname(__FILE__));
  // $root = "/" . $pathInPieces[3];
?><html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/Tarboz/packages/virtual_keyboard/keyboard.css">
  <link rel="stylesheet" type="text/css" href="/Tarboz/Content/style.css"/>
  <link rel="shortcut icon" href="/Tarboz/Images/watermelon8.png"/>
  <title>WWG</title>
</title>
<body>
  <div id="maindiv">

    <div id="header">
      <div class="header_row">
        <div id="logo"><a href=""><img src="/Tarboz/Images/logo.png" height="50"></a></div>
        <nav id="navigation">
          <a href="/Tarboz/Views/Home/Index.php">Home</a> 
          <a href="/Tarboz/Views/Home/Result.php">Result</a> 
          <a href="/Tarboz/Views/Entry/Index.php">Entry Index</a>  
          <a href="/Tarboz/Views/Entry/Create.php">Entry Create</a>
          <a href="/Tarboz/Views/User/Index.php">User Index</a>     
          <a href="/Tarboz/Views/Login/Index.php">Login</a> 
        </nav>
      <!--  <div id="links"><a href="/Tarboz/Views/Login/Index.php">Login</a></div>-->
      </div>
    </div><!--"header"-->