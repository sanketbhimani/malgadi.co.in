<?php
session_start();
if(isset($_POST['i_dont_know'])){
	if($_POST['i_dont_know']==="SNK.bhimani3"){
		$_SESSION['you_can_login']=123;
	}
}
if(isset($_POST['uname']) && isset($_POST['pass'])){
	if($_POST['uname']==="sagar_sanket_keyur" && $_POST['pass']==="DASWANI_BHIMANI_RAKHOLIYA"){
		$_SESSION['you_can_logged_in']=123;
		header("location:home.php");
	}
}

?>
<html>
<body><?php

if(isset($_SESSION['you_can_login']) && $_SESSION['you_can_login']==123){
	?>
	<form action="ssk_dbr.php" method="post">
	username: <input type="password" name="uname"><br>
	password: <input type="password" name="pass"><br>
	<input type="submit">
	</form>
	
	<?php
}else{
	?>
	<form action="ssk_dbr.php" method="post"><input type="password" name="i_dont_know"><input type="submit"></form>
	
	<?php
}

?></body>
</html>