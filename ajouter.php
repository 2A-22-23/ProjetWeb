<?php
include 'config.php';

if(isset($_POST['utilisateur']) && isset($_POST['code'])) {
    $utilisateur = $_POST['utilisateur'];
    $code = $_POST['code'];

    // Initialize the number of points to add to 0
    $points = 0;

    // Check that the length of the code is 8 characters long
    if(strlen($code) != 8) {
        echo "<p>Le code doit être composé de 8 chiffres.</p>";
        return;
    }

    // Vérifier le préfixe du code
    switch(substr($code, 0, 1)) {
        case 'P':
            // Si le code commence par un seul P, multiplier le dernier chiffre par 150
            if(substr($code, 0, 2) != 'PP') {
                $last_digit = substr($code, -1);
                $points += $last_digit * 15;
            }
            // Si le code commence par deux P, multiplier le dernier chiffre par 100
            else {
                $last_digit = substr($code, -1);
                $points += $last_digit * 10;
            }
            break;
        case 'M':
            // Si le code commence par M, multiplier le dernier chiffre par 200
            $last_digit = substr($code, -1);
            $points += $last_digit * 20;
            break;
        default:
            // Si le code ne commence ni par P ni par M, ne rien faire
            break;
    }

    // Mettre à jour le nombre de points de l'utilisateur correspondant dans la base de données
    $sql = "UPDATE gpoints SET points = points + :points WHERE id = :id";
    try {
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindParam(':points', $points);
        $query->bindParam(':id', $utilisateur);
        $query->execute();
        echo "success";
    } catch(Exception $e) {
        echo 'Error :' .$e->getMessage();
    }
}
?>