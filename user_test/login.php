    	<?php
			// Include utility files
			require_once '../config.php';	
			require_once BUSINESS_DIR_USER. 'User.php';	
			require_once BUSINESS_DIR_USER_LOGIN . 'UserLoginManager.php';

				//$_POST['userid']="johnsmith";
				//$_POST['password']="habib";

				$userid=isset($_POST['userid']) ? $_POST['userid'] : "";
				$pwd=isset($_POST['password']) ? $_POST['password'] : "";
				$userManager = new UserLoginManager();

				$logged = $userManager->userLogin($userid,$pwd);

			//	echo $logged->getFirstName();	
				
				if($logged->getFirstName()!=""){
					echo SUCCESS;
				}else{  echo FAIL; }

//				echo "\nThe user is:".$_SESSION["user"]->getFirstName();

													
			?>