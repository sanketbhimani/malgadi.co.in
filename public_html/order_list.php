<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location:login.php?error=You need to login first");
    die();
} else {
    if ($_SESSION['user_email'] === "guest@malgadi.co.in") {
        header("Location:login.php?error=You need to login first");
        die();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<title>malgadi.co.in</title>
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
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

<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated slideInLeft">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Your Orders</li>
			</ol>
		</div>
	</div>
<div class="products">
		<div class="container">
		<br>
		<center><h1>Your order summary</h1></center>
		<br>
		
		
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
							<th>Delivery Charges</th>
							</center>
						</tr>
						</thead>
						
						<?php
						
$connection = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);

$statement = $connection->prepare("select user_id from users where email=?");

if ($statement->execute(array($_SESSION['user_email']))) {
    if ($row = $statement->fetch(PDO::FETCH_OBJ)) {
        $user_id = $row->user_id;
        // echo $user_id;
    }
}



$statement = $connection->prepare("select * from orders where user_id=?");

if ($statement->execute(array($user_id))) {
    while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
						
						?>
						
						<tr>
						<td></td>
						<td><b>Order ID:</b></td>
						<td><b><?php echo($row->odid); ?></b></td>
						<td><b>date:</b></td>
						<td><b><?php echo($row->date); ?></b></td>
						<td></td>
						<td></td>
						<td></td>
						</tr>
						
						<?php

				$q = "SELECT * FROM `orders` WHERE `odid`= '".$row->odid."'";
				$r = mysql_query($q)
			or die(mysql_error());
			$a=mysql_fetch_array($r);
			$itemsa = explode(',', $a['items']);
$qtysa = explode(',', $a['qtys']);
$pricesa = explode(',', $a['prices']);
$array_count = count($itemsa)-1;
			?>
			
			
						
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
						<td class="invert">
						<?php echo($a['delivery_charges']); ?>
						</td>
					</tr>
			
						
						<?php

$array_count--;
					}
						}
}
					?>
					</table>
		</div>
		</div>

<?php
	include('dessert.php');
	?>

</body>
</html>
