
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Compiled and minified CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 <link rel="stylesheet" href="style/style.css"> 
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>
     

<?php

//connect to the database
include_once 'database.php';
//echo 

echo '<p><button name="sort">Sort</button><button onclick="clickfilter()">Filter</button></p>';
// retrieve data from movies

function click(){
  $sortquery = "SELECT * FROM movie ORDER BY release_date DESC";
  while ($sortrow = mysqli_fetch_assoc($sortquery)) {
    
    echo '<div class="row">';
      echo '<div class="col s12 m4">';
        echo '<div class="card">';
          echo '<div class="card-image">';
            echo '<img src="' . $sortrow['poster'] .' alt= '. $sortrow['title'] .'">';
            echo 'Movie : <span class="card-title">' . $sortrow['title'] . '</span>';
          echo '</div>';
          echo '<div class="card-content">';
            echo '<p> Date of Realease :'.$sortrow['release_date'].' </p>';
            echo '<p> Synopsis :  '.$sortrow['synopsis'].' </p>';
          echo '</div>';
          echo '<div class="card-action">';
            echo '<a href="#">Add to the playlist</a>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
    echo '</div>';
    
    }

}

//to execute the query
$query = "SELECT * FROM movie";
$movieresults = mysqli_query($connect, $query);
//retrieves results as an associative array
while ($row = mysqli_fetch_assoc($movieresults)) {
    
echo '<div class="row">';
  echo '<div class="col s12 m4">';
    echo '<div class="card">';
      echo '<div class="card-image">';
        echo '<img src="' . $row['poster'] .' alt= '. $row['title'] .'">';
        echo 'Movie : <span class="card-title">' . $row['title'] . '</span>';
      echo '</div>';
      echo '<div class="card-content">';
        echo '<p> Date of Realease :'.$row['release_date'].' </p>';
        echo '<p> Synopsis :  '.$row['synopsis'].' </p>';
      echo '</div>';
      echo '<div class="card-action">';
        echo '<form method="post"><a href="#">Add to the playlist</a><br>';
        echo'<a href="details.php">More Info</a></form>';
        
      echo '</div>';
    echo '</div>';
  echo '</div>';
echo '</div>';

}

?>