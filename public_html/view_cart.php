<!DOCTYPE html>
<html>

<head>
<title>malgadi.co.in</title>
<!-- for-mobile-apps -->
<!-- //for-mobile-apps -->
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
<div class="">
		<div class="container" style="padding-top:3%;">
			<h3 class="animated wow slideInLeft" data-wow-delay=".5s">Your shopping cart contains: <span id="hahaha1"><?php if(isset($_SESSION['no_of_items'])){
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


	
			<div class="checkout-right animated slideInUp" style="margin-top:3%;" id="mojnebhura">
				
					
					<?php
if(isset($_SESSION['no_of_items']) && ((!isset($_SESSION['no_item_deleted'])) || (isset($_SESSION['no_item_deleted']) &&  ($_SESSION['no_of_items']-$_SESSION['no_item_deleted'])!=0) )){
	?>
	<table class="timetable_sub">
	<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Product Name</th>
							<th>Quality</th>
							<th>Price With Discount<br>(Single Qty)</th>
							<th>Final Price</th>
							<th>Remove</th>
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
						
						<style>
						#p,#m:hover {
							cursor: pointer;
						}
						</style>
						
						<td class="invert"><div style="font-size:2em;"><?php  echo($a['title']); ?></div><div style="font-size:1em;"><?php  echo($a['subtitle']); ?></div></td>
						<td class="invert">
						<div class="rem">
														<span class="minus" onclick="location.href='decrese.php?id=<?php echo($i); ?>';"> <img src="images/minus.png" id="m"></span>
														<span><input type="text" style="width:24%;" id="qty<?php echo($i); ?>" value="<?php echo($_SESSION['qty'.$i]); ?>" disabled></span>
								<span class="plus" onclick="location.href='increse.php?id=<?php echo($i); ?>';"> <img src="images/plus.png" id="p"></span>
								
								
							</div>
							<script>
						   </script>
						</td>
						
						
						<?php
						if($a['item_avil']<$_SESSION['qty'.$i])
								{
									$qty_more=$_SESSION['qty'.$i] -  $a['item_avil'];
									$q2="SELECT * FROM newitemslist where `index` = '".$_SESSION['item'.$i]."'";
									$r2=mysql_query($q2)
										or die("select ".mysql_error());
									if($a2=mysql_fetch_array($r2)){
										// echo("##############".$a2['item_avil']);
										if($a2['item_avil']>0){
										if($a2['item_avil']>$qty_more){
									//echo("##############");
									?>
									<td class="invert"><?php 
									if($a['item_avil'] >0){
									echo($a['price']); ?> &#8377;- <?php echo($a['discount']); ?>&#8377; (For <?php echo($a['item_avil']); 
									?>) Qty<br>
									<?php }
									echo($a2['price']); ?> &#8377;- <?php echo($a2['discount']); ?>&#8377; (For <?php echo($qty_more); ?>) Qty</td>
									<td class="invert">
									<?php 
									if($a['item_avil'] >0){
									echo(($a['price']-$a['discount'])."&#8377; x ".$a['item_avil']." = ");echo(($a['price']-$a['discount'])*$a['item_avil']); 
									}?><br>
									<?php echo(($a2['price']-$a2['discount'])."&#8377; x ".$qty_more." = ");echo(($a2['price']-$a2['discount'])*$qty_more); ?><br>
									Total: <?php echo((($a['price']-$a['discount'])*$a['item_avil'])+(($a2['price']-$a2['discount'])*$qty_more)); ?>
									
									</td>
									<?php
										}
										else{
											$qqq =  $a2['item_avil'];
											?>
									<td class="invert"><?php 
									if($a['item_avil'] >0){
									echo($a['price']); ?> &#8377;- <?php echo($a['discount']); ?>&#8377; (For <?php echo($a['item_avil']); 
									?>) Qty<br>
									<?php }
									echo($a2['price']); ?> &#8377;- <?php echo($a2['discount']); ?>&#8377; (For <?php echo($qqq); ?>) Qty</td>
									<td class="invert">
									<?php 
									if($a['item_avil'] >0){
									echo(($a['price']-$a['discount'])."&#8377; x ".$a['item_avil']." = ");echo(($a['price']-$a['discount'])*$a['item_avil']); 
									}?><br>
									<?php echo(($a2['price']-$a2['discount'])."&#8377; x ".$a2['item_avil']." = ");echo(($a2['price']-$a2['discount'])*$qqq); ?><br>
									Total: <?php echo((($a['price']-$a['discount'])*$qty_more)+(($a2['price']-$a2['discount'])*$qqq)); ?>
									
									</td>
									<script>
									alert("We are having only <?php echo($a['item_avil']+$qqq); ?> item avilable for <?php echo($a['title']); ?>");
									$("#qty"+<?php echo($i); ?>).val(<?php echo($a['item_avil']+$qqq); ?>);
									<?php $_SESSION['qty'.$i]= $a['item_avil']+$qqq; ?>
									</script>
									<?php
											
											
										}
									}
									else{
												
										?>
										
										
										<td class="invert"><?php 
									if($a['item_avil'] >0){
									echo($a['price']); ?> &#8377;- <?php echo($a['discount']); ?>&#8377; (For <?php echo($a['item_avil']); 
									?>) Qty</td><td class="invert">
									<?php  
									
									
									echo(($a['price']-$a['discount'])."&#8377; x ".$a['item_avil']." = ");echo(($a['price']-$a['discount'])*$a['item_avil']); 
									}
									
									?>
									<script>
									alert("We are having only <?php echo($a['item_avil']); ?> item avilable for <?php echo($a['title']); ?>");
									$("#qty"+<?php echo($i); ?>).val(<?php echo($a['item_avil']); ?>);
									<?php $_SESSION['qty'.$i]= $a['item_avil']; ?>
									</script>
									
									</td>
									
									<?php
									
									}
									}
									else{
										
										?>
										
										
										<td class="invert"><?php 
									if($a['item_avil'] >0){
									echo($a['price']); ?> &#8377;- <?php echo($a['discount']); ?>&#8377; (For <?php echo($a['item_avil']); 
									?>) Qty</td><td class="invert">
									<?php  
									
									
									echo(($a['price']-$a['discount'])."&#8377; x ".$a['item_avil']." = ");echo(($a['price']-$a['discount'])*$a['item_avil']); 
									}
									
									?>
									<script>
									alert("We are having only <?php echo($a['item_avil']); ?> item avilable for <?php echo($a['title']); ?>");
									$("#qty"+<?php echo($i); ?>).val(<?php echo($a['item_avil']); ?>);
									<?php $_SESSION['qty'.$i]= $a['item_avil']; ?>
									</script>
									
									</td>
									
									<?php
									
										
									}
									
									
								}
								else{
									?>
									<td class="invert"><?php echo($a['price']); ?> &#8377;- <?php echo($a['discount']); ?>&#8377;</td>
									<td class="invert"><?php echo(($a['price']-$a['discount'])."&#8377; x ".$_SESSION['qty'.$i]." = ");echo(($a['price']-$a['discount'])*$_SESSION['qty'.$i]); ?>&#8377;</td>
									<?php
								}
						
						?>
						<td class="invert">
							<div class="rem">
								<center><div class="close" style="float:none;" id="close<?php echo($cnt); ?>"><img src="images/close.png"> </div></center>
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
		<?php 
		if(isset($total)){
			if($total >= 50){
				if(isset($_SESSION['user_email'])){
				if($_SESSION['user_email'] === "guest@malgadi.co.in"){
                                        echo "<a href=\"login.php?redirectURL=chackout.php\"><h4>Check out</h4></a>";
                                    }else{
                                        echo "<a href=\"chackout.php\"><h4>Check out</h4></a>";
                                    }
                                }else{
                                    echo "<a href=\"login.php?redirectURL=chackout.php\"><h4>Check out</h4></a>";
                                }
				
				
				
				
				
				
			}
			else{
				?>
				<script>
	sweetAlert("Oops...", "Your minimum purchase amount should be 50 INR.", "error");
	</script>
				<a href="#">	<h4>Please Order atleast 50 &#8377;</h4>		</a>
				<?php
			}
		}else{
			?>
			<script>
	sweetAlert("Oops...", "Your minimum purchase amount should be 50 INR.", "error");
	</script>
			<a href="#">	<h4>Please Order atleast 50 &#8377;</h4>		</a>
			<?php
	
		}
		?>
					
					<ul>
				
						<li class="sanket" style="font-size:1.5em;">Total :<i></i> <span id="total1" ><?php 
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
					<a href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			
				
					<div class="container products-right products-right-grids-bottom" style="margin-top:6%; margin-bottom:3%;">
	<?php
	$list_item = array("0"=>"44","1"=>"41","2"=>"54","3"=>"56","4"=>"58","5"=>"28","6"=>"44","7"=>"41","8"=>"54","9"=>"56","10"=>"58","11"=>"28");
	
	
				$final_list = array();
				$cnt = 0;
				$c = 0;
				if(isset($_SESSION['no_of_items'])){
					
				
			for($j = 0; $j<12; $j++){		
				for($i=1;$i<=$_SESSION['no_of_items'];$i++){
					if(isset($_SESSION['item'.$i])){
						if($_SESSION['item'.$i] != $list_item[$j]){
							$final_list[$cnt] = $list_item[$j];
							$cnt++;
						}
					}
					else{
						$final_list[$cnt] = $list_item[$j];
						$cnt++;
					}
				}
			}
			
				}
				else{
					$final_list = $list_item;
				}
	
	
	?>
	<center><h3><u>You may also like these</u></h3></center>
	<div class="row" style="margin-top:3%;">
	
	<?php
	$cnt = 0;
	while($cnt<6){
		$q = "SELECT * FROM `items` WHERE `index`='".$list_item[$cnt]."'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
$cnt++;
		?>
		
		<div class="col-md-2	 products-right-grids-bottom-grid" style="margin-down:6px;">
							<div class="new-collections-grid1 products-right-grid1 animated slideInUp" style="overflow:hidden;  margin-bottom:6px;">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="item.php?item=<?php echo($a['index']); ?>" ><div class="product-image" style="min-height:180px; max-height:180px;"><?php
								if($a['out_of_stock']==1){
									?>
									<img src="images/oos.png" style="position:absolute; z-index:80; width:100%; right:0; top:30%;">
									<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " style="width:100%; opacity:.6;" class="img-responsive">
									<?php
								}else{
								
								?>
								
								
								<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive" style="width:100%;">
								
								<?php } ?></div></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="item.php?item=<?php echo($a['index']); ?>">Quick View</a>
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
												
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><h4><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['title']); ?></a></h4></div>
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><p><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['subtitle']); ?></a></p></div>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><?php
								if($a['out_of_stock']==1){
									?>
									<a class="item_add" href="click_to_notify.php?item=<?php echo($a['index']); ?>">click to notify</a>
									<?php
								}else{
									?>
								
								<a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a>
								
								<?php
								
								}
								?></p>
							</div>
						</div>
							</div>
		
		
		<?php
		
		
		
	}
	
	?>
	
	
	
	</div>
	</div>
			
			
			
			
		</div>
	</div>
<!-- //checkout -->
<!-- footer -->
	
	<?php include("dessert.php"); ?>
	<!-- //footer -->
</body>
</html>