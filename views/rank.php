<?php
/**
 * Project : Ranking page for the quiz.
 * Author : Joao Araribá
 * Date : 15.12.2022 v1
 */
require_once("../controllers/quizController.php");

$rank = getRanking();
// var_dump($rank);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/quiz.css">
    <link rel="stylesheet" href="css/rank.css">

    <title>Ranking</title>
</head>
<body>
    <header>
        <img src="img/logo1.png" alt="logo">
        <nav><a tabindex="0" href="index.html">Retour à l'accueil</a></nav>
    </header>
    <main>
        <section>
            <h1>Ranking</h1>
            <table>
                <thead>
                    <tr>
                        <td>Joueur</td>
                        <td>Points</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($rank as $key => $userData) { 
                        if($i === 0) {?>
                        <tr class="first">
                            <td><?= $userData["fname"] ?></td>
                            <td><?= $userData["points"] ?></td>
                        </tr>
                        <?php } elseif ($i < 3 && $i > 0){?>
                        <tr class="<?= $i===1? "seconde":"third"?>">
                            <td><?= $userData["fname"] ?></td>
                            <td><?= $userData["points"] ?></td>
                        </tr>    
                        <?php } else{?>
                        <tr>
                            <td><?= $userData["fname"] ?></td>
                            <td><?= $userData["points"] ?></td>
                        </tr>
                    <?php } $i++;} ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p tabindex="16">&copy; Joao Araribá</p>
        <p tabindex="17">CFPT - Ecole d'Informatique</p>
    </footer>
</body>
</html>