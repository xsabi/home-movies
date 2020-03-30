<?php


if (isset($_GET['id'])) {
    $movieId = (int) $_GET['id'];

		// Make sure it's an number AND a valid ID
		if ($movieId > 0) {
			require_once 'database.php';
            //retrieves results as an associative array
            $query = 'SELECT * FROM  movie WHERE id =' .$movieId ;

            $movieresults = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($movieresults)) {
                echo '<div>';
                        echo '<img src="' . $row['poster'] .' alt= '. $row['title'] .'">';
                        echo 'Movie : <span class="card-title">' . $row['title'] . '</span>';
                        echo '<p> Date of Realease :'.$row['release_date'].' </p>';
                        echo '<p> Synopsis :  '.$row['synopsis'].' </p>';
                echo '</div>';
            }
        }
}
?>