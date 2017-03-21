
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
				<li class="active">Login</li>
			</ol>
		</div>
	</div>
<div class="login">
<div class="container">
<h3>Login Form</h3>
<h4><?PHP
            if(isset($_GET['error'])){
               
                    echo $_GET['error'];
                 
            }
        ?></h4>
<p class="est animated wow zoomIn" data-wow-delay=".5s">Login to view your order history and manage orders.</p>
<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
<form action="loginprocess.php" method="post">
					<input type="email" name="email" placeholder="Email Address" required=" " >
					<input type="password" name="password" placeholder="Password" required=" " >
					<div class="forgot">
						<a href="forgotpassword.php">Forgot Password?</a>
					</div>
					<input type="hidden" name="redirectURL" value=<?PHP if(isset($_GET['redirectURL']))
                                            {
                                                echo $_GET['redirectURL'];
                                                
                                            }?>>
					<input type="submit" value="Login">
				</form>
				</div>
				<?php
				if(isset($_GET['redirectURL'])){
					
				   echo "<p class='animated wow slideInUp' data-wow-delay='.5s'><a href='signup.php?redirectURL=".$_GET['redirectURL']."'>Register Here</a></p><br><p class='animated wow slideInUp' data-wow-delay='.5s'><a href='guestprocess.php?redirectURL=".$_GET['redirectURL']."'>Continue as Guest<span class='glyphicon glyphicon-menu-right' aria-hidden='true'></span></a></p>";
                }else{
                   echo "<p class='animated wow slideInUp' data-wow-delay='.5s'><a href='signup.php'>Register Here</a></p><br><p class='animated wow slideInUp' data-wow-delay='.5s'><a href='guestprocess.php'>Continue as Guest<span class='glyphicon glyphicon-menu-right' aria-hidden='true'></span></a></p>";
                }
				
				?>
				
				 
</div>
</div>
<?php

	include('dessert.php');
	?>
</body>
</html>
