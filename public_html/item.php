<?php
ob_start(); 
if(!isset($_GET['item'])){
	if(isset($_SERVER['HTTP_REFERER'])){
	header("location:".$_SERVER['HTTP_REFERER']."?msg=1");
}
else{
	header("location:index.php");
}
}
$id =  mysql_real_escape_string($_GET['item']);
$t = time()+(3*365*24*60*60);
$f = 0;
for($i=0;$i<6;$i++){
	if(!isset($_COOKIE['item'.$i])){
		if($i != 0){
			for($j=$i-1;$j>=0;$j--){
				$f = 0;
				if(isset($_COOKIE['item'.$j])){
				if($_COOKIE['item'.$j] == $id){
					$f = 1;
					break;
				}
			}
			}
		}
		if($f == 0){
			setcookie("item".$i,$id,$t);
			break;
		}
	}
}


?>
<!DOCTYPE html>
<html>
<head>
<title>malgadi.co.in</title>
<!-- //for-mobile-apps -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->

<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
</head>
	
<body>
<!-- header -->
	<?php 
	session_start();
	include('starter.php'); ?>
	<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated slideInLeft">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Product</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- single -->
	<div class="single">
		<div class="container">
			<div class="col-md-8 single-right">
				<div class="col-md-5 single-right-left animated slideInUp">
					<div class="flexslider">
						<ul class="slides">
						<?php
					
						include("connection.php");

						$q = "SELECT COUNT(*) FROM `items` WHERE `index` = '".$id."'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
