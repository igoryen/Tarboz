<!DOCTYPE HTML>
<html>
  <head>
    <title>TESTING PAGE</title>
  </head>
  <body>

    <?php
    // Include utility files
    require_once '../config.php';
    require_once BUSINESS_DIR_USER_TYPE . 'UserTypeManager.php';

    $userTypeManager = new UserTypeManager();

    $Usertypes = $userTypeManager->getAllUserTypes();

    echo "<br/><br/><br/><b>See All Users</b><br>";
    $usertypeCount = count($Usertypes);
    $count =0;

    if ($usertypeCount > 0) {
      foreach ($Usertypes as $usertypess) {

        $utid = $usertypess->getUserTypeId();
        $userTypeName = $usertypess->getUserTypeName();
        $count++;
        ?>

        <?php echo  $count.' '. $userTypeName . "<br>"; ?>

        <?php
      } // end of foreach loop
    } // end of if statement

    $userTypeManager = new UserTypeManager();

    $US = $userTypeManager->getUserTypeById(1);

    echo "<br/><br/><b>Data For user search by UserType</b><br/>";
    echo "User Type: " . $US;
    echo "<br/><br/><br/><b>UserType Id Search</b><br>";
    
    ?>
  </body>
</html>

