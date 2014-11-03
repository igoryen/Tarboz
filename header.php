<?php
  require_once("config.php");
  // echo "dirname  DOCUMENT_ROOT: " . dirname($_SERVER['DOCUMENT_ROOT']) . "<br>"; 
  // echo "dirname  __FILE__  " . dirname(__FILE__) . "<br>"; 
  // echo "basename  __FILE__ : " . basename(__FILE__) . "<br>"; 
  // //$pathInPieces = explode('/', dirname($_SERVER['SCRIPT_NAME']));
  // echo "dirname SCRIPT_NAME: " . dirname($_SERVER['SCRIPT_NAME']) . "<br>"; 
  // $pathInPieces = explode('\\', dirname(__FILE__));
  // $root = "/" . $pathInPieces[3];



require_once BUSINESS_DIR_USER. 'User.php';
require_once BUSINESS_DIR_USER_LOGIN . 'UserLoginManager.php';

session_start();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : ""; 


//echo $user->getFirstName();
//echo $_SESSION['user']->getFirstName();
?>
<html>
<head>
  <meta charset="UTF-8">
  <!--search bar keyboard -->
  <link rel="stylesheet" type="text/css" href="plug-in/virtual_keyboard/keyboard.css">
  <script type="text/javascript" src="plug-in/virtual_keyboard/keyboard.js" charset="UTF-8"></script>
  <!--   End    -->
  <link rel="stylesheet" type="text/css" href="style/css/style.css"/>
  <link rel="shortcut icon" href="images/watermelon8.png"/>
   
   <!-- Extra libraries -->
   <script src ="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   
   <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
   <script src="plug-in/translate/js/jquery.ajaxLoader.js" type="text/javascript"></script>
   <script src="plug-in/translate/js/json-jquery.js" type="text/javascript"></script>
   <script src="plug-in/translate/js/json-jquery2.js" type="text/javascript"></script>
   
   <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
   <script>    
      $(document).ready(function(){

          //adding a link of forgot pasword the the dialogue box
          document.getElementById("forgotpwd").innerHTML="<a href='#'>Forgot Password</a>";
          $("#forgotdiv").hide();

          //var log_div =document.getElementById("call_it").innerHTML;
          $( "#login" ).dialog({ autoOpen: false });

          $( "#call_it" ).click(function() {

            $("#forgotpwd").show();
            //resetting, some of the usertexboxes and the messages
            document.getElementById("ftest").innerHTML="";
            $('#userlogin').val('');
            $('#userpassword').val('');
                //resetting the texboxes
              if(document.getElementById("call_it").innerHTML=="Login"){
                  $( "#login" ).dialog( "open" );     
                }
              else{
                  document.getElementById("call_it").innerHTML="Login";
                  document.getElementById("user_name").innerHTML="";
                  
                }
            //display profile menu when user login 
            if($('#user_name').html() =="") {
                $('#menu_user_index').css({'display': 'none'});
            }

          });//end if call_it onlick event

          $("#forgotpwd").click(function(){

             $("#forgotdiv").show();
             $("#login_form").hide();

          }); //end of forgotpwd onlick event function

            
           $("#sub").click(function(){
            //To keep count of the number of times, requested
             
            $.post("user_test/login.php",
              {
                userid: $("#userlogin").val(),
                password: $("#userpassword").val(),
              },
            function(data,status){
              //this sets the session variable of username inside the variable username
              var username="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']->getFirstName(); ?>"

              if(data==1 || data==2){


                document.getElementById("ftest").innerHTML="<?php echo LOGIN_SUCCESS; ?>";
                
                document.getElementById("forgotpwd").innerHTML="";

                //When username and password is right it will change the text to Logout
                document.getElementById("call_it").innerHTML="Logout";

                //When Successful it will print the user's name beside the logout
                document.getElementById("user_name").innerHTML=username;
                  
                 //display profile menu when user login                     
                $('#menu_user_index').css({'display': ''});
                
                //When logged in successful, it will close the window
                $( "#login" ).dialog("close");
                window.location.reload(true);
                }
                else {
                  document.getElementById("ftest").innerHTML="<?php echo LOGIN_FAIL; ?>";
                } 
              });//end of the function(data,status)

          });//end of the login button onlick event
              
        $("#new_commentSub").click(function(event){
            //var formdata = $("#new_comment").serialize(); 
            //alert(formdata);
            if ($('#user_login_status').val() == "N") {
                
                //call login panel
                $("#forgotpwd").show();
                //resetting, some of the usertexboxes and the messages
                document.getElementById("ftest").innerHTML="";
                $('#userlogin').val('');
                $('#userpassword').val('');
                alert("1"+$("#call_it").html());
                    //resetting the texboxes
                  if($.trim($("#call_it").html())=="Login"){
                      $( "#login" ).dialog( "open" );  
                      alert("use not logged in");
                    }
                //alert("username innerHtml: "+$('#user_name').html());
                if($('#user_name').html() =="") {
                    $('#menu_user_index').css({'display': 'none'});
                }
            } //end if ($('#user_login_status').val() == "N")
            else {
                var new_comment = encodeURIComponent($.trim ($('#newComment').val() ));
                var comment_entity_id = encodeURIComponent($.trim ($('#commentEntityId').val() ));
                $.ajax({
                    url: "user_test/new_comment.php",
                    type: "POST",
                    data: {
                             newComment: new_comment,
                             commentEntityId: comment_entity_id
                            },
                    success: 
                      function(data, status) {
                        //alert(data);
                        if (data.indexOf('succeed') >0) {
                          $('#add_comment_result').html=$.trim ($('#newComment').val() );
                        } else if (data.indexOf( 'fail') >0) {
                          alert(data);
                        }
                        window.location.reload(true);
                      },
                    error:
                      function() {
                          alert("ajax error");
                      }                
                }); //end $.ajax()
                event.preventDefault();
            } //end else
        });
          
        $(".editCommentSub").click( function(event) { //edit comment
            var this_id = $(this).attr('id');
            var edit_id_num = this_id.substring(this_id.indexOf("_")+1);
            var textarea_id = "#editCommentText_"+edit_id_num;
            var input_hidden_id = "#editCommentId_"+edit_id_num;

            //alert("edit id:"+edit_id_num);
            //alert("textarea_id: "+textarea_id);
            //alert("input_hidden_id: "+input_hidden_id);
            //alert("edit comment text: "+$(textarea_id).val());
            //alert("edit comment id: "+$(input_hidden_id).val());
            
            var editCommentData = encodeURIComponent($.trim ($(textarea_id).val() ));
            var editCommentId = encodeURIComponent($(input_hidden_id).val());

            $.ajax({
                url: "user_test/edit_comment.php",
                type: "POST",
                cache: false,
                data: 
                {
                    editComment : editCommentData,
                    editCommentId: editCommentId
                },
                success:
                  function(data, status) {
                    //alert(data);
                    if(data.indexOf("succeed")>0) {                                   
                       location.reload(true);
                    } else if (data.indexOf("fail") >0) {
                      alert(data);
                    }                                
                  }, //end of function(data, status) and success function
                error:
                  function() {
                    alert("ajax error");  
                  } 
                
             });//end $.ajax()*/
            event.preventDefault();
          });
          
        $('.deleteComment').click(	function (event) {
            var delete_comment_id = $(this).attr('id');
            //alert("delete comment id: "+delete_comment_id);
            var delete_id = delete_comment_id.substring(delete_comment_id.indexOf("_")+1);
            //alert("delete id: "+delete_id);
            $.ajax({
                url: "user_test/delete_comment.php",
                type: "POST",
                data: 
                {
                    deleteCommentId : delete_id
                },
                success:
                  function(data, status) {
                    //alert(data);
                    if(data.indexOf("succeed")>0) {                                   
                       location.reload(true);                            
                    } else if (data.indexOf("fail") >0) {
                      alert(data);
                    }                                
                  }, //end of function(data, status) and success function
                error:
                  function() {
                    alert("ajax error");  
                  }                 
            });//end $.ajax()*/
            event.preventDefault();
        });

        $('.comment_like').click( function (event) {
            //$(this).css({'display': 'none'}); 
            //$(this).next().css({'display': ''})
            var this_id = $(this).attr('id');
            var user_id = this_id.substring(0,this_id.indexOf("_")); //alert("user id: "+user_id);
            var comment_id = this_id.substring(this_id.lastIndexOf("_")+1); //alert("comment id: "+comment_id);
            var is_like = "";
            //alert("inner text: "+$(this).text());
            if($(this).text().trim() == "Like" ){
                is_like = "Y";
                $(this).text("Unlike");
            } else if ($(this).text().trim() == "Unlike") {
                is_like = "N";
                $(this).text("Like");
            }
            $.ajax({
               url: "user_test/comment_rating.php",
               type: "POST",
               data: {
                    commentId : comment_id,
                    userId : user_id,
                    isLike : is_like
                },
                success:
                   function(data, status) {
                       //alert(data);
                       if(data.indexOf("succeed")>0) {
                           
                       } else  if (data.indexOf("fail") >0){
                           alert(data);
                       }
                   },
                error:
                  function() {
                    alert("ajax error");  
                  }
            });//end $.ajax()*/
            event.preventDefault();
        });
          
        $('.reportComment').click( function(event) {
            if ($(this).next().css('display') == 'none') {
                $(this).next().css({'display': 'block'});
            } else if ($(this).next().css('display') == 'block') {
                $(this).next().css({'display': 'none'});
            }
            var this_id = $(this).attr('id');
            var user_id = this_id.substring(0,this_id.indexOf("_"));
            var comment_id = this_id.substring(this_id.lastIndexOf("_")+1);
        });
          
        $('button.reportCommentSub').click( function(event) { //add a report
            var this_id = $(this).attr('id');
            var entity_id = this_id.substring(this_id.indexOf("_")+1);
            var entity_for_report = "comment";
            var textarea_id = "#reportCommentReason_"+entity_id;
            var hidden_id = "#reportCommentBy_"+entity_id;
            
            var report_reason = encodeURIComponent($.trim ($(textarea_id).val() ));
            var reported_by = encodeURIComponent($(hidden_id).val()); //alert("reported by: "+reported_by);
            $.ajax({
               url: "user_test/reporting_comment.php",
               type: "POST",
               data: {
                    entityId : entity_id,
                    entityForReport : entity_for_report,
                    reportReason : report_reason,
                    reportedBy: reported_by
                },
                success:
                   function(data, status) {
                       //alert(data);
                       if(data.indexOf("succeed")>0) {
                           if(data.indexOf("error")>0 ) {
                               alert("Mailer error! ");
                           }
                           location.reload(true); 
                       } else if (data.indexOf("fail") >0){
                           alert(data);
                       }
                   },
                error:
                  function() {
                    alert("ajax error");  
                  }
            });//end $.ajax()*/
            event.preventDefault();
            
        });
        $('button.reportCommentCancel').click( function(event) {
            $('.reportComment').next().css({'display': 'none'});            
        });
              
        $('.entry_like').click( function (event) {
            //$(this).css({'display': 'none'}); 
            //$(this).next().css({'display': ''})
            var this_id = $(this).attr('id');
            var user_id = this_id.substring(0,this_id.indexOf("_")); //alert("user id: "+user_id);
            var entry_id = this_id.substring(this_id.lastIndexOf("_")+1); //alert("entry id: "+entry_id);
            var is_like = "";
            //alert("inner text: "+$(this).text().trim());
            if($(this).text().trim().indexOf("Like") >=0 ){
                is_like = "Y";
                $(this).text("Unlike");
                $('.entry_like_num').css({'display': 'none'});
            } else if ($(this).text().trim() == "Unlike") {
                is_like = "N";
                $(this).text("Like");
                $('.entry_like_num').css({'display': ''});
            }
            $.ajax({
               url: "user_test/entry_rating.php",
               type: "POST",
               data: {
                    entryId : entry_id,
                    userId : user_id,
                    isLike : is_like
                },
                success:
                   function(data, status) {
                       //alert(data);
                       if(data.indexOf("succeed")>0) {
                           
                       } else  if (data.indexOf("fail") >0){
                           alert(data);
                       }
                   },
                error:
                  function() {
                    alert("ajax error");  
                  }
            });//end $.ajax()*/
            event.preventDefault();
        });
  
      });
      
  </script>
  
  <!-- for translator -->
  <style>
