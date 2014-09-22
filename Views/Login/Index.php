<?php 
  require("../../header.php");
// session_start();

// if(isset($_SESSION['user'])){
  // header('Location: index.php');
  // exit();
// }
// else{
  //include("func_lib.php");
//   $title = "Please, log in";
   //login_form();
// }
?>
  <form 
    action="login.php" 
    method="post">
    <!--
    <form 
      action="<?php echo $_SERVER['PHP_SELF']; ?>" 
      method="post">
    -->
    <div id="tablecloth">
      <div id="placemat">
        <div id="login_form">
          <div class="login_form_row">
            <div id="login_form_username">Username:</div>
            <div id="login_form_username_field"><input type="text" name="user_name"/></div>
          </div>
          <div class="login_form_row">
            <div id="login_form_password">Password:</div>
            <div id="login_form_password_field"><input type="password" name "user_pwd"/></div>
          </div>
          <div class="login_form_row"><input type="submit" value="Log In"/></div>
        </div>
      </div>
    </div>
  </form>
<?php require("../../footer.php"); ?>