<?php

// add the general head and body opening HTML tags including all common stylesheets
include_once 'components/head.php';

// here comes your PHP code generating the body content of your page

include_once 'components/navbar.php';
?>

<main class="green lighten-3">
    <?php
    if (isset($_GET['id'])) {
        $movieId = (int) $_GET['id'];

            // Make sure it's an number AND a valid ID
            if ($movieId > 0) {
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