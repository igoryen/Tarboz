<?php 
  	include "../../config.php";
	require_once BUSINESS_DIR_USER . 'UserManager.php';

    $userManager = new UserManager();
    $userId = intval( $_GET["id"]);
    echo $userId;
    $singleUser = $userManager->getUserByUserId($userId);

        $userCount = count($singleUser); 
    if ($userCount > 0) {
      foreach ($singleUser as $users) {

        $uid = $users->getUserId();
        $fname = $users->getFirstName();
        $lname = $users->getLastName();
        $pwd = $users->getPassword();
        $loginid = $users->getLogin();
        $email = $users->getEmail();
        $dob = $users->getDOB();
        $language = $users->getUserLanguage();
        $usertype = $users->getUserType();
        $regdate = $users->getRegistrationDate();
        $location = $users->getLocation();
        $mediaid = $users->getMediaId();
        $ratingid = $users->getUserRatingId();
        $emailsub = $users->getEmailSub();
    ?>   
     <div><b>Name: </b><?php echo "".$fname."".$lname  ?></div> 
	 <div><b>Email: </b><?php echo "".$email.""  ?></div> 
	 <div><b>Language: </b><?php echo "".$language."" ?></div>
    <?php 
      } // end of foreach loop
    } // end of if statement
    ?>