<?php
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
	die();
}
include("../connection.php");
?>
<html>
<body>
<form action="edit_product.php">
Add product no: <input type="text" name="pid">
<input type="submit" value="edit">
</form>
<?php
if(isset($_GET['pid'])){
	$q = "SELECT * FROM `items` WHERE `index`='".$_GET['pid']."'";
	$r = mysql_query($q)
	or die(mysql_error());
	$a = mysql_fetch_array($r);
	
	?>
	
	<form action="edit_product.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="product_id" value="<?php echo($a['index']); ?>">
title: <input	type="text" name="title" value="<?php echo($a['title']); ?>"><br>
subtitle: <input	type="text" name="subtitle" value="<?php echo($a['subtitle']); ?>"><br>
item_avil: <input	type="text" name="item_avil" value="<?php echo($a['item_avil']); ?>"><br>
tags: <input	type="text" name="tags" value="<?php echo($a['tags']); ?>"><br>
description: <textarea name="description"><?php echo($a['description']); ?></textarea><br>
department: <input	type="text" name="department" value="<?php echo($a['department']); ?>"><br>
price: <input	type="text" name="price" value="<?php echo($a['price']); ?>"><br>
discount: <input	type="text" name="discount" value="<?php echo($a['discount']); ?>"><br>
purchasing price: <input	type="text" name="purchasingprice" value="<?php echo($a['purchasing_price']); ?>"><br>
img1
<input type="file" name="img1"><br>


img2
<input type="file" name="img2"><br>


img3
<input type="file" name="img3"><br>


img4
<input type="file" name="img4"><br>


img5
<input type="file" name="img5"><br>


img6
<input type="file" name="img6"><br>

<input type="submit" value="edit">
	</form>
	
	<?php
}
if(isset($_POST['product_id'])){
	$id = $_POST['product_id'];
	$q2= "select * from 'items' where `index`='".$_POST['product_id']."'";
	$a1=mysql_query($q2);
	
	$title = mysql_real_escape_string($_POST['title']);
	$subtitle = mysql_real_escape_string($_POST['subtitle']);
	$item_avil = mysql_real_escape_string($_POST['item_avil']);
	$tags = mysql_real_escape_string($_POST['tags']);
	$description = mysql_real_escape_string($_POST['description']);
	$department = mysql_real_escape_string($_POST['department']);
	$price = mysql_real_escape_string($_POST['price']);
	$purchasing_price = mysql_real_escape_string($_POST['purchasingprice']);
	$product_id = mysql_real_escape_string($_POST['product_id']);
	$discount = mysql_real_escape_string($_POST['discount']);
	
	//if($a1['purchasing_price']== $purchasing_price && $a1['discount']== $discount && $a1['price']== $price)
	//{
		//$q = "UPDATE `items` SET `title`='".$title."',`subtitle`='".$subtitle."',`item_avil`='".$item_avil."',`tags`='".$tags."',`description`='".$description."',`department`='".$department."',`price`='".$price."', `discount`='".$discount."' , `purchasing_price`='".$purchasing_price."' WHERE `index`='".$product_id."'";
		//mysql_query($q) or die("update error   1".mysql_error());
	//}
	//else
	//{
		$qq = "select * from `newitemslist` where `index`='".$product_id."'";
		$rr = mysql_query($qq);
		if($aa = mysql_fetch_array($rr)){
			$q = "UPDATE `newitemslist` SET `title`='".$title."',`subtitle`='".$subtitle."',`item_avil`='".$item_avil."',`tags`='".$tags."',`description`='".$description."',`department`='".$department."',`price`='".$price."', `discount`='".$discount."' , `purchasing_price`='".$purchasing_price."' WHERE `index`='".$product_id."'";
		mysql_query($q) or die("update error   1".mysql_error());
		}
		else{
			$q = "INSERT INTO `newitemslist` (`index`,`title`,`subtitle`,`item_avil`,`tags`,`description`,`department`,`price`,`discount`,`purchasing_price`) VALUES ('".$product_id."','".$title."','".$subtitle."','".$item_avil."','".$tags."','".$description."','".$department."','".$price."','".$discount."','".$purchasing_price."')";
	//echo($q);
	mysql_query($q) or die("update error   2".mysql_error());
		}
		
	
	
		
	//}
	
	move_uploaded_file($_FILES['img1']['tmp_name'],'../product_images/'.$id.'1.jpeg');
	move_uploaded_file($_FILES['img2']['tmp_name'],'../product_images/'.$id.'2.jpeg');
	move_uploaded_file($_FILES['img3']['tmp_name'],'../product_images/'.$id.'3.jpeg');
	move_uploaded_file($_FILES['img4']['tmp_name'],'../product_images/'.$id.'4.jpeg');
	move_uploaded_file($_FILES['img5']['tmp_name'],'../product_images/'.$id.'5.jpeg');
	move_uploaded_file($_FILES['img6']['tmp_name'],'../product_images/'.$id.'6.jpeg');
	header("location:edit_product.php");
}
?>
<br>
<a href="home.php">home</a> <a href="logout.php">logout</a>
</body>
</html>