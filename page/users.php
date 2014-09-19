<!DOCTYPE HTML>
<html>
	<head>
        <title>TESTING PAGE</title>
	</head>
    <body>
    	<?php

			// Include utility files
			require_once 'include/config.php';		
			require_once BUSINESS_DIR . 'UserManager.php';

				$userManager = new UserManager();

				$Users = $userManager->getAllUsers();
				
				$userCount = count($Users);						
						
						
						if($userCount > 0){

							foreach($Users as $users){		
							
									   $uid 				= 	$user->getUserId();
									   $fname 			= 	$user->getFirstName();
									   $lname 			= 	$user->getLastName();
									   $pwd 			= 	$user->getPassword();
									   $loginid			= 	$user->getLogin();
									   $email 			= 	$user->getEmail();
									   $dob 				= 	$user->getDOB();
									   $language 		=	$user->getUserLanguage();
									   $usertype 		=	$user->getUserType();
									   $regdate 		= 	$user->getRegistrationDate();
									   $location 		= 	$user->getLocation();
									   $mediaid 		= 	$user->getMediaId();
									   $ratingid 		= 	$user->getUserRatingId();
									   $emailsub		=	$user->getEmailSub();
								?>

								  <h1><?php echo $fname; ?></h1>
								
								  <?php

							} // end of foreach loop
						
						} // end of if statement
					?>
 </body>
</html>

