<?php

require_once dirname(__FILE__) . '/form_detail.php';

if (isset($_POST['submit'])) {

    $id = $_GET['id'];

    //Init the database
    $db = new DatabaseEraser(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    /***
     * @throws Exception
     */
    try {
        $result = $db->deleteFormById($id);
        if ($result) {
            header('Location: forms.php');
            exit();
        }
    } catch (\PDOException $e) {
        throw new Exception('DB Connection failed: ' . $e->getMessage() . 'noob');
    }
}
