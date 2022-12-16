<?php
$db = new DatabaseSelector(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$reservationsClass = new Reservations();
$reservationsClass->setReservations($db->getReservations());

//Get variables for template
$reservations = $reservationsClass->getReservations();
$totalReservations = $reservationsClass->getTotalReservations();

if (isset($_GET['query'])) {
    if (isset($_GET['filter'])) {
        switch ($_GET['filter']) {
            case 'weapon_id':
            case 'user_id':
            case 'date':
            case '':
                break;
            default:
                $errors[] = 'Invalid filter parameter';
                break;
        }
        if (empty($errors)) {
            $reservationsClass->setReservations($db->getReservationsByName($_GET['query'], $_GET['filter']));

            $reservations = $reservationsClass->getReservations();
            $totalReservations = $reservationsClass->getTotalReservations();
            if ($totalReservations <= 0) {
                $errors[] = 'No reservations found';
            }
        }
    }
}