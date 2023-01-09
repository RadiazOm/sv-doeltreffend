<?php
/** @var Session $session */
if (!$session->keyExists('user')) {
    header('Location: login.php');
    exit;
}

// If you read this have a nice day :)

$db = new DatabaseSelector(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$arsenal = new Arsenal();
$arsenal->setWeapons($db->getWeapons());

//Get formatted albums objects & total
$weapons = $arsenal->getWeapons();
$totalWeapons = $arsenal->getTotalWeapons();
