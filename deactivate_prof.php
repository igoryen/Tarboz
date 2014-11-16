<html>
 <head>
        <link rel="stylesheet" type="text/css" href="style/css/style.css"/>
        <link rel="shortcut icon" href="images/watermelon8.png"/>
 </head>
<body>


<?php

    require_once 'config.php'; 
    require_once BUSINESS_DIR_USER. 'User.php';
    require_once BUSINESS_DIR_USER . 'UserManager.php';      

    $userManager  = new UserManager();
    $userId = intval( $_GET["id"]);
     if($_POST){
        $decativate = $userManager -> deleteUser($userId); 
        if(!$decativate) {
            alert("Error: Can't Delete"); 
        } else {
            header("Location: index.php");
        }
     }
?>
<div align="center" style="padding-top: 200px">
    <h1><img src="images/sad.png" alt="unhappy" /> We are sorry. You are leaving.</h1>
    
    <h2>Are sure you want to cancle you account?</h2>
    <form action="deactivate_prof.php?id=<?php echo $userId ?>" method="POST">
        <div>
            <span><input class="search_button" type="submit" name="Submit" value="YES" /></span>
            <span><a class="search_button" style="padding: 3px 60px 7px;"  href="profile.php">NO</a></span>
        </div>
    </form>
</div>

</body>
    </html>
