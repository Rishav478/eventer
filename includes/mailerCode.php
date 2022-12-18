<?php

$name = "EVENTER";  // Name of your website or yours
$to = $email;  // mail of reciever
$from = "support@goeventer.in";  // you mail
$password = "#123Mummy";  // your mail password
                    
 
                    
//SMTP Settings
$mail->isSMTP();
//$mail->SMTPDebug = 3;  //Keep It commented this is used for debugging                          
$mail->Host = "smtp.hostinger.com"; // smtp address of your email
$mail->SMTPAuth = true;
$mail->Username = $from;
$mail->Password = $password;
$mail->Port = 465;  // port
$mail->SMTPSecure = "ssl";  // tls or ssl
$mail->smtpConnect([
'ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    ]
]);
                    
//Email Settings
$mail->isHTML(true);
$mail->setFrom($from, $name);
$mail->addAddress($to); // enter email address whom you want to send
$mail->Subject = ("$subject");
$mail->Body = $body;
if ($mail->send()) {
    echo "<script>alert('".$alertSuccess."'); window.location.href='".$redirectSuccess."';</script>";
} else {
    echo "<script>alert('".$alertSuccess."'); window.location.href='".$redirectError."';</script>";
}