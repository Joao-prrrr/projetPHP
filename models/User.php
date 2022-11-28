<?php

require_once("../db.php");

/**
 * Undocumented function
 *
 * @param array $userInfo
 * @param integer $points
 * @return array Returns an array if there is errors and returns bool if not. 
 */
function InsertUser(array $userInfo, int $points) : bool | array {
    $errors = verifySecurityUser($userInfo);
    global $db;

    if(!$errors){
        $sqlQuery = "INSERT INTO voilaSiteWeb.user (fname, birthdate, points) VALUES (:username, :birthdate, :points)";
    
        $statement = $db->prepare($sqlQuery);

        $params = [":username" => $userInfo["username"], ":birthdate" => $userInfo["birthdate"], ':points' => $points];
       $statementStats = $statement->execute($params);

       if(!$statementStats) {
           return "Can't connect to the datebase. Try again later.";
       } else return false;
    } else {
        return $errors;
    }
}

/**
 * Verify if the inputs are safes.
 *
 * @param array $userArray - the user's array which contains user's informations.
 * @return array $errors - Errors list if there are.
 */
function verifySecurityUser(array $userArray) : array {
    $errors = [];
    if(!$userArray["username"]) {
        array_push($errors, "The username must not be empty and must contains only letters.");
    }
    return $errors;
}
