<?php
require 'phpmailer/PHPMailerAutoload.php';

function email($email, $username, $body,$Subject) {
  // echo $body_text;
    $mail = new PHPMailer;
    
    $mail->isSMTP();
    $mail->Host = "ssl://smtp.gmail.com"; 
    $mail->SingleTo = true;
    $mail->SMTPSecure = 'ssl';
    $mail-> Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = 'tarboz.com@gmail.com';
    $mail->Password = 'habibtarboz';
    $mail->From = 'tarboz.com@gmail.com';
    $mail->FromName = 'Tarboz.com Adminstration';
    $mail->addAddress($email, $username);
    $mail->addReplyTo('habibullah.zahoori@gmail.com', 'myInformation');
    $mail->WordWrap = 50;
    $mail->isHTML(true);
    $mail->Subject = $Subject;
    $mail->Body    = $body;
    

    //if Email was not sent it should return a true bool to the user
    if($mail->send()) {
      $mail->ClearAddresses();
       return true;
    }


    //successfully sent, then it should sent a true bool
    return false;

  }

  ?>