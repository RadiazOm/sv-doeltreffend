<?php
/** @var Session $session */
if (!$session->keyExists('user')) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['submit'])) {
    $form = new Form();

    $form->subject = $_POST['subject'];
    $form->date = date('Y') . '-' . date('n') . '-' . date('j');
    $form->time = date('H') . ':' . date('i');
    $form->question = $_POST['message'];
    // Don't have user table set up yet so i cant do this, therefore we defualt to user 1 :) lucky him
    $form->user = new User();
    $form->user = $session->get('user');

    $validator = new FormValidator($form);
    $validator->validate();
    $errors = $validator->getErrors();

    if (empty($errors)) {
        $db = new DatabaseInserter(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($db->addForm($form)) {
            header('Location: index.php');
            exit();
        } else {
            $errors[] = 'Database error info: ' . $db->getConnection()->errorInfo()[0];
        }
    }

}