<?php

require_once("constants.php");

/**
 * Connect to the database
 *
 * @return PDO - PDO object (db connection)
 */
function connectionBdd() : PDO {
    static $pdo = null;

    if($pdo === null) {
        $dsn = "mysql:host=".BDD_HOST.";dbname=".BDD_NAME.";charset=".BDD_CHARSET;
        
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        $pdo = new PDO($dsn, BDD_UTILISATEUR, BDD_MOT_DE_PASSE, $options);
    }
    return $pdo;
}

$db = connectionBdd();