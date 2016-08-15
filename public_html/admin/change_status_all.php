<?php
ob_start();
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
	die();
}
require_once('../mail/class.phpmailer.php');
include('../sms/way2sms-api.php');
$odid = '#'.$_GET['odid'];
echo($odid);
include("../connection.php");
$q = "SELECT `status`, `item`, `odid`, `email`, `fname`,`mnumber` FROM `orders` WHERE `odid`='".$odid."'";
echo($q."\n");
$r = mysql_query($q)
	or die(mysql_error());
$a = mysql_fetch_array($r);
//$q = "SELECT `title`, `price`,`discount` FROM `items` WHERE `index`='".$a['item']."'";
//$r = mysql_query($q)
//	or die(mysql_error());
//$aa = mysql_fetch_array($r);

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->Host = "mail.malgadi.co.in";
$mail->Port = 25;
$mail->IsHTML(true);
$mail->Username = "support@malgadi.co.in";
$mail->Password = "password";
$mail->SetFrom("support@malgadi.co.in");
if($a['status']==="placed"){
	$q = "UPDATE `orders` SET `status`='dispattched' WHERE `odid`='".$odid."'";
	echo($q."\n");
	mysql_query($q)
	or die(mysql_error());
	$mail->Subject = "About Order dispattched from malgadi.in";
	$mail->Body = "<div>Hello ".$a['fname'].",<br>Your order of Order ID: ".$a['odid']." has been dispattched. You will recive your product in 24-hours.<br>Thank you!<br>You can also view status at http://malgadi.co.in/chack_order.php<br>malgadi.co.in</div>";
	$mail->AddAddress($a['email']);
	$mail->Send();
	sendWay2SMS ( "8460348865","password",$a['mnumber'],"Your order of  Order ID: ".$a['odid']." has been dispattched. -www.malgadi.co.in");   
}
if($a['status']==="dispattched"){
	$q = "UPDATE `orders` SET `status`='delivered' WHERE `odid`='".$odid."'";
	echo($q."\n");
	mysql_query($q)
	or die(mysql_error());
	$mail->Subject = "About Order delivered from malgadi.in";
	$mail->Body = "<div>Hello ".$a['fname'].",<br>Your order of Order ID: ".$a['odid']." has been delivered.<br>Thank you for shopping with us!<br>Please, give your kind suggestions or reviews here http://malgadi.co.in/review_us.php<br>malgadi.co.in</div>";
	$mail->AddAddress($a['email']);
	$mail->Send();
		sendWay2SMS ( "8460348865","password",$a['mnumber'],"Your order of  Order ID: ".$a['odid']." has been delivered. -www.malgadi.co.in");   
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