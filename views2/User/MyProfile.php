<?php 
  	include "../../config.php";
	require_once BUSINESS_DIR_USER . 'UserManager.php';

    $userManager = new UserManager();
    $Users = $userManager->getAllUsers();

    echo "<br/><br/><br/><b>See All Users</b><br>";
    $userCount = count($Users); 
    if ($userCount > 0) {
      foreach ($Users as $users) {

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
     <div><a href="userview.php?id=<?php echo $uid ?>"><?php echo "".$fname."".$lname  ?></a></div> 

    <?php 
      } // end of foreach loop
    } // end of if statement
    ?>