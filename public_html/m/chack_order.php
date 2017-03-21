<?php

include("starter.php"); ?>


<div class="container" style="margin-top:150px;">

<h3 class="center"><u>Your Past Orders</u></h3>




	
		<?php
		if(isset($_GET['odid'])){
			$odid =  mysql_real_escape_string($_GET['odid']);
			$q = "SELECT * FROM `orders` WHERE `odid`= '".$odid."'";
			//echo($q);
			$r = mysql_query($q)
			or die(mysql_error());
			if(mysql_num_rows($r)==0){
				?>
				<div style="color:red;">
					Incorrect <strong>Order ID</strong>, Try again with valid Order Id
				</div>
				<?php
			}
			else{
				
				
				$q = "SELECT * FROM `orders` WHERE `odid`= '".$odid."'";
				$r = mysql_query($q)
			or die(mysql_error());
			$a=mysql_fetch_array($r);
			$itemsa = explode(',', $a['items']);
$qtysa = explode(',', $a['qtys']);
$pricesa = explode(',', $a['prices']);
$array_count = count($itemsa)-1;

$cnt=0;
					$total = 0;
					while($array_count>=0){
						$cnt++;
						$q = "SELECT * FROM `items` WHERE `index` = '".$itemsa[$array_count]."'";
						$rr = mysql_query($q)
						or die("dgkj".mysql_error());
						$aa = mysql_fetch_array($rr);
			?>	
				
				<div class="cart_item item row" style="height:auto; border-width:0px 0px 0px 0px;">
								
								<a href="item.php?item=<?php echo($aa['index']); ?>">
								<div class="title center" style="height: auto; padding-left:30px; padding-right:30px;"><?php echo($aa['title']); ?> </div>
								<div class="subtitle center" style="height: auto;"><?php echo($aa['subtitle']); ?></div>
								<div class="item_image_container col s5 m5 row">
									<img src="../product_images/<?php echo($aa['index']); ?>1.jpeg" class="item_image" style="">
								</div>
								<div class="col s7 m7">
									<div class="item_price"><?php echo($pricesa[$array_count]); ?> &#8377;</div>
									<hr>
									<div class="qty row" style="margin-top:15px;">
										<div class="col m1"><?php echo($qtysa[$array_count]); ?></div>
										<div class="col m1">X&nbsp;&nbsp;&nbsp;<?php echo($pricesa[$array_count]); ?>&#8377;</div>
										<div class="col m1" style="font-size:1.5em; margin-top:30px;">Total =<?php $total = $total + (int)($pricesa[$array_count]*$qtysa[$array_count]); 
						echo($pricesa[$array_count]*$qtysa[$array_count]); ?>&#8377;</div>
									</div>
									<div style="color:red;"><?php echo($a['status']); ?></div>
								</div>
								</a>
							</div>
							
							<hr>
				
				
				<?php
				$array_count--;
					}
				
			}
			
			
		}else{
				?>
<blockquote><p class="flow-text">Please enter your <strong>Order ID</strong> to view your order status.</p></blockquote>
<form action="chack_order.php" method="get">
				<div class="row">
				<div class="input-field col s12">
					<input  type="text" name="odid" id="odid" class="validate">
					<label for="odid">Order ID number including #</label>
				</div>
				</div>
				
				<div class="input-field"> <input type="submit" style="display:list-item;" class="waves-effect waves-light btn col s12" value="submit"> </div>
				</form>
		<?php } ?>
		
<?php include("dessert.php"); ?>
	</div>
	</div>
	</body>
	</html>