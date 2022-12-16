<?php

$db = new DatabaseSelector(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$weapon = $db->getWeaponById($_GET['id']);

/**
 * @var Weapon[] $weapons
 */
// make calendar
if (isset($_GET['date'])) {
    $monthsBack = $_GET['month'];
    $date = $_GET['date'];
} else {
    $monthsBack = 0;
    $date = date('j', time() - 2628000 * $monthsBack);
}

$monthLength = date('t', time() - 2628000 * $monthsBack);
$month = date('F', time() - 2628000 * $monthsBack);
$day = Date::getWeekday($monthsBack, $date);
// end making calendar

if (isset($_POST['submit'])) {
    $reservation = new Reservation();
    $reservation->weapon_id = $weapon->id;
    $reservation->stance = $_POST['stance'];
    $reservation->time = $_POST['time'];
    $reservation->lane = $_POST['lane'];
    $reservation->user_id = '1';
    $reservation->date = date('y', time() - 2628000 * $monthsBack) . '-' . date('n', time() - 2628000 * $monthsBack) . '-' . $date;

    $validator = new ReservationValidator($reservation);
    $validator->validate();
    $errors = $validator->getErrors();

    if (empty($errors)) {

        $db = new DatabaseInserter(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($db->addReservation($reservation)) {
            header('Location: index.php');
            exit();
        } else {
            $errors[] = 'Database error info: ' . $db->getConnection()->errorInfo()[0];
        }

    }

}