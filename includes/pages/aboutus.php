<?php
/** @var Session $session */
if (!$session->keyExists('user')) {
    header('Location: login.php');
    exit;
}