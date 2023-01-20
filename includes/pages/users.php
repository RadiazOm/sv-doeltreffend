<?php
/** @var Session $session */
if (!$session->keyExists('user') || $session->get('user')->admin < 2) {
    header('Location: login.php');
    exit;
}

$db = new DatabaseSelector(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$usersClass = new Users();
$usersClass->setUsers($db->getUsers());

//Get variables for template
$users = $usersClass->getUsers();
$totalUsers = $usersClass->getTotalUsers();