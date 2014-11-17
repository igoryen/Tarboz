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
                     <form method="post" name="update" action="views/profile/update.php">
                    <div style="padding: 0px 0px 0px 20px">
                             <div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                 <br />
                            </div>
                             <div>
                                 <label>First Name</label><br />
                                 <input class="profile_input" name="fname" value="<?php echo $fname; ?>" />
                            </div>
                           
                            <div>
                                 <label>Last Name</label><br />
                                 <input class="profile_input" name="lname" value="<?php echo $lname; ?>" />
                            </div>
                            
                            <div>
                                 <label>Birth</label><br />
                                 <input class="profile_input" name="birth" value="<?php echo $birth; ?>" />
                            </div>
                                                       
                            <div>
                                 <label>Language</label><br />
                                 <input class="profile_input" name="language" value="<?php echo $language; ?>" />
                            </div>
                           
                            <div>
                                 <label>Email</label><br />
                                 <input class="profile_input" name="email" value="<?php echo $email; ?>" />
                            </div>
                            
                            <div>
                                <label>Address</label><br />
                                 <input class="profile_input" name="address" value="<?php echo $Address; ?>" />
                            </div>
                        
                            <div>
                                <label>City</label><br />
                                 <input class="profile_input" name="city" value="<?php echo $CityName; ?>" />
                            </div>
                            
                            <div>
                                <label>Province</label><br />
                                 <input class="profile_input" name="province" value="<?php echo $ProvinceName; ?>" />
                            </div>
                            
                            <div>
                                <label>Country</label><br />
                                 <input class="profile_input" name="country" value="<?php echo $CountryName; ?>" />
                            </div>
                               
                            <div>
                                <label>PostalCode</label><br />
                                 <input class="profile_input" name="country" value="<?php echo $PostalCode; ?>" />
                             </div>
                           
                            <div>
                                <input class="search_button" style="padding: 10px 115px; "type="submit" name="Submit" value="update" /> 
                            </div>
                        </div>    
                    </form>
                 </div>
               </div>
               <div class="row_space"></div>
               <div> 
               </div>                      
             </div>
             <div class="col_space"></div>
            <div class="col_userlist">
<?php
    include "/views/profile/user_list.php";
?>
            </div>
        </div>
    </div>
</div>
<?php   
    require_once "footer.php"; 
?>
