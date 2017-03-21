<?php
ob_start();
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
	die();
}
require_once('../mail/class.phpmailer.php');
include('../sms/way2sms-api.php');
$od_index = $_GET['od_index'];
$flg=$_GET['flg'];
include("../connection.php");
$q = "SELECT `status`, `items`, `odid`, `email`, `fname`,`mnumber` FROM `orders` WHERE `od_index`='".$od_index."'";
$r = mysql_query($q)
or die(mysql_error());
$a = mysql_fetch_array($r);
///$q = "SELECT `title`, `price`,`discount` FROM `items` WHERE `index`='".$a['item']."'";
//$r = mysql_query($q);
//$aa = mysql_fetch_array($r);

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
if($flg==="1"){
	$q = "UPDATE `orders` SET `status`='dispattched' WHERE `od_index`='".$od_index."'";
	mysql_query($q);
	$mail->Subject = "About Order dispattched from malgadi.in";
	$mail->Body = "<div>Hello ".$a['fname'].",<br>Your order of ".$a['odid']." Order ID has been dispattched. You will recive your product in 24-hours.<br>Thank you!<br>You can also view status at <a href='http://malgadi.co.in/chack_order.php?odid=".$odid."'> View order status</a><br>-www.malgadi.co.in</div>";
	$mail->AddAddress($a['email']);
	$mail->Send();
	sendWay2SMS ( "","",$a['mnumber'],"Your order of ".$a['odid']." Order ID has been dispattched. -www.malgadi.co.in");
}
if($flg==="2"){
	$q = "UPDATE `orders` SET `status`='delivered' WHERE `od_index`='".$od_index."'";
	mysql_query($q);
	$mail->Subject = "About Order delivered from malgadi.in";
	$mail->Body = "<div>Hello ".$a['fname'].",<br>Your order of ".$a['odid']." Order ID has been delivered.<br>Thank you for shopping with us!<br>Please, give your kind suggestions or reviews here http://malgadi.co.in/review_us.php
	<br>-www.malgadi.co.in</div>";
	$mail->AddAddress($a['email']);
	$mail->Send();
		sendWay2SMS ( "","",$a['mnumber'],"Your order of ".$a['odid']." Order ID has been delivered. -www.malgadi.co.in");
}
if($flg==="3"){
	$q = "UPDATE `orders` SET `status`='placed' WHERE `od_index`='".$od_index."'";
	mysql_query($q);
	$mail->Subject = "About Order delivered from malgadi.in";
	$mail->Body = "<div>Hello ".$a['fname'].",<br>Your order of ".$a['odid']." Order ID has been delivered.<br>Thank you for shopping with us!<br>Please, give your kind suggestions or reviews here http://malgadi.co.in/review_us.php
	<br>-www.malgadi.co.in</div>";
	$mail->AddAddress($a['email']);
	$mail->Send();
		sendWay2SMS ( "","",$a['mnumber'],"Your order of ".$a['odid']." Order ID has been delivered. -www.malgadi.co.in");
}
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
