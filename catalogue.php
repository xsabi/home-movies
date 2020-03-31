<?php

// add the general head and body opening HTML tags including all common stylesheets
include_once 'components/head.php';

// here comes your PHP code generating the body content of your page

include_once 'components/navbar.php';
?>

<main class="green lighten-3">
  <div class="row">
  
  <?php
  //to execute the query
  $orderType = 'DESC';

  //retrieves results as an associative array
  $query = 'SELECT * FROM  movie ORDER BY release_date ' . $orderType;

  $movieresults = mysqli_query($connect, $query);
  while ($row = mysqli_fetch_assoc($movieresults)) {
  ?>

    <div class="col s12 m4">
      <div class="card">
        <div class="card-image">
          <img src="<?= $row['poster']?>" alt="<?= $row['title']?>">
          <span class="card-title"><?= $row['title']?></span>
        </div>
        <div class="card-content">
          <span class="badge green lighten-2 right"><?= $row['release_date']?></span>
          <p><?= $row['synopsis']?></p>
        </div>
        <div class="card-action">
          <a href="details.php?id=<?= $row['id']?>">Details</a>
          <a href="editmovie.php?id=<?= $row['id']?>">Edit</a>
          <a href="addplaylist.php?id=<?= $row['id']?>">Add playlist</a>
        </div>
      </div>
    </div>
  
  <?php
    }
  ?>
  
  </div>
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