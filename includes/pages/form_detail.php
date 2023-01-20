<?php
/** @var Session $session */
if (!$session->keyExists('user') || $session->get('user')->admin < 1) {
    header('Location: login.php');
    exit;
}

$db = new DatabaseSelector(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$form = $db->getFormById($_GET['id']);