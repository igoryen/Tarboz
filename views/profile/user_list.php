<?php 
    $userManager = new UserManager();
    $Users = $userManager->getAllUsers();

    $userCount = count($Users);

     if ($userCount > 0) {
?>
<div>
    <div class="userlist_icon"><b style="padding-right:14px">User List</b></div>
    <div id="scroll_list">
<?php
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
            <div> <a href="other_user.php?id=<?php echo $uid ?>&name=<?php echo $fname ?>"><?php echo "".$fname."".$lname  ?></a></div>
<?php
        }
     }
?>
    </div>    
</div>