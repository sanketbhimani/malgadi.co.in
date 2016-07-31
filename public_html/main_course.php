<?php 
$cnt1 = 0;
if(mysql_num_rows($r)==0){
	?>

<center>
	Item not found... :[<br>
	comeback again... :|<br><br><br>
	<div class="container">
				<center><h3><a href="review_us.php">If you couldn't find your required components then suggest us <span style="font-weight:600; color:red;">here</span>, we will arrange that for you :)</a></h3></center>
		</div>
	</center>
	<?php
}
else {
	
	echo("<table style='width:100%; table-layout:fixed;'>");
	while($a = mysql_fetch_array($r)){
		if($cnt1 == 0){
			echo('<tr><td style="width:25%; overflow:hidden;"></td><td style="width:25%; overflow:hidden;"></td><td style="width:25%; overflow:hidden;"></td><td style="width:25%; overflow:hidden;"></td></tr><tr>');
		}
	$cnt1++;
?>
				<td style="width:25%; overflow:hidden;">
					<div class="col-md-4 products-right-grids-bottom-grid" style="width:100% !important;">
						<div class="new-collections-grid1 products-right-grid1 animated slideInUp">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="item.php?item=<?php echo($a['index']); ?>" ><div class="product-image"><img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive"></div></a>
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
												
							<h4><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['title']); ?></a></h4>
							<p><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['subtitle']); ?></a></p>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a></p>
							</div>
						</div>
							</div>
							</td>
							<?php
							if($cnt1 == 4){
								echo("</tr>");
								$cnt1 = 0;
							}
							
}}
?>
				</table>	<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>