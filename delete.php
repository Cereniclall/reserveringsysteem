<?php
/** @var mysqli $db */

//make a connection with the database
require_once "includes/database.php";

// id uit GET halen
$id = $_GET['id'];

$query = "delete from reserveringen where id = $id";
mysqli_query($db, $query);

header('Location: reserveringen.php');
?>