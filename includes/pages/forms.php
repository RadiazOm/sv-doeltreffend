<?php
/** @var Session $session */
if (!$session->keyExists('user') || $session->get('user')->admin != 1) {
    header('Location: login.php');
    exit;
}

$db = new DatabaseSelector(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$formClass = new Forms();
$formClass->setForms($db->getForms());

//Get variables for template
$forms = $formClass->getForms();
$totalForms = $formClass->getTotalForms();


if (isset($_GET['query'])) {
    if (isset($_GET['filter'])) {
        switch ($_GET['filter']) {
            case 'subject':
            case 'user_id':
            case 'date':
            case '':
                break;
            default:
                $errors[] = 'Invalid filter parameter';
                break;
        }
        if (empty($errors)) {
            $formClass->setForms($db->getFormsByQuestion($_GET['query'], $_GET['filter']));

            $forms = $formClass->getForms();
            $totalForms = $formClass->getTotalForms();
            if ($totalForms <= 0) {
                $errors[] = 'No forms found';
            }
        }
    }
}