div.jquery-ajax-loader {
	background: #FFFFFF url(img/ajax-loader.gif) no-repeat 50% 50%;
	opacity: .6;
	width:250px !important;
}

div.showdata{
    width:250px;
}
.bgblack{
    background: white
}
.bgwhite {
    background: #FFFFFF 
}
.black {
    color:black;
}
.pl10{
    padding-left:10px;
}
.width500 {
    width:500px;
}
.bdr {
 border:1px solid black;
}
</style>

  <title>Tarboz</title>
</head>

<body>
  <div id="wrapper">

    <div id="header">

        <div class="header_row">
          <div class="table-cell" style="text-align: left;">
            <a href=""><img src="images/logo.png" height="50"></a>
          </div>
          <nav id="navigation">
              <a href="/Tarboz/index.php">Home</a> 
              <a href="/Tarboz/entrycreate.php">Create an Entry</a>
              <a href="views/profile/profile.php">[user view]</a>
              <a href="/Tarboz/userview.php">[user view 2]</a>
<!--              display profile menu when user login -->
              <a href="views/profile/profile.php" style="display:none;" id="menu_user_index">Profile</a>
          </nav>
          <div class="table-cell" style="text-align: right;">
            <button id="call_it" class="login_button"><?php if(!isset($_SESSION['user']) ) { ?>Login<?php } else { ?>Logout<?php } ?></button> 
          </div>
          <div id="user_name"><?php if(isset($_SESSION['user']) ) echo $_SESSION['user']->getFirstName(); else echo ""; ?></div>

          <div style="width:100px;" title="Login Window" id="login">
             <!--start of the login form div-->
              <div id="login_form">
                 <p>
                    <input type="text" id="userlogin" placeholder="Username" class="login_input">
                 </p> 
                 <p>
                    <input type="password" id="userpassword" placeholder="Password" class="login_input">
                 </p>
                 <p>
                    <div style="margin-left: 0.7em;"><button class="lw_button" id="sub">Login</button>
                      <b id="or">or</b>
                        <button class="lw_button">Register</button></div> 
                 </p> 
                 <p id="ftest"></p>
                 <p style="margin-left: 1em;" id="forgotpwd"></p>
              </div>

              <!---forgot password window-->
              <div id="forgotdiv">

                  Email Address <input type="text" id="forgotemail">
                   <button id="forgotbtn">Forgot</button> 
                   <p>Please type the email address associated with your account in the above box</p>
              </div>
          </div>
        <!--  <div id="links"><a href="/Tarboz/Views/Login/Index.php">Login</a></div>-->

        <!-- A section for resetting the forgot password -->

        <?php 
         //$_GET['security']="0vLalqY93y";
          //If the security variable has something, then assign it otherwise keep the variable empty
          $reset=(isset($_GET['security']))?$_GET['security']:""; 

          //Pattern to avoid some weird hackers  
          $m_reg="/^[a-zA-Z0-9\.\@\(\)]+$/";

          //matchin the pattern and checking if the variable is also not empty
          if(($reset!="") && preg_match($m_reg,$reset)){
            echo $reset;

            $userLoginManager = new UserLoginManager();

            $logged = $userLoginManager->getLoginReset($reset);
            }

            if (isset($logged)) {
              echo "sent";
            }
            else {
              //echo "fail";
            }


        ?>
        </div>

    </div><!--"header"-->
