<?php
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
	die();
}
?>
<html>
<body>
<center>
<a href="add_product.php">Add Product</a><br>
<a href="view_product.php">View Product</a><br>
<a href="view_order.php">View Order</a><br>
<a href="view_all_order.php?msg=1">View All Order</a><br>
<a href="view_review.php?msg=1">View Review</a><br>
 <a href="logout.php">logout</a>
</center>
</body>
</html>