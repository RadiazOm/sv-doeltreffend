<?php
/** @var Session $session */
if (!$session->keyExists('user') || $session->get('user')->admin < 1) {
    header('Location: login.php');
    exit;
}

$db = new DatabaseSelector(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$reservation = $db->getReservationById($_GET['id']);

$weapons = $db->getWeapons();

$db =  new DatabaseInserter(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_POST['submit'])) {
    $formData = new Data($_POST);

    $reservation->weapon->id = $formData->getPostVar('weapon-id');
    $reservation->stance = $formData->getPostVar('stance');
    $reservation->time = $formData->getPostVar('time');
    $reservation->lane = $formData->getPostVar('lane');
    $reservation->date = $formData->getPostVar('date');

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