<?php
session_start();

if(isset($_POST['uname']) && isset($_POST['pass'])){
	if($_POST['uname']==="admin" && $_POST['pass']==="admin"){
		$_SESSION['you_can_logged_in']=123;
		header("location:home.php");
		die();
	}
}

?>
<html>
<body>
	<form action="bhochu.php" method="post">
	username: <input type="text" name="uname"><br>
	password: <input type="password" name="pass"><br>
	<input type="submit">
	</form>
	


</body>
</html>