<?php

/** @var Session $session */
if ($session->keyExists('user')) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['submit'])) {

    $newUser = new User();
    $newUser->first_name = $_POST['first-name'];
    $newUser->last_name = $_POST['last-name'];
    $newUser->knsa = $_POST['knsa'];
    $newUser->password = $_POST['password'];
    $newUser->phone = $_POST['phone'];
    $newUser->email = $_POST['email'];

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
