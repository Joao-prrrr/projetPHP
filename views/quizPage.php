<!DOCTYPE html>
<html lang="fr">
<!-- 
Projet : Voila! Website
Détail : Quiz (formulaire)
Auteur : Joao Araribá
Date : 15.05.2022 v1
-->

<?php

    // Requires
    require_once("../controllers/quizController.php");

    
    // user's data
    $userData = [
        "username" => filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS),
        "birthdate" => filter_input(INPUT_POST, "birthdate", FILTER_SANITIZE_SPECIAL_CHARS)
    ];
    
    // quiz data
    $answers = [
        "utilityBoat_resp" => filter_input(INPUT_POST, 'premiereUtilite', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY),
        "forwardBoat_resp" => filter_input(INPUT_POST, 'avanceBateau', FILTER_SANITIZE_SPECIAL_CHARS),
        "otherName_resp" => filter_input(INPUT_POST, 'nautismeResponse', FILTER_SANITIZE_SPECIAL_CHARS),
        "speedUnity_resp" => strval(filter_input(INPUT_POST, 'uniteMesure', FILTER_SANITIZE_NUMBER_INT)),
        "nauticMiles_resp" => filter_input(INPUT_POST, 'millesNautique', FILTER_SANITIZE_SPECIAL_CHARS),
        "othersSailSports_resp" => filter_input(INPUT_POST, 'sportAutres', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY),
        "windSurfDirection_resp" => filter_input(INPUT_POST, 'directionPlanche', FILTER_SANITIZE_SPECIAL_CHARS),
        "foil_resp" => filter_input(INPUT_POST, 'systemeFoil', FILTER_SANITIZE_SPECIAL_CHARS),
        "wrongWord_resp" => filter_input(INPUT_POST, 'motInterdit', FILTER_SANITIZE_SPECIAL_CHARS)
    ];

    // User's comments
    $comment_resp = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);

    if($_SERVER["REQUEST_METHOD"] == "POST"){    
        $points = submitQuiz($userData, $answers, $comment_resp);
        // var_dump($answers);
    }

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A quiz about sail and nautism.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/quiz.css">
    <title>Quiz - Voila!</title>
</head>

