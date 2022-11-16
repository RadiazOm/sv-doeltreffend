<?php

require_once 'settings.php';
require_once 'classes/Weapon.php';
require_once 'classes/Arsenal.php';

try {
    $weaponsRawData = file_get_contents(DATA_PATH . 'weapons.json');
    $weaponsRawList = json_decode($weaponsRawData, true);

    $arsenal = new Arsenal();
    foreach ($weaponsRawList as $weaponsRaw) {
        $arsenal->addWeapon($weaponsRaw);
    }

    $weapens = $arsenal->getWeapons();

} catch (Exception $e) {
    $error = 'Oops, something went wrong: ' .
        $e->getMessage() . ' on line ' .
        $e->getLine() . 'of' .
        $e->getFile();
}
