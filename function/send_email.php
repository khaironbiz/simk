<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader

function send_email($email,$penerima){
    $email_penerima     = $email;
    $nama_penerima      = $penerima;
    $email_pengirim     = "hpii.ppni@gmail.com";
    $nama_pengirim      = "HPII";
    require '../vendor/mail/autoload.php';
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'hpii.ppni@gmail.com';                     //SMTP username
        $mail->Password   = '@Mail250909#';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom($email_pengirim, $nama_pengirim);
        $mail->addAddress($email_penerima, $nama_penerima);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo($email_pengirim, $nama_pengirim);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        //Attachments
        // $mail->addAttachment('../assets/files/regulasi/17db1fa0722d82774b5d423559d611f7.pdf');         //Add attachments
        // $mail->addAttachment('../assets/files/regulasi/9734d89f9816ebce9fa4697e5bb4a0ca.pdf');  
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Regulasi';
        $mail->Body    = 'Berikut kami kirimkan <b>regulasi!</b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        //echo 'Message has been sent';
    } 
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: ";
    }
    $send_email = $mail->send();
    return $send_email;
}
?>