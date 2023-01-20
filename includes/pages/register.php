<?php

/** @var Session $session */
if ($session->keyExists('user')) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['submit'])) {
    $formData = new Data($_POST);

    $newUser = new User();
    $newUser->first_name = $formData->getPostVar('first-name');
    $newUser->last_name = $formData->getPostVar('last-name');
    $newUser->knsa = $formData->getPostVar('knsa');
    $newUser->password = $formData->getPostVar('password');
    $newUser->phone = $formData->getPostVar('phone');
    $newUser->email = $formData->getPostVar('email');

    try {
        $user = User::getByKNSA($newUser->knsa, $connection);
    } catch (\Exception $e) {
        $user = new User();
    }

    $validator = new RegisterValidator($newUser, $user);
    $validator->validate();
    $errors = $validator->getErrors();



    if (isset($user) && empty($errors)) {
        $newUser->password = password_hash($newUser->password, PASSWORD_DEFAULT);
        try {
            $success = User::create($newUser, $connection);
            header('Location: login.php');
            exit;
        } catch (\Exception $e) {
            $errors[] = 'Something went wrong :(';
        }

    }
}
