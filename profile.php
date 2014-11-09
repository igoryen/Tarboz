<?php 
//  	include "../../config.php";
    require_once "header.php";
	require_once BUSINESS_DIR_USER . 'UserManager.php';   
    require_once BUSINESS_DIR_LOCATION . 'LocationManager.php';  

    require_once BUSINESS_DIR_ENTRY . "EntryManager.php";
    require_once BUSINESS_DIR_TRANSLREQ . "TranslationRequestManager.php";

    $userManager = new UserManager();
    $locationManager = new LocationManager();
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
?>
<div align="center">
    <div class="container">
        <div class="heading">
            <div class="col" >
               <div style="box-shadow: 10px 7px 5px #888888;">
                 <div class="col_image">
                     <div><img src="images/large_user.png" width="240"/></div>
                 </div>
                 <div class="col_info"> 
                    <div style="padding: 0px 0px 0px 20px">
                        <div>
                            <h1><?php if(isset($fname) && isset($lname)) echo " ".$fname." ".$lname; ?> 
                                <b style="font-size:12px; color: #B6ACE0; float: right; padding: 7px">
                                    <?php if($user_id == $id) { ?>
                                    <a href="edit_profile.php?id=<?php echo $id ?>">Edit Profile</a>
                                    <?php } ?>
                                </b>
                                <br /><i style="font-size:10px; color: #B6ACE0">Registed: <?php if(isset($regdate)) echo $regdate ?></i>
                            </h1>
                        </div>
                        <div style="font-size: 16px; color: #534E66;">
<!--                        <div><img src="../../images/birthday.png" alt=""><span class="user_info_space"><?php echo $birth ?></span></div>-->
                        <hr />   
                        <div><img src="images/language.png" alt=""><span class="user_info_space"><?php if(isset($language)) echo $language ?></span></div>
                        <hr />
                        <div><img src="images/email.png" alt=""><span class="user_info_space"><?php if(isset($email)) echo $email ?></span></div>
                        <hr />
                        <div><img src="images/location.png" alt="">
                            <span class="user_info_space">
                                <?php 
                                         if( isset($Address) ){
                                             echo $Address.","; 
                                         }
                                         if(isset($CityName) ){
                                              echo $CityName."<br />"; 
                                         }
                                ?>
                                <span style="padding-left:55px" >
                                <?php
                                        if(isset($ProvinceName)) {
                                             echo $ProvinceName.",";     
                                        }
                                        if(isset($CountryName)) {
                                             echo $CountryName."<br />";     
                                        }
                                ?>
                                </span>
                                <span style="padding-left:55px" >
                                <?php
                                    if(isset($PostalCode)){
                                             echo $PostalCode;
                                      }           
                                           
                                ?>
                                </span>
                            </span></div>
                        <hr />
                        </div>
                    </div>
                 </div>
               </div>
               <div class="row_space"></div>
               <div>
                   John Smith <br />John Smith <br />
                     John Smith <br />John Smith <br />
                   <?php if(isset($locationId)) echo $locationId ?>
                   <?php if(isset($Address)) echo $Address ?>
                   <?php if(isset($PostalCode)) echo $PostalCode ?>
                   <?php echo $CityName ?>
                   <?php echo "test: ".$provId ?>
                   <?php echo "test222".$ProvinceName."+".$countryId ?>
                   <?php if(isset($userCountry)) echo $userCountry ?>
                </div>
                       
             </div>
             <div class="col_space"></div>
            <div class="col_userlist">
<?php
    include "user_list.php";
?>
            </div>
        </div>
    </div>
</div>
<?php
      } else {
//         header("Location: http://localhost/tarboz/");   
           echo '<h1 style="text-align: center;">The Page Not Found</h1>';
      }
    include "footer.php";
?>