<?php
$errors = [];

require_once("../models/Quiz.php");
require_once("../models/User.php");


function submitQuiz(array $userArray, array $answers, string $userComment) : int {
    
    $points = validateQuiz($answers);
    $insertErrors = InsertUser($userArray, $points);
    $insertAnswersErrors = InsertAnswers($answers, $userComment);

    if(count($insertErrors) > 0) {
        array_push($errors, $insertErrors);
    }
    if(count($insertAnswersErrors) > 0) {
        array_push($errors, $insertAnswersErrors);
    }

    return $points;
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