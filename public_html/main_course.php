<?php 
$cnt1 = 0;
if(mysql_num_rows($r)==0){
	?>

<center>
	Item not found... :[<br>
	comeback again... :|<br><br><br>
	<div class="container"  style="width:100%;">
				<center><h3><a href="review_us.php">If you couldn't find your required components then suggest us <span style="font-weight:600; color:red;">here</span>, we will arrange that for you :)</a></h3></center>
		</div>
	</center>
	
	<?php
}
else {
//echo('<div class="row">');
	
	
	//echo("<table style='width:100%; table-layout:fixed;'>");
	while($a = mysql_fetch_array($r)){
		if($cnt1 == 0){
			echo('<div class="row">');
		}
		
	$cnt1++;
?>
			
					<div class="col-md-3	 products-right-grids-bottom-grid" style="margin-down:6px;">
							<div class="new-collections-grid1 products-right-grid1 animated slideInUp" style="overflow:hidden;  margin-bottom:6px;">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="item.php?item=<?php echo($a['index']); ?>" ><div class="product-image" style="min-height:180px; max-height:180px;"><?php
								if($a['item_avil']<=0 || $a['out_of_stock']==1){
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
								if($a['item_avil']<=0 ||  $a['out_of_stock']==1){
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
							if($cnt1 == 4){
								echo("</div>");
								$cnt1 = 0;
								
							}
							
							
							
}
if($cnt1 != 0){
	echo("</div>");
}
echo('</div>');

}
?>
		