<body>
    <header>
        <img src="img/logo1.png" alt="logo">
        <nav><a tabindex="0" href="index.html">Retour à l'accueil</a></nav>
    </header>

    <main>
        <form action="" method="POST">

            <fieldset>
                <legend>Petit sondage</legend>

                <ul>
                    <li>
                        <label for="name">Prénom :</label>
                        <input tabindex="1" id="name" name="name" type="text" value="<?= $userData['username'] ?>">
                    </li>

                    <li>
                        <label for="birthdate">Date de naissance</label>
                        <input tabindex="2" value="<?= isset($userData['birthdate']) ? $userData['birthdate'] : "2022-12-08" ?>" id="birthdate" name="birthdate" pattern="\d{4}-\d{2}-\d{2}" type="date">
                    </li>
                </ul>
            </fieldset>

            
            <h1 style="text-align:center; flex-basis:100%" id="start">Quizz!</h1>
            
            <?php if($_SERVER["REQUEST_METHOD"] == "POST" && !$errors){ ?>
                <p style="border-bottom: solid green 2px; text-align: center; font-size: 1.5em; margin:1em" > Vous avez eu <?= $points ?> point.s sur 9</p>
            <?php }?>

            <?php if($errors) include("errors.php"); ?>

            <fieldset>
                <legend>Quelles étaient les premières utilités du bateau à voile ?</legend>
                <ul>
                    <li class="liBasis100">
                        <input tabindex="3" type="checkbox" name="premiereUtilite[]" id="colonisations" value="colonisations" <?= $answers['utilityBoat_resp'] === null || !in_array("colonisations", $answers['utilityBoat_resp']) ? "" : "checked" ?> >
                        <label for="colonisations">Pour les colonisations</label>
                    </li>

                    <li class="liBasis100">
                        <input tabindex="4" type="checkbox" name="premiereUtilite[]" id="moyenTransport" value="moyenTransport" <?= $answers['utilityBoat_resp'] === null || !in_array("moyenTransport", $answers['utilityBoat_resp']) ? "" : "checked" ?>>
                        <label for="moyenTransport">Moyen de transport</label>
                    </li>
                    <li class="liBasis100">
                        <input tabindex="5" type="checkbox" name="premiereUtilite[]" id="fetes" value="fetes" <?= $answers['utilityBoat_resp'] === null || !in_array("fetes", $answers['utilityBoat_resp']) ? "" : "checked" ?>>
                        <label for="fetes">Faire des fêtes entre amis</label>
                    </li>

                    <li class="liBasis100">
                        <input tabindex="6" type="checkbox" name="premiereUtilite[]" id="cargaison" value="cargaison" <?= $answers['utilityBoat_resp'] === null || !in_array("cargaison", $answers['utilityBoat_resp']) ? "" : "checked" ?>>
                        <label for="cargaison">Cargaison</label>
                    </li>
                </ul>
                <!-- Quel unité utilise-t-on, dans un bateau, pour mesurer la distance? -->
                <!--  -->
            </fieldset>

            <fieldset>
                <legend>Comment avance un bateau à voile ?</legend>
                <!-- Comment avance un bateau à voile? -->
                <ul>
                    <li class="liBasis100">
                        <input tabindex="7" type="radio" name="avanceBateau" id="courants" value="courants" <?= $answers['forwardBoat_resp'] === "courants" ? "checked" : "" ?> >
                        <label for="courants">Les courants emportent le bateau</label>
                    </li>

                    <li class="liBasis100">
                        <input tabindex="8" type="radio" name="avanceBateau" id="tensionQuille" value="tensionQuille" <?= $answers['forwardBoat_resp'] === "tensionQuille" ? "checked" : "" ?>>
                        <label for="tensionQuille">Grâce à la tension du courant contre la quille</label>
                    </li>

                    <li class="liBasis100">
                        <input tabindex="9" type="radio" name="avanceBateau" id="depressionVoile" value="depressionVoile" <?= $answers['forwardBoat_resp'] === "depressionVoile" ? "checked" : "" ?>>
                        <label for="depressionVoile">Grâce à la dépression faite dans la voile par le vent</label>
                    </li>

                    <li class="liBasis100">
                        <input tabindex="10" type="radio" name="avanceBateau" id="dauphins" value="dauphins" <?= $answers['forwardBoat_resp'] === "dauphins" ? "checked" : "" ?>>
                        <label for="dauphins">Les dauphins poussent le bateau</label>
                    </li>
                </ul>
                <!-- Quel unité utilise-t-on, dans un bateau, pour mesurer la distance? -->
                <!--  -->
                <label for="nautismeResponse">Quel autre nom utilise-t-on quand on parle de bateau et navigation ?</label>
                <input tabindex="11" id="nautismeResponse" type="text" name="nautismeResponse" style="width: 50%;" value="<?= $answers['otherName_resp'] ?>" >
            </fieldset>

            <fieldset>
                <legend>Quelle unité de mesure utilise-t-on pour mesurer la vitesse ?</legend>

                <div id="lblRange">
                    <label for="uniteMesure">km/h</label>
                    <label for="uniteMesure">Milles</label>
                    <label for="uniteMesure">Noeuds</label>
                    <label for="uniteMesure">Milles nautiques</label>

                </div>
                <div id="rangeInput">
                    <input tabindex="12" type="range" name="uniteMesure" id="uniteMesure" value="<?= $_SERVER['REQUEST_METHOD'] === 'POST' ? $answers['speedUnity_resp'] : "0" ?>" min="0" max="3">
                </div>

                <div id="secondQuesiton">
                    <label for="millesNautique"><em>On dit pas des kilomètres, on dit des...</em></label>
                    <select tabindex="13" name="millesNautique" id="millesNautique">
                       <option <?= $answers['nauticMiles_resp'] === "milles" ? "selected" : "" ?> value="milles">Milles</option>
                       <option <?= $answers['nauticMiles_resp'] === "noeuds" ? "selected" : "" ?> value="noeuds"> Noeuds</option>
                       <option <?= $answers['nauticMiles_resp'] === "millesNautiques" ? "selected" : "" ?> value="millesNautiques">Milles Nautique</option>
                       <option <?= $answers['nauticMiles_resp'] === "metres" ? "selected" : "" ?> value="metres">Mètres</option>
                   </select>
                </div>
            </fieldset>

            <fieldset>
                <legend>Quels sont les autres sports qui utilisent le principe de la voile ?</legend>

                <ul class="row">
                    <li class="liBasis25">
                        <input tabindex="14" type="checkbox" name="sportAutres[]" id="surf" value="surf" <?= $answers['othersSailSports_resp'] === null || !in_array("surf", $answers['othersSailSports_resp']) ? "" : "checked" ?>>
                        <label for="surf">Surf</label>
                    </li>

                    <li class="liBasis25">
                        <input tabindex="15" value="kitesurf" type="checkbox" name="sportAutres[]" id="kitesurf" <?= $answers['othersSailSports_resp'] === null || !in_array("kitesurf",$answers['othersSailSports_resp']) ? "" : "checked" ?>>
                        <label for="kitesurf">Kitesurf</label>
                    </li>

                    <li class="liBasis25">
                        <input tabindex="16" value="foil" type="checkbox" name="sportAutres[]" id="foil" <?= $answers['othersSailSports_resp'] === null || !in_array("foil",$answers['othersSailSports_resp']) ? "" : "checked" ?>>
                        <label for="foil">Foil</label>
                    </li>

                    <li class="liBasis25">
                        <input tabindex="17" type="checkbox" name="sportAutres[]" id="skiNautique" value="skiNautique" <?= $answers['othersSailSports_resp'] === null || !in_array("skiNautique", $answers['othersSailSports_resp']) ? "" : "checked" ?>>
                        <label for="skiNautique">Ski Nautique</label>
                    </li>

                    <li class="liBasis25">
                        <input tabindex="18" value="plancheVoile" type="checkbox" name="sportAutres[]" id="plancheVoile" <?= $answers['othersSailSports_resp'] === null || !in_array("plancheVoile",$answers['othersSailSports_resp']) ? "" : "checked" ?>>
                        <label for="plancheVoile">Planche à voile</label>
                    </li>
                </ul>
            </fieldset>

            <fieldset>
                <legend>Comment on fait pour changer de direction sur une planche à voile ?</legend>

                <ul>
                    <li class="liBasis100">
                        <input tabindex="19" type="radio" name="directionPlanche" id="inclinaison" value="inclinaison" <?= $answers['windSurfDirection_resp'] === "inclinaison" ? "checked" : "" ?>>
                        <label for="inclinaison">En se penchant sur un des côtés</label>
                    </li>

                    <li class="liBasis100">
                        <input tabindex="20" type="radio" name="directionPlanche" id="mat" value="mat" <?= $answers['windSurfDirection_resp'] === "mat" ? "checked" : "" ?>>
                        <label for="mat">En changeant l'inclinaison du mât</label>
                    </li>
                    <li class="liBasis100">
                        <input type="radio" tabindex="21" name="directionPlanche" id="corps" value="corps" <?= $answers['windSurfDirection_resp'] === "corps" ? "checked" : "" ?>>
                        <label for="corps">En tournant notre corps puis la planche</label>
                    </li>

                    <li class="liBasis100">
                        <input type="radio" tabindex="22" name="directionPlanche" id="avecMains" value="avecMains" <?= $answers['windSurfDirection_resp'] === "avecMains" ? "checked" : "" ?>>
                        <label for="avecMains">Avec les mains</label>
                    </li>
                </ul>
            </fieldset>

            <fieldset>
                <legend>Comment s'appelle le nouveau système utilisé depuis quelques décennies ?</legend>

                <select tabindex="23" multiple name="systemeFoil" id="systemeFoil">
                    <option <?= $answers['foil_resp'] === "quille" ? "selected" : "" ?> value="quille">Une quille</option>
                    <option <?= $answers['foil_resp'] === "baume" ? "selected" : "" ?> value="baume">Une baume</option>
                    <option <?= $answers['foil_resp'] === "foil" ? "selected" : "" ?> value="foil">Un foil</option>
                    <option <?= $answers['foil_resp'] === "drisse" ? "selected" : "" ?> value="drisse">Une drisse</option>
                    <option <?= $answers['foil_resp'] === "surMat" ? "selected" : "" ?> value="surMat">Le mât</option>
                    <option value="hale-bas">Hale-bas</option>
                </select>
            </fieldset>

            <fieldset>
                <legend>Question bonus</legend>
                <label for="motInterdit">Quel est le mot qu'il ne faut surtout pas dire sur un bateau ?</label>
                <input tabindex="24" type="text" name="motInterdit" id="motInterdit" value="<?= $answers['wrongWord_resp'] ?>">
            </fieldset>

            <fieldset>
                <legend>Donnez nous votre avis :</legend>
                <textarea tabindex="25" name="comment" id="comment" cols="50" rows="5" placeholder="Merci pour votre commentaire!"><?= $comment_resp ?></textarea>
            </fieldset>

            <input tabindex="26" id="verifier" type="button" value="Verifier">
            <input type="submit" id="envoyer" tabindex="27" value="Envoyer">
            <input type="reset" tabindex="28" id="resetBtn" value="Recommencer">
        </form>
    </main>
    <footer>
        <p>&copy; Joao Araribá & Alexandre Sticher</p>
        <p>CFPT - Ecole d'Informatique</p>
    </footer>
    <script src="../scripts/quiz.js"></script>
    <?php if($_SERVER["REQUEST_METHOD"] == "POST" && !$errors){ ?>
        <script> afficheTout() </script>
    <?php }?>
</body>

</html>