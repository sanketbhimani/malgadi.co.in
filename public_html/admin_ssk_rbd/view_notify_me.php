<?php
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
}
?>
<html>
<body>
<a href="home.php">home</a> <a href="logout.php">logout</a>
<table border="1">
<tr>
<th>index</th>
<th>name</th>
<th>email</th>
<th>mobile_no</th>
<th>item</th>
<th>item_name</th>
</tr>
<?php
include("../connection.php");

$q = "SELECT * FROM `click_to_notify`";
$r = mysql_query($q);
while($a = mysql_fetch_array($r)){
	?>
	<tr>
	<td><?php echo($a['index']); ?></td>
	<td><?php echo($a['name']); ?></td>
	<td><?php echo($a['email']); ?></td>
	<td><?php echo($a['mobile_no']); ?></td>
	<td><?php echo($a['item']); ?></td>
	<td><?php
	$q = "SELECT * FROM `items` WHERE `index` = '".$a['item']."'";
					$r1 = mysql_query($q);
					$a1 = mysql_fetch_array($r1);
					echo($a1['title']);
	
	?></td>
		</tr>
	<?php
}

?>
</table>
<a href="home.php">home</a> <a href="logout.php">logout</a>
</body>
</html>