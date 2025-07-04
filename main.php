<?php

$questions = [
    "Quelle est la couleur du cheval blanc d'Henri IV?\n1.Blanc\n2.Rouge\n3.Noir\n",
    "Date de la prise de la Bastille ?\n1.1750\n2.1789\n3.1800\n",
    "Quel est le plus grand océan du monde ?\n1.Océan Atlantique\n2.Océan Indien\n3.Océan Pacifique\n",
    "Qui a écrit Les Misérables ?\n1.Victor Hugo\n2.Emile Zola\n3.Marcel Proust\n",
    "Quelle est la capitale de l'Australie ?\n1.Sydney\n2.Melbourne\n3.Canberra\n"
];



$reponses = [1, 2, 3, 1, 3];
$score = 0;
$fichier = fopen("dernier_score.txt", "r");
$lscore = fgets($fichier);
$NB_QUESTIONS = count($questions);



echo "###################################################\n######## Qui veux gagner des millions ?! ##########\n###################################################\n\n###################################################\nScore : ". $score ."\n###################################################\n\n";


if ($fichier !== false){
    echo "Dernier score enregistré : ". rtrim($lscore, "\n") ."/50.\n\n";
}


for($i = 0; $i < $NB_QUESTIONS; $i++){
    echo "Question ". $i + 1 .":\n\n";
    echo $questions[$i]."\n";
    // Votre code
    $answer = trim(fgets(STDIN));
    if ($answer == $reponses[$i]){
        $score+=10;
        echo "\nSuspeeeeeense\n\nBonne réponse!\n\n*Le score augmente de 10*\n\n###################################################\nScore : ". $score ."\n###################################################\n\n";
    } else if (in_array($answer, $reponses)){
        echo "\nSuspeeeeeense\n\nMauvaise réponse...\n\n*Le score n'augmente pas...*\n\n###################################################\nScore : ". $score ."\n###################################################\n\n";
    } else{
        echo "\nT'es bourré ?\n\n";
        $i--;
    }
}

$pourcentage = $score * 2;
echo "########### GAME OVER ###########\nPourcentage de bonnes réponses : $pourcentage%\n\n";


if ($pourcentage >= 50){
    echo "Bien joué tu as gagné des millions !\n";
} else {
    echo "Arrête arrête c'est nwar, c'est nwar...\n";
}

$fichier = fopen("dernier_score.txt", "w");
fwrite($fichier, "$score\n");
fclose($fichier);