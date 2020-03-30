<?php


require_once 'components/database.php';
echo 'hello' . '<br>';
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$firstName = $lastName = $email = $password ="";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["regFirstname"])) {
       $errors[] = "First name is required";
    }else if (!preg_match("/^[a-zA-Z ]+$/",$firstName)) {
        $errors[] = "First name must contain only alphabets and space";
    }
    }else {
       $firstName = test_input($_POST["regFirstname"]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["regLastname"])) {
           $errors[] = "Last name is required";
        }else if (!preg_match("/^[a-zA-Z ]+$/",$lastName)) {
            $errors[] = "Last name must contain only alphabets and space";
        }else {
           $lastName = test_input($_POST["regLastname"]);
        }
    
    if (empty($_POST["regEmail"])) {
        $errors[] = "Email is required";
    }else {
       $email = test_input($_POST["regEmail"]);
       
       // check if e-mail address is well-formed
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format"; 
       }
    }

    if (empty($_POST["regPassword"])) {
        $errors[] = "Password is required";
    } else if(strlen($password) < 8) {
           $errors[] = "Password must be minimum of 8 characters";
     }else {
        $password = test_input($_POST["regPassword"]);
     }

    
      // HASHING PASSWORD
      $hash_Password = password_hash('mypassword123', PASSWORD_DEFAULT);

      var_dump($hash_Password);

      if (isset($_POST['regPassword'])) {
          $hashedPassword = password_hash($_POST['regPassword'], PASSWORD_DEFAULT);
  
          var_dump($hashedPassword);
      }
      
          
    
if (count($errors) === 0) {
    echo 'no errors...' . '<br>';
    // If no errors, insert into DB
    require_once 'components/database.php';
    // Open a connection to the DBMS
    // $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

    $query = "INSERT INTO user(first_name, last_name, email, password) 
    VALUES('" . $_POST['regFirstname'] . "','" . $_POST['regLastname'] . "', '" . $hashedPassword. "')";

    echo $query;

    // Send an SQL request to our DB
    $result_query = mysqli_query($connect, $query);

    if ($result_query) {
        echo '<div class="green" color="green">User successfully addded !</div>';
    } else {
        echo '<div class="red" color="red">Error inserting into the DB. </div>';
    }
} else {
    echo implode('<br>', $errors);
}
}
?>

<?php include_once 'components/head.php'; ?>
<div id ="modalRegister" class="modal">
	<div class="modal-content">
		<!-- <a class="waves-effect waves-light btn-flat modal-close right"><i class="tiny material-icons">close</i></a> -->
		<div class="container">
		<h4>Register a new user</h4>
			<div class="row">
				<form class="col s12" id="registerForm" method="POST">
					<div class="row">
						<div class="input-field col s12">
							<label for="regFirstname">First name :</label>
							<input type="text" name="regFirstname" id="regFirstname" class="validate">
							<span class="helper-text" data-error="wrong" data-success="right"></span>
						</div>
                    </div>
                    <div class="row">
						<div class="input-field col s12">
							<label for="regLastname">Last name :</label>
							<input type="text" name="regLastname" id="regLastname" class="validate">
							<span class="helper-text" data-error="wrong" data-success="right"></span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<label for="regUsername">Email :</label>
							<input type="email" name="regEmail" id="regEmail" class="validate" required>
							<span class="helper-text" data-error="wrong" data-success="right">bensera@live.com</span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<label for="regPassword">Password :</label>
							<input type="password" name="regPassword" id="regPassword" class="validate" required>
							<span class="helper-text" data-error="wrong" data-success="right">Length of your password should be minimum 8 characters.</span>
						</div>
					</div>
			
					<button class="btn modal-close waves-effect waves-light" type="submit" name="register" id="register">Register
					<i class="material-icons right"></i>
					</button>
				</form>

			</div>

		</div>

	</div>

</div>

<script>
$(function(){
   //register click eventhandler for login button
    $('#register').click(function(e){
      console.log('Register button clicked...');
      e.preventDefault();
      $.ajax({
        url: 'register.php',
        type: 'post',
        data: $('form').serialize(),
        success: function(result) {
        
         console.log('<div class="red">'+result+'</div>');
          // $('#registerForm').html('<div class="green">'+result+'</div>');
        },
        error: function(err){
          console.log('<div class="red">'+result+'</div>');
                  // $('#registerForm').html('<div class="red">'+result+'</div>');
          // If ajax errors happens
        }
      });
    });
  });
</script>



      
	
