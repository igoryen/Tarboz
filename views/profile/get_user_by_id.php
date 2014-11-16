<?php 
//  	include "../../config.php";
    include "header.php";
	require_once BUSINESS_DIR_USER . 'UserManager.php';   
    require_once BUSINESS_DIR_LOCATION . 'LocationManager.php';  

    require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
    require_once BUSINESS_DIR_ENTRY . "Entry.php";

    require_once BUSINESS_DIR_RATING . 'RatingManager.php';
    require_once BUSINESS_DIR_RATING . 'Rating.php';

    $userManager = new UserManager();
    $locationManager = new LocationManager();
    $EntryManager = new EntryManager();
    $Rating          = new RatingManager();

    $userId = intval( $_GET["id"]);
//    if ($userId =="")
//    {
//        //redirect to homepage
//        header("Location: http://localhost/tarboz/");
//    }
    if (isset($_SESSION['user'])) {
          $user = $_SESSION['user'];
          $user_id = $user->getUserId();
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

            // get location
            $location = $locationManager->getLocationBylocationId($locationId);
            foreach (  $location as $loc) {
                $Address    = $loc->getAddress();
                $PostalCode = $loc->getPostalCode();
                $cityid     = $loc->getCityId();
                
            }

            // get city name 
            $city = $locationManager->getCityById($cityid);
                $CityName = $city->getCityName();
                $provId   = $city->getProvinceId();
          
            //get province name
            $province = $locationManager->getProvinceById($provId);
                $ProvinceName =  $province->getProvinceName();
                $countryId    =  $province->getCountryId();
          
             //get Country Name
             $country = $locationManager->getCountriesNameById($countryId);
             foreach ( $country as $cou) {
               $CountryName = $cou->getCountryName();
             }
    }
?>