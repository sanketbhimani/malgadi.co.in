<?php

session_start();
include("connection.php");
								if(isset($_SESSION['no_of_items']) && ((!isset($_SESSION['no_item_deleted'])) || (isset($_SESSION['no_item_deleted']) &&  ($_SESSION['no_of_items']-$_SESSION['no_item_deleted'])!=0) )){
									$total = 0;
										for($i=1;$i<=$_SESSION['no_of_items'];$i++){
		if(isset($_SESSION['item'.$i])){
			
		
		$q = "SELECT * FROM `items` WHERE `index` = '".$_SESSION['item'.$i]."'";
		$r = mysql_query($q)
			or die("select ".mysql_error());
		$a = mysql_fetch_array($r);
								$total +=( ($a['price']-$a['discount'])*$_SESSION['qty'.$i]);
								}}
								if($total < 50){
									header("location:something_went_wrong.php");
					die();
								}
								}
								else{
									header("location:something_went_wrong.php");
					die();
								}
?>


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

ob_start();
//session_start();

if(!isset($_SESSION['no_of_items'])){
		if(isset($_SERVER['HTTP_REFERER'])){
	header("location:".$_SERVER['HTTP_REFERER']);
	die();
}else{
	header("location:index.php");
	die();
}
	}else{
		if($_SESSION['no_of_items']==0){
			
		header("location:something_went_wrong.php?a=1");
					die();
		}
	}

	if(strtolower($_POST['ccity'])!="nadiad"){
		if($_POST['payment']=="cod"){
			header("location:something_went_wrong.php?a=".$_POST['ccity']);
					die();
		}
	}
		
	if(strtolower($_POST['ccity'])!="nadiad"){
		$_SESSION['delivery_charges']=60;
	}
	
	include("connection.php");
	//echo($_POST['fname']); 
	$_SESSION['fname']=mysql_real_escape_string($_POST['fname']);
	$_SESSION['branch']=mysql_real_escape_string($_POST['branch']);
	$_SESSION['sem']=mysql_real_escape_string($_POST['sem']);
	$_SESSION['mnumber']=mysql_real_escape_string($_POST['mnumber']);
	$_SESSION['email']=mysql_real_escape_string($_POST['email']);
	$_SESSION['ccity']=mysql_real_escape_string($_POST['ccity']);
	$_SESSION['payment']=mysql_real_escape_string($_POST['payment']);
	$_SESSION['address']=mysql_real_escape_string($_POST['address1']).", ".mysql_real_escape_string($_POST['address2']);
	$t = time()+(3*365*24*60*60);
$fname =  $_POST['fname'];
$branch =  $_POST['branch'];
$sem =  $_POST['sem'];
$address1 =  $_POST['address1'];
$address2 =  $_POST['address2'];
$mnumber =  $_POST['mnumber'];
$email =  $_POST['email'];
$payment = $_POST['payment'];
setcookie("fname",$fname,$t);
setcookie("branch",$branch,$t);
setcookie("sem",$sem,$t);
setcookie("address1",$address1,$t);
setcookie("address2",$address2,$t);
setcookie("mnumber",$mnumber,$t);
setcookie("email",$email,$t);
$delivery_charges = 0;
if(isset($_SESSION['delivery_charges'])){
						$delivery_charges = $_SESSION['delivery_charges'];
					}else{
						$delivery_charges  = 0;
					}

	/*
	
?>



<!DOCTYPE html>
<html>
<head>
<title>malgadi.co.in</title>
<!-- for-mobile-apps -->
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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


<!-- //animation-effect -->
</head>
	
<body>
<script>
<?php
if(isset($_GET['msg'])){
	echo('alert("Invalid refer code. try again!")');
}



?>
</script>
<!-- header -->
	
	<?php
include("starter.php"); 




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
		
		<div class="alert alert-success" role="alert">
					Your payment mode is: <?php if(isset($payment)){
						if($payment == "cod"){
							echo("Cash on delivery");
						}
						else if($payment == "instamojo"){
							echo("online payment using instamojo");
						}
					} ?>
				
				</div>
				<br><center><h2>Verify the details and complete your order</h2></center><br><br>
				<?php
					
				
				
	*/			
				
$items = '';
$prices = '';
$qtys = '';
$cnt = 0;
for($i=1;$i<=$_SESSION['no_of_items'];$i++){
	if(isset($_SESSION['item'.$i])){
		$cnt++;
		if($items==''){
			$items = $_SESSION['item'.$i];
			$qtys = round($_SESSION['qty'.$i]);
			$q = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
			$r = mysql_query($q)
			or die(mysql_error().'2');
			$a = mysql_fetch_array($r);
			$price = $a['price']-$a['discount'];
			$prices = $price;
		}
		else{
			$items = $items.','.$_SESSION['item'.$i];
			$qtys = $qtys.','.round($_SESSION['qty'.$i]);
			$q = "SELECT * FROM `items` WHERE `index`='".$_SESSION['item'.$i]."'";
			$r = mysql_query($q)
			or die(mysql_error().'2');
			$a = mysql_fetch_array($r);
			$price = $a['price']-$a['discount'];
			$prices = $prices.','.$price;
		}
		
	}
}
				
$itemsa = explode(',', $items);
$qtysa = explode(',', $qtys);
$pricesa = explode(',', $prices);
$array_count = count($itemsa)-1;

		/*	?>
			
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
							</center>
						</tr>
					</thead>
					<?php*/
					
					$cnt=0;
					$total = 0;
					while($array_count>=0){
						//print_r($itemsa);
//echo("<br>");
//print_r($qtysa);
//echo("<br>");
//print_r($pricesa);
						//echo($itemsa[$array_count.'']);
						$cnt++;
						$q = "SELECT * FROM `items` WHERE `index` = '".$itemsa[$array_count.'']."'";
						//echo($q);
						$rr = mysql_query($q)
						or die("dgkj".mysql_error());
						$aa = mysql_fetch_array($rr);
					/*	?>

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
						<td class="invert"><h3><?php 
						
						
						echo($pricesa[$array_count]); 
						
						
						?>&#8377;</h3></td>
						<td class="invert"><h3><?php*/


						$total = $total + (int)($pricesa[$array_count]*$qtysa[$array_count]); 
						//echo(($aa['price']-$aa['discount'])."&#8377 x ".$qtysa[$array_count]."=".($aa['price']-$aa['discount'])*$qtysa[$array_count]);
						/*?>&#8377;</h3></td>
					</tr>


						<?php
*/
$array_count--;
					}
					/*?>
					<tr>
					<td></td>
					<td></td>
					<td><div style="font-size:2em;">Delivery Charges</div></td>
					<td></td>
					<td></td>
					<td><h3><?php */
					$total = $total + $delivery_charges;
					$_SESSION['total']=$total;
					//echo($delivery_charges);
					/*?>&#8377;</h3></td>

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
				<br>
				<center>
				<div class="checkout-left">	
		
		<div class="checkout-left-basket animated slideInLeft">
					<a href="payment_final.php">	<h4>Complete Order</h4>		</a>
									
				</div>
		
				</div>
				</center>
				</div>
				</div>
				<?php
	include('dessert.php');
	?>
				</body>
				</html>
				
				*/
				
				header("location:payment_final.php");
die();
				?>
