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
                            <h1><?php echo " ".$fname." ".$lname ?>
                                <b style="font-size:12px; color: #B6ACE0; float: right; padding: 7px">
                                    <a href="edit_profile.php?id=<?php echo $id ?>">Edit Profile</a>
                                </b>
                                <br /><i style="font-size:10px; color: #B6ACE0">Registed: <?php echo $regdate ?></i>
                            </h1>
                        </div>
                        <div style="font-size: 16px; color: #534E66;">
<!--                        <div><img src="../../images/birthday.png" alt=""><span class="user_info_space"><?php echo $birth ?></span></div>-->
                        <hr />   
                        <div><img src="images/language.png" alt=""><span class="user_info_space"><?php echo $language ?></span></div>
                        <hr />
                        <div><img src="images/email.png" alt=""><span class="user_info_space"><?php echo $email ?></span></div>
                        <hr />
                        <div><img src="images/location.png" alt=""><span class="user_info_space"><?php echo $Province.",".$Country ?></span></div>
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