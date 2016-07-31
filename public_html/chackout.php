<?php
ob_start();
session_start();
$_SESSION['purchase_done'] = 0;
$_SESSION['odid'] = null;

?>

<?php


	if(!isset($_SESSION['no_of_items'])){
		if(isset($_SERVER['HTTP_REFERER'])){
	header("location:".$_SERVER['HTTP_REFERER']);
	//die();
}else{
	header("location:index.php");
	//die();
}
	}else{
		if($_SESSION['no_of_items']==0){
			
		header("location:something_went_wrong.php");
					//die();
		}
	}
	
	
	?>
	
	<!DOCTYPE html>
<html>
<head>
<title>malgadi.co.in</title>
<!-- for-mobile-apps -->
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
<link href="css/animate.min.css" rel="stylesheet"> 

<!-- //animation-effect -->
</head>
	
<body>
<script>
<?php
if(isset($_GET['msg'])){
	echo('alert("Invalid refer code. try again!")');
}
?>
</script>
<!-- header -->
	
	<?php
include("starter.php"); ?>	
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated slideInLeft">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Products</li>
			</ol>
		</div>
	</div>
<div class="products">
		<div class="container">
		
		<div class="alert alert-success" role="alert">
					<strong>Well done!</strong> You have successfully selected product(s), now fill up following details to complete your order, Thank you! :)
				</div>
		
		<form action="buynow.php" method="post" onsubmit=" return chack()">
		<table class="timetable_sub" style="width:90%">
			<tr>
				<td style="border: 0px; text-align:left; width:21%; overflow:show;">Full name: </td>
				<td style="border: 0px; "><input  id="fname" name="fname" type="text" class="form-control" placeholder="Your full name with surname" aria-describedby="basic-addon1" value="<?php if(isset($_COOKIE['fname'])) echo($_COOKIE['fname']); ?>"></td>
			
				<td style="border: 0px; text-align:left;">Branch </td>
				<td style="border: 0px;"><input id="branch" type="text"  maxlength="4" name="branch" class="form-control" placeholder="Other/CE/CH/CL/EC/IT/MH" aria-describedby="basic-addon1" value="<?php if(isset($_COOKIE['branch'])) echo($_COOKIE['branch']); ?>"></td>
			</tr>
			<tr>
				<td style="border: 0px; text-align:left;">Sem: </td>
				<td style="border: 0px;"><input id="sem" type="text" maxlength="5" name="sem" class="form-control" placeholder="None/1/2/3/4/5/6/7/8" aria-describedby="basic-addon1" value="<?php if(isset($_COOKIE['sem'])) echo($_COOKIE['sem']); ?>"></td>
			
				<td style="border: 0px; text-align:left;">Mobile number: </td>
				<td style="border: 0px;"><input id="mnumber" name="mnumber" type="text" maxlength="10" class="form-control" placeholder="Verify Twice" aria-describedby="basic-addon1" value="<?php if(isset($_COOKIE['mnumber'])) echo($_COOKIE['mnumber']); ?>"></td>
			
			</tr>
							<tr>
							<td style="border: 0px; text-align:left;">Address: </td>
				<td style="border: 0px;"><input id="address" type="text" class="form-control" name="address1" placeholder="Your Address" aria-describedby="basic-addon1" value="<?php if(isset($_COOKIE['address1'])) echo($_COOKIE['address1']); ?>"></td>
				<td style="border: 0px; text-align:left;"></td>
				<tr><td style="border: 0px; text-align:left;"></td>
				<td style="border: 0px;"><input type="text" name="address2" class="form-control" placeholder="Street Name" aria-describedby="basic-addon1" value="<?php if(isset($_COOKIE['address2'])) echo($_COOKIE['address2']); ?>"></td>
				<td style="border: 0px; text-align:left;">City</td>
				<td style="border: 0px;"><input id="city" type="text" class="form-control" name="ccity" placeholder="City" aria-describedby="basic-addon1" value="<?php if(isset($_COOKIE['ccity'])) echo($_COOKIE['ccity']); ?>"></td>
				
			</tr>
				
			</tr>
							<tr>
				
				
				<td style="border: 0px; text-align:left;">E-mail: </td>
				<td style="border: 0px;"><input id="email" type="email" name="email" class="form-control" placeholder="Verify Twice" aria-describedby="basic-addon1" value="<?php if(isset($_COOKIE['email'])) echo($_COOKIE['email']); ?>"></td>
				
				
			</tr>

		</table>
		<center>
		<!--<br>
		Refer Code: <input  type="text" name="refer_code" id="refer_code" class="form-control" placeholder="Refer Code" aria-describedby="basic-addon1" style="width:15%;">-->
		<br>
		<input type="checkbox" id="termsandconditions" name="termsandconditions">I accept this <a href="terms_and_conditions.php">Terms and Conditions</a><br><br>
		<span class="input-group-btn">
							<input type="submit" class="btn btn-default" value="place order">
							</span>
							
							</center>
		</form>
		
		<script>
		function chack(){
			if(document.getElementById('fname').value==''){
				alert("your name field is empty");
				return false;
			}
			if(document.getElementById('branch').value==''){
				alert("your branch field is empty");
				return false;
			}
			if(document.getElementById('sem').value==''){
				alert("your sem field is empty");
				return false;
			}
			if(document.getElementById('mnumber').value==''){
				alert("your mobile number field is empty");
				return false;
			}
			if(document.getElementById('address').value==''){
				alert("your address field is empty");
				return false;
			}
			if(document.getElementById('city').value==''){
				alert("your city field is empty");
				return false;
			}
			if(document.getElementById('email').value==''){
				alert("your email field is empty");
				return false;
			}
			if(document.getElementById('termsandconditions').checked==false){
				alert("Please accept Terms and Conditions");
				return false;
			}
			

  var x=document.getElementById('mnumber').value;
  if (isNaN(x)) 
  {
    alert("Must input numbers in mobile number");
    return false;
  }

			/*if(document.getElementById('refer_code').value==''){
				if(confirm("Enter Your friend's refer code to get 5% discount...\nDo you want to continue with out refer code")){
					return true;
				}else{
					return false;
				}
			}*/
		}
		</script>
		
		</div>
		</div>
	<?php
	include('dessert.php');
	?>
	<!-- //footer -->

</body>
</html>
<?php
ob_flush();
?>