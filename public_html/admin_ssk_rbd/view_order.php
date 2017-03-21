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
<th>date</th>
<th>item</th>
<th style="width:900px;">item title</th>
<th>qty</th>
<th style="width:300px;">price</th>
<th>profit</th>
<th>fname</th>
<th>branch</th>
<th>sem</th>
<th>mnumber</th>
<th>address</th>
<th>ccity</th>

<th>email</th>


<th>payment</th>

<th>status</th>

<th>change status</th>
<th>delete order</th>
</tr>
<?php
include("../connection.php");
$total_profit = 0;
$q = "SELECT * FROM `orders` WHERE `status` != 'delivered'";
$r = mysql_query($q);
while($a = mysql_fetch_array($r)){
	$itemsa = explode(',', $a['items']);
$qtysa = explode(',', $a['qtys']);
$pricesa = explode(',', $a['prices']);
$array_count = count($itemsa)-1;
	//while($array_count>=0){
	//$q = "SELECT * FROM `items` WHERE `index` = '".$itemsa[$array_count]."'";
		//			$r1 = mysql_query($q);
			//		$a1 = mysql_fetch_array($r1);
	?>
	<tr>
	<td><?php echo($a['od_index']); ?></td>
	<td><?php echo($a['odid']); ?></td>
	<td><?php echo($a['date']); ?></td>
	<td><?php echo($a['items']); ?></td>
	<td><?php
while($array_count>=0){
	$q = "SELECT * FROM `items` WHERE `index` = '".$itemsa[$array_count]."'";
					$r1 = mysql_query($q);
					$a1 = mysql_fetch_array($r1);
echo($a1['title'].' ('.$qtysa[$array_count].")<br><br>");
$array_count--;
}
	$array_count = count($itemsa)-1;
	?></td>
	<td><?php 
	while($array_count>=0){
	echo($qtysa[$array_count]."<br><br>");
$array_count--;
}
	$array_count = count($itemsa)-1;
	
	  ?></td>
			<td>
			<?php 
			$t=0;
	while($array_count>=0){
		$t=$t+$pricesa[$array_count]*$qtysa[$array_count];
	echo($pricesa[$array_count]."x".$qtysa[$array_count]."=".$pricesa[$array_count]*$qtysa[$array_count]."<br><br>");
$array_count--;
}
echo('delivery_charges: '.$a['delivery_charges']."<br>");
$t=$t+$a['delivery_charges'];
echo("total: ".$t);
	$array_count = count($itemsa)-1;
	
	  ?>
			
		</td>
			<td><?php 
	$a_count = count($itemsa)-1;
	while($a_count>=0){
	$q = "SELECT * FROM `items` WHERE `index` = '".$itemsa[$a_count]."'";
					$r1 = mysql_query($q);
					$a1 = mysql_fetch_array($r1);
echo($pricesa[$a_count]."x".$qtysa[$a_count]."-".$a1['purchasing_price']."x".$qtysa[$a_count]."=");
echo(($pricesa[$a_count]*$qtysa[$a_count])-($a1['purchasing_price']*$qtysa[$a_count])."<br><br>");
$total_profit += ($pricesa[$a_count]*$qtysa[$a_count])-($a1['purchasing_price']*$qtysa[$a_count]);
$a_count--;
}
	
	
	?></td>

	<td><?php echo($a['fname']); ?></td>
	<td><?php echo($a['branch']); ?></td>
	<td><?php echo($a['sem']); ?></td>
	<td><?php echo($a['mnumber']); ?></td>
	<td><?php echo($a['address']); ?></td>
	<td><?php echo($a['ccity']); ?></td>
	
	<td><?php echo($a['email']); ?></td>
	

	<td><?php echo($a['payment']); ?></td>

	<td><?php echo($a['status']); ?></td>
	
	<td><?php if($a['status']!="delivered"){ ?><a href="change_status.php?od_index=<?php echo($a['od_index']); ?>&flg=1">dispattched</a>
	<a href="change_status.php?od_index=<?php echo($a['od_index']); ?>&flg=2">delivered</a><?php } ?></td>
	<td><a href="delete_order.php?od_index=<?php echo($a['od_index']); ?>">delete</a></td>

	</tr>
	<?php
	$array_count--;
	}

?>
</table>
<?php echo("Total profit: ".$total_profit); ?><br>
<a href="home.php">home</a> <a href="logout.php">logout</a>
</body>
</html>