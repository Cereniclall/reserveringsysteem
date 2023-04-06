<?php

/** @var mysqli $db */

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Require database in this file & image helpers
    require_once "includes/database.php";

    $db = mysqli_connect(
        hostname: 'localhost',
        username: 'root',
        password: '',
        database: 'Reservering_data'
    );

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $lastName = $_POST['lastName'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

//check if the data is correct and filled in, when not, show an error
    $errors = [];
    if ($lastName == "") {
        $errors['lastName'] = 'name cannot be empty';
    }
    if ($mail == "") {
        $errors['mail'] = 'e-mail cannot be empty';
    }
    if ($password == "") {
        $errors['password'] = 'password cannot be empty';
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    //Save the record to the database

    if (empty($errors)) {
        //Save the record to the database
        $query = "INSERT INTO register (lastName, mail, password)
                  VALUES ('$lastName' , '$mail', '$password')";
        $result = mysqli_query($db, $query) or die('Error: '.mysqli_error($db). ' with query ' . $query);

        $id = mysqli_insert_id($db);
        //Close connection
        mysqli_close($db);

        // Redirect to registerconf.html
        header('Location: registerconf.html?id='.$id);
        exit;
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
    <style>
        body {
            font-family: 'Bebas Neue';font-size: 22px;
        }
    </style>
    <title>Register - Create</title>
</head>
<body>
<div>
    <h1>Registreren</h1>

    <section>
        <form action="" method="post">
            <div>
                <div>
                    <label class="label" for="name">Last Name</label>
                </div>
                <div>
                    <div>
                        <div>
                            <input class="input" id="lastName" type="text" name="lastName" value="<?= $lastName ?? '' ?>"
                                   required/>
                        </div>
                        <p>
                            <?= $errors['lastName'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>


            <div>
                <div>
                    <label class="label" for="mail">E-mail</label>
                </div>
                <div>
                    <div>
                        <div>
                            <input class="input" id="mail" type="text" name="mail" value="<?= $mail ?? '' ?>"
                                   required/>
                        </div>
                        <p>
                            <?= $errors['mail'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

            <div>
                <label class="label" for="password">Password</label>
                    <div>
                        <input class="input" id="password" type="text" name="password" required/>
                    </div>
                    <p>
                        <?= $errors['password'] ?? '' ?>
                    </p>
            </div>
            <div>
                <button type="submit" name="submit" >Sign up</button>
            </div>
        </form>
    </section>
</div>


<a href="index.php">Ga terug</a>
</body>
</html>