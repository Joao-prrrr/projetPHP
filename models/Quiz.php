<?php

require_once("../db.php");
global $db;


/**
 * Insert a user in the datebase
 *
 * @param array $userInfo - user's info array
 * @return boolean - true or false if it's done correctly
 */
function InsertUser(array $userInfo) : bool{
    $sqlQuery = "INSERT INTO voilaSiteWeb.user (fname, birthdate) VALUES (:username, :birthdate)";

    $statement = $db->prepare($sqlQuery);

    $params = [":username" => $userInfo["username"], ":birthdate" => $userInfo["birthdate"]];
    $statement->execute($params);
}

function InsertAnswers(array $answers) : bool {
    $userId = $db->lastInsertId();

    $sqlQuery = "INSERT INTO voilaSiteWeb.quizResponses
    (`responsesDate`,
    `fk_userId`,
    `utilityBoat_resp`,
    `forwardBoat_resp`,
    `otherName_resp`,
    `speedUnity_resp`,
    `knots_resp`,
    `othersSailSports_resp`,
    `windSurfDirection_resp`,
    `foil_resp`,
    `nautism_resp`,
    `comments_resp`) VALUES
    (:responsesDate,
    :fk_userId,
    :utilityBoat_resp,
    :forwardBoat_resp,
    :otherName_resp,
    :speedUnity_resp,
    :knots_resp,
    :othersSailSports_resp,
    :windSurfDirection_resp,
    :foil_resp,
    :nautism_resp,
    :comments_resp
    )";

    $statement = $db->prepare($sqlQuery);

    $params = [
        ":responsesDate" => time(),
        ":fk_userId," => $userId,
        ":utilityBoat_resp" => $answers["utilityBoat_resp"],
        ":forwardBoat_resp" => $answers["forwardBoat_resp"],
        ":otherName_resp" => $answers["otherName_resp"],
        ":speedUnity_resp" => $answers["speedUnity_resp"],
        ":knots_resp" => $answers["knots_resp"]
];
    $statement->execute($params);
}