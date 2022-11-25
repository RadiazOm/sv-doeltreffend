<?php

$weaponsRaw = file_get_contents(DATA_PATH . 'weapons.json');
$weaponRawList = json_decode($weaponsRaw, true);

//Create new instance of MusicCollection & add albums
$arsenal = new Arsenal();
foreach ($weaponRawList as $weaponRaw) {
    $arsenal->addWeapon($weaponRaw);
}

//Get formatted albums objects & total
$weapons = $arsenal->getWeapons();
$totalWeapons = $arsenal->getTotalWeapons();


