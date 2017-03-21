<?php
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
	die();
}
include("../connection.php");
?>
<html>
<body>
<form action="set_outofstock.php">
Add product no: <input type="text" name="pid"><br>
set out of stock: <input type="text" name="oos">('1' to set out_of_stock, and '0' to remove out_of_stock ***without quotes***)<br>
<input type="submit" value="set">
</form>
this will automatically notify all users about item availability<br>


<?php
if(isset($_GET['oos']) && isset($_GET['pid'])){
	$q="update `items` set `out_of_stock`='".$_GET['oos']."' WHERE `index`='".$_GET['pid']."'";
	mysql_query($q);
	include('../mail/class.phpmailer.php');
include('../sms/way2sms-api.php');
	if($_GET['oos']==0){
		$q="select * from `click_to_notify` where `item`='".$_GET['pid']."'";
		$r=mysql_query($q);
		while($a=mysql_fetch_array($r)){
			$email=$a['email'];
			$mobile=$a['mobile_no'];
			$name=$a['name'];
			$q1="select `title` from `items` where `index`='".$_GET['pid']."'";
			$r1=mysql_query($q1);
			$a1=mysql_fetch_array($r1);
			$msge="Hello, ".$name.",<br>We are happy to tell you that your needed item '".$a1['title']."' is now avilable on malgadi.co.in<br><a href='malgadi.co.in/item.php?item=".$_GET['pid']."'>click here</a> to buy that item.<br>Thank you<br>malgadi.co.in";
			$msgm=$a1['title']." is now avilable on  malgadi.co.in";
			
	sendWay2SMS ( "","",$mobile,$msgm);  
	
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
$mail->SetFrom("ready2help.malgadi@gmail.com");
$mail->Subject = "About item availability on malgadi.co.in";
$mail->Body=$msge;
$mail->AddAddress($email);
$mail->Send();
		}
	}
	echo("done changes<br>");
	
}

?>
<a href="home.php">home</a> <a href="logout.php">logout</a>
</body>
</html>
