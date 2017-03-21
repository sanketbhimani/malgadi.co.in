<?php

if($a['item_avil']<=0 || $a['out_of_stock']==1){
?>
<a href="item.php?item=<?php echo($a['index']); ?>">
						<div class="items_container" style="opacity:.5">
							<div class="item row">
								<div class="item_image_container col s5 m5">
									<img src="../product_images/<?php echo($a['index'].'1.jpeg'); ?>" class="item_image">
								</div>
								<div class="col s7 m7">
									<div class="title"><?php echo($a['title']); ?></div>
									<div class="subtitle"><?php echo($a['subtitle']); ?></div>
									<div class="item_price">RS.<?php
									echo($a['price']-$a['discount']); ?> <del style="color:#AAA">RS.<?php echo($a['price']); ?></del></div>
									<div style="color:red;">Out Of Stock</div>
								</div>
							</div>
						</div>
					</a>		
					
					
					<?php 
}
else{
	

					?>
					
					
					<a href="item.php?item=<?php echo($a['index']); ?>">
						<div class="items_container">
							<div class="item row">
								<div class="item_image_container col s5 m5">
									<img src="../product_images/<?php echo($a['index'].'1.jpeg'); ?>" class="item_image">
								</div>
								<div class="col s7 m7">
									<div class="title"><?php echo($a['title']); ?></div>
									<div class="subtitle"><?php echo($a['subtitle']); ?></div>
									<div class="item_price">RS.<?php
									echo($a['price']-$a['discount']); ?> <del style="color:#AAA">RS.<?php echo($a['price']); ?></del></div>
								</div>
							</div>
						</div>
					</a>
					
					
					
			
					
<?php }	?>