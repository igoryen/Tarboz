<?php
session_start();
if(isset($_SESSION)){
 	unset($_SESSION);
    }
    session_destroy();
    setcookie("PHPSESSID","", time()+60*60*24*7,"/");
    header("Location: ../index.php");
?>