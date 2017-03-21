
<!DOCTYPE html>
<html>
<head>
<title>malgadi.co.in</title>
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<?php


include("connection.php");
session_start();


        
        if(!isset($_SESSION['user_email'])){
            $_SESSION['user_email']="guest@malgadi.co.in";
        }
        
        
        
        $connection=new PDO("mysql:host=$host;dbname=$db",$uname,$pass);
        $statement=$connection->prepare("select user_id from users where email=?");
        
        if($statement->execute(array($_SESSION['user_email']))){
            if($row=$statement->fetch(PDO::FETCH_OBJ)){
                $user_id=$row->user_id;
            }else{
                echo "error1";
                die();
            }
        }else{
            echo "error2";
            die();
        }
		
		


if($_SESSION['total'] < 50){
		header("location:something_went_wrong.php?a=0");
					die();
	}

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





/*
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

*/

if($_SESSION['payment']=="instamojo"){

require("src/Instamojo.php");
		$api = new Instamojo\Instamojo('', '');
		try {
    $response = $api->paymentRequestPaymentStatus($_GET['payment_request_id'], $_GET['payment_id']);
       if(strtolower($response['payment']['status'])!="credit"){
		   header("location:payment_fail.php");
		   die();
	   }
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
	header("location:payment_fail.php");
		   die();
}
}









$fname =  $_SESSION['fname'];
$branch = $_SESSION['branch'];
$sem =  $_SESSION['sem'];
$address =  $_SESSION['address'];
$ccity =  $_SESSION['ccity'];
$mnumber =  $_SESSION['mnumber'];
$email = $_SESSION['email'];
$delivery_charges = 0;
if(isset($_SESSION['delivery_charges'])){
						$delivery_charges = $_SESSION['delivery_charges'];
					}else{
						$delivery_charges  = 0;
					}
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

