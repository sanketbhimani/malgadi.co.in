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


	<div class="container" style="margin-top:150px;">
	
	
	
<h3 class="center">Forgot Password</h3>
	<div style="color:red;" class="center"><?PHP
            if(isset($_GET['error'])){
               
                    echo $_GET['error'];
                 
            }
			if(isset($_GET['msg'])){
                        echo $_GET['msg'];
                    }
			
        ?></div>
		<blockquote><p class="flow-text">Enter email id to recover your password</p></blockquote>
				
		
		
<form action="sendpassword.php" method="post">
				<div class="row">
				<div class="input-field col s12">
					<input  type="email" name="email" id="email" class="validate">
					<label for="email">E-mail</label>
				</div>
				</div>
				<input type="hidden" name="redirectURL" value="<?PHP if(isset($_GET['redirectURL']))
                                            {
                                                echo $_GET['redirectURL'];
                                                
                                            }?>">
				<button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
				</form>


<?php include("dessert.php"); ?>
	</div>
	</div>
	</body>
	</html>