//echo("#####".$a['COUNT(*)']."#############################");
if(!$a['COUNT(*)']){
	header("location:something_went_wrong.php");
	die();
}
						$q = "SELECT * FROM `items` WHERE `index` = '".$id."'";
						$r = mysql_query($q);
						$a = mysql_fetch_array($r);
						?>
							<li data-thumb="product_images/<?php echo($a['index'].'1.jpeg'); ?>">
								<div class="thumb-image"> <img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>"  onerror="$(this.parentNode.parentNode).remove();" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="product_images/<?php echo($a['index'].'2.jpeg'); ?>">
								 <div class="thumb-image"> <img src="product_images/<?php echo($a['index'].'2.jpeg'); ?>" onerror="$(this.parentNode.parentNode).remove();"  data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="product_images/<?php echo($a['index'].'3.jpeg'); ?>">
							   <div class="thumb-image"> <img src="product_images/<?php echo($a['index'].'3.jpeg'); ?>" onerror="$(this.parentNode.parentNode).remove();"  data-imagezoom="true" class="img-responsive"> </div>
							</li> 
							<li data-thumb="product_images/<?php echo($a['index'].'4.jpeg'); ?>">
							   <div class="thumb-image"> <img src="product_images/<?php echo($a['index'].'4.jpeg'); ?>" onerror="$(this.parentNode.parentNode).remove();"  data-imagezoom="true" class="img-responsive"> </div>
							</li> 
							<li data-thumb="product_images/<?php echo($a['index'].'5.jpeg'); ?>">
							   <div class="thumb-image"> <img src="product_images/<?php echo($a['index'].'5.jpeg'); ?>" onerror="$(this.parentNode.parentNode).remove();"  data-imagezoom="true" class="img-responsive"> </div>
							</li> 
							<li data-thumb="product_images/<?php echo($a['index'].'6.jpeg'); ?>">
							   <div class="thumb-image"> <img src="product_images/<?php echo($a['index'].'6.jpeg'); ?>" onerror="$(this.parentNode.parentNode).remove();"  data-imagezoom="true" class="img-responsive"> </div>
							</li> 
						</ul>
					</div>
					<!-- flixslider -->
						<script defer src="js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>
					<!-- flixslider -->
				</div>
				<div class="col-md-7 single-right-left simpleCart_shelfItem animated slideInRight">
				<center>
					<h3><?php echo($a['title']); ?></h3>
					<h4 style="color:black;"><?php echo($a['subtitle']); ?></h4>
					<br>
					<h4>Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="item_price"><?php echo($a['price']); ?>&#8377;</span><br>Discount:  &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;<?php echo($a['discount']); ?>&#8377;<hr>Final:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo($a['price']-$a['discount']); ?>&#8377;</h4><br>
					<div>
					<script>
					var snk = Math.floor(<?php echo($a['avg_star']);?>);
					function sanku(b,c){
						//alert(b+" "+c);
						var a = new XMLHttpRequest();	
						a.open("GET","add_star.php?item="+b+"&star="+c+"",false);
						a.send(null);
						snk = c;
						for(i=1;i<=5;i++){
							document.getElementById('img'+i).onclick="";
							document.getElementById('img'+i).onmouseout="";
							document.getElementById('img'+i).onmouseover="";
						}
						document.getElementById('ratting_msg').innerHTML="your ratting is submited thank you!";
					}
					function hey(a){
						for(i=1;i<=a;i++){
							document.getElementById('img'+i).src="images/2.png";
						}
						for(;i<=5;i++){
							document.getElementById('img'+i).src="images/1.png";
						}
					}
					function a(){
						for(i=1;i<=snk;i++){
							document.getElementById('img'+i).src="images/2.png";
						}
						for(;i<=5;i++){
							document.getElementById('img'+i).src="images/1.png";
						}
					}
					a();
					</script>
					<h5 style="color:red;" id="ratting_msg"></h5>
					<img class="star_image" id="img1" onmouseover="hey(1);" onmouseout="a()" onclick="sanku(<?php echo($a['index']); ?>,1)">
					<img class="star_image" id="img2" onmouseover="hey(2);" onmouseout="a()" onclick="sanku(<?php echo($a['index']); ?>,2)">
					<img class="star_image" id="img3" onmouseover="hey(3);" onmouseout="a()" onclick="sanku(<?php echo($a['index']); ?>,3)">
					<img class="star_image" id="img4" onmouseover="hey(4);" onmouseout="a()" onclick="sanku(<?php echo($a['index']); ?>,4)">
					<img class="star_image" id="img5" onmouseover="hey(5);" onmouseout="a()" onclick="sanku(<?php echo($a['index']); ?>,5)">
					<style>
						.star_image:hover{
							border:1px solid black;
						}
					</style>
					<script>
					for(i=1;i<=snk;i++){
						document.getElementById('img'+i).src="images/2.png";
					}
					for(;i<=5;i++){
						document.getElementById('img'+i).src="images/1.png";
					}
					</script>
					<!--
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5" onclick="alert('5');">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4" onclick="alert('4');">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" onclick="alert('3');">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2" onclick="alert('2');">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1" onclick="alert('1');">
							<label for="rating1" onclick="alert('1');">1</label>
						</span>-->
					</div>
					<br><br>
					<div class="occasion-cart">
						<?php
					if($a['out_of_stock']==1){
					?>
<img src="images/oos1.png" style="width:30%;">
			<a class="item_add" href="click_to_notify.php?item=<?php echo($a['index']); ?>">click to notify</a>		
<?php					
					}else{
					?>
						<a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a>
						<a class="item_add" href="buy_now.php?index=<?php echo($a['index']); ?>" style="margin-left:3%; padding-left:5.1%; padding-right:5.1%;">buy now</a>
						<br><br>
						<h4 style="font-size: 15px;"> *Standard Delivery: (Free) Generally it can take 3-5 working days.<br><br> *Express Delivery: (Additional Rs. 20) Same day delivery.<br><br></h4>
						
						<h4 style="font-size: 10px; text-align: right;">* : Terms and Coditions apply.</h4>
						
						<?php
						}						
						?>
					</div>
				</center>
				</div>
				<div class="clearfix"> </div>
				<div class="bootstrap-tab animated slideInUp">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
							<!--<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews(2)</a></li>-->
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
								<h5>Product Brief Description</h5>
								<p><?php echo($a['description']); ?></p>
							</div>
						<!--	<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="images/4.png" alt=" " class="img-responsive" />
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Admin</a></li>
												<li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
											</ul>
											<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis 
												suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem 
												vel eum iure reprehenderit.</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="images/5.png" alt=" " class="img-responsive" />
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Admin</a></li>
												<li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
											</ul>
											<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis 
												suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem 
												vel eum iure reprehenderit.</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="add-review">
										<h4>add a review</h4>
										<form>
											<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
											<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
											<input type="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" required="">
											<textarea type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
											<input type="submit" value="Send" >
										</form>
									</div>
								</div>
							</div>-->
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //single -->
<!-- single-related-products -->
	<!--<div class="single-related-products">
		<div class="container">
			<h3 class="animated slideInUp">Related Products</h3>
			<p class="est animated slideInUp">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
				deserunt mollit anim id est laborum.</p>
			<div class="new-collections-grids">
				<div class="col-md-3 new-collections-grid">
					<div class="new-collections-grid1 animated slideInLeft">
						<div class="new-collections-grid1-image">
							<a href="single.html" class="product-image"><img src="images/8.jpg" alt=" " class="img-responsive"></a>
							<div class="new-collections-grid1-image-pos">
								<a href="single.html">Quick View</a>
							</div>
							<div class="new-collections-grid1-right">
								<div class="rating">
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						<h4><a href="single.html">Running Shoes</a></h4>
						<p>Vel illum qui dolorem eum fugiat.</p>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
							<p><i>$280</i> <span class="item_price">$150</span><a class="item_add" href="#">add to cart </a></p>
						</div>
					</div>
				</div>
				<div class="col-md-6 new-collections-grid">
					<div class="new-collections-grid1-sub">
						<div class="new-collections-grid1 animated slideInLeft">
							<div class="new-collections-grid1-image">
								<a href="single.html" class="product-image"><img src="images/6.jpg" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos">
									<a href="single.html">Quick View</a>
								</div>
								<div class="new-collections-grid1-right">
									<div class="rating">
										<div class="rating-left">
											<img src="images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a href="single.html">Wall Lamp</a></h4>
							<p>Vel illum qui dolorem eum fugiat.</p>
							<div class="new-collections-grid1-left simpleCart_shelfItem">
								<p><i>$480</i> <span class="item_price">$400</span><a class="item_add" href="#">add to cart </a></p>
							</div>
						</div>
					</div>
					<div class="new-collections-grid1-sub">
						<div class="new-collections-grid1 animated slideInLeft">
							<div class="new-collections-grid1-image">
								<a href="single.html" class="product-image"><img src="images/9.jpg" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos">
									<a href="single.html">Quick View</a>
								</div>
								<div class="new-collections-grid1-right">
									<div class="rating">
										<div class="rating-left">
											<img src="images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a href="single.html">Wall Lamp</a></h4>
							<p>Vel illum qui dolorem eum fugiat.</p>
							<div class="new-collections-grid1-left simpleCart_shelfItem">
								<p><i>$280</i> <span class="item_price">$150</span><a class="item_add" href="#">add to cart </a></p>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-3 new-collections-grid">
					<div class="new-collections-grid1 animated slideInLeft">
						<div class="new-collections-grid1-image">
							<a href="single.html" class="product-image"><img src="images/11.jpg" alt=" " class="img-responsive"></a>
							<div class="new-collections-grid1-image-pos">
								<a href="single.html">Quick View</a>
							</div>
							<div class="new-collections-grid1-right">
								<div class="rating">
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						<h4><a href="single.html">Stones Bangles</a></h4>
						<p>Vel illum qui dolorem eum fugiat.</p>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
							<p><i>$340</i> <span class="item_price">$257</span><a class="item_add" href="#">add to cart </a></p>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
-->
	<!-- //single-related-products -->
<!-- footer -->
	<?php
	include('dessert.php');
	?>
	<!-- //footer -->
<!-- zooming-effect -->
	<script src="js/imagezoom.js"></script>
<!-- //zooming-effect -->
</body>
</html>
<?php
ob_flush();
?>
