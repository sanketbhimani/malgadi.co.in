<?php

include("starter.php"); ?>




<div class="container" style="margin-top:120px; padding-bottom:120px;">
				<center>
					<h4>Your Cart</h4>
				</center>
				<br><hr><br>
				
											<?php
if(isset($_SESSION['no_of_items']) && ((!isset($_SESSION['no_item_deleted'])) || (isset($_SESSION['no_item_deleted']) &&  ($_SESSION['no_of_items']-$_SESSION['no_item_deleted'])!=0) )){
	?>
	<div class="products">
					<div class="items_container">
						
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
	
	<div class="cart_item item row" style="height:auto; border-width:0px 0px 0px 0px;">
								<a href="delete_item_in_cart.php?item=<?php echo($i); ?>" ><div style="position:absolute;"><img src="img/close.png"></div></a>
								<a href="item.php?item=<?php echo($a['index']); ?>">
								<div class="title center" style="height: auto; padding-left:30px; padding-right:30px;"><?php echo($a['title']); ?> </div>
								<div class="subtitle center" style="height: auto;"><?php echo($a['subtitle']); ?></div>
								<div class="item_image_container col s5 m5 row">
									<img src="../product_images/<?php echo($a['index']); ?>1.jpeg" class="item_image" style="">
								</div>
								</a>
								<div class="col s7 m7">
									<div class="item_price">RS. <?php echo(($a['price']-$a['discount'])); ?>&nbsp;&nbsp;&nbsp;<del style="color:#AAA">RS.<?php echo($a['price']); ?></del></div>
									<hr>
									<div class="qty row" style="margin-top:15px;">
										<div class="col m1"><img src="img/minus.png"  onclick="location.href='decrese.php?id=<?php echo($i); ?>';"></div>
										<div class="col m1"><?php echo($_SESSION['qty'.$i]); ?></div>
										<div class="col m1"><img src="img/plus.png" onclick="location.href='increse.php?id=<?php echo($i); ?>';"></div>
										
										<div class="col m1">X&nbsp;&nbsp;&nbsp;RS.<?php echo(($a['price']-$a['discount'])); ?></div>
										<div class="col m1" style="font-size:1.5em; margin-top:30px;">Total = RS.<?php echo($_SESSION['qty'.$i]*($a['price']-$a['discount'])); ?></div>
									</div>
								</div>
								
							</div>
							
							<hr>
	
	
			<?php
		}
	}
	
	?>
						</div>
						</div>
	<?php
	
	}else{?>
<div>
		Your cart is empty keep shopping
	</div>
	<?php
	}
?>	




<br><br><br>

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
				<div class="center">Total <?php if(isset($_SESSION['no_of_items'])){
		if(isset($_SESSION['no_item_deleted'])){
			echo($_SESSION['no_of_items']-$_SESSION['no_item_deleted']);
		}else{
			echo($_SESSION['no_of_items']);
			}
		}else{
			echo('0');
		}

?> item(s)</div>
				<div class="row">
					<div class="col m7 s7" style="font-size:2em;">Total: <?php include("total_price_in_cart.php"); ?>&#8377;</div>
					
					
					
						
					
					
					<div class="col m3 s3"><?php 
		if(isset($total)){
			if($total >= 50){
				if(isset($_SESSION['user_email'])){
				if($_SESSION['user_email'] === "guest@malgadi.co.in"){
                                        echo "<a href=\"login.php?redirectURL=chackout.php\" class='waves-effect waves-light btn'>checkout</a>";
                                    }else{
                                        echo "<a href=\"chackout.php\" class='waves-effect waves-light btn'>checkout</a>";
                                    }
                                }else{
                                    echo "<a href=\"login.php?redirectURL=chackout.php\" class='waves-effect waves-light btn'>checkout</a>";
                                }
			}
			else{
				?>
				<script>
	sweetAlert("Oops...", "Your minimum purchase amount should be 50 INR.", "error");
	</script>
				<a href="#">	<div>Please Order atleast 50 &#8377;</div>		</a>
				<?php
			}
		}else{
			?>
			<script>
	sweetAlert("Oops...", "Your minimum purchase amount should be 50 INR.", "error");
	</script>
			<a href="#">	<div>Please Order atleast 50 &#8377;</div>		</a>
			<?php
	
		}
		?>
		
		</div>
				</div>
			</div>
</div>






			
			
		
</body>
</html>