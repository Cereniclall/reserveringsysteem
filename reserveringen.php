<?php

//database connection
/** @var mysqli $db */

require_once "includes/database.php";


//Get the result set from the database with a SQL query
$query = "SELECT * FROM reserveringen";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);

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
        <title>Log in</title>
        <meta/>
        <link rel="stylesheet" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
        <style>
            body {
                font-family: 'Bebas Neue';font-size: 22px;
            }
        </style>
    </head>


<body>

<div>
    <h1>Reserveringen</h1>
    <hr>
    <div>
        <table  id="customers">
            <thead>
        <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>E-mail</th>
            <th>Date</th>
            <th>Time</th>
            <th>Persons</th>
            <th>Number</th>
            <th></th>
            <th></th>

        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="11">&copy; Kumpir Corner</td>
        </tr>
        </tfoot>
        <tbody>
        <?php foreach ($reserveringen as $index => $reservering) { ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $reservering['firstName'] ?></td>
                <td><?= $reservering['lastName'] ?></td>
                <td><?= $reservering['mail'] ?></td>
                <td><?= $reservering['date'] ?></td>
                <td><?= $reservering['time'] ?></td>
                <td><?= $reservering['persons'] ?></td>
                <td><?= $reservering['number'] ?></td>
                <td><a href="details.php?id=<?= $reservering['id'] ?>">Details</a></td>
                <td><a href="edit.php?id=<?= $reservering['id'] ?>">Edit</a></td>
                <td><a href="delete.php?id=<?= $reservering['id'] ?>">Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<div>
    <a href="index.php">GA TERUG </a>
</div>
</body>

</html>
