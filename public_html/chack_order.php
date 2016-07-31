
<!DOCTYPE html>
<html>
<head>
<title>malgadi.co.in</title>
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
session_start();
include("starter.php"); ?>	
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated slideInLeft">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">view past orders</li>
			</ol>
		</div>
	</div>
	<div class="products">
		<div class="container">
		<div class="alert alert-warning" role="alert">
					Please enter your <strong>Order ID</strong> to view your order status.
				</div>
				<center>
				<form action="chack_order.php" method="post">
				<div class="col-lg-6 in-gp-tb" style="float:none;">
					<div class="input-group">
					
						<input type="text" name="odid" class="form-control" placeholder="Enter your order ID with #">
						<span class="input-group-btn">
							<input class="btn btn-default" type="submit">Go!</button>
						</span>
					
					</div><!-- /input-group -->
				</div><!-- /.col-lg-6 -->
				</form>
				</center>
			
		<?php
		include("connection.php");
		if(isset($_POST['odid'])){
			$odid =  mysql_real_escape_string($_POST['odid']);
			$q = "SELECT * FROM `orders` WHERE `odid`= '".$odid."'";
			//echo($q);
			$r = mysql_query($q)
			or die(mysql_error());
			if(mysql_num_rows($r)==0){
				?>
				<div class="alert alert-danger" role="alert">
					Incorrect <strong>Order ID</strong>, Try again with valid Order Id
				</div>
				<?php
			}else{
				?>
				<table class="timetable_sub">
					<thead>
						<tr>
						<center>
							<th style="width:2%;">SL No.</th>	
							<th style="width:35%">Product</th>
							<!--<th style="width:17%;">Quality</th>-->
							<th style="width:24%;">Product Name</th>
						    <th style="width:17%">Price With Discount</th>
							<th style="width:13%">Final Price</th>
							<th style="width:6%">Status</th>
							</center>
						</tr>
					</thead>
					<?php
					$cnt=0;
					while($a=mysql_fetch_array($r)){
						$cnt++;
						$q = "SELECT * FROM `items` WHERE `index` = '".$a['item']."'";
						$rr = mysql_query($q);
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
						
						<td class="invert"><?php echo($aa['price']); ?>&#8377; - <?php echo($aa['discount']); ?>&#8377;</td>
						<td class="invert"><?php echo($aa['price']-$aa['discount']); ?>&#8377;</td>
						<td class="invert">
						<?php echo($a['status']); ?>
						</td>
					</tr>
						
						
						<?php
						
						
					}
					
						echo("</table>");		
				
			}
		}
		
					
		
		?>
		
		
			</div>
	</div>
		
	<?php
	include('dessert.php');
	?>
	<!-- //footer -->

</body>
</html>