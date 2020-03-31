<?php

// add the general head and body opening HTML tags including all common stylesheets
include_once 'components/head.php';

// here comes your PHP code generating the body content of your page

// include_once 'components/navbar.php';
?>

<main class="green lighten-3">
  <h1 class="center">Home Movie</h1>
  <section class="dialog">

<?php

// echo 'hello' . '<br>';
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$firstName = $lastName = $email = $password = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["regFirstname"])) {
       $errors['regFirstname'] = "First name is required";
    }else if (!preg_match("/^[a-zA-Z ]+$/",$_POST["regFirstname"])) {
        $errors['regFirstname'] = "First name must contain only alphabets and space";
    }else {
       $firstName = test_input($_POST["regFirstname"]);
    }

    if (empty($_POST["regLastname"])) {
        $errors['regLastname'] = "Last name is required";
    }else if (!preg_match("/^[a-zA-Z ]+$/",$_POST["regLastname"])) {
        $errors['regLastname'] = "Last name must contain only alphabets and space";
    }else {
        $lastName = test_input($_POST["regLastname"]);
    }
    
    if (empty($_POST["regEmail"])) {
        $errors['regEmail'] = "Email is required.";
    }else {
       $email = test_input($_POST["regEmail"]);
      
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['regEmail'] = "Invalid email format."; 
      } else {
        // check if the user's email already exists    
        $select = mysqli_query($connect, "SELECT email FROM user WHERE email = '".$email."'") or exit(mysqli_error($connect));
        if(mysqli_num_rows($select)) {    
            $errors['regEmail'] ='This email is already being used.';
        }
      }
    }

    if (empty($_POST["regPassword"])) {
      $errors['regPassword'] = "Password is required";
    } else if(strlen($_POST["regPassword"]) < 8) {
      $errors['regPassword'] = "Password must be minimum of 8 characters.";
    } else {
      $hashedPassword = password_hash($_POST['regPassword'], PASSWORD_DEFAULT);
  
      // var_dump($hashedPassword);
    }
      
          
    
if (count($errors) === 0) {
    // echo 'no errors...' . '<br>';
    // If no errors, insert into DB using the shared $connect connection

    $query = "INSERT INTO user(first_name, last_name, email, password) 
    VALUES('" . $firstName . "','" . $lastName . "', '" . $email . "','" . $hashedPassword. "')";

    // echo $query;

    // Send an SQL request to our DB
    $result_query = mysqli_query($connect, $query);

    if ($result_query) {
        //var_dump($result_query);
        // echo '<div class="green" color="green">User successfully addded !</div>';
        $query = "SELECT id FROM user WHERE email = '" . $email . "'";
        $result_query = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result_query);
        //var_dump($row);
        $_SESSION['userId'] = $row['id'];
        $_SESSION['userName'] = $firstName . ' ' . $lastName;
    } else {
        // echo '<div class="red" color="red">Error inserting into the DB. </div>';
    }
} else {
  //echo implode('<br>', $errors);
}
}
?>

<?php include_once 'components/head.php'; ?>
	<div class="container <?php if (isset($result_query) && $result_query) echo 'hide';?>">
		<h4>Register a new user</h4>
			<div class="row">
				<form class="col s12" id="registerForm" method="POST">
					<div class="row">
						<div class="input-field col s12">
							<label for="regFirstname">First name :</label>
              <input type="text" name="regFirstname" id="regFirstname" 
                class="validate <?php if (isset($errors['regFirstname'])) echo 'invalid';?>"
                value="<?= $firstName?>">
							<span class="helper-text" data-error="<?php if (isset($errors['regFirstname'])) echo $errors['regFirstname']?>" data-success="Valid"></span>
						</div>
                    </div>
                    <div class="row">
						<div class="input-field col s12">
							<label for="regLastname">Last name :</label>
              <input type="text" name="regLastname" id="regLastname" 
                class="validate <?php if (isset($errors['regLastname'])) echo 'invalid';?>"
                value="<?= $lastName?>">
							<span class="helper-text" data-error="<?php if (isset($errors['regLastname'])) echo $errors['regLastname']?>" data-success="Valid"></span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<label for="regEmail">Email :</label>
              <input type="email" name="regEmail" id="regEmail" 
                class="validate <?php if (isset($errors['regEmail'])) echo 'invalid';?>"
                value="<?= $email?>">
							<span class="helper-text" data-error="<?php if (isset($errors['regEmail'])) echo $errors['regEmail']?>" data-success="Valid"></span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<label for="regPassword">Password :</label>
              <input type="password" name="regPassword" id="regPassword" 
                class="validate <?php if (isset($errors['regPassword'])) echo 'invalid';?>"
                value="<?= $password?>">
							<span class="helper-text" data-error="<?php if (isset($errors['regPassword'])) echo $errors['regPassword']?>" data-success="Valid"></span>
						</div>
					</div>
			
				<input class="waves-effect waves-light btn" type="submit" name="submit" id="register" value="register"> 
		
				</form>
			</div>
		</div>
	</div>
      <?php
        if (isset($result_query)) { 
          if ($result_query) {
          ?>
            <div class="container center">
              <h2>Hello <?= $firstName . ' ' . $lastName?>!</h2> 
              <h4>Welcome to your home movie catalogue.</h4>
              <a href="home.php" class="waves-effect waves-light btn-large"><i class="material-icons right">play_circle_outlined</i>Enter</a>
            </div>
          <?php
          } else {
          ?>
            <div class='warning'>
              <h4>Something went wrong during the registration. Try again.</h4>
            </div>
          <?php
          }
        }
      ?>
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