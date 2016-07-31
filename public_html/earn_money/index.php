<html><head>
<title>Earn money - malgadi.co.in</title>
<!-- for-mobile-apps -->

<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->

<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->

<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 

<!-- //animation-effect -->
</head>
	
<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="header-grid">
				<div class="header-grid-left animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
					<ul>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 <span>567</span> 892</li>
						<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login.php">Login</a></li>
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
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->


			
		<div class="register">
		<div class="container">
			<h3 class="animated wow zoomIn animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;" style="font-size:em;">Welcome, Nice To See You Here</h3>
			<p class="est animated wow zoomIn animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Here you can make great earning by suggesting this site to your friends.<br>And your friends will also get great discounts...!<br>So, start sharring!</p>
			<h3 style="font-size:1.5em;">Just creat simple account to start earning...</h3>
			
			<div class="login-form-grids">
				<h5 class="animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">profile information</h5>
							
				<script>
		function chack(){
			if(document.getElementById('fname').value==''){
				alert("your name field is empty");
				return false;
			}
			if(document.getElementById('lname').value==''){
				alert("your branch field is empty");
				return false;
			}
			if(document.getElementById('email').value==''){
				alert("your sem field is empty");
				return false;
			}
			if(document.getElementById('pass').value==''){
				alert("your mobile number field is empty");
				return false;
			}
			if(document.getElementById('cpass').value==''){
				alert("your address field is empty");
				return false;
			}
			if(document.getElementById('termsandconditions').checked==false){
				alert("Please accept Terms and Conditions");
				return false;
			}
			if(document.getElementById('cpass').value != document.getElementById('pass').value){
				alert("Password and conform password is not matched");
				return false;
			}
		}
		</script>
				
				
				<form class="animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;"  action="register.php" method="post" onsubmit="return chack()">
					<input type="text" id="fname" name="fname" placeholder="First Name..." required=" ">
					<input type="text" id="lname" name="lname" placeholder="Last Name..." required=" ">
					<input type="email" id="email" name="email" placeholder="Email Address" required=" ">
					<input type="password" id="pass" name="pass" placeholder="Password" required=" ">
					<input type="password" id="cpass" name="cpass" placeholder="Password Confirmation" required=" "><br>
					<input type="checkbox" id="termsandconditions" name="termsandconditions">I accept this <a href="terms_and_conditions.php">Terms and Conditions</a>
					<input type="submit" value="Register">
				</form>
			</div>
			
		</div>
	</div><!-- //register -->
<!-- footer -->
	<?php include("../dessert.php"); ?>
<!-- //footer -->

</body></html>