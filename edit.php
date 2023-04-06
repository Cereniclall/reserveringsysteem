<?php
//Require database in this file
/** @var $db */
require_once "includes/database.php";

    // redirect when uri does not contain an id
    if(!isset($_GET['id']) || $_GET['id'] == '') {
        // redirect to index.php
        header('Location: index.php');
        exit;
}

//Retrieve the GET parameter from the 'Super global'
$reserveringId = mysqli_escape_string($db, $_GET['id']);

//Retrieve the GET parameter from the 'Super global'
$reserveringId = $_GET['id'];
//Get the record from the database result
$query = "SELECT * FROM reserveringen WHERE id = '$reserveringId'";
$result = mysqli_query($db, $query);

    //If doesn't exist, redirect back to the reserveringen
    if (mysqli_num_rows($result) != 1) {
        header('Location: reserveringen.php');
        exit;
    }

//Transform the row in the DB table to a PHP array
$reserveringen = mysqli_fetch_assoc($result);

//Check if Post isset, else do nothing
    if (isset($_POST['submit'])) {
//Postback with the data showed to the user, first retrieve data from 'Super global'
        $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
        $mail = mysqli_real_escape_string($db, $_POST['mail']);
        $date = mysqli_real_escape_string($db, $_POST['date']);
        $time = mysqli_real_escape_string($db, $_POST['time']);
        $persons = mysqli_real_escape_string($db, $_POST['persons']);
        $number = mysqli_real_escape_string($db, $_POST['number']);


//Require the form validation handling
    require_once "form-validation.php";

    // Als alles ingevuld is dan stuur door naar de database en stuur door naar vorige pagina.
    if (empty($errors)) {
        $query = "UPDATE `reserveringen` SET `firstName`='$firstName',`lastName`='$lastName',`mail`='$mail',`date`='$date',`time`='$time',`persons`='$persons', `number`='$number'  
                       WHERE id = '$reserveringId'";
        mysqli_query($db, $query);
        header('Location: reserveringen.php');
        exit;
    }
}

//Close connection
mysqli_close($db);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit</title>
    <link rel="stylesheet" href="index.css">
    <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
    <style>
        body {
            font-family: 'Bebas Neue';font-size: 22px;
        }
    </style>
</head>
<body>
<header>

    <h1>Edit</h1>
</header>
<main>
    <section class="section is-small">
        <div class="box">
            <form method="post" action="">
                <div class="field">
                    <label class="label">First name</label>
                    <div class="control">
                        <input class="input" name="firstName" type="text" value="<?= $reserveringen['firstName'] ?>">
                    </div>
                    <p class="help is-danger">
                        <?= $errors['firstName'] ?? '' ?>
                    </p>
                </div>
                <div class="field">
                    <label class="label">Last name</label>
                    <div class="control">
                        <input class="input" name="lastName" type="text" value="<?= $reserveringen['lastName'] ?>">
                    </div>
                    <p class="help is-danger">
                        <?= $errors['lastName'] ?? '' ?>
                    </p>
                </div>

                <div class="field">
                    <label class="label" for="phone">E-mail</label>
                    <div class="control">
                        <input class="input" name="mail" type="text"
                               value="<?= $reserveringen['mail'] ?>"
                        >
                    </div>
                    <p class="help is-danger">
                        <?= $errors['mail'] ?? '' ?>
                    </p>
                </div>

                <div class="field">
                    <label class="label">Date</label>
                    <div class="control">
                        <input name="date" class="input" type="date" value="<?= $reserveringen['date'] ?>">
                    </div>
                    <p class="help is-danger">
                        <?= $errors['date'] ?? '' ?>
                    </p>
                </div>

                <div class="field">
                    <label class="label">Time</label>
                    <div class="control">
                        <input name="time" class="input" type="time" value="<?= $reserveringen['time'] ?>">
                    </div>
                    <p class="help is-danger">
                        <?= $errors['time'] ?? '' ?>
                    </p>
                </div>

                <div class="field">
                    <label class="label">Persons</label>
                    <div class="control">
                        <input class="input" name="persons" type="number" value="<?= $reserveringen['persons'] ?>">
                    </div>
                    <p class="help is-danger">
                        <?= $errors['persons'] ?? '' ?>
                    </p>
                </div>
                <div class="field">
                    <label class="label">Number</label>
                    <div class="control">
                        <input class="input" name="number" type="text" value="<?= $reserveringen['number'] ?>">
                    </div>
                    <p class="help is-danger">
                        <?= $errors['number'] ?? '' ?>
                    </p>
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" name="submit" class="button is-success">Bevestigen</button>
                    </div>
                    <div class="control">
                        <a href="reserveringen.php" class="button is-light">Annuleren</a>
                    </div>
                </div>
            </form>

        </div>
    </section>
</main>

</body>
</html>
<footer>
</footer>
