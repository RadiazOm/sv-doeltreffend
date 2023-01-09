<?php

/** @var Session $session */
if ($session->keyExists('user')) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['submit'])) {

    $knsa = $_POST['knsa'];
    $password = $_POST['password'];

    try {
        $user = User::getByKNSA($knsa, $connection);
    } catch (\Exception $e) {
        $user = new User();
    }

    $validator = new LoginValidator($user, $password);
    $validator->validate();
    $errors = $validator->getErrors();

    if (isset($user) && empty($errors)) {
        $session->set('user', $user);
        header('Location: index.php');
        exit;
    }

}