
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
<script>
            
            function validate(){
                if(validateFname() == false){
                    return false;
                }else if(validateLname() == false){
                    return false;
                }else if(validateEmail() == false){
                    return false;
                }else if(validatePassword() == false){
                    return false;
                }else if(validateNumber() == false){
                    return false;
                }else if(validateCPassword() == false){
                    return false;    
                }else{
                    return true;
                }
            }
            function validateFname(){
                var fname=document.getElementById('fname').value;
                if(fname == ''){
                    document.getElementById('fnameError').innerHTML="Please enter first name";
                    return false;
                }else{
                    document.getElementById('fnameError').innerHTML="";
                    return true;
                }
            }
            
            function validateLname(){
                var lname=document.getElementById('lname').value;
                if(lname == ''){
                    document.getElementById('lnameError').innerHTML="Please enter last name";
                    return false;
                }else{
                    document.getElementById('lnameError').innerHTML="";
                    return true;
                }
            }
            
           function validateEmail(){
              var e=document.getElementById('email').value;
              var r=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
              if(e == ''){
                  document.getElementById('emailError').innerHTML="Please enter valid email id";
                  return false;
              }else if(!r.test(e)){
                  document.getElementById('emailError').innerHTML="Please enter valid email id";
                  return false;
              }else{
                  document.getElementById('emailError').innerHTML="";
                  return true;
              }
           }
           
           function validatePassword(){
               var pass=document.getElementById('password').value;
               if(pass == ''){
                   document.getElementById('passwordError').innerHTML="Password should be at least 8 characters long";
                   return false;
               }else if(pass.length < 8){
                   document.getElementById('passwordError').innerHTML="Password should be at least 8 characters long";
                   return false;
               }else{
                   document.getElementById('passwordError').innerHTML="";
                   return true;
               }
           }
           
           function validateNumber(){
               var no=document.getElementById('mob_no').value;
               if(isNaN(no)){
                   document.getElementById('phoneError').innerHTML="Please enter 10 digit mobile number";
                   return false;
               }else if(no.length != 10){
                   document.getElementById('phoneError').innerHTML="Please enter 10 digit mobile number";
                   return false;
               }else{
                   document.getElementById('phoneError').innerHTML="";
                   return true;
               }
           }
           
           function validateCPassword(){
               var cpassword=document.getElementById('cpassword').value;
               var password=document.getElementById('password').value;
               if(cpassword == ''){
                   document.getElementById('cpasswordError').innerHTML="Password didn't match";
                   return false;
               }else if(cpassword != password){
                   document.getElementById('cpasswordError').innerHTML="Password didn't match";
                   return false;
               }else{
                   document.getElementById('cpasswordError').innerHTML="";
                   return true;
               }
           }
        </script>

<!-- //animation-effect -->
</head>
	
<body>
<!-- header -->
<?php
	
include("starter.php"); ?>	
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register</li>
			</ol>
		</div>
	</div>
<div class="register">
<div class="container">
<h3>Register Here</h3>
<h4><?PHP
            if(isset($_GET['error'])){
               
                    echo $_GET['error'];
                 
            }
        ?></h4>
		<style>
		input{
			margin: 1em 0 0;
		}
		</style>
<p class="est animated wow zoomIn" data-wow-delay=".5s">Register to view your order history and manage orders.</p>
<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
<form name="signupform" onsubmit="return validate()" action="signupprocess.php" method="post">
					<input type="text" name="fname" placeholder="First name" required=" " id="fname" onkeyup="validateFname()"><span id="fnameError"></span>
					<input type="text" name="lname" placeholder="Last name" required=" " id="lname" onkeyup="validateLname()"><span id="lnameError"></span>
					<input type="email" name="email" placeholder="Email id" required=" " id="email" onkeyup="validateEmail()"><span id="emailError"></span>
					<input type="text" name="mob_no" placeholder="Mobile Number" id="mob_no" required=" " onkeyup="validateNumber()" ><span id="phoneError"></span>
					<input type="password" name="password" placeholder="Password" required=" " id="password" onkeyup="validatePassword()" ><span id="passwordError"></span>
					<input type="password" name="cpassword" placeholder="Confirm Password" id="cpassword" required=" " onkeyup="validateCPassword()"><span id="cpasswordError"></span>
					<input type="hidden" name="redirectURL" value=<?PHP if(isset($_GET['redirectURL']))
                                            {
                                                echo $_GET['redirectURL'];
                                                
                                            }?>>
					<input type="submit" value="Register">
				</form>
				</div>
				</div>
</div>
</body>
</html>
