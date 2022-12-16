<?php

$db = new DatabaseSelector(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$form = $db->getFormById($_GET['id']);