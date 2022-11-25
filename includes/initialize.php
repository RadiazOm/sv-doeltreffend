<?php

require_once 'settings.php';
require_once 'classes/Weapon.php';
require_once 'classes/Arsenal.php';
require_once 'classes/Reservations.php';
require_once 'classes/Reservation.php';

//Set variable for errors
$errors = [];

try {
    //Get current filename to load a specific piece of code
    $pathParts = explode('/', $_SERVER['SCRIPT_NAME']);
    $currentFile = dirname(__FILE__) . '/pages/' . $pathParts[count($pathParts) - 1];
    require_once $currentFile;
} catch (Exception $e) {
    //Set error
    $errors[] = 'Oops, try to fix your error please: ' . $e->getMessage() . ' on line ' . $e->getLine() . ' of ' . $e->getFile();
}


//function encode_to_JSON($data)
//{
//    $newWeaponsRawData = json_encode($data);
//    file_put_contents(DATA_PATH . 'weapons.json', $newWeaponsRawData);
//}
//
//function object_to_array($data)
//{
//    if (is_array($data) || is_object($data))
//    {
//        $result = [];
//        foreach ($data as $key => $value)
//        {
//            $result[$key] = (is_array($value) || is_object($value)) ? object_to_array($value) : $value;
//        }
//        return $result;
//    }
//    return $data;
//}
