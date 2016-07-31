<?php session_start(); ?>



<!DOCTYPE html>
<html>
<head>
<title>malgadi.co.in</title>
<!-- for-mobile-apps -->
<script>
//alert("Desktop view is recommended, we are working on mobile view. Sorry for that! :[");
</script>


<?php
$file = fopen("counter.txt","r");
$cnt = fread($file,filesize("counter.txt"));
$cnt++;
fclose($file);
$file = fopen("counter.txt","w");
fwrite($file,$cnt);
fclose($file);

$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
//$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$nokia = strpos($_SERVER['HTTP_USER_AGENT'],"Nokia");
$windows = strpos($_SERVER['HTTP_USER_AGENT'],"Windows Phone");
$symbian= strpos($_SERVER['HTTP_USER_AGENT'],"SymbianOS");
$msie= strpos($_SERVER['HTTP_USER_AGENT'],"msie");
if ($iphone || $palmpre || $ipod || $berry || $nokia || $windows || $symbian || $msie== true) 
{ 
	?>
	<script>
alert("Desktop view is recommended, we are working on mobile view. Sorry for that! :[  Still you can continue.");
</script>
<?php
}
?>





















<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->

<script src="sss/sss.js"></script>
<link rel="stylesheet" href="sss/sss.css" type="text/css" media="all">

<script>
jQuery(function($) {
$('.slider').sss();
});
</script>

<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->

<!-- timer -->
<link rel="stylesheet" href="css/jquery.countdown.css" />
<!-- //timer -->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<!--
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
-->
<!-- //animation-effect -->
</head>
	
<body>
<!-- header -->

<?php

include("starter.php"); ?>

	<div class="breadcrumbs">
		<div class="container">
				<center><h3><a href="review_us.php">If you couldn't find your required components then suggest us <span style="font-weight:600; color:red;">here</span>, we will arrange that for you :)</a></h3></center>
		</div>
	</div>
<br>
<center>
<div style="width:100%;">
<table style="width:80%;">
<tr><td style="width:25%; overflow:hidden;"></td><td style="width:25%; overflow:hidden;"></td><td style="width:25%; overflow:hidden;"></td><td style="width:25%; overflow:hidden;"></td></tr>
<tr>
<?php
$q = "SELECT * FROM `items` WHERE `index`='41'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
?>
<td style="width:25%; overflow:hidden;">
					<div class="col-md-4 products-right-grids-bottom-grid" style="width:100% !important;">
						<div class="new-collections-grid1 products-right-grid1 animated slideInUp">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="item.php?item=41" class="product-image"><img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="item.php?item=41">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<a href="item.php?item=41"><h4><?php echo($a['title']); ?></h4>
							<p><?php echo($a['subtitle']); ?></p></a>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a></p>
							</div>
						</div>
							</div>
							</td>
							
							
							<?php
$q = "SELECT * FROM `items` WHERE `index`='42'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
?>
<td style="width:25%; overflow:hidden;">
					<div class="col-md-4 products-right-grids-bottom-grid" style="width:100% !important;">
						<div class="new-collections-grid1 products-right-grid1 animated slideInUp">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="item.php?item=42" class="product-image"><img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="basic_components.php">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<a href="basic_components.php"><h4><?php echo($a['title']); ?></h4>
							<p><?php echo($a['subtitle']); ?></p></a>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a></p>
							</div>
						</div>
							</div>
							</td>
							
							
							<?php
$q = "SELECT * FROM `items` WHERE `index`='9'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
?>
<td style="width:25%; overflow:hidden;">
					<div class="col-md-4 products-right-grids-bottom-grid" style="width:100% !important;">
						<div class="new-collections-grid1 products-right-grid1 animated slideInUp">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="basic_components.php" class="product-image"><img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="basic_components.php">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<a href="basic_components.php"><h4><?php echo($a['title']); ?></h4>
							<p><?php echo($a['subtitle']); ?></p></a>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a></p>
							</div>
						</div>
							</div>
							</td>
							
							
							<?php
$q = "SELECT * FROM `items` WHERE `index`='27'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
?>
<td style="width:25%; overflow:hidden;">
					<div class="col-md-4 products-right-grids-bottom-grid" style="width:100% !important;">
						<div class="new-collections-grid1 products-right-grid1 animated slideInUp">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="basic_components.php" class="product-image"><img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="basic_components.php">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<a href="basic_components.php"><h4><?php echo($a['title']); ?></h4>
							<p><?php echo($a['subtitle']); ?></p></a>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a></p>
							</div>
						</div>
							</div>
							</td>
</tr>
</table>
<br>
<br>
</div>

<div class="slider" style="align-content:center !important;">
<img src="images/1.jpg" />
<img src="images/2.jpg" />
<img src="images/3.jpg" />
<img src="images/4.jpg" />
</div>

<br>
<div style="width:100%;">
<table style="width:80%;">
<tr><td style="width:25%; overflow:hidden;"></td><td style="width:25%; overflow:hidden;"></td><td style="width:25%; overflow:hidden;"></td><td style="width:25%; overflow:hidden;"></td></tr>
<tr>
<?php
$q = "SELECT * FROM `items` WHERE `index`='28'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
?>
<td style="width:25%; overflow:hidden;">
					<div class="col-md-4 products-right-grids-bottom-grid" style="width:100% !important;">
						<div class="new-collections-grid1 products-right-grid1 animated slideInUp">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="basic_components.php" class="product-image"><img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="basic_components.php">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<a href="basic_components.php"><h4><?php echo($a['title']); ?></h4>
							<p><?php echo($a['subtitle']); ?></p></a>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a></p>
							</div>
						</div>
							</div>
							</td>
							
							
							<?php
$q = "SELECT * FROM `items` WHERE `index`='17'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
?>
<td style="width:25%; overflow:hidden;">
					<div class="col-md-4 products-right-grids-bottom-grid" style="width:100% !important;">
						<div class="new-collections-grid1 products-right-grid1 animated slideInUp">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="basic_components.php" class="product-image"><img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="basic_components.php">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<a href="basic_components.php"><h4><?php echo($a['title']); ?></h4>
							<p><?php echo($a['subtitle']); ?></p></a>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a></p>
							</div>
						</div>
							</div>
							</td>
							
							
							<?php
$q = "SELECT * FROM `items` WHERE `index`='5'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
?>
<td style="width:25%; overflow:hidden;">
					<div class="col-md-4 products-right-grids-bottom-grid" style="width:100% !important;">
						<div class="new-collections-grid1 products-right-grid1 animated slideInUp">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="basic_components.php" class="product-image"><img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="basic_components.php">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<a href="basic_components.php"><h4><?php echo($a['title']); ?></h4>
							<p><?php echo($a['subtitle']); ?></p></a>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a></p>
							</div>
						</div>
							</div>
							</td>
							
							
							<?php
$q = "SELECT * FROM `items` WHERE `index`='29'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
?>
<td style="width:25%; overflow:hidden;">
					<div class="col-md-4 products-right-grids-bottom-grid" style="width:100% !important;">
						<div class="new-collections-grid1 products-right-grid1 animated slideInUp">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="basic_components.php" class="product-image"><img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="basic_components.php">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<a href="basic_components.php"><h4><?php echo($a['title']); ?></h4>
							<p><?php echo($a['subtitle']); ?></p></a>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a></p>
							</div>
						</div>
							</div>
							</td>
</tr>
</table>
</div>
</center>
<?php include('dessert.php');?>
<!-- //footer -->
</body>
</html>