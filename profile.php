<?php 
//  	include "../../config.php";
    require_once "header.php";
	require_once BUSINESS_DIR_USER . 'UserManager.php';   
    require_once BUSINESS_DIR_LOCATION . 'LocationManager.php';  

    require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
    require_once BUSINESS_DIR_ENTRY . "Entry.php";
    require_once BUSINESS_DIR_TRANSLREQ . "TranslationRequestManager.php";

    $userManager = new UserManager();
    $locationManager = new LocationManager();
    $EntryManager = new EntryManager();
//    $user_logged_in = true;
//
      if (isset($_SESSION['user'])) {
          $user = $_SESSION['user'];
          $user_id = $user->getUserId();
          $User_Login = $userManager->getUserByUserId($user_id);   
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
          
          // get display user info html style
          require_once "views/profile/user_view_style.php";
              
      } else {
//         header("Location: http://localhost/tarboz/");   
           echo '<h1 style="text-align: center;">The Page Not Found</h1>';
      }
    include "footer.php";
?>