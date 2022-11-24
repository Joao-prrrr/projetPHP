<?php

require_once("../models/Quiz.php");

$errors = [];

function submitQuiz(array $userArray, array $answers, string $userComment) : int {
    verifySecurities($userArray, $answers, $userComment);
    $points = validateQuiz($answers);

    // add in db

    if(!$errors){
        
    }

    return $points;
}

/**
 * Verify if the inputs are safes.
 *
 * @param array $userArray - the user's array which contains user's informations.
 * @param array $answers - Answers of the quiz.
 * @param string $userComment - Uses comment about the quiz.
 * @return void
 */
function verifySecurities(array $userArray, array $answers, string $userComment) {
    global $errors;
    if(!$userArray["username"]) {
        array_push($errors, "The username must not be empty and must contains only letters.");
    }
    if(!$answers["otherName_resp"]){
        array_push($errors, "Responses must contains only letters.");
    }
    if(!$userComment) {
        array_push($errors, "The comment must constains only letters.");
    }
}

/**
 * Validate all the responses.
 *
 * @param array $answers - The users anwsers.
 * @return integer Returns the user's points.
 */
function validateQuiz(array $answers) : int{
    $correctResps = [
        "utilityBoat_resp" => ["colonisations", "cargaison"],
        "forwardBoat_resp" => "depressionVoile",
        "otherName_resp" => "nautisme",
        "mesurementUnit_resp" => 2,
        "nauticalMiles_resp" => "millesNautiques",
        "otherSports_resp" => ["kitesurf", "plancheVoile"],
        "windsurfDirection_resp" => "mat",
        "systemFoil_resp" => "foil",
        "nautism_resp" => "nautisme"
    ];

    $points = 0;
    foreach ($correctResps as $key => $correctResp) {
        # code...
        if($correctResp === $answers[$key]){
            $points++;
        }
    }

    return $points;
}
?>