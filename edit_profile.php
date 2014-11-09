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
                                <input name="fname" value="<?php echo $fname; ?>" />
                            </div>
                            <hr />
                            <div>
                                <label>Last Name</label><br />
                            <input name="lname" value="<?php echo $lname; ?>" />
                            </div>
                        <hr />
                            <div>
                                 <label>Birth</label><br />
                                <input name="birth" value="<?php echo $birth; ?>" />
                            </div>
                        <hr />                               
                        <div>
                             <label>Language</label><br />
                             <input name="language" value="<?php echo $language; ?>" />
                        </div>
                        <hr />
                        <div>
                             <label>Email</label><br />
                             <input name="email" value="<?php echo $email; ?>" />
                        </div>
                        <hr />
                        <div>
                            <label>Address</label><br />
                             <input name="address" value="<?php echo $Address; ?>" />
                        </div>
                        <hr />
                        <div>
                            <label>City</label><br />
                             <input name="city" value="<?php echo $CityName; ?>" />
                        </div>
                        <hr />
                        <div>
                            <label>Province</label><br />
                             <input name="province" value="<?php echo $ProvinceName; ?>" />
                        </div>
                        <hr />
                        <div>
                            <label>Country</label><br />
                             <input name="country" value="<?php echo $CountryName; ?>" />
                        </div>
                            <hr />
                        <div>
                            <label>PostalCode</label><br />
                             <input name="country" value="<?php echo $PostalCode; ?>" />
                         </div>
                        <hr />
                        <div>
                            <input type="submit" name="Submit" value="update" /> 
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
    include "user_list.php";
?>
            </div>
        </div>
    </div>
</div>