<?php

require_once 'settings.php';
require_once 'classes/Utils/Session.php';
require_once 'classes/Utils/Data.php';
require_once 'classes/Users/User.php';
require_once 'classes/Date/Date.php';
require_once 'classes/interfaces/Validator.php';
require_once 'classes/Reservation/ReservationValidator.php';
require_once 'classes/Form/FormValidator.php';
require_once 'classes/Users/LoginValidator.php';
require_once 'classes/Users/RegisterValidator.php';
require_once 'classes/Users/UserValidator.php';
require_once 'classes/Database/Database.php';
require_once 'classes/Database/DatabaseEraser.php';
require_once 'classes/Database/DatabaseSelector.php';
require_once 'classes/Database/DatabaseInserter.php';
require_once 'classes/Form/Form.php';
require_once 'classes/Form/Forms.php';
require_once 'classes/Weapon/Weapon.php';
require_once 'classes/Weapon/Arsenal.php';
require_once 'classes/Reservation/Reservations.php';
require_once 'classes/Reservation/Reservation.php';

//Set variable for errors
$errors = [];

$session = new Session();


try {
    $db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $connection = $db->getConnection();

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
