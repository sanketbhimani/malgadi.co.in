<?php
if(!isset($_POST['fname']) && !isset($_POST['mnumber']) && !isset($_POST['email'])){
	if(isset($_SERVER['HTTP_REFERER'])){
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	else{
		header("location:index.php");
	}
	
	die();
}


?>
<!DOCTYPE html>
<html>
<head>
<title>malgadi.co.in</title>

<?php


include("connection.php");
session_start();
$flg = 0;
if(isset($_SESSION['purchase_done'])){
	if($_SESSION['purchase_done'] == 1){
		$flg = 1;
	}
}
if($flg == 0){
if(isset($_SESSION['no_of_items'])){
		if(isset($_SESSION['no_item_deleted'])){
			
			if($_SESSION['no_of_items']-$_SESSION['no_item_deleted'] == 0){
			header("location:something_went_wrong.php");
			}
			
			 }else if($_SESSION['no_of_items'] == 0){
					 header("location:something_went_wrong.php");
					die();
				 }
			 
	}
	else{
		 header("location:something_went_wrong.php");
		 die();
	}




	

$t = time()+(3*365*24*60*60);
$fname =  mysql_real_escape_string($_POST['fname']);
$branch =  mysql_real_escape_string($_POST['branch']);
$sem =  mysql_real_escape_string($_POST['sem']);
$address1 =  mysql_real_escape_string($_POST['address1']);
$address2 =  mysql_real_escape_string($_POST['address2']);
$ccity =  mysql_real_escape_string($_POST['ccity']);
$mnumber =  mysql_real_escape_string($_POST['mnumber']);
//echo("###########".$mnumber."###########");
$email =  mysql_real_escape_string($_POST['email']);
setcookie("fname",$fname,$t);
setcookie("branch",$branch,$t);
setcookie("sem",$sem,$t);
setcookie("address1",$address1,$t);
setcookie("address2",$address2,$t);
setcookie("ccity",$ccity,$t);
setcookie("mnumber",$mnumber,$t);
setcookie("email",$email,$t);



$q = "SELECT COUNT(*) FROM `orders`";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
		$random_string="";
		for($i=0;$i<3;$i++)
		{
			$random_string .= chr(rand(65,90));
		}
		$cnt = 0;
$odid = '#'.date("ymdhis").$a['COUNT(*)'].$random_string;


for($i=1;$i<=$_SESSION['no_of_items'];$i++){
	if(isset($_SESSION['item'.$i])){
		$cnt++;
		$q = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
		$r = mysql_query($q)
		or die(mysql_error().'2');
		$a = mysql_fetch_array($r);
		$price = $a['price']-$a['discount'];
		$q = "INSERT INTO `orders` (`refer_code`, `odid`, `item`, `fname`, `branch`, `sem`, `address`, `ccity`, `mnumber`, `email`, `date`, `status`,`price`) VALUES ('000000', '".$odid."', '".$_SESSION['item'.$i]."', '".$fname."', '".$branch."', '".$sem."', '".$address1.', '.$address2."', '".$ccity."', '".$mnumber."', '".$email."', '".date("d/m/Y")."', '".'placed'."', '".$price."')";
		mysql_query($q)
		or die(mysql_error()."1");
		$item_avil = $a['item_avil'];
		$q = "UPDATE `items` SET `item_avil` = '".$item_avil."' WHERE `index`= '".$_SESSION['item'.$i]."'" ;
		mysql_query($q) or die(mysql_error()."0");
		unset($_SESSION['item'.$i]);
	}
}

require_once('mail/class.phpmailer.php');
    include('sms/way2sms-api.php');
  
  	$q = "SELECT * FROM `orders` WHERE `odid`= '".$odid."'";
			//echo($q);
			$r = mysql_query($q)
			or die(mysql_error());
  
//$to = $_GET['to'];
//$subject = $_GET['subject'];
//$massage = $_GET['massage'];
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->Host = "mail.malgadi.co.in";
$mail->Port = 25;
$mail->IsHTML(true);
$mail->Username = "support@malgadi.co.in";
$mail->Password = "SNK.bhimani3";
$mail->SetFrom("support@malgadi.co.in");
$mail->Subject = "About Order placed at malgadi.co.in";
$email_body = "<div>Hello ".$fname.",<br>Your Order is successfully placed. You have ordered total ".$cnt." item(s).<br>Your Order ID is ".$odid.". This will be used in future for getting information about your Order.<br>More information about your order is can be seen at http://malgadi.co.in/chack_order.php

			<table border='1'>
					<thead>
						<tr>
				
							<th>SL No.</th>
							
							<th>Product Name</th>
						  
							<th>Final Price</th>
							<th>Status</th>
						
						</tr>
					</thead>
					";
					
					$cnt=0;
					$total = 0;
					while($a=mysql_fetch_array($r)){
						$cnt++;
						$q = "SELECT * FROM `items` WHERE `index` = '".$a['item']."'";
						$rr = mysql_query($q);
						$aa = mysql_fetch_array($rr);
					
						$email_body = $email_body."
						<tr>
						<td>".$cnt."</td>
		
						<td><div style=\"font-size:2em;\">".$aa['title']."</div><div style=\"font-size:1em;\">".$aa['subtitle']."</div></td>
						
						
						<td>".$a['price']."&#8377;</td>
						<td>
						".$a['status']."
						</td>
					</tr>
						";
						 
						 $total = $total + (int)$a['price'];
						
					}
					$email_body = $email_body."<tr>
					<td></td>
					<td></td>
		
					<td><h3>total</h3></td>
					<td>".$total."&#8377;</td>
					</tr>
				</table>
<br>Thank you!<br>
www.malgadi.co.in</div><br><br>
";

$mail->Body = $email_body;
	$mail->AddAddress($email);
$mail->Send();
sendWay2SMS ( "8460348865","cannotaccess",$mnumber,"Thank you for shopping with us. Your order ID for ".$cnt." item(s) is '".$odid."', www.malgadi.co.in"); 
sendWay2SMS ( "8460348865","cannotaccess","9409506643,7567925394,9638438648","no of item:".$cnt.",total money:".$total.",name: ".$fname." ".$mnumber." -www.malgadi.co.in");   
unset($_SESSION['no_of_items']);
unset($_SESSION['no_item_deleted']);
$_SESSION['no_of_items'] = 0;

$_SESSION['purchase_done'] = 1;
$_SESSION['odid'] = $odid;
}else{
	$odid = $_SESSION['odid'];
}
?>


<!-- for-mobile-apps -->


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->

<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 

<!-- //animation-effect -->
</head>
	
<body>

<!-- header -->
<?php
include("starter.php"); ?>	
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated slideInLeft">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Products</li>
			</ol>
		</div>
	</div>
<div class="products">
		<div class="container">
		<!--<center><div><h3>You also want to earn money? then <a href="earn_money">click here</a> and get started!</h3></div></center>--><br>
		<div class="alert alert-success" role="alert">
					Your Order ID:<strong> <?php echo($odid); ?></strong><br><br>
This order id can be used for future inquire. this id is also sent to your email id.<br>
Your order will be completed within a week.<br><br>
Thank you for shopping with us!
				</div>
				<div>
				<center><h1>Your order summary</h1></center>
				<br>
				</div>
				
				<?php
					$q = "SELECT COUNT(*) FROM `orders` WHERE `odid`= '".$odid."'";
					//echo("jkchckjsk".$q);
				$r = mysql_query($q)
			or die(mysql_error());
			
			$a = mysql_fetch_array($a);
			
			//echo('##################'.$a['COUNT(*)']."####################");
			
				$q = "SELECT * FROM `orders` WHERE `odid`= '".$odid."'";
				//echo("jkchcddddddddkjsk".$q);
			//echo($q);
			$r = mysql_query($q)
			or die(mysql_error());
			?>
			<table class="timetable_sub">
					<thead>
						<tr>
						<center>
							<th style="width:2%;">SL No.</th>	
							<th style="width:35%">Product</th>
							<!--<th style="width:17%;">Quality</th>-->
							<th style="width:24%;">Product Name</th>
							<th style="width:13%">Final Price</th>
							<th style="width:6%">Status</th>
							</center>
						</tr>
					</thead>
					<?php
					$cnt=0;
					$total = 0;
					while($a=mysql_fetch_array($r)){
						$cnt++;
						$q = "SELECT * FROM `items` WHERE `index` = '".$a['item']."'";
						$rr = mysql_query($q)
						or die("dgkj".mysql_error());
						$aa = mysql_fetch_array($rr);
						?>
						
						<tr>
						<td class="invert"><?php echo($cnt); ?></td>
						<td class="invert-image"><a href="item.php?item=<?php echo($aa['index']); ?>"><img src="product_images/<?php echo($aa['index']); ?>1.jpeg" alt=" " class="img-responsive" /></a></td>
						<!--<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>1</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>-->
						<td class="invert"><div style="font-size:2em;"><?php  echo($aa['title']); ?></div><div style="font-size:1em;"><?php  echo($aa['subtitle']); ?></div></td>
						
						
						<td class="invert"><h3><?php $total = $total + (int)$a['price']; echo($a['price']); ?>&#8377;</h3></td>
						<td class="invert">
						<?php echo($a['status']); ?>
						</td>
					</tr>
						
						
						<?php
						
						
					}
					?>
					<tr>
					<td></td>
					<td></td>
					<td><div style="font-size:2em;">Delivery Charges</div></td>
					<td><h3>0&#8377;</h3></td>
					<td></td>
					</tr>
					
					
					
					<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><h3>total</h3></td>
					<td><h2><?php echo($total); ?>&#8377;</h2></td>
					</tr>
				</table>
				</div>
				</div>
				</body>
				</html>