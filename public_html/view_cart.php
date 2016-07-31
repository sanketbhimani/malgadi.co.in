
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
 include("starter.php"); 
?>



	<!-- //header -->
<!-- breadcrumbs -->

	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated slideInLeft">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Checkout Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h3 class="animated slideInLeft">Your shopping cart contains: <span id="hahaha1"><?php if(isset($_SESSION['no_of_items'])){
		if(isset($_SESSION['no_item_deleted'])){
			echo($_SESSION['no_of_items']-$_SESSION['no_item_deleted']);
		}else{
			echo($_SESSION['no_of_items']);
			}
		}else{
			echo('0');
		}

?>
		Products</span></h3>
			<div class="checkout-right animated slideInUp" id="mojnebhura">
				
					
					<?php
if(isset($_SESSION['no_of_items']) && ((!isset($_SESSION['no_item_deleted'])) || (isset($_SESSION['no_item_deleted']) &&  ($_SESSION['no_of_items']-$_SESSION['no_item_deleted'])!=0) )){
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
							<th style="width:6%">Remove</th>
							</center>
						</tr>
					</thead>
	<?php
	
	
$cnt=0;
	for($i=1;$i<=$_SESSION['no_of_items'];$i++){
		if(isset($_SESSION['item'.$i])){
		$cnt++;

		$q = "SELECT * FROM `items` WHERE `index` = '".$_SESSION['item'.$i]."'";
		$r = mysql_query($q)
			or die("select ".mysql_error());
		$a = mysql_fetch_array($r);
	?>
					
					<tr class="rem<?php echo($cnt); ?>">
						<td class="invert"><?php echo($cnt); ?></td>
						<td class="invert-image"><a href="item.php?item=<?php echo($a['index']); ?>"><img src="product_images/<?php echo($a['index']); ?>1.jpeg" alt=" " class="img-responsive" /></a></td>
						<!--<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>1</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>-->
						<td class="invert"><div style="font-size:2em;"><?php  echo($a['title']); ?></div><div style="font-size:1em;"><?php  echo($a['subtitle']); ?></div></td>
						
						<td class="invert"><?php echo($a['price']); ?> &#8377;- <?php echo($a['discount']); ?>&#8377;</td>
						<td class="invert"><?php echo($a['price']-$a['discount']); ?>&#8377;</td>
						<td class="invert">
							<div class="rem">
								<div class="close" id="close<?php echo($cnt); ?>"> </div>
							</div>
							<script>
								
							$(document).ready(function(c) {
								$('#close<?php echo($cnt); ?>').on('click', function(c){
									$('.rem<?php echo($cnt); ?>').fadeOut('slow', function(c){
										$('.rem<?php echo($cnt); ?>').remove();
							var a = new XMLHttpRequest();	
a.open("GET","delete_item_in_cart.php?item=<?php echo($i); ?>",false);
a.send(null);
var b = new XMLHttpRequest();
b.open("GET","total_price_in_cart.php",false);
b.send(null);
//alert(b.responseText);
document.getElementById('total').innerHTML = b.responseText;
document.getElementById('total1').innerHTML = b.responseText;
var sss = new XMLHttpRequest();

sss.open("GET","no_of_item_in_cart.php",false);
sss.send(null);
//alert(sss.responseText);
document.getElementById('hahaha1').innerHTML = sss.responseText;
document.getElementById('hahahaasdf').innerHTML = sss.responseText;
if( sss.responseText==0){

	document.getElementById('mojnebhura').innerHTML = "<div>		Your cart is empty keep shopping	</div>";
}

									});
									});	  
								});
						   </script>
						</td>
					</tr>
					
					
		<?php
		}
	}
	?>
	</table>
		<div class="checkout-left">	
		
		<div class="checkout-left-basket animated slideInLeft">
					<a href="chackout.php">	<h4>Check out</h4>		</a>
					<ul>
				
						<li class="sanket" style="font-size:1.5em;">Total <i>-</i> <span id="total1" ><?php 
						if(isset($total)){
							echo($total); 
						}else{
							echo('0');
						}
						
						?>&#8377;</span></li>

						
					</ul>
					
				</div>
		
				</div>
	<?php   
}else{
?>
<div>
		Your cart is empty keep shopping
	</div>
	<?php
}
	?>
					
					
								<!--quantity-->
							<!--		<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>-->
								<!--quantity-->
				
			</div>
			<div class="checkout-left">	
			
				<div class="checkout-right-basket animated slideInRight">
					<a href="<?php echo($_SERVER['HTTP_REFERER']);?>"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //checkout -->
<!-- footer -->
	
	<?php include("dessert.php"); ?>
	<!-- //footer -->
</body>
</html>