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

	<h4 class="center"><u>Search Result</u></h4>
	<br>
<div class="products">

<?php
$tag = '';
if(isset($_GET['tag'])){
$tag = mysql_real_escape_string($_GET['tag']);
}
else{
	$tag='kit';
}

$q = "SELECT * FROM `items` WHERE `title` REGEXP '[\\d \\D \\S \\s]*".$tag."[\\d \\D \\S \\s]*' OR `subtitle` REGEXP '[\\d \\D \\S \\s]*".$tag."[\\d \\D \\S \\s]*'";
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