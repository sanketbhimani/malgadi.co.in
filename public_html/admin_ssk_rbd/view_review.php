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
<th>mobile no</th>
<th>subject</th>
<th>message</th>
<th>enable</th>
</tr>
<?php
include("../connection.php");

$q = "SELECT * FROM `reviews`";
$r = mysql_query($q);
while($a = mysql_fetch_array($r)){
	?>
	<tr>
	<td><?php echo($a['index']); ?></td>
	<td><?php echo($a['name']); ?></td>
	<td><?php echo($a['email']); ?></td>
	<td><?php echo($a['mobile_no']); ?></td>
	<td><?php echo($a['subject']); ?></td>
	<td><?php echo($a['message']); ?></td>
	<td><?php
	if($a['enable']=='1'){
		
		?> <a href="disable_review.php?review=<?php echo($a['index']); ?>">disable</a> <?php
		
		}else{
			?><a href="enable_review.php?review=<?php echo($a['index']); ?>">enable</a><?php
			
			} ?></td>
	</tr>
	<?php
}

?>
</table>
<a href="home.php">home</a> <a href="logout.php">logout</a>
</body>
</html>