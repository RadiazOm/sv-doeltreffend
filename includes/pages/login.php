<?php

/** @var Session $session */
if ($session->keyExists('user')) {
    header('Location: index.php');
    exit;
}