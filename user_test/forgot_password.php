    	<?php
			// Include utility files
			require_once '../config.php';	
			require_once BUSINESS_DIR_USER. 'User.php';	
			require_once BUSINESS_DIR_USER_LOGIN . 'UserLoginManager.php';

				$userid=isset($_POST['userid']) ? $_POST['userid'] : "";
				$pwd=isset($_POST['password']) ? $_POST['password'] : "";

				$userManager = new UserLoginManager();

				$logged = $userManager->userLogin($ForgotPassword);
				
				if($logged){
					echo SUCCESS;
				}else{  echo FAIL; }

//				echo "\nThe user is:".$_SESSION["user"]->getFirstName();

													
			?>