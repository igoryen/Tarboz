<?php
	require_once '../config.php';
	require_once BUSINESS_DIR_USER . 'User.php';
	require_once BUSINESS_DIR_USER . 'UserManager.php';

	//$regex ="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})+$";

	       $userid = isset($_POST['userid']) ? $_POST['userid'] : "";

	       $useremail = isset($_POST['useremail']) ? $_POST['useremail'] : "";

			//$useremail="mary_white1234@gmail.com";

	       if($userid!=""){
	      
	    	$userManager = new UserManager();

			$logged = $userManager->getUserByLoginId($userid);

			if($logged->getFirstName()==""){
				echo "<font color='green' size='2px'>User Name Available!</font>";
			}
			else{
				echo "<font color='red' size='2px'>User Name Not Available!</font>";
			}

		  }
		else{

			$userManager = new UserManager();

			$logged = $userManager->getUserByEmail($useremail);

			if($logged->getFirstName()==""){
				echo "<font color='green' size='2px'></font>";

			}
			else{
				echo "<font color='red' size='2px'>Email Already registered! Please use the forget Password link<br> to retrieve your UserId/Password!</font>";
			}

			
		}



	

?>