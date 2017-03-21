<?php
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
}
?>

<html>
<body>
<center>
<h3>Add Product</h3>
<h5 style="color:green;"><?php if(isset($_GET['msg'])) echo($_GET['msg']); ?></h5>
<form action="add_product.php" method="post" enctype="multipart/form-data">
<table>
<tr>
<td>title*</td>
<td><input type="text" name="title"></td>
</tr>
<tr>
<td>subtitle</td>
<td><input type="text" name="subtitle"></td>
</tr>
<tr>
<td>no of item avilable*</td>
<td><input type="text" name="item_avil">enter -999 for infinite</td>
</tr>
<tr>
<td>search tag*</td>
<td><input type="text" name="tags" placeholder="separated by ';'"></td>
</tr>
<tr>
<td>img1*</td>
<td><input type="file" name="img1"></td>
</tr>
<tr>
<td>img2</td>
<td><input type="file" name="img2"></td>
</tr>
<tr>
<td>img3</td>
<td><input type="file" name="img3"></td>
</tr>
<tr>
<td>img4</td>
<td><input type="file" name="img4"></td>
</tr>
<tr>
<td>img5</td>
<td><input type="file" name="img5"></td>
</tr>
<tr>
<td>img6</td>
<td><input type="file" name="img6"></td>
</tr>
<tr>
<td>description*</td>
<td><textarea name="description"></textarea></td>
</tr>
<tr>
<td>department*</td>
<td><input type="text" name="department" placeholder="enter from1 to 4"></td>
</tr>
<tr>
<td>price*</td>
<td><input type="text" name="price" placeholder="enter only numbers"></td>
</tr>
<tr>
<td>discount</td>
<td><input type="text" name="discount" placeholder="enter price difference"></td>
</tr>
<tr>
<td>purchasing price:</td>
<td><input	type="text" name="purchasingprice" value="<?php echo($a['purchasingprice']); ?>"></td>
</tr>
<tr>
<td colspan="2"><center><input type="submit" value="add item"></center></td>
</tr>
</table>
</form>
<a href="home.php">home</a> <a href="logout.php">logout</a>
</center>
</body>
</html>



<?php
if(isset($_POST['title'])){
include("../connection.php");
	$title = mysql_real_escape_string($_POST['title']);
	$subtitle = mysql_real_escape_string($_POST['subtitle']);
	$item_avil = mysql_real_escape_string($_POST['item_avil']);
	$tags = mysql_real_escape_string($_POST['tags']);
	$description = mysql_real_escape_string($_POST['description']);
	$department = mysql_real_escape_string($_POST['department']);
	$price = mysql_real_escape_string($_POST['price']);
	$purchasingprice = mysql_real_escape_string($_POST['purchasingprice']);
	$discount = mysql_real_escape_string($_POST['discount']);
	//print_r($_FILES);
	
	$q = "INSERT INTO `items` (`title`,`subtitle`,`item_avil`,`tags`,`description`,`department`,`price`,`discount`,`purchasing_price`) VALUES ('".$title."','".$subtitle."','".$item_avil."','".$tags."','".$description."','".$department."','".$price."','".$discount."','".$purchasingprice."')";
	mysql_query($q)
	or die(header("location:add_product.php?msg=product nathi nakhan...<br>kaink locha lapsi kari:<br>".mysql_error()));
	$id = mysql_insert_id();
	//echo($id);
	move_uploaded_file($_FILES['img1']['tmp_name'],'../product_images/'.$id.'1.jpeg');
	move_uploaded_file($_FILES['img2']['tmp_name'],'../product_images/'.$id.'2.jpeg');
	move_uploaded_file($_FILES['img3']['tmp_name'],'../product_images/'.$id.'3.jpeg');
	move_uploaded_file($_FILES['img4']['tmp_name'],'../product_images/'.$id.'4.jpeg');
	move_uploaded_file($_FILES['img5']['tmp_name'],'../product_images/'.$id.'5.jpeg');
	move_uploaded_file($_FILES['img6']['tmp_name'],'../product_images/'.$id.'6.jpeg');
	$tag = explode(";",$tags);
	foreach($tag as $i => $key){
		$q = "INSERT INTO `tag` (`tag`, `value`) VALUES ('".$key."', '".$title."')";
		mysql_query($q)
			or die(header("location:add_product.php?msg=product nathi nakhanu...kaink locha lapsi kari:".mysql_error()));
	}
	
	die(header("location:add_product.php?msg=product nakhay gyu"));
}	



?>