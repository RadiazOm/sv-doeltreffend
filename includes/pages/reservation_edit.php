<?php
/** @var Session $session */
if (!$session->keyExists('user') || $session->get('user')->admin != 1) {
    header('Location: login.php');
    exit;
}

$db = new DatabaseSelector(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$reservation = $db->getReservationById($_GET['id']);

$weapons = $db->getWeapons();

$db =  new DatabaseInserter(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_POST['submit'])) {
    $reservation->weapon->id = $_POST['weapon-id'];
    $reservation->stance = $_POST['stance'];
    $reservation->time = $_POST['time'];
    $reservation->lane = $_POST['lane'];
    $reservation->date = $_POST['date'];

    $validator = new ReservationValidator($reservation);
    $validator->validate();
    $errors = $validator->getErrors();

    if (empty($errors)) {

        $db = new DatabaseInserter(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($db->updateReservationById($reservation, $_GET['id'])) {
            header('Location: index.php');
            exit();
        } else {
            $errors[] = 'Database error info: ' . $db->getConnection()->errorInfo()[0];
        }

    }

}