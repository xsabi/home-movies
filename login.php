
<?php

$hashcode = 'SELECT * FROM USER WHERE email ='  .$_POST['logEmail'];
if (password_verify($password, $hashcode)) {
    echo 'Correct Password!!!';
} else {
    echo 'Wrong Password!!!';
}

?>

	
		<div class="container">
		<h4>Log in</h4>
			<div class="row">
				<form class="col s6" id="loginForm" method="POST">
		
					</div>
					<div class="row">
						<div class="input-field col s12">
							<label for="logEmail">Email :</label>
							<input type="email" name="logEmail" id="logEmail" class="validate" required>
							<span class="helper-text" data-error="wrong" data-success="right"></span>
						</div>

					</div>
					<div class="row">
						<div class="input-field col s12">
							<label for="logPassword">Password :</label>
							<input type="password" name="logPassword" id="logPassword" class="validate" required>
							<span class="helper-text" data-error="wrong" data-success="right"></span>
						</div>

					</div>
				
					<input class="waves-effect waves-light btn" type="submit" name="submit" id="login" value="login"> 
				</form>

			</div>

		</div>





      
	
