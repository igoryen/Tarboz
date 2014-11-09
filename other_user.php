<?php 
    require_once "views/profile/get_user_by_id.php" 
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
    include "footer.php";
?>