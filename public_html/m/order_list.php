<?php
include("starter.php");

if (!isset($_SESSION['user_email'])) {
    header("Location:chack_order.php");
    die();
} else {
    if ($_SESSION['user_email'] === "guest@malgadi.co.in") {
        header("Location:chack_order.php");
        die();
    }
}
?>

<div class="container" style="margin-top:150px;">

<h3 class="center"><u>Your Past Orders</u></h3>

<br><br>

<?php
						
$connection = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);

$statement = $connection->prepare("select user_id from users where email=?");

if ($statement->execute(array($_SESSION['user_email']))) {
    if ($row = $statement->fetch(PDO::FETCH_OBJ)) {
        $user_id = $row->user_id;
        // echo $user_id;
    }
}



$statement = $connection->prepare("select * from orders where user_id=? order by `od_index` desc ");

if ($statement->execute(array($user_id))) {
    while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
						
						?>

				<h5><?php echo($row->odid); ?></h5>	
				<h6>(<?php echo($row->date); ?>)</h6>
						<?php

				$q = "SELECT * FROM `orders` WHERE `odid`= '".$row->odid."'";
				$r = mysql_query($q)
			or die(mysql_error());
			$a=mysql_fetch_array($r);
			$itemsa = explode(',', $a['items']);
$qtysa = explode(',', $a['qtys']);
$pricesa = explode(',', $a['prices']);
$array_count = count($itemsa)-1;
			?>
						
				<?php
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
		
}

					?>	
					
<?php include("dessert.php"); ?>
	</div>
	</div>
	</body>
	</html>