<?php
require_once('PHPMailer/get_oauth_token.php');

$mail = new PHPMAiler();
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->SMTPSecure = 'ssl';

$mail->HOST = 'smtp.gmail.com';

$mail->Port = '587';

$mail->isHTML();

$mail->Username = 'desakondo697@gmail.com';
$mail->Password = 'vedunya5';
$mail->SetFrom('desakondo697@gmail.com');
$mail->Subject = 'Heyyyyyyyyyyyyyyy';
$mail->Body = 'A test email';
$mail-> AddAddress('desakondo697@gmail.com');


$mail->Send();


?>


