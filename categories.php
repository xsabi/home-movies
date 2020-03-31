<?php

// add the general head and body opening HTML tags including all common stylesheets
include_once 'components/head.php';

// here comes your PHP code generating the body content of your page

include_once 'components/navbar.php';

$errors = array();

if (!empty($_POST)) {

	// Basics validations
	if (isset($_POST['name']) && empty($_POST['name'])) {
		$errors[] = 'Name of the category is mandatory';
	} 


	if (count($errors) === 0) {
		// If no errors, insert into DB
		$query = "INSERT INTO category(name) 
			VALUES('" . $_POST['name'] . "')";
		// echo $query;

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

$result = "SELECT id,name FROM category";

$result_query = mysqli_query($connect, $result);

?>
<main class="green lighten-3">
	<section class="page-content">
		<h4>Categories</h4>
		<form method="POST" id="resultForm">
			<div class="row">
				<div class="input-field col s4">
					<label for="category"></label>
					<select id="category" name ="category">
					<option value="" disabled selected>Choose one category</option>
						<?php while ($row1 = mysqli_fetch_array($result_query)):;?>
						<option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
						<?php endwhile;?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s4">
					<label for="name">Category name:</label>
					<input type="text" name="name" id="name" required>
				</div>
			</div>
			<div class="row">
				<input class="waves-effect waves-light btn" type="submit" name="addSubmit" value="Add category"></a>
			</div>
		</form>
	</section>
</main>

<?php 
include_once 'components/footer.php';

// add general jQuery and Materialize scrip files
include_once 'components/script.php';

// add below here your page specific script file if you need
// <script src="scripts/myscript.js"></script>

// including the general closing body HTML tags
include_once 'components/tail.php';
?>