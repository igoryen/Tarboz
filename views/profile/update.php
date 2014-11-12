<?php
    require_once '../../config.php'; 
    require_once BUSINESS_DIR_USER. 'User.php';
    require_once BUSINESS_DIR_USER . 'UserManager.php';   
    require_once BUSINESS_DIR_LOCATION . 'LocationManager.php';  

    $userManager = new UserManager();
    // check and update user
    if($_POST){
        $userId = $_POST['id'];
        $fname  = $_POST['fname'];
        $lname  = $_POST['lname'];
        $birth  = $_POST['birth'];
        $language   = $_POST['language'];
        $email      = $_POST['email'];
        
        $user_update = $userManager->getUserByUserId($userId);
        $user_update->setFirstName($fname);
        $user_update->setLastName($lname);
        $user_update->setEmail($email);
        $user_update->setUserLanguage($language);
        $user_update->setDOB($birth);
        $updated = $userManager->updateUser($user_update);
        
         if(!$updated){
              echo "Updating ".$userId." failed.";
          }else {
                header("Location: ../../profile.php");
          }
        
        
    }else{
         header("Location: ../../profile.php");
    }
?>