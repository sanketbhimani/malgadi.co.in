
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
				<li class="active">Review Us</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- mail -->

	<div class="mail animated wow zoomIn" data-wow-delay=".5s">


				<?php
				$q = "SELECT COUNT(*) FROM `reviews` WHERE  `enable` = '1'";
				$r = mysql_query($q);
				$a = mysql_fetch_array($r);
				
				if($a['COUNT(*)'] != '0'){
				?>
				<div class="container" >
		
					<center><h1 style="font-size:4em;" data-wow-duration="1000ms" data-wow-delay="500ms">Reviews</h1></center>
					<br>
					<?php
					$q = "SELECT * FROM `reviews` WHERE `enable` = '1'";
					$r = mysql_query($q);
					while($a=mysql_fetch_array($r)){
						echo("<div><h4 style='font-size:1.5em;'>".$a['name']."</h4><br>\n");
						?>
						<p class="animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
					<?php	echo($a['message']); ?>
						</p>
						
						<?php
						echo('</div><hr><br>');
					}
					

					?>
					
				</div>
				
			<?php
			
				} 
				?>
				
						<div class="container">
		<?php

if(isset($_POST['name']) && $_POST['name']!='' && isset($_POST['email']) && $_POST['email']!='' && isset($_POST['mobile_no']) && $_POST['mobile_no']!='' && isset($_POST['subject']) && $_POST['subject']!='' && isset($_POST['message']) && $_POST['message']!=''){
		$name = mysql_real_escape_string($_POST['name']);
		$email = mysql_real_escape_string($_POST['email']);
		$mobile_no = mysql_real_escape_string($_POST['mobile_no']);
		$subject = mysql_real_escape_string($_POST['subject']);
		$message = mysql_real_escape_string($_POST['message']);
	
		//$name = preg_replace("/[;`'><$%/,]/", "", $name);
		//$email = preg_replace("/[;`'><$%/,]/", "", $email);
	//	$mobile_no = preg_replace("/[;`'><$%/,]/", "", $mobile_no);
	//	$subject = preg_replace("/[;`'><$%/,]/", "", $subject);
	//	$message = preg_replace("/[;`'><$%/,]/", "", $message);
						
	$q = "INSERT INTO `reviews` (`name`, `email`, `mobile_no`, `subject`, `message`) VALUES('".$name."', '".$email."', '".$mobile_no."', '".$subject."', '".$message."')";
	mysql_query($q)
	or die(mysql_error());
	 include('sms/way2sms-api.php');
	sendWay2SMS ( "9409506643","123456","7069936320","rvw,".$subject.",".$name.",".$mobile_no." ");   
	?>
			<div class="alert alert-success" role="alert">
					<strong>Thank You!</strong> You successfully submited a review.
				</div>
	<?php
	
}else{

?>
			<h3>Review Us</h3>
			<p class="est">Your review is our opportunity to learn, We are eager to read your valuable review! :)</p>
			<div class="mail-grids">
				<div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<form action="review_us.php" method="post">
						<input type="text" placeholder="Name" name="name" required="">
						<input type="email" placeholder="Email" name="email" required="">
						<input type="text" placeholder="mobile no." name="mobile_no" required="">
						<input type="text" placeholder="Subject" style="margin:1em 0;" name="subject" required="">
						<textarea type="text"   name="message" placeholder="Message..." required=""></textarea>
						<input type="submit" value="Submit Now" >
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