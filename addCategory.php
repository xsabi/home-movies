<?php

// add the general head and body opening HTML tags including all common stylesheets
include_once 'components/head.php';

// here comes your PHP code generating the body content of your page

include_once 'components/navbar.php';
?>
<?php

require_once 'components/database.php';

$errors = array();

if (!empty($_POST)) {

	// Basics validations
	if (empty($_POST['name'])) {
		$errors[] = 'Name of the category is mandatory';
	}

	
	if (count($errors) === 0) {

		// If no errors, insert into DB
		require_once 'components/database.php';
		// Open a connection to the DBMS
		
		$query = "INSERT INTO category(name) 
		VALUES('" . $_POST['name'] . "')";
echo $query;

		// Send an SQL request to our DB
		$result_query = mysqli_query($connect, $query);

		if ($result_query) {
			echo '<div class="green" color="green">Category successfully addded !</div>';
		} else {
			echo '<div class="red" color="red">Error inserting into the DB. </div>';
		}
	} else {
		echo implode('<br>', $errors);
	}
}


include_once 'components/footer.php';

// add general jQuery and Materialize scrip files
include_once 'components/script.php';

// add below here your page specific script file if you need
// <script src="scripts/myscript.js"></script>

// including the general closing body HTML tags
include_once 'components/tail.php';
?>