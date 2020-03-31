<?php

session_start();
if (true || isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
    //$userId = $_SESSION['userID'];
    //$userName = $_SESSION['userName'];
    $userId = 1;
    $userName = 'John Doe';
} else {
    header('Location: login.php');
    exit;
}

?>

<nav>
    <div class="nav-wrapper green lighten-1">
        <a href="home.php" class="brand-logo left">Home Movies</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="home.php">Home</a></li>
            <li><a href="catalogue.php">Catalogue</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="playlists.php">Playlists</a></li>
            <li><a href="logout.php"><?= $userName?><i class="material-icons right">exit_to_app</i></a></li>
        </ul>
    </div>
</nav>
  