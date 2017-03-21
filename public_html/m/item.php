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
?>
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
	
	$id =  mysql_real_escape_string($_GET['item']);
						include("connection.php");

						$q = "SELECT COUNT(*) FROM `items` WHERE `index` = '".$id."'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
if(!$a['COUNT(*)']){
	header("location:something_went_wrong.php");
	die();
}
						$q = "SELECT * FROM `items` WHERE `index` = '".$id."'";
						$r = mysql_query($q);
						$a = mysql_fetch_array($r);
						
						$stock = 0;
						
						if($a['item_avil']<=0 || $a['out_of_stock']==1){
							$stock = 0;
						}else{
							$stock = 1;
						}
?>


<div class="container" style="margin-top:120px; padding-bottom:120px;">
				<div class="main_item">
					<div class="slider">
						<ul>
							
							<li><img src="../product_images/<?php echo($a['index'].'1.jpeg'); ?>" onerror="$(this.parentNode).remove();" class="poster"></li>
							<li><img src="../product_images/<?php echo($a['index'].'2.jpeg'); ?>" onerror="$(this.parentNode).remove();" class="poster"></li>
							<li><img src="../product_images/<?php echo($a['index'].'3.jpeg'); ?>" onerror="$(this.parentNode).remove();" class="poster"></li>
							<li><img src="../product_images/<?php echo($a['index'].'4.jpeg'); ?>" onerror="$(this.parentNode).remove();" class="poster"></li>
							<li><img src="../product_images/<?php echo($a['index'].'5.jpeg'); ?>" onerror="$(this.parentNode).remove();" class="poster"></li>
							<li><img src="../product_images/<?php echo($a['index'].'6.jpeg'); ?>" onerror="$(this.parentNode).remove();" class="poster"></li>
						</ul>
					</div>
					<script>
						$('.slider').unslider({
						animation: 'fade',
						autoplay: true,
						arrows: false
						});
									
					</script>
					
					
					
<center>
						<div class="item_title"><?php echo($a['title']); ?></div>
						<div class="item_subtitle"><?php echo($a['subtitle']); ?></div>
						<br>
						<div class="prices">
							<div class="row price">
								<div class="col s2 m2"></div>
								<div class="col s4 m4"><span class="left">Price</span></div>
								<div class="col s1 m1"><span class="center">:-</span></div>
								<div class="col s3 m3"><span class="right"><?php
									echo($a['price']); ?>  RS</span></div>
							</div>
							<div class="row discount">
								<div class="col s2 m2"></div>
								<div class="col s4 m4"><span class="left">Discount</div>
								<div class="col s1 m1"><span class="center">:-</span></div>
								<div class="col s3 m3"><span class="right">-<?php
									echo($a['discount']); ?>  RS</span></div>
							</div>
							<div class="row total">
								<div class="col s2 m2"></div>
								<div class="col s4 m4"><span class="left">Total</div>
								<div class="col s1 m1"><span class="center">:-</span></div>
								<div class="col s3 m3"><span class="right"><?php
									echo($a['price']-$a['discount']); ?>  RS</span></div>
							</div>
							
							<h4 style="font-size: 15px;"> *Standard Delivery: (Free) Generally it can take 3-5 working days.<br><br> *Express Delivery: (Additional Rs. 20) Same day delivery.<br><br></h4>
						
						<h4 style="font-size: 10px; text-align: right;">* : Terms and Coditions apply.</h4>
						</div>
						<br>
						
					</center>
					<br><hr><br>
					<h5 class="center">Description</h5>
					<div class="description">
						
						<?php
									echo($a['description']); ?> 
					</div>
					<script>
					
					$(".description").html($(this).html().replace("<h2>", "<h4>"));​​​​​
					$(".description").html($(this).html().replace("</h2>", "</h4>"));​​​​​
					$(".description").html($(this).html().replace("<h3>", "<h4>"));​​​​​
					$(".description").html($(this).html().replace("</h3>", "</h4>"));​​​​​

					</script>
</div>
<br><hr><br><br>
	<h4 class="center"><u>Recommended For You</u></h4>
	<br>
<div class="products">
		<?php
		
			$list_item = array("0"=>"12","1"=>"41","2"=>"54","3"=>"56","4"=>"58","5"=>"28");
			$cnt = 0;
	while($cnt<3){
	$item = 0;
		if(isset($_COOKIE['item'.$cnt])){
			$item = mysql_real_escape_string($_COOKIE['item'.$cnt]);
		}
		else{
			$item = $list_item[$cnt];
		}
		
		$q = "SELECT * FROM `items` WHERE `index`='".$item."'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
$cnt++;
include("product.php"); 

		}	?>
		</div>
<?php include("dessert.php"); ?>
</div>
<div style="position:fixed; bottom:0; background-color:#FFFFFF; width:100%;">
				<hr>
				
				<div class="row center">
				
				<?php
				if($stock == 1){
				?>
					<div class="col m6 s6"><a class="waves-effect waves-light btn shopping_btn" href="add_to_cart.php?index=<?php echo($id); ?>">add to cart <i class="material-icons white-text">shopping_cart</i></a></div>
					<div class="col m6 s6"><a class="waves-effect waves-light btn shopping_btn" href="buy_now.php?index=<?php echo($id); ?>">buy now <i class="material-icons white-text">shopping_basket</i></a></div>
					
					<?php
				}else{
					?>
					
					<div class="col m6 s6"><div style="font-size:2em; color:red;">Out Of Stock</div></div>
					<div class="col m6 s6"><a class="waves-effect waves-light btn shopping_btn" href="click_to_notify.php?item=<?php echo($id); ?>">Notify Me</a></div>
					<?php
				}
					?>
				</div>
			</div>
<div>


