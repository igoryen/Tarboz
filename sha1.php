<?php

echo sha1("prj");

echo '<br>'.str_replace(' ', '', 'Hello Dear Brother how are you');


///

$LocationManager = new LocationManager();
    $US = $LocationManager->getUserByLoginId("JohnSmith");

    foreach ($US as $user) {
      $email = $user->getEmail();
    }
    echo "<br/><br/><b>Data For user search by loginID</b><br/>";
    echo "user Email: " . $email;
    echo "<br/><br/><br/><b>UserBy User Type Id Search</b><br>";

    $LocationManager = new LocationManager();
    $Locations = $LocationManager->getUserByTypeId(2);

    $userCount = count($Locations);

    if ($userCount > 0) {

      foreach ($Locations as $Locations) {

        $uid = $Locations->getUserId();
        $fname = $Locations->getFirstName();
        $lname = $Locations->getLastName();
        $pwd = $Locations->getPassword();
        $loginid = $Locations->getLogin();
        $email = $Locations->getEmail();
        $dob = $Locations->getDOB();
        $language = $Locations->getUserLanguage();
        $usertype = $Locations->getUserType();
        $regdate = $Locations->getRegistrationDate();
        $location = $Locations->getLocation();
        $mediaid = $Locations->getMediaId();
        $ratingid = $Locations->getUserRatingId();
        $emailsub = $Locations->getEmailSub();
        ?>

        <?php echo "The user is: " . $fname . "<BR>"; ?>

        <?php
      } // end of foreach loop
    } // end of if statement

    echo "<br/><br/><b>SELECT USER BY NAME</b><br/>";

    $LocationManager = new LocationManager();
    $US = $LocationManager->getUserByName("JOHN", "SMITH");
    foreach ($US as $user) {
      $email = $user->getEmail();
      echo "The Email is: " . $email . "<BR>";
    }

//getUserByLanguage

    $LocationManager = new LocationManager();
    $Locations = $LocationManager->getUserByLanguage("English");

    echo "<br/><br/><br/><b>Locations BY LANGUAGE</b><br>";
    $userCount = count($Locations);

    if ($userCount > 0) {

      foreach ($Locations as $Locations) {

        $uid = $Locations->getUserId();
        $fname = $Locations->getFirstName();
        $lname = $Locations->getLastName();
        $pwd = $Locations->getPassword();
        $loginid = $Locations->getLogin();
        $email = $Locations->getEmail();
        $dob = $Locations->getDOB();
        $language = $Locations->getUserLanguage();
        $usertype = $Locations->getUserType();
        $regdate = $Locations->getRegistrationDate();
        $location = $Locations->getLocation();
        $mediaid = $Locations->getMediaId();
        $ratingid = $Locations->getUserRatingId();
        $emailsub = $Locations->getEmailSub();
        ?>
        <?php echo "The user is: " . $fname . "<br>"; ?>
        <?php
      } // end of foreach loop
    } // end of if statement

    $LocationManager = new LocationManager();
    $Locations = $LocationManager->getUserByLocation(1);

    echo "<br/><br/><br/><b>Locations BY LOCATION</b><br>";
    $userCount = count($Locations);

    if ($userCount > 0) {

      foreach ($Locations as $Locations) {

        $uid = $Locations->getUserId();
        $fname = $Locations->getFirstName();
        $lname = $Locations->getLastName();
        $pwd = $Locations->getPassword();
        $loginid = $Locations->getLogin();
        $email = $Locations->getEmail();
        $dob = $Locations->getDOB();
        $language = $Locations->getUserLanguage();
        $usertype = $Locations->getUserType();
        $regdate = $Locations->getRegistrationDate();
        $location = $Locations->getLocation();
        $mediaid = $Locations->getMediaId();
        $ratingid = $Locations->getUserRatingId();
        $emailsub = $Locations->getEmailSub();
        ?>

        <?php echo "The user is: " . $fname . "<br>"; ?>
        <?php
      } // end of foreach loop
    } // end of if statement


?>