<?php
$errors = [];

require_once("../models/Quiz.php");
require_once("../models/User.php");


function submitQuiz(array $userArray, array $answers, string $userComment) : int {
    global $errors;

    $points = validateQuiz($answers);

    foreach ($answers as $key => $resp) {
        try {
            //code...
            if($key === "utilityBoat_resp" || $key === "othersSailSports_resp"){
                if(count($resp) == 2)
                $answers[$key] = $resp[0].", ".$resp[1];
                else if(count($resp) == 3)
                $answers[$key] = $resp[0].", ".$resp[1].", ".$resp[2];
                else if(count($resp) == 4)
                $answers[$key] = $resp[0].", ".$resp[1].", ".$resp[2].", ".$resp[3];
                else
                $answers[$key] = $resp[0];
                
            }
        } catch (\Throwable $th) {
            //throw $th;
            $answers[$key] = "";
        }
    }

    $insertErrors = InsertUser($userArray, $points);
    $insertAnswersErrors = InsertAnswers($answers, $userComment);

    if($insertErrors) {
        foreach ($insertErrors as $key => $value) {
            # code...
            array_push($errors, $value);
        }
    }
    if($insertAnswersErrors) {
        foreach ($insertAnswersErrors as $key => $value) {
            # code...
            array_push($errors, $value);
        }
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
        "utilityBoat_resp" => [0 => "colonisations", 1 => "cargaison"],
        "forwardBoat_resp" => "depressionVoile",
        "otherName_resp" => "nautisme",
        "speedUnity_resp" => "2",
        "nauticMiles_resp" => "millesNautiques",
        "othersSailSports_resp" => [0 => "kitesurf", 1 => "plancheVoile"],
        "windSurfDirection_resp" => "mat",
        "foil_resp" => "foil",
        "wrongWord_resp" => "corde"
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

function getRanking() : array{
    return getUsersRanking();
}

?>