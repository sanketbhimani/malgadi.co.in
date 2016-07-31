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
<th>od_index</th>
<th>odid</th>
<th>item</th>
<th>title</th>
<th>price</th>
<th>fname</th>
<th>branch</th>
<th>sem</th>
<th>mnumber</th>
<th style="width:24%;">address</th>
<th>ccity</th>

<th>email</th>
<th>date</th>
<th>status</th>
<th>change status</th>
<th>delete</th>
</tr>
<?php
include("../connection.php");

$q = "SELECT * FROM `orders` WHERE `status` != 'delivered'";
$r = mysql_query($q);
while($a = mysql_fetch_array($r)){
	?>
	<tr>
	<td><?php echo($a['od_index']); ?></td>
	<td><?php echo($a['odid']); ?></td>
	<td><?php echo($a['item']); ?></td>
	<td><?php
	$q = "SELECT * FROM `items` WHERE `index` = '".$a['item']."'";
					$r1 = mysql_query($q);
					$a1 = mysql_fetch_array($r1);
					echo($a1['title']);
	
	?></td>
	<td><?php echo($a['price']); ?></td>
	<td><?php echo($a['fname']); ?></td>
	<td><?php echo($a['branch']); ?></td>
	<td><?php echo($a['sem']); ?></td>
		<td><?php echo($a['mnumber']); ?></td>
	<td><?php echo($a['address']); ?></td>
	<td><?php echo($a['ccity']); ?></td>

	<td><?php echo($a['email']); ?></td>
	<td><?php echo($a['date']); ?></td>
	<td><?php echo($a['status']); ?></td>
	<td><?php if($a['status']!="delivered"){ ?><a href="change_status.php?od_index=<?php echo($a['od_index']); ?>">change</a><br><a href="change_status_all.php?odid=<?php echo(trim($a['odid'],'#')); ?>">change_all</a> <?php } ?></td>
	<td><a href="delete_order.php?od_index=<?php echo($a['od_index']); ?>">delete</a></td>
	</tr>
	<?php
}

?>
</table>
<a href="home.php">home</a> <a href="logout.php">logout</a>
</body>
</html>