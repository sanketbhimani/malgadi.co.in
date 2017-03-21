<?php
if(isset($_GET['review'])){
	include('../connection.php');
	$q = "UPDATE `reviews` SET `enable` = '1' WHERE `index` = '".$_GET['review']."'";
	mysql_query($q)
	or die(mysql_error());
	$q = "SELECT * FROM `reviews` WHERE `index` = '".$_GET['review']."'";
	$r = mysql_query($q)
	or die(mysql_error());
	$a = mysql_affected_rows($r);
	require_once('../mail/class.phpmailer.php');
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
$mail->Subject = "About Order placed at malgadi.co.in";
$email_body = "<div>Hello ".$a['name'].",<br>Your review is now enabled on malgadi.co.in<br><a href='malgadi.co.in/localhost/public_html/review_us.php'>click here</a> to view it...<br>-www.malgadi.co.in";
$mail->Body = $email_body;
	$mail->AddAddress($email);
$mail->Send();
	
	
	header("location:view_review.php");
}



?>