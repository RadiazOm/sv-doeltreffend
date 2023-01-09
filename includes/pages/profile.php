<?php
/** @var Session $session */
if (!$session->keyExists('user')) {
    header('Location: login.php');
    exit;
}

$user = $session->get('user');
