<?php
if(!isset($_POST['item'] ) && !isset($_GET['item'])){
	header("location:index.php");
	die();
}

?>


<!DOCTYPE html>
<html>
<head>
<title>malgadi.co.in</title>
<!-- for-mobile-apps -->

	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->

<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->

<!-- animation-effect -->


<!-- //animation-effect -->
</head>
	
<body>
<!-- header -->
<?php
	session_start();
include("starter.php"); ?>	
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">notify me</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- mail -->

	<div class="mail animated wow zoomIn" data-wow-delay=".5s">
			<div class="container">
		<?php

if(isset($_POST['name']) && $_POST['name']!='' && isset($_POST['email']) && $_POST['email']!='' && isset($_POST['mobile_no']) && $_POST['mobile_no']!=''){
		$name = mysql_real_escape_string($_POST['name']);
		$email = mysql_real_escape_string($_POST['email']);
		$mobile_no = mysql_real_escape_string($_POST['mobile_no']);
		$item = mysql_real_escape_string($_POST['item']);
							
	$q = "INSERT INTO `click_to_notify` (`name`, `email`, `mobile_no`, `item`) VALUES('".$name."', '".$email."', '".$mobile_no."', '".$item."')";
	mysql_query($q)
	or die(mysql_error());
	?>
			<div class="alert alert-success" role="alert">
					<strong>Thank You!</strong> We have recived your details...
				</div>

	<?php
	
}else{

?>
			
			<h3>Notify me</h3>
			<p class="est">We will contact you as your needed item will arrive</p>
			<div class="mail-grids">
				<div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<form action="click_to_notify.php" method="post">
						<input type="text" placeholder="Name" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
						<input type="email" placeholder="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
						<input type="text" placeholder="mobile no." name="mobile_no" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mobile no';}" required="">
						<input type="hidden" name="item" value="<?php echo($_GET['item']); ?>">
						<input type="submit" style="margin-top:3%;" value="Submit Now" >
					</form>
				</div>
					</div>
					
					
				
			
				
				
				</div>
</div>

				
<!-- //mail -->
	<?php
}
	include('dessert.php');
	?>
	<!-- //footer -->

</body>
</html>