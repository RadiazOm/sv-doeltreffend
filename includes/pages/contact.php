<?php

if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $date = date('Y') . '-' . date('n') . '-' . date('j');
    $time = date('H') . ':' . date('i');
    $message = $_POST['message'];
    // Don't have user table set up yet so i cant do this, therefore we defualt to user 1 :) lucky him
    $user_id = '1';

    $query = "INSERT INTO forms (subject, date, time, question, user_id) VALUES ('$subject', '$date', '$time', '$message', '$user_id')";
    print_r($query);

    $result = $connection->query($query)
        or die('Error: with query ' . $query . ' :(');

    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        $errors[] = 'Error: something has gone terribly wrong :(';
    }

}