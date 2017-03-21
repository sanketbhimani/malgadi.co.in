
<?php

include("starter.php"); ?>


<?php
if(isset($_GET['item_added'])){
	?>
	<script>
	swal("Great!", "Item Added Successfully", "success");
	</script>
	
	<?php
	
	}
?>

<script>
            
            function validate(){
                if(validateFname() == false){
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
                   
					alert("Please enter your full name");
                    return false;
                }else{
                    
                    return true;
                }
            }
            
           
            
  
           
           function validatePassword(){
               var pass=document.getElementById('password').value;
               if(pass == ''){
                 
				    alert("Password should be at least 8 characters long");
                   return false;
               }else if(pass.length < 8){
                   
				    alert("Password should be at least 8 characters long");
                   return false;
               }else{
                   
				    //alert("Password should be at least 8 characters long");
                   return true;
               }
           }
           
           function validateNumber(){
               var no=document.getElementById('mob_no').value;
               if(isNaN(no)){
                   
				    alert("Please enter 10 digit mobile number");
                   return false;
               }else if(no.length != 10){
                
				    alert("Please enter 10 digit mobile number");
                   return false;
               }else{
                   
				   
                   return true;
               }
           }
           
           function validateCPassword(){
               var cpassword=document.getElementById('cpassword').value;
               var password=document.getElementById('password').value;
               if(cpassword == ''){
                  
				    alert("Password didn't match");
                   return false;
               }else if(cpassword != password){
                  
				    alert("Password didn't match");
                   return false;
               }else{
                   
                   return true;
               }
           }
        </script>
	<div class="container" style="margin-top:150px;">
	<blockquote><p class="flow-text">Register to view your order history and manage orders.
				</p></blockquote><br>
	<h3 class="center">Register</h3>
	<div style="color:red;" class="center"><?PHP
            if(isset($_GET['error'])){
               
                    echo $_GET['error'];
                 
            }
        ?></div>
	<form name="signupform" onsubmit="return validate()" action="signupprocess.php" method="post">
				<div class="row">
				<div class="input-field col s12">
					<input id="fname" name="fname" type="text" class="validate">
					<label for="fname">Full Name</label>
				</div>
				<div class="input-field col s12">
					<input type="email" name="email"  required=" " id="email"  class="validate">
					<label for="email">E-mail</label>
				</div>
				<div class="input-field col s12">
					<input name="mob_no"  id="mob_no" required=" " type="text" class="validate">
					<label for="mob_no">Mobile no.</label>
				</div>
				<div class="input-field col s12">
					<input type="password" name="password" required=" " id="password" class="validate">
					<label for="password">Password</label>
				</div>
				<div class="input-field col s12">
					<input type="password" name="cpassword" id="cpassword" required=" " class="validate">
					<label for="cpassword">Confirm Password</label>
				</div>
				<input type="hidden" name="redirectURL" value="<?PHP if(isset($_GET['redirectURL']))
                                            {
                                                echo $_GET['redirectURL'];
                                                
                                            }?>">
											<button class="btn waves-effect waves-light" type="submit" name="action">Ragister
    
  </button>
											
				
			</div>
	</form>
	
	
	
	
	
	<?php include("dessert.php"); ?>
	</div>
	</div>
	</body>
	</html>