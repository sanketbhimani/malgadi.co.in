<?php

include("starter.php"); 
$_SESSION['purchase_done'] = 0;
$_SESSION['odid'] = null;



	if(!isset($_SESSION['no_of_items'])){
		if(isset($_SERVER['HTTP_REFERER'])){
	header("location:".$_SERVER['HTTP_REFERER']);
	die();
}else{
	header("location:index.php");
	die();
}
	}else{
		if($_SESSION['no_of_items']==0){
			
		header("location:something_went_wrong.php");
					die();
		}
	}
	

?>


	
<div class="container" style="margin-top:150px;">

		
		<blockquote><p class="flow-text">
					<strong>Well done!</strong> You have successfully selected product(s), now fill up following details to complete your order, Thank you! :)
		</p></blockquote>
		<script>
		<?php
		
		/*function city(){
			if($('#other_city').val()=="nadiad"){
				$( '#ccity' ).prop( "disabled", true );
				$( '#city_hidden' ).prop( "disabled", false );
				$('#ccity').val("nadiad");
				$('#cod').prop( "disabled", false );
			}else{
				alert("for outside of nadiad cash on delivery option is not avilable and extra delivery charges of rupees 60 will be applied.");
				$( '#ccity' ).prop( "disabled", false );
				$( '#city_hidden' ).prop( "disabled", true );
				$('#ccity').val("");
				$('#cod').prop( "disabled", true );
				$('#instamojo').prop( "checked", true );
				
			}
		}*/
		?>
		</script>
		<form action="payment.php" method="post" onsubmit=" return chack()">
		
		<div class="row">
				<div class="input-field col s12">
					<input  id="fname" name="fname" type="text" class="validate"  value="<?php if(isset($_COOKIE['fname'])) echo($_COOKIE['fname']); ?>">
					<label for="name">Full Name</label>
				</div>
				<div class="input-field col s12">
					<input id="branch" type="text"  maxlength="4" name="branch" type="text" class="validate" value="<?php if(isset($_COOKIE['branch'])) echo($_COOKIE['branch']); ?>">
					<label for="name">Branch</label>
				</div>
				<div class="input-field col s12">
					<input id="sem" type="text" maxlength="5" name="sem" class="validate"  value="<?php if(isset($_COOKIE['sem'])) echo($_COOKIE['sem']); ?>">
					<label for="name">Sem</label>
				</div>
				<div class="input-field col s12">
					<input id="mnumber" name="mnumber" type="tel" maxlength="10" class="validate"  value="<?php if(isset($_COOKIE['mnumber'])) echo($_COOKIE['mnumber']); ?>">
					<label for="name">Mobile no.</label>
				</div>
				<div class="input-field col s12">
					<input id="email" type="email" name="email"  class="validate" value="<?php if(isset($_COOKIE['email'])) echo($_COOKIE['email']); ?>">
					<label for="name">E-mail</label>
				</div>
				<div class="input-field col s12">
					<input id="address" type="text"  name="address1"  class="validate" value="<?php if(isset($_COOKIE['address1'])) echo($_COOKIE['address1']); ?>">
					<label for="name">Address</label>
				</div>
				<div class="input-field col s12">
					<?php
					
					/*<select id="other_city" onchange="city();">
						<option value="nadiad">Nadiad</option>
						<option value="other">Other</option>
					</select>
					<label>City</label>
					<script>
						$(document).ready(function () {
							$('select').material_select();
						});

					</script>
					*/
					?>
				</div>
					<div class="input-field col s12">
					<input id="ccity" type="text" name="ccity" class="validate"  value="nadiad" disabled>
					<input id="city_hidden" type="hidden" name="ccity" placeholder="Verify Twice" value="nadiad">
					
					<label for="name">City</label>
				</div>	
				
<?php
				/*				
				<div class="input-field col s12">
				<input id="cod" type="radio" name="payment" value="cod" aria-describedby="basic-addon1" checked><label for="cod">Cash on delivery</label>
				
				<input id="instamojo" type="radio" name="payment" value="instamojo" aria-describedby="basic-addon1"><label for="instamojo">Online payment</label><br> <br><div class="center">(Online payment will proceed through Instamojo payment gateway)
				</div>
				
				</div>
				*/
				?>
				
				<br> For Express Delivery(Same day delivery) contact on : +917069936320 / +918141192497 . 
				
				
				<div class="input-field col s12">
				<input type="hidden" name="payment" value="cod">
				<input type="checkbox" id="termsandconditions" name="termsandconditions"><label for="termsandconditions">I accept this <a href="terms_and_conditions.php">Terms and Conditions</a></label>
				</div>
				<div class="input-field col s12">
				<button class="btn waves-effect waves-light col s12" type="submit" name="action">Chackout
  </button>
  </div>
			</div>
			
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
			if(document.getElementById('ccity').value==''){
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
		<?php include("dessert.php"); ?>
		</div>
		</div>
		</body>
		</html>
