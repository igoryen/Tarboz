<?php 
//  	include "../../config.php";
    include "header.php";
	require_once BUSINESS_DIR_USER . 'UserManager.php';   
    require_once BUSINESS_DIR_LOCATION . 'LocationManager.php';  

    $userManager = new UserManager();
    $locationManager = new LocationManager();

    $userId = intval( $_GET["id"]);
//    if ($userId =="")
//    {
//        //redirect to homepage
//        header("Location: http://localhost/tarboz/");
//    }
           $User_Login = $userManager->getUserByUserId($userId);
    
                $id  =$User_Login->getUserId();  
                $fname = $User_Login->getFirstName();
                $lname = $User_Login->getLastName();
                $email = $User_Login->getEmail();
                $language = $User_Login->getUserLanguage();
                $regdate = $User_Login->getRegistrationDate();
                $locationId = $User_Login->getLocation();
                $birth= $User_Login->getDOB();
                $mediaId = $User_Login->getMediaId();

            $User_Country = $locationManager->getCountriesNameById($locationId);
            foreach ( $User_Country as $cou) {
                $Country = $cou->getCountryName();
            }
          
            $User_Province = $locationManager->getProvincesByCountryId($locationId);
            foreach ( $User_Province as $prov) {
                $Province = $prov->getProvinceName();
             }
?>