<?php
$value = (isset($_GET['user']))?$_GET['user']:"";

$regex="/^[a-zA-Z0-9\.\@\(\)]+$/";
if(preg_match($regex,$value)) echo "good";
else echo "not good";


?>


<form action="" method="get">
	<input type="text" name="user">

	<input type="submit">
</form>