$items = '';
$prices = '';
$qtys = '';
for($i=1;$i<=$_SESSION['no_of_items'];$i++){
	if(isset($_SESSION['item'.$i])){
		$cnt++;
		$q_item = "select * from `items` where `index` = '".$_SESSION['item'.$i]."'";
		$r_item = mysql_query($q_item)
				or die(mysql_error().'1');
				$a_item = mysql_fetch_array($r_item);
		if($a_item['item_avil'] < $_SESSION['qty'.$i] )
		{
			$qty_more=$_SESSION['qty'.$i] -  $a_item['item_avil'];
			if($items==''){
				
				if($a_item['item_avil']>0){
				
				
				$items = $_SESSION['item'.$i];
				$qtys = round($a_item['item_avil']);
				$q = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
				$r = mysql_query($q)
				or die(mysql_error().'2');
				$a = mysql_fetch_array($r);
				$price = $a['price']-$a['discount'];
				$prices = $price;
				
				$q2="SELECT * FROM `newitemslist` where `index` = '".$_SESSION['item'.$i]."'";
				$r2=mysql_query($q2)
				or die("select ".mysql_error());
				$a2=mysql_fetch_array($r2);
				//print_r($a2);
				$q_update = "UPDATE `items` SET `title`='".mysql_real_escape_string($a2['title'])."',`subtitle`='".mysql_real_escape_string($a2['subtitle'])."',`item_avil`='".mysql_real_escape_string($a2['item_avil'])."',`description`='".mysql_real_escape_string($a2['description'])."',`department`='".mysql_real_escape_string($a2['department'])."',`price`='".mysql_real_escape_string($a2['price'])."', `discount`='".mysql_real_escape_string($a2['discount'])."' , `purchasing_price`='".mysql_real_escape_string($a2['purchasing_price'])."' WHERE `index`= '".mysql_real_escape_string($_SESSION['item'.$i])."'";
				//echo($q_update);
				mysql_query($q_update)
				or die("aaa".mysql_error());
			//die();
				
				$items = $items.','.$_SESSION['item'.$i];
				if($qty_more > $a2['item_avil']){
					$qty_more = $a2['item_avil'];
					echo("<script>alert('Only ".$qty_more+$a_item['item_avil']." ".$a2['title']." left. so your order quantity is converted to avilable quantity.');</script>");
				}
				$qtys = $qtys.','.round($qty_more);
				$q = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
				$r = mysql_query($q)
				or die(mysql_error().'2');
				$a = mysql_fetch_array($r);
				$price = $a['price']-$a['discount'];
				$prices = $prices.','.$price;
				$item_avil = $a['item_avil']-$qty_more;
				if($item_avil < 0){
					$item_avil = 0;
				}
			$q = "UPDATE `items` SET `item_avil` = '".$item_avil."' WHERE `index`= '".$_SESSION['item'.$i]."'" ;
			mysql_query($q) or die(mysql_error()."0");
				}
				else{
					
				//$items = $_SESSION['item'.$i];
				//$qtys = round($a_item['item_avil']);
				//$q = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
				//$r = mysql_query($q)
				//or die(mysql_error().'2');
				//$a = mysql_fetch_array($r);
				//$price = $a['price']-$a['discount'];
				//$prices = $price;
				
				$q2="SELECT * FROM `newitemslist` where `index` = '".$_SESSION['item'.$i]."'";
				$r2=mysql_query($q2)
				or die("select ".mysql_error());
				$a2=mysql_fetch_array($r2);
				//print_r($a2);
				$q_update = "UPDATE `items` SET `title`='".mysql_real_escape_string($a2['title'])."',`subtitle`='".mysql_real_escape_string($a2['subtitle'])."',`item_avil`='".mysql_real_escape_string($a2['item_avil'])."',`description`='".mysql_real_escape_string($a2['description'])."',`department`='".mysql_real_escape_string($a2['department'])."',`price`='".mysql_real_escape_string($a2['price'])."', `discount`='".mysql_real_escape_string($a2['discount'])."' , `purchasing_price`='".mysql_real_escape_string($a2['purchasing_price'])."' WHERE `index`= '".mysql_real_escape_string($_SESSION['item'.$i])."'";
				//echo($q_update);
				mysql_query($q_update)
				or die("aaa".mysql_error());
			//die();
				
				$items = $_SESSION['item'.$i];
				if($qty_more > $a2['item_avil']){
					$qty_more = $a2['item_avil'];
					echo("<script>alert('Only ".$qty_more+$a_item['item_avil']." ".$a2['title']." left. so your order quantity is converted to avilable quantity.');</script>");
				}
				$qtys = round($qty_more);
				$q = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
				$r = mysql_query($q)
				or die(mysql_error().'2');
				$a = mysql_fetch_array($r);
				$price = $a['price']-$a['discount'];
				$prices = $price;
				$item_avil = $a['item_avil']-$qty_more;
				if($item_avil < 0){
					$item_avil = 0;
				}
			$q = "UPDATE `items` SET `item_avil` = '".$item_avil."' WHERE `index`= '".$_SESSION['item'.$i]."'" ;
			mysql_query($q) or die(mysql_error()."0");
				}
				
				
			}
			else{
				if($a_item['item_avil']>0){
				
				$items = $items.','.$_SESSION['item'.$i];
				$qtys = $qtys.','.round($a['item_avil']);
				$q = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
				$r = mysql_query($q)
				or die(mysql_error().'2');
				$a = mysql_fetch_array($r);
				$price = $a['price']-$a['discount'];
				$prices = $prices.','.$price;
				
				$q2="SELECT * FROM `newitemslist` where `index` = '".$_SESSION['item'.$i]."'";
				$r2=mysql_query($q2)
				or die("select ".mysql_error());
				$a2=mysql_fetch_array($r2);
				$q_update = "UPDATE `items` SET `title`='".$a2['title']."',`subtitle`='".$a2['subtitle']."',`item_avil`='".$item_avil."',`tags`='".$a2['tags']."',`description`='".$a2['description']."',`department`='".$a2['department']."',`price`='".$a2['price']."', `discount`='".$a2['discount']."' , `purchasing_price`='".$a2['purchasing_price']."' WHERE `index`= '".$_SESSION['item'.$i]."'";
				mysql_query($q_update);
			
				
				$items = $items.','.$_SESSION['item'.$i];
				if($qty_more > $a2['item_avil']){
					$qty_more = $a2['item_avil'];
					echo("<script>alert('Only ".$qty_more+$a_item['item_avil']." ".$a2['title']." left. so your order quantity is converted to avilable quantity.');</script>");
				}
				$qtys = $qtys.','.round($qty_more);
				$q = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
				$r = mysql_query($q)
				or die(mysql_error().'3');
				$a = mysql_fetch_array($r);
				$price = $a['price']-$a['discount'];
				$prices = $prices.','.$price;
				$item_avil = $a['item_avil']-$qty_more;
				if($item_avil < 0){
					$item_avil = 0;
				}
			$q = "UPDATE `items` SET `item_avil` = '".$item_avil."' WHERE `index`= '".$_SESSION['item'.$i]."'" ;
			mysql_query($q) or die(mysql_error()."0");
				}else{
					//$items = $items.','.$_SESSION['item'.$i];
				//$qtys = $qtys.','.round($a['item_avil']);
				//$q = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
				//$r = mysql_query($q)
				//or die(mysql_error().'2');
				//$a = mysql_fetch_array($r);
				//$price = $a['price']-$a['discount'];
				//$prices = $prices.','.$price;
				
				$q2="SELECT * FROM `newitemslist` where `index` = '".$_SESSION['item'.$i]."'";
				$r2=mysql_query($q2)
				or die("select ".mysql_error());
				$a2=mysql_fetch_array($r2);
				$q_update = "UPDATE `items` SET `title`='".$a2['title']."',`subtitle`='".$a2['subtitle']."',`item_avil`='".$item_avil."',`tags`='".$a2['tags']."',`description`='".$a2['description']."',`department`='".$a2['department']."',`price`='".$a2['price']."', `discount`='".$a2['discount']."' , `purchasing_price`='".$a2['purchasing_price']."' WHERE `index`= '".$_SESSION['item'.$i]."'";
				mysql_query($q_update);
			
				
				$items = $items.','.$_SESSION['item'.$i];
				if($qty_more > $a2['item_avil']){
					$qty_more = $a2['item_avil'];
					echo("<script>alert('Only ".$qty_more+$a_item['item_avil']." ".$a2['title']." left. so your order quantity is converted to avilable quantity.');</script>");
				}
				$qtys = $qtys.','.round($qty_more);
				$q = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
				$r = mysql_query($q)
				or die(mysql_error().'3');
				$a = mysql_fetch_array($r);
				$price = $a['price']-$a['discount'];
				$prices = $prices.','.$price;
					$item_avil = $a['item_avil']-$qty_more;
					if($item_avil < 0){
					$item_avil = 0;
				}
			$q = "UPDATE `items` SET `item_avil` = '".$item_avil."' WHERE `index`= '".$_SESSION['item'.$i]."'" ;
			mysql_query($q) or die(mysql_error()."0");
				}
			}
			
			
			
			
			
			
			
			
			$q_delete = "delete from `newitemslist` where `index` = '".$_SESSION['item'.$i]."'";
			mysql_query($q_delete);
			
			
			
			
			
			
			
			
			
			
			
		}
		else{
			if($items==''){
				$items = $_SESSION['item'.$i];
				$qtys = round($_SESSION['qty'.$i]);
				$q = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
				$r = mysql_query($q)
				or die(mysql_error().'4');
				$a = mysql_fetch_array($r);
				$price = $a['price']-$a['discount'];
				$prices = $price;
			}
			else{
				$items = $items.','.$_SESSION['item'.$i];
				$qtys = $qtys.','.round($_SESSION['qty'.$i]);
				$q = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
				$r = mysql_query($q)
				or die(mysql_error().'5');
				$a = mysql_fetch_array($r);
				$price = $a['price']-$a['discount'];
				$prices = $prices.','.$price;
			}
			
			
			
			$item_avil = $a['item_avil']-$_SESSION['qty'.$i];
			$q = "UPDATE `items` SET `item_avil` = '".$item_avil."' WHERE `index`= '".$_SESSION['item'.$i]."'" ;
			mysql_query($q) or die(mysql_error()."0");

					$q_sel = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
				$r_sel = mysql_query($q_sel)
				or die(mysql_error().'5');
				$a_sel = mysql_fetch_array($r_sel);
				if($a_sel['item_avil']<=0){
					echo("#################################");
					$q_new = "select * from `newitemslist` where `index`='".$_SESSION['item'.$i]."'";
					$r_new = mysql_query($q_new)
					or die(mysql_error()."jhgjhgjhj");
					if($a2 = mysql_fetch_array($r_new)){
						echo("*************************************");
						$q_update = "UPDATE `items` SET `title`='".$a2['title']."',`subtitle`='".$a2['subtitle']."',`item_avil`='".$a2['item_avil']."',`tags`='".$a2['tags']."',`description`='".$a2['description']."',`department`='".$a2['department']."',`price`='".$a2['price']."', `discount`='".$a2['discount']."' , `purchasing_price`='".$a2['purchasing_price']."' WHERE `index`= '".$_SESSION['item'.$i]."'";
				mysql_query($q_update)
				or die(mysql_error().'5_update');
				$q_delete = "delete from `newitemslist` where `index` = '".$_SESSION['item'.$i]."'";
			mysql_query($q_delete);
			
					}
					
				}
		}

		unset($_SESSION['item'.$i]);
			unset($_SESSION['qty'.$i]);
	}
}
$q = "INSERT INTO `orders` (`user_id`,`refer_code`, `odid`, `items`, `fname`, `branch`, `sem`, `address`, `ccity`, `mnumber`, `email`, `date`, `status`,`prices`,`qtys`, `payment`, `delivery_charges`) VALUES (".$user_id.",'000000', '" . $odid . "', '" . $items . "', '" . $fname . "', '" . $branch . "', '" . $sem . "', '" . $address . "', '" . $ccity . "', '" . $mnumber . "', '" . $email . "', '" . date("d/m/Y") . "', '" . 'placed' . "', '" . $prices . "', '" . $qtys . "','" . $_SESSION['payment'] . "', '" . $delivery_charges . "')";

