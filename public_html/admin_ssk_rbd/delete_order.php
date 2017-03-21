<?php
ob_start();
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
	die();
}

require_once('../mail/class.phpmailer.php');
$od_index = $_GET['od_index'];
include("../connection.php");
$q = "SELECT `status`, `item`, `odid`, `email`, `fname` FROM `orders` WHERE `od_index`='".$od_index."'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
$q = "SELECT `title`, `price`,`discount` FROM `items` WHERE `index`='".$a['item']."'";
$r = mysql_query($q);
$aa = mysql_fetch_array($r);
$q = "DELETE FROM `orders` WHERE `od_index`='".$od_index."'";
$r = mysql_query($q);
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->Username = "";
$mail->Password = "";
$mail->SetFrom("malgadi.teamyowd@gmail.com");

	
	$mail->Subject = "About Order cancellation from malgadi.in";
	$mail->Body = "<div>Hello ".$a['fname'].",<br>Your order of <b>".$aa['title']."</b> with Order ID: ".$a['odid']." has been cancelled.<br>Let make us aware with the reason of order cancellation.<br>visit again... :)<br>www.malgadi.co.in</div>";
	$mail->AddAddress($a['email']);
	$mail->Send();

if(isset($_SERVER['HTTP_REFERER'])){
	header("location:".$_SERVER['HTTP_REFERER']);
	die();
}
else{
	header("location:view_order.php");
	die();
}
ob_flush();
?>
