<?php require("header.php"); ?>
<?php
// session_start();

// if(isset($_SESSION['user'])){
  // header('Location: index.php');
  // exit();
// }
// else{
  include("func_lib.php");
//   $title = "Please, log in";
   login_form();
// }
?>
<?php require("footer.php"); ?>