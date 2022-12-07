<?php

$query = "SELECT * FROM weapons";

$weaponsFromDB = $connection->query($query)
    ->fetchAll(PDO::FETCH_CLASS, '\\Weapon');

//Create new instance of MusicCollection & add albums
$arsenal = new Arsenal();
$arsenal->setWeapons($weaponsFromDB);

//Get formatted albums objects & total
$weapons = $arsenal->getWeapons();
$totalWeapons = $arsenal->getTotalWeapons();


