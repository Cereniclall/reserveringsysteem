<?php

session_start();
if (isset ($_SESSION['loggedInUser'])){
    header("Location: reserveringen.php");
    exit;
}

$name=$_SESSION["loggedInUser"]['lastName'];

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
    <title>Secure page</title>
</head>
<body>
<section class="section">
    <div>

        <article>
            <div>
                <div>
                    <h2>
                        Welcome
                    </h2>
                    <p>
                        This is a secure page. You have to log in to see this page.
                    </p>

                    <a class="button" type="button" href="login.php">Log in</a>
                </div>
            </div>
        </article>
    </div>
</section>
</body>
</html>