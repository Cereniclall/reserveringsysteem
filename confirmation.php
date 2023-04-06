<?php
/** @var mysqli $db */
require_once "includes/database.php";


//Retrieve the GET parameter from the 'Super global'
$reserveringId = $_GET['id'];

//Get the record from the database result
$query = "SELECT * FROM reserveringen WHERE id = '$reserveringId'";
$result = mysqli_query($db, $query);


$reservering = mysqli_fetch_assoc($result);

//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
    <style>
        body {
            font-family: 'Bebas Neue';font-size: 22px;
        }
    </style>

    <title>confirmation</title>
</head>
<body>

<div class='conf2'>
    <div>
          <h1>Uw reservering is succesvol doorgestuurd.</h1>
    </div>
    <div>
        <p class="conf">UW RESERVERING</p>
            <div>
                <p><?= $reservering['date']?></p>
            </div>
            <div>
                <p><?=$reservering['time'] ?></p>
            </div>
            <div>
                <p><?=$reservering['persons'] ?></p>
            </div>
    </div>
    <div>
        <p class="conf">UW GEGEVENS</p>
            <div>
                <p><?= $reservering['firstName']?></p>
            </div>
            <div>
                <p><?=$reservering['lastName'] ?></p>
            </div>
            <div>
                <p><?=$reservering['mail'] ?></p>
            </div>
        <div>
            <div>
                <p><?=$reservering['number'] ?></p>
            </div>
        </div>
    </div>

</div>

<div>
    <a href="index.php">GA TERUG </a>
</div>
</body>
</html>