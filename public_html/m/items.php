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
?>
<div class="container" style="margin-top:150px;">

	<h4 class="center"><u><?php echo($_GET['name']); ?></u></h4>
	<br>
<div class="products">

<?php
$id = mysql_real_escape_string($_GET['id']);

$q = "SELECT * FROM `items` WHERE `department`='".$id."' AND `item_avil`>0 AND `out_of_stock`=0 ORDER BY `index` DESC";
$r = mysql_query($q);
while($a = mysql_fetch_array($r)){
include("product.php"); 

}

$q = "SELECT * FROM `items` WHERE `department`='".$id."' AND `item_avil`<=0 OR `out_of_stock`=1 ORDER BY `index` DESC";
$r = mysql_query($q);
while($a = mysql_fetch_array($r)){
include("product.php"); 

}

?>

</div>


	<?php include("dessert.php"); ?>
	</div>
	</div>
	</body>
	</html>