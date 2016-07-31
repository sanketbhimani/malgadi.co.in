<?php
	//echo("@@@@@@@@@@@2");
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['pass']) && isset($_POST['email'])){
		//echo("################");
$fname = mysql_real_escape_string($_POST['fname']);
$lname = mysql_real_escape_string($_POST['lname']);
$pass = mysql_real_escape_string($_POST['pass']);
$email = mysql_real_escape_string($_POST['email']);

	$random_string="";
		for($i=0;$i<3;$i++)
		{
			$random_string .= chr(rand(65,90));
		}
	$refer_code = '#'.date("s").$random_string;

	include("../connection.php");
	$q = "SELECT * FROM `earn_money` WHERE `email` = '".$email."'";
	$r = mysql_query($q);
	$number = mysql_num_rows($r);
	if($number != 0){
		header("location:register.php?msg=This email id is already in use.\n try forget password");
		die();
	}
	session_start();
	$q = "INSERT INTO `earn_money` (`refer_code`, `fname`, `lname`, `pass`, `email`) VALUES ('".$refer_code."', '".$fname."', '".$lname."', '".$pass."', '".$email."')";
	//echo("####".$q);
	mysql_query($q)
	or die(mysql_error());
	$q = "SELECT * FROM `earn_money` WHERE `refer_code`= '".$refer_code."' AND `email`= '".$email."'";
	$r = mysql_query($q)
	or die(mysql_error());
	$a = mysql_fetch_array($r);
	$_SESSION['id'] = $a['index'];
	header("Location:home.php");
	die();
}


?>
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
<?php
if(isset($_GET['msg'])){
	echo("<script>");
	echo("alert('".$_GET['msg']."');");
	echo("</script>");
}

?>
	<div class="header">
		<div class="container">
			<div class="header-grid">
				<div class="header-grid-left animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
					<ul>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+34 <span>567</span> 892</li>
						<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login.php">Login</a></li>
						<li class="active"><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register.php">Register</a></li>
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
				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h3 class="animated wow zoomIn animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Register Here</h3>
			<p class="est animated wow zoomIn animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">register your self to start earning</p>
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
			<div class="register-home animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->
<!-- footer -->
	
	<?php
	include('../dessert.php');
	?>
<!-- //footer -->

</body></html>