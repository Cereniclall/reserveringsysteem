<?php

$host       = "localhost";
$database   = "Reservering_data";
$user       = "root";
$password   = "";

//This makes a connection with the MyAdmin database
$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());;