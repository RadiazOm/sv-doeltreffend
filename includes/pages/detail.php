<?php

require_once dirname(__FILE__) . '/index.php';

$id = $_GET['id'];

/**
 * @var Weapon[] $weapons
 */
$weapon = $weapons[$id];

if (isset($_GET['date'])) {
    $monthsBack = $_GET['month'];
    $date = $_GET['date'];
} else {
    $monthsBack = 0;
}

$day = date('N', time() - 2628000 * $monthsBack);
$date = date('j', time() - 2628000 * $monthsBack);
$monthLength = date('t', time() - 2628000 * $monthsBack);
$month = date('F', time() - 2628000 * $monthsBack);

$day -= ($date % 7) - 1;

if ($day < 0) {
    $day = 7 + $day;
}

if (isset($_POST['submit'])) {
    $stance = $_POST['stance'];
    $time = $_POST['time'];
    $lane = $_POST['lane'];
    // Don't have user table set up yet, so I can't do this, therefore we default to user 1 :) lucky him
    $user_id = '1';

    $today = date('y', time() - 2628000 * $monthsBack) . '-' . date('n', time() - 2628000 * $monthsBack) . '-' . $date;


    $query = "INSERT INTO reservations (weapon_id, lane, stance, date, time, user_id) VALUES ('$id', '$lane', '$stance', '$today', '$time', '$user_id')";

    $result = $connection->query($query)
    or die('Error: with query ' . $query . ' :(');

    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        $errors[] = 'Error: something has gone terribly wrong :(';
    }

}