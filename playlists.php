<?php

// add the general head and body opening HTML tags including all common stylesheets
include_once 'components/head.php';

// here comes your PHP code generating the body content of your page

include_once 'components/navbar.php';
?>
<?php

include_once 'components/database.php';
//echo 
include_once 'components/navbar.php';

// retrieve data from playlist
if (isset($_GET['playlistForm'])) {
$query = "SELECT playlist.id, playlist.name, playlist.creation_date, user.first_name, user.last_name FROM playlist INNER JOIN user ON (playlist.user_id = user.id) WHERE user.id = ".$userId;
var_dump($query);
//to execute the query
$playlistresults = mysqli_query($conn, $query);
//retrieves results as an associative array
while ($row = mysqli_fetch_assoc($playlistresults)) {
 
    
    echo 'Playlist name :' . $row['name'] . '<br>';
    echo 'Date of Creation :' . $row['creation_date'] . '<br>';
    echo 'User :' . $row['first_name'] . ' ' . $row['last_name'] . '<br>';

}

}

include_once 'components/database.php';
$result = "SELECT id,name FROM playlist";

$result_query = mysqli_query($connect, $result);

?>

<main class="green lighten-3">
<section class="page-content">
    <h4>Playlists page</h4>
    <form method="POST" id="playlistForm">
       <!-- Dropdown Trigger -->
  <a class='dropdown-trigger btn' href='#' data-target='playlist'>Select a playlist</a>

<!-- Dropdown Structure -->
<ul class='dropdown-content' id="playlist" name ="playlist"><?php while ($row1 = mysqli_fetch_array($result_query)):;?>
  <li><a href="#!" value="<?php echo $row1[0];?>"><?php echo $row1[1];?></a></li>
  <?php endwhile;?>


</ul>
      
    
        <div>
            <label for="name">Name of the Playlist :</label>
			<input type="text" name="name" id="name" required>
		</div>
        <div>
       <input class="waves-effect waves-light btn" type="submit" name="addSubmit" value="Add Playlist"></a>
       <input class="waves-effect waves-light btn" type="submit" name="updSubmit" value="Update Playlist"></a>
       <input class="waves-effect waves-light btn" type="submit" name="delSubmit" value="Delete Playlist"></a>
    </form>
    
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