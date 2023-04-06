<?php
//database connection
/** @var mysqli $db */

require_once "includes/database.php";



//Get the result set from the database with a SQL query
$query = "SELECT * FROM reserveringen";
$result = mysqli_query($db, $query) or die ('Error: ' . $query );

//Loop through the result to create a custom array
$reserveringen = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reserveringen[] = $row;
}
//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Reserveringen</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="index.css">
    <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
    <style>
        body {
            font-family: 'Bebas Neue';font-size: 22px;
        }
    </style>
</head>


<div class="header">
    <h1>KUMPIR CORNER</h1>
    <p>& more</p>
</div>


<div class="topnav">
    <nav>
        <a href="index.php">HOME</a>
        <a href="menu.html">MENU</a>
        <a href="contact.html">CONTACT</a>
        <a href="create.php">RESERVEREN</a>
        <a href="register.php" class="split">Registreren</a>
        <a href="login.php" class="split">Inloggen</a>
    </nav>
</div>


<body>
        <div class="column left">
            Kumpir Corner & More is sinds 2015 gevestigd op de Schiedamseweg, in Rotterdam.
            Wij serveren heerlijke koffie, espresso en thee, en voor zowel ontbijt,
            lunch als diner kunt u in het restaurant terecht.
            Er is een ruime keuze uit diverse menu's, belegde broodjes, pita's, panini's,
            burgers, vers fruit, smoothies en frisdrank. En natuurlijk heerlijke <strong>Kumpir</strong>!
            <div>
                <button type="button" name="homebutton" class="homebutton">
                    <a href="create.php">Reserveren </a>
                </button>
            </div>
        </div>
</body>
<footer>
    <img src="img/kumpir.png" alt="kumpir">
   <div>
    &copy; Kumpir Corner
   </div>
</footer>
</html>

