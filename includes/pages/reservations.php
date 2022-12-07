<?php

$query = "SELECT * FROM reservations";

$reservationsFromDB = $connection->query($query)
    ->fetchAll(PDO::FETCH_CLASS, '\\Reservation');

//Create new instance of MusicCollection & add albums
$reservationsClass = new Reservations();
$reservationsClass->setReservations($reservationsFromDB);

//Get formatted albums objects & total
$reservations = $reservationsClass->getReservations();
$totalReservations = $reservationsClass->getTotalReservations();