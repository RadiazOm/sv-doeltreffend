<?php
/** @var Session $session */
if (!$session->keyExists('user')) {
    header('Location: login.php');
    exit;
}

$user = $session->get('user');

$db = new DatabaseSelector(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$reservationsClass = new Reservations();
$reservationsClass->setReservations($db->getReservationsByName($user->first_name));

//Get variables for template
$reservations = $reservationsClass->getReservations();
$totalReservations = $reservationsClass->getTotalReservations();


