<?php
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
}
?>

<?php
include("../connection.php");


?>
<html>
<body>
<center>
<h3>View Product</h3>
<h5 style="color:green;"><?php if(isset($_GET['msg'])) echo($_GET['msg']); ?></h5>
<a href="home.php">home</a> <a href="logout.php">logout</a>
<table border="1">
<tr>
<th>index</th>
<th>title</th>
<th>subtitle</th>
<th>+</th>
<th>no of item avilable</th>
<th>-</th>
<th>search tag</th>
<th>description</th>
<th>department</th>
<th>price</th>
<th>discount</th>
<th>delete</th>
</tr>
<?php
$q = "SELECT * FROM `items` WHERE 1";
$r = mysql_query($q);
while($a = mysql_fetch_array($r)){
	echo("
				<tr>
					<td>".$a['index']."</td>
					<td>".$a['title']."</td>
					<td>".$a['subtitle']."</td>
					<td><form action='ochha_item.php'><input type='hidden' name='index' value='".$a['index']."'><input type='submit' value='-'></form></td>
					<td>".$a['item_avil']."</td>
					<td><form action='vatta_item.php'><input type='hidden' name='index' value='".$a['index']."'><input type='submit' value='+'></form></td>
					<td>".$a['tags']."</td>
					<td><a href='description.php?index=".$a['index']."'>description</a></td>
					<td>".$a['department']."</td>
					<td>".$a['price']."</td>
					<td>".$a['discount']."</td>
					<td><form action='delete_item.php'><input type='hidden' name='index' value='".$a['index']."'><input type='submit' value='delete'></form></td>
				</tr>
	");
}


?>
</table>
<a href="home.php">home</a> <a href="logout.php">logout</a>
</center>
</html>