<?php

$query = "SELECT * FROM forms ORDER BY date, time";

$formsFromDB = $connection->query($query)
    ->fetchAll(PDO::FETCH_CLASS, '\\Form');

$formClass = new Forms();
$formClass->setForms($formsFromDB);

//Get variables for template
$forms = $formClass->getForms();

$totalForms = $formClass->getTotalForms();

