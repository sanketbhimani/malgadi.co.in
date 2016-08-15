<?php
if(isset($_GET['review'])){
	include('../connection.php');
	$q = "UPDATE `reviews` SET `enable` = '1' WHERE `index` = '".$_GET['review']."'";
	mysql_query($q)
	or die(mysql_error());
	header("location:view_review.php");
}



?>