<?php

session_start();

// add the general head and body opening HTML tags including all common stylesheets
include_once 'components/head.php';

// here comes your PHP code generating the body content of your page

// include_once 'components/navbar.php';
?>

<main class="green lighten-3">
  <h1 class="center">Home Movie</h1>
  <section class="dialog">

<?php

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$email = $password = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["logEmail"])) {
       $errors['logEmail'] = "Email is required";
    } else {
       $email = test_input($_POST["logEmail"]);
    }

    if (empty($_POST["logPassword"])) {
        $errors['logPassword'] = "Password is required";
    } else {
        $password = $_POST["logPassword"];
	}

	if (count($errors) == 0) {
		// If no errors, search for user in DB using the shared $connect connection
		$query = "SELECT id, first_name, last_name, password FROM user WHERE email = '" . $email . "'";
		$result_query = mysqli_query($connect, $query);
		if ($result_query) {
			$row = mysqli_fetch_assoc($result_query);
			if (count($row) == 0) {
				$errors['logEmail'] = 'There is no user registered with this email.';
			} else if (password_verify($password, $row['password'])) {
				$_SESSION['userID'] = $row['id'];
				$_SESSION['userName'] = $row['first_name'] . ' ' . $row['last_name'];
				header('Location: home.php');	
			} else {
				$errors['logPassword'] = "Wrong password";
			}
		} else {
			//var_dump($result_query);
		}
	} else {
		//var_dump($errors);
	}
}


?>
	<div class="container">
		<h4>Log in</h4>
			<div class="row">
				<form class="col s12" id="loginForm" method="POST">		
					<div class="row">
						<div class="input-field col s12">
							<label for="logEmail">Email :</label>
							<input type="email" name="logEmail" id="logEmail" 
								class="validate <?php if (isset($errors['logEmail'])) echo 'invalid';?>" 
								required
								value="<?= $email?>">
							<span class="helper-text" data-error="<?= $errors['logEmail']?>" data-success=""></span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<label for="logPassword">Password :</label>
							<input type="password" name="logPassword" id="logPassword" 
								class="validate <?php if (isset($errors['logPassword'])) echo 'invalid';?>"
								required
								value="<?= $password?>">
							<span class="helper-text" data-error="<?= $errors['logPassword']?>" data-success=""></span>
						</div>
					</div>				
					<input class="waves-effect waves-light btn" type="submit" name="submit" id="login" value="login"> 
					<a href="register.php" class="waves-effect waves-light btn right">Register</a> 
				</form>
			</div>
		</div>
	</section>
</main>

<?php 
// include_once 'components/footer.php';

// add general jQuery and Materialize scrip files
include_once 'components/script.php';

// add below here your page specific script file if you need
// <script src="scripts/myscript.js"></script>

// including the general closing body HTML tags
include_once 'components/tail.php';
?>



      
	
