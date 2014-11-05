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
                     <form>
                    <div style="padding: 0px 0px 0px 20px">
                        <div>
                             <div>
                                 <label>First Name</label><br />
                                <input name="fname" value="<?php echo $fname; ?>" />
                            </div>
                            <hr />
                            <div>
                                <label>Last Name</label><br />
                            <input name="lname" value="<?php echo $lname; ?>" />
                            </div>
                            
                        </div>
                        <div style="font-size: 16px; color: #534E66;">
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
                            <label>Province</label><br />
                             <input name="province" value="<?php echo $Province; ?>" />
                        </div>
                        <hr />
                        <div>
                            <label>Country</label><br />
                             <input name="country" value="<?php echo $Country; ?>" />
                         </div>
                        <hr />
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