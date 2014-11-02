<?php 
//  	include "../../config.php";
    include "../header.php";
	require_once BUSINESS_DIR_USER . 'UserManager.php';   
    require_once BUSINESS_DIR_LOCATION . 'LocationManager.php';  

    $userManager = new UserManager();
    $locationManager = new LocationManager();

    $userId = intval( $_GET["id"]);
//    $user_logged_in = true;
//
//      if (isset($_SESSION['user'])) {
//          $user = $_SESSION['user'];
//          $user_id = $user->getUserId();
//          $User_Login = $userManager->getUserByUserId($user_id);
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
//}
?>
<div align="center">
    <div class="container">
        <div class="heading">
            <div class="col" >
               <div style="box-shadow: 10px 7px 5px #888888;">
                 <div class="col_image">
                     <div><img src="../../images/large_user.png" width="240"/></div>
                 </div>
                 <div class="col_info"> 
                    <div style="padding: 0px 0px 0px 20px">
                        <div>
                            <h1><?php echo " ".$fname." ".$lname ?>
                                <br /><i style="font-size:10px; color: #B6ACE0">Registed: <?php echo $regdate ?></i>
                            </h1>
                        </div>
                        <div style="font-size: 16px; color: #534E66;">
<!--                        <div><img src="../../images/birthday.png" alt=""><span class="user_info_space"><?php echo $birth ?></span></div>-->
                        <hr />   
                        <div><img src="../../images/language.png" alt=""><span class="user_info_space"><?php echo $language ?></span></div>
                        <hr />
                        <div><img src="../../images/email.png" alt=""><span class="user_info_space"><?php echo $email ?></span></div>
                        <hr />
                        <div><img src="../../images/location.png" alt=""><span class="user_info_space"><?php echo $Province.",".$Country ?></span></div>
                        <hr />
                        </div>
                    </div>
                 </div>
               </div>
               <div class="row_space"></div>
               <div>John Smith <br />John Smith <br />
                     John Smith <br />John Smith <br />
                     John Smith <br />John Smith <br />
                     John Smith <br />John Smith <br />
                     John Smith <br />John Smith <br /></div>
                       
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