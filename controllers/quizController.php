<?php

// Correct answers
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