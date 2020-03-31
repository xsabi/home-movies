
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

if (isset($_GET['id'])) {
    $movieId = (int) $_GET['id'];

		// Make sure it's an number AND a valid ID
		if ($movieId > 0) {
			require_once 'database.php';
            //retrieves results as an associative array
            $query = 'SELECT * FROM  movie WHERE id =' .$movieId ;

            $movieresults = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($movieresults)) {?>
                <div>
                        <img src=<?php ' . $row['poster'] .'?> alt= <?php '. $row['title'] .'?>>
                        Movie : <span class="card-title"><?php' . $row['title'] . '?></span>
                        <p> Date of Realease :<?php'.$row['release_date']. '?></p>
                        echo '<p> Synopsis :  <?php'.$row['synopsis']. '?></p>
                </div>
                <div>
                <a href="catalogue.php">back to catalogue</a>
                </div>

         <?php   }
        }
}
?>
</body>
</html>