mysql_query($q)
or die(mysql_error()."1");
include('mail/class.phpmailer.php');
    include('sms/way2sms-api.php');

  	$q = "SELECT * FROM `orders` WHERE `odid`= '".$odid."'";
			//echo($q);
			$r = mysql_query($q)
			or die(mysql_error());
$a=mysql_fetch_array($r);
$itemsa = explode(',', $a['items']);
$qtysa = explode(',', $a['qtys']);
$pricesa = explode(',', $a['prices']);
$array_count = count($itemsa)-1;
//$to = $_GET['to'];
//$subject = $_GET['subject'];
//$massage = $_GET['massage'];
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
$email_body = "<div>Hello ".$fname.",<br>Your Order is successfully placed. You have ordered total ".$cnt." item(s).<br>Your Order ID is ".$odid.". This will be used in future for getting information about your Order.<br>For any query you can always contact us on +917069936320 / +8141192497.<br>More information about your order is can be seen at <a href='http://malgadi.co.in/chack_order.php?odid=".$text = str_replace('#', '%23', $odid)."'> View order status</a>

			<table border='1'>
					<thead>
						<tr>

							<th>SL No.</th>

							<th>Product Name</th>
						  <th>Quantity</th>
							<th>Final Price</th>
							<th>Status</th>

						</tr>
					</thead>
					";

					$cnt=0;
					$total = 0;
					while($array_count>=0){
						$cnt++;
						$q = "SELECT * FROM `items` WHERE `index` = '".$itemsa[$array_count]."'";
						$rr = mysql_query($q);
						$aa = mysql_fetch_array($rr);

						$email_body = $email_body."
						<tr>
						<td>".$cnt."</td>

						<td><div style=\"font-size:2em;\">".$aa['title']."</div><div style=\"font-size:1em;\">".$aa['subtitle']."</div></td>
						<td>".$qtysa[$array_count]."</td>

						<td>".$qtysa[$array_count]." x ".$pricesa[$array_count]." = ".$qtysa[$array_count]*$pricesa[$array_count]."&#8377;</td>
						<td>
						".$a['status']."
						</td>
					</tr>
						";

						 $total = $total + (int)($pricesa[$array_count]*$qtysa[$array_count]);
$array_count--;
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
sendWay2SMS ( "","",$mnumber,"Thank you for shopping with us. Your order ID for ".$cnt." item(s) is '".$odid."', www.malgadi.co.in");
sendWay2SMS ( "","","9428680985,8141192497","no of item:".$cnt.",total money:".$total.",name: ".$fname." ".$mnumber.", payment: ".$_SESSION['payment']." -www.malgadi.co.in");
//sendWay2SMS ( "","","9426518798,9624472763,9825024057,9426072769,7567420323,8460497794,","no of item:".$cnt.",total money:".$total.",name: ".$fname." ".$mnumber.", payment: ".$_SESSION['payment']." -www.malgadi.co.in");




unset($_SESSION['fname']);
unset($_SESSION['branch']);
unset($_SESSION['sem']);
unset($_SESSION['mnumber']);
unset($_SESSION['email']);
unset($_SESSION['ccity']);
unset($_SESSION['payment']);
unset($_SESSION['address']);
unset($_SESSION['delivery_charges']);
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




<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

<!-- //js -->

<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- animation-effect -->


<!-- //animation-effect -->
</head>

<body>

<!-- header -->
<?php
include("starter.php"); ?>

<?php
if(isset($_GET['item_added'])){
	?>
	<script>
	swal("Great!", "Item Added Successfully", "success");
	</script>
	
	<?php
	
	}
?>

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
				<br>

				<center><h1>Your order summary</h1></center>
				<br>
				</div>

				<?php

				$q = "SELECT * FROM `orders` WHERE `odid`= '".$odid."'";
				$r = mysql_query($q)
			or die(mysql_error());
			$a=mysql_fetch_array($r);
			$itemsa = explode(',', $a['items']);
$qtysa = explode(',', $a['qtys']);
$pricesa = explode(',', $a['prices']);
$array_count = count($itemsa)-1;
			?>
			<table class="timetable_sub">
					<thead>
						<tr>
						<center>
							<th>SL No.</th>
							<th>Product</th>
							<th>Product Name</th>
							<th>Quantity</th>
						    <th>Price With Discount<br>(Single Qty)</th>
							<th>Final Price</th>
							<th>Status</th>
							</center>
						</tr>
					</thead>
					<?php
					$cnt=0;
					$total = 0;
					while($array_count>=0){
						$cnt++;
						$q = "SELECT * FROM `items` WHERE `index` = '".$itemsa[$array_count]."'";
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
						<td class="invert"><?php echo($qtysa[$array_count]); ?></td>
						<td class="invert"><h3><?php echo($pricesa[$array_count]); ?>&#8377;</h3></td>
						<td class="invert"><h3><?php $total = $total + (int)($pricesa[$array_count]*$qtysa[$array_count]); 
						echo($pricesa[$array_count]*$qtysa[$array_count]); ?>&#8377;</h3></td>
						<td class="invert">
						<?php echo($a['status']); ?>
						</td>
					</tr>


						<?php

$array_count--;
					}
					?>
					<tr>
					<td></td>
					<td></td>
					<td><div style="font-size:2em;">Delivery Charges</div></td>
					<td></td>
					<td></td>
					<td><h3><?php echo($a['delivery_charges']);?>&#8377;</h3></td>

					</tr>



					<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><h3>total</h3></td>
					<td><h2><?php echo($total); ?>&#8377;</h2></td>
					</tr>
				</table>
				</div>




				</div>
				<?php
	include('dessert.php');
	?>
				</body>
				</html>
