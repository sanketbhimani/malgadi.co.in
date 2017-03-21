<?php
include("starter.php"); 

if (!isset($_SESSION['user_email'])) {
    header("Location:login.php?error=You need to login first");
    die();
} else {
    if ($_SESSION['user_email'] === "guest@malgadi.co.in") {
        header("Location:login.php?error=You need to login first");
        die();
    }
}
?>




<?php
if(isset($_GET['item_added'])){
	?>
	<script>
	swal("Great!", "Item Added Successfully", "success");
	</script>
	
	<?php
	
	}
?>


	<div class="container" style="margin-top:150px;">
	
	
	
	<h3 class="center">Change Password</h3>
			<div style="color:red;" class="center"><?PHP
            if(isset($_GET['error'])){
               
                    echo $_GET['error'];
                 
            }
        ?></div>
		<div class="row">
				<div class="input-field col s12">
					<input id="oldpassword" type="text" name="oldpassword" class="validate">
					<label for="oldpassword">Old Password</label>
				</div>
				<div class="input-field col s12">
					<input id="newpassword" name="newpassword" type="text" class="validate">
					<label for="newpassword">New Password</label>
				</div>
				<div class="input-field col s12">
					<input id="cpassword" class="cpassword" type="email" class="validate">
					<label for="cpassword">Confirm Password</label>
					<input type="hidden" name="redirectURL" value="<?PHP if(isset($_GET['redirectURL']))
                                            {
                                                echo $_GET['redirectURL'];
                                                
                                            }?>">
											
											
				</div>
				<button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
				
				</div>
		
	
	<?php include("dessert.php"); ?>
	</div>
	</div>
	</body>
	</html>
	
