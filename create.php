<?php
/** @var mysqli $db */


//Require database in this file & image helpers
require_once "includes/database.php";
require_once 'reservering-data.php';

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $firstName  = $_POST['firstName'];
    $lastName   = $_POST['lastName'];
    $mail       = $_POST['mail'];
    $date       = $_POST['date'];
    $time       = $_POST['time'];
    $persons    = $_POST['persons'];
    $number     = $_POST['number'];

    //Require the form validation handling
    require_once "form-validation.php";

    $db = mysqli_connect(
        hostname: 'localhost',
        username: 'root',
        password: '',
        database: 'Reservering_data'
    );

    if (empty($errors)) {
        //Save the record to the database
        $query = "INSERT INTO reserveringen (firstName, lastName, mail, date, time, persons, number)
                  VALUES ('$firstName', '$lastName' , '$mail','$date', '$time', '$persons', '$number')";
        $result = mysqli_query($db, $query) or die('Error: '.mysqli_error($db). ' with query ' . $query);

        $id = mysqli_insert_id($db);
        //Close connection
        mysqli_close($db);

        // Redirect to confirmation.php
        header('Location: confirmation.php?id='.$id);
        exit;
    }
}
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


<body>
<div class="form" >
    <h1>MAAK EEN NIEUWE RESERVERING</h1>

    <section class="data">
        <form method="post" action="">
            <div>
                <label class="label">Voornaam</label>
                <div>
                    <input class="input" id="firstName" type="text" name="firstName" value="<?= $firstName ?? '' ?>"/>
                </div>
                <p>
                    <?= $errors['firstName'] ?? '' ?>
                </p>
            </div>
            <div>
                <label class="label">Achternaam</label>
                    <div class="control">
                        <input class="input" id="lastName" type="text" name="lastName" value="<?= $lastName ?? '' ?>" required/>
                            <p>
                                <?= $errors['lastName'] ?? '' ?>
                            </p>
                    </div>
            </div>
            <div>
                <label class="label">E-mail</label>
                    <div>
                        <input class="input" id="email" type="text" name="mail" value="<?= $mail ?? '' ?>" required/>
                            <p class="help is-danger">
                                <?= $errors['mail'] ?? '' ?>
                            </p>
                    </div>
            </div>

        </section>
        <section class="data">
            <div>
                <label for="reservation">Gewenste dag</label>
                <div>
                <input class="input" id="date" type="date" name="date" value="<?= $day ?? '' ?>"required/>
                    <p>
                        <?= $errors['date'] ?? '' ?>
                    </p>
                </div>
            </div>



        <div>
            <label for="time">Gewenste tijdstip</label>
        <div>
            <input class="input" id="time" type="time" name="time" value="<?= $time ?? '' ?>"required/>
        <div>
            <small>Reserveren kan van 09:00 tot 19:00</small>
        </div>
            <p>
                <?= $errors['time'] ?? '' ?>
            </p>
        </div>
        </div>


        <div>
            <label for="personen" >Aantal personen</label>
            <div>
                <input class="input" id="persons" type="number" name="persons" value="<?= $persons ?? '' ?>"required/>
            </div>

        <p>
            <?= $errors['persons'] ?? '' ?>
        </p>
        </div>


            <div>
                <label  class="label">Telefoonnummer</label>
                <div >
                    <input class="input" id="number" type="text" name="number" value="<?= $number ?? '' ?>"required/>
                    <p>
                        <?= $errors['number'] ?? '' ?>
                    </p>
                    <span>
                    <i></i>
                </span>
                </div>
            </div>
        </section>

            <div class="control" class="data">
                <button type="submit" name="submit">Reserveer nu!</button>
            </div>


        </form>
    </section>
</div>
</body>
<footer class="terug">
    <a href="index.php">&laquo; Ga terug</a>
</footer>
</html>
