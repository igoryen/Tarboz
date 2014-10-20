<!DOCTYPE HTML>
<html>
  <head>
    <title>TESTING PAGE</title>
  </head>
  <body>

    <?php
    // Include utility files
    require_once '../config.php';
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

        <?php echo "The user is: " . $fname . "<br>"; ?>

        <?php
      } // end of foreach loop
    } // end of if statement

    $userManager = new UserManager();
    $US = $userManager->getUserByLoginId("JohnSmith");

    foreach ($US as $user) {
      $email = $user->getEmail();
    }
    echo "<br/><br/><b>Data For user search by loginID</b><br/>";
    echo "user Email: " . $email;
    echo "<br/><br/><br/><b>UserBy User Type Id Search</b><br>";

    $userManager = new UserManager();
    $Users = $userManager->getUserByTypeId(2);

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

        <?php echo "The user is: " . $fname . "<BR>"; ?>

        <?php
      } // end of foreach loop
    } // end of if statement

    echo "<br/><br/><b>SELECT USER BY NAME</b><br/>";

    $userManager = new UserManager();
    $US = $userManager->getUserByName("JOHN", "SMITH");
    foreach ($US as $user) {
      $email = $user->getEmail();
      echo "The Email is: " . $email . "<BR>";
    }

//getUserByLanguage

    $userManager = new UserManager();
    $Users = $userManager->getUserByLanguage("English");

    echo "<br/><br/><br/><b>USERS BY LANGUAGE</b><br>";
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
        <?php echo "The user is: " . $fname . "<br>"; ?>
        <?php
      } // end of foreach loop
    } // end of if statement

    $userManager = new UserManager();
    $Users = $userManager->getUserByLocation(1);

    echo "<br/><br/><br/><b>USERS BY LOCATION</b><br>";
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

        <?php echo "The user is: " . $fname . "<br>"; ?>
        <?php
      } // end of foreach loop
    } // end of if statement
    ?>
  </body>
</html>

