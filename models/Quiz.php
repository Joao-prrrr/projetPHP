<?php

require_once("../db.php");

/**
 * Insert the answers into the database.
 *
 * @param array $answers - A array with all the user's answers.
 * @return array - Return the errors if there are.
 */
function InsertAnswers(array $answers, string $userComment) : bool | array {
    $err = verifySecuritiesAnswers($answers, $userComment);

    if(!$err){

        $db = connectionBdd();
        // $userId = 8;
        $userId = $db->lastInsertId();
    
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
    
        $params = [':responsesDate' => date("Y-m-d H:i:s"), ":fk_userId" => intval($userId)];
        foreach($answers as $key => $answer) {
            $params[":$key"] = $answer;
        }
        $params[':comments_resp'] = $userComment;
    
        $statementStats =  $statement->execute($params);

        if(!$statementStats) {
            return "Can't connect to the database. Try again later.";
        }else return false;
    } else {
        return $err;
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
    $containsErr = false;

    foreach ($answers as $key => $resps) {
        # code...
        if($resps === "" || !$resps)
        $containsErr = true;
    }
    if($containsErr) array_push($errors, "Responses must not be empty.");
    return $errors;
}