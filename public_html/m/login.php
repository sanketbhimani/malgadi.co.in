

<?php

include("starter.php"); ?>




		<div class="container"style="margin-top:150px;">
			<h3 class="center">Login</h3>
			<div style="color:red;" class="center"><?PHP
            if(isset($_GET['error'])){
               
                    echo $_GET['error'];
                 
            }
        ?></div>
			<form action="loginprocess.php" method="post"> 
			<div class="row">
				<div class="input-field col s12">
					<input id="id" type="email" name="email" class="validate">
					<label for="id">User ID</label>
					<input type="hidden" name="redirectURL" value="<?PHP if(isset($_GET['redirectURL']))
                                            {
                                                echo $_GET['redirectURL'];
                                                
                                            }?>">
				</div>
				<div class="input-field col s12">
				
					<input id="password" name="password" type="password" class="validate">
					<label for="password">Password</label> <a href="forgotpassword.php">Forget password? click here to recover</a>
					
					<button class="btn waves-effect waves-light col s12" type="submit" name="action">Login
  </button>
					<div class="center" style="font-size:1.5em;">- or -</div>
					
					<?php
				if(isset($_GET['redirectURL'])){
					
				   echo "<div class='input-field'><a class='waves-effect waves-light btn col s12' href='signup.php?redirectURL=".$_GET['redirectURL']."'>Register Here</a>
				   <div class='center' style='font-size:1.5em;'>- or -</div>
				   <a class='waves-effect waves-light btn col s12' href='guestprocess.php?redirectURL=".$_GET['redirectURL']."'>Continue as Guest</a></div>";
                }else{
                   echo "<div class='input-field'><a class='waves-effect waves-light btn col s12' href='signup.php'>Register Here</a>
				   <div class='center' style='font-size:1.5em;'>- or -</div>
				   <a class='waves-effect waves-light btn col s12' href='guestprocess.php'>Continue as Guest</a></div>";
                }
				
				?>
					
					
				</div>
			
			</div>
			</form>
			<?php include("dessert.php"); ?>
		</div>
		</div>
		</body>
		</html>
		
	