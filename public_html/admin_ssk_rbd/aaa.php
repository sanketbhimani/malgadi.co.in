<?php
require_once('../mail/class.phpmailer.php');
$od_index = $_GET['od_index'];
include("../connection.php");
$q = "SELECT `status`, `item`, `odid`, `email`, `fname` FROM `orders` WHERE `od_index`='".$od_index."'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
$q = "SELECT `title`, `price`,`discount` FROM `items` WHERE `index`='".$a['item']."'";
$r = mysql_query($q);
$aa = mysql_fetch_array($r);

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->Username = "snk.bhimani.jnd@gmail.com";
$mail->Password = "SNK.bhimani3";
$mail->SetFrom($a['email']);

	$mail->Subject = "About Order dispattched from malgadi.in";
	$mail->Body = "Hello ".$a['fname'].",<br>Your order of <b>".$aa['title']."</b> with Order ID: ".$a['odid']." is now dispattched. You will recive your product in 24-hours.<br>Keep ".($aa['price']-$aa['discount'])." &#8377; ready.<br>Thank you!<br>You can also view status at 'VIEW YOUR PAST ORDER' link.<br>malgadi.in";
	$mail->AddAddress($a['email']);
	$mail->Send();


	$mail->Subject = "About Order delivered from malgadi.in";
	$mail->Body = "Hello ".$a['fname'].",<br>Your order of <b>".$aa['title']."</b> with Order ID: ".$a['odid']." has been delivered.<br>Thank you for shopping with us!<br>You can also view status at 'VIEW YOUR PAST ORDER' link.<br>malgadi.in";
	$mail->AddAddress($a['email']);
	$mail->Send();

?>