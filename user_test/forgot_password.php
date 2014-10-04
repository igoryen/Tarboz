    	<?php
			// Include utility files
			require_once '../config.php';	
			require_once BUSINESS_DIR_USER. 'User.php';	
			require_once BUSINESS_DIR_USER_LOGIN . 'UserLoginManager.php';

				//$EmailAddress=isset($_POST['email']) ? $_POST['email'] : "";

				$EmailAddress="like_change@hotmail.com";
				$userManager = new UserLoginManager();

				$logged = $userManager->ForgotPassword($EmailAddress);
				
				if($logged){
					echo SUCCESS;
				}else{  echo FAIL; }

//				echo "\nThe user is:".$_SESSION["user"]->getFirstName();

													
			?>