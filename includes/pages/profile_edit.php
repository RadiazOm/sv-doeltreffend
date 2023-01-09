<?php
/** @var Session $session */
if (!$session->keyExists('user')) {
    header('Location: login.php');
    exit;
}

$user = $session->get('user');

if (isset($_POST['submit'])) {
    $formData = new Data($_POST);

    $newUser = new User();
    $newUser->first_name = $formData->getPostVar('first-name');
    $newUser->last_name = $formData->getPostVar('last-name');
    $newUser->password = $formData->getPostVar('password');
    $newUser->knsa = $session->get('user')->knsa;
    $newUser->phone = $formData->getPostVar('phone');
    $newUser->email = $formData->getPostVar('email');

    $validator = new UserValidator($newUser, $user);
    $validator->validate();
    $errors =  $validator->getErrors();

    if (isset($user) && empty($errors)) {
        if ($newUser->password != '') {
            $newUser->password = password_hash($newUser->password, PASSWORD_DEFAULT);
        } else {
            $newUser->password = $user->password;
        }
        try {
            $success = User::create($newUser, $connection);
            header('Location: login.php');
            exit;
        } catch (\Exception $e) {
            $errors[] = 'Something went wrong :(';
        }

    }
}
