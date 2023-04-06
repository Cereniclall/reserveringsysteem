<?php
session_start();

$login = false;
// Is user logged in?
if (isset($_SESSION['loggedInUser'])) {
    $login = true;
}

if (isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "includes/database.php";

    // Get form data
    $mail = mysqli_escape_string($db, $_POST['mail']);
    $password = $_POST['password'];

    // Server-side validation
    $errors = [];
    if ($mail == '') {
        $errors['mail'] = 'Vul je email in.';
    }
    if ($password == '') {
        $errors['password'] = 'Vul je wachtwoord in.';
    }

    // If data valid
    if (empty($errors)) {
        // SELECT the user from the database, based on the email address.
        $query = "SELECT * FROM register WHERE mail='$mail'";
        $result = mysqli_query($db, $query);

        // check if the user exists
        if (mysqli_num_rows($result) == 1) {
            // Get user data from result
            $register = mysqli_fetch_assoc($result);

            // Check if the provided password matches the stored password in the database
            if (password_verify($password, $register['password'])) {
                $login = true;

                // Store the user in the session
                $_SESSION['loggedInUser'] = [
                    'id'    => $register['id'],
                    'name'  => $register['name'],
                    'mail' => $register['mail'],
                ];

                // Redirect to secure page
            } else {
                //error incorrect log in
                $errors['loginFailed'] = 'De ingevulde gegevens komen niet overeen.';
            }
        } else {
            //error incorrect log in
            $errors['loginFailed'] = 'De ingevulde gegevens komen niet overeen.';
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <head>
        <title>Log in</title>
        <meta/>
        <link rel="stylesheet" href="register.css">
        <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
        <style>
            body {
                font-family: 'Bebas Neue';font-size: 22px;
            }
        </style>
</head>


<body>
<section>
    <div class="container">
        <h2>Log in</h2>

        <?php if ($login) { ?>
            <p>Je bent ingelogd!</p>
            <p><a href="logout.php">Uitloggen</a> / <a href="secure.php">Naar secure page</a></p>
        <?php } else { ?>

            <section>
                <form action="" method="post">

                    <div>
                        <div>
                            <label class="label" for="mail">Email</label>
                        </div>
                        <div>
                            <div>
                                <div>
                                    <input class="input" id="mail" type="text" name="mail" value="<?= $mail ?? '' ?>" />
                                    <span><i class="fas fa-envelope"></i></span>
                                </div>
                                <p>
                                    <?= $errors['mail'] ?? '' ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="password">Password</label>
                        </div>
                        <div>
                            <div>
                                <div>
                                    <input class="input" id="password" type="password" name="password"/>
                                    <span><i class="fas fa-lock"></i></span>

                                    <?php if(isset($errors['loginFailed'])) { ?>
                                        <div>
                                            <button class="delete"></button>
                                            <?=$errors['loginFailed']?>
                                        </div>
                                    <?php } ?>

                                </div>
                                <p>
                                    <?= $errors['password'] ?? '' ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div></div>
                        <div>
                            <button type="submit" name="submit">Log in With Email</button>
                        </div>
                    </div>

                </form>
            </section>

        <?php } ?>

    </div>
</section>
</body>
<footer class="terug">
    <a href="index.php">&laquo; Ga terug</a>
</footer>
</html>
