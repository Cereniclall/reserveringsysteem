<?php

/** @var mysqli $db */

//check if the data is correct and filled in, when not, show an error
$errors = [];
if ($firstName == "") {
    $errors['firstName'] = 'name cannot be empty';
}
if ($lastName == "") {
    $errors['lastName'] = 'name cannot be empty';
}
if ($mail == "") {
    $errors['mail'] = 'e-mail cannot be empty';

}
if ($date == "") {
    $errors['date'] = 'date cannot be empty';
}

if ($time == "") {
    $errors['time'] = 'time cannot be empty';
}

if ($persons == "") {
    $errors['persons'] = 'amount of people cannot be empty';
}

?>