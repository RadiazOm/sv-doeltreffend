<?php

require_once dirname(__FILE__) . '/index.php';

$monthsBack = 0;

$day = date('N', time() - 2628000 * $monthsBack);
$date = date('j', time() - 2628000 * $monthsBack);
$monthLength = date('t', time() - 2628000 * $monthsBack);

$day -= ($date % 7) - 1;

if ($day < 0) {
    $day = 7 + $day;
}

$id = $_GET['id'];

/**
 * @var Weapon[] $weapons
 */
$weapon = $weapons[$id];