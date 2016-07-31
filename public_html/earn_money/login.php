		
	<?php
	if(isset($_POST['email']) && isset($_POST['pass'])){
			$email = mysql_real_escape_string($_POST['email']);
				$pass = mysql_real_escape_string($_POST['pass']);
		include("../connection.php");
		$q = "SELECT * FROM `earn_money` WHERE `email`='".$email."'";
		$r = mysql_query($q)
		or die(mysql_error());
		$a = mysql_fetch_array($r);
			if($a['pass'] == $pass){
				session_start();
				$_SESSION['id'] = $a['index'];
				header("location:home.php");
			}
		

		}
	
	
	?>


<html class="gr__localhost"><head>
<title>Earn money - malgadi.co.in</title>
<!-- for-mobile-apps -->

<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
	
<!-- cart -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->

<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 

<!-- //animation-effect -->
</head>
	
<body data-gr-c-s-loaded="true">
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="header-grid">
				<div class="header-grid-left animated wow slideInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
					<ul>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 <span>567</span> 892</li>
						<li class="active"><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login.php">Login</a></li>
						<li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register.php">Register</a></li>
					</ul>
				</div>
				
				<div class="clearfix"> </div>
			</div>
			<div class="logo-nav">
				
   <div  style="width:18%;float:left; margin-top:-3%;"><a href="../index.php"><img src="../images/logo.png" width="100%" ></a></div>
					<center><h1>	Earn Money</h1></center>
				
				
			</div>
		</div>
	</div>
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Login Form</h3>
			
			<div class="login-form-grids animated wow slideInUp animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
				<form method="post" action="login.php">
					<input type="email" name="email" placeholder="Email Address" required=" ">
					<input type="password" name="pass" placeholder="Password" required=" ">
					<div class="forgot">
						<a>Forgot Password?</a>
					</div>
					<input type="submit" value="Login">
				</form>
			</div>
			<h4 class="animated wow slideInUp animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">For New People</h4>
			<p class="animated wow slideInUp animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;"><a href="register.php">Register Here</a> (Or) go back to <a href="index.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>

<!-- //register -->
<!-- footer -->
	<?php include("../dessert.php"); ?>
	
<!-- //footer -->

</body></html>