<?php

require_once("../db.php");

/**
 * Insert the answers into the database.
 *
 * @param array $answers - A array with all the user's answers.
 * @return array - Return the errors if there are..
 */
function InsertAnswers(array $answers, string $userComment) : string | array {
    $errors = verifySecuritiesAnswers($answers, $userComment);

    if(!$errors){

        global $db;
        $userId = 8;
        // $userId = $db->lastInsertId();
    
        $sqlQuery = "INSERT INTO voilaSiteWeb.quizReponses
        (responsesDate,
        fk_userId,
        utilityBoat_resp,
        forwardBoat_resp,
        otherName_resp,
        speedUnity_resp,
        nauticMiles_resp,
        othersSailSports_resp,
        windSurfDirection_resp,
        foil_resp,
        nautism_resp,
        comments_resp) VALUES
        (
        :responsesDate,
        :fk_userId,
        :utilityBoat_resp,
        :forwardBoat_resp,
        :otherName_resp,
        :speedUnity_resp,
        :nauticMiles_resp,
        :othersSailSports_resp,
        :windSurfDirection_resp,
        :foil_resp,
        :nautism_resp,
        :comments_resp
        )";
    
        $statement = $db->prepare($sqlQuery);
    
        $params = [':responsesDate' => time(), ":fk_userId," => $userId];
        foreach($answers as $key => $answer) {
            $params[":$key"] = $answer;
        }
        $params[':comments_resp'] = $userComment;
    
        $statementStats =  $statement->execute($params);

        if(!$statementStats) {
            return "Can't connect to the database. Try again later.";
        }else return false;
    } else {
        return $errors;
    }

}

/**
 * Verify if the inputs are safes.
 *
 * @param array $answers - Answers of the quiz.
 * @param string $userComment - Uses comment about the quiz.
 * @return void
 */
function verifySecuritiesAnswers(array $answers, string $userComment) {
    $errors = [];
    if(!$answers["otherName_resp"]){
        array_push($errors, "Responses must contains only letters.");
    }
    if(!$userComment) {
        array_push($errors, "The comment must constains only letters.");
    }
    return $errors;
}