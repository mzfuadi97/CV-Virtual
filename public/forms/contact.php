<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Extention;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require  'PHPMailer/SMTP.php';
  
$mail = new PHPMailer(true);

$alert = '';
  
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
  
    try{
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'mamaitah8@gmail.com'; // Gmail address which you want to use as SMTP server
      $mail->Password = '@qwerty123456'; // Gmail address Password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = '587';
  
      $mail->setFrom('mamaitah8@gmail.com'); // Gmail address which you used as SMTP server
      $mail->addAddress('mamaitah8@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
  
      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";
  
      $mail->send();
      $alert = '<div class="alert-success" style="text-align:center; padding-bottom:5px;">
                   <span>Pesan Terkirim! Terima kasih telah menghubungi kami.</span>
                  </div>';
    } catch (Exception $e){
      $alert = '<div class="alert-error">
                  <span>'.$e->getMessage().'</span>
                </div>';
    }
    echo "<meta http-equiv='refresh' content='3'>";
  }


?>
