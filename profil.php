<?php

//Inclusion de la fonction isConnected()
require 'parts/functions.php';

//Nécessaire pour pouvoir utiliser les variables de session
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title>Profil</title>
</head>
<body>

    <div class="container-fluid">
        <?php include 'parts/menu.php'; ?>

        <div class="container">
            <div class="row">
                <h1 class="text-center col-12 mt-5">Mon Profil</h1>
            </div>
            <?php

            //si l'utilisateur ou l'admnistrateur est bien connecté, on affiche les informations enregistré pendant la connexion
            if(isConnected()){
                if($_SESSION['user']['admin'] == 1){
                    $status = 'administrateur';
                } elseif ($_SESSION['user']['admin'] == 0){
                    $status = 'utilisateur';
                }

                if($_SESSION['user']['register_date']){
                    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                    $currentTime = strftime('%A %d %B %Y, %Hh %Mm %Ss')
                }
                echo
                    '<div class="row">
                        <div class="col-md-6 offset-md-3 my-4">
                            <ul class="list-group">
                            <li class="list-group-item"><strong>Email</strong> :' . htmlspecialchars($_SESSION['user']['email']) . '</li>
                            <li class="list-group-item"><strong>Prénom</strong> :' . htmlspecialchars($_SESSION['user']['firstname']) . '</li>
                            <li class="list-group-item"><strong>Nom</strong> :' . htmlspecialchars($_SESSION['user']['lastname']) . '</li>
                            <li class="list-group-item"><strong>Status</strong> :' . $status . '</li>
                            <li class="list-group-item"><strong>Date d\'inscription</strong> :' . $currentTime . '</li>
                            </ul>
                        </div>
                    </div>';
            } else{
                //message d'erreur pour le diriger à se connecter d'abord
                    echo '<p style="color:red;"> Vous devez être connecté pour accéder à cette page ! </p>';
            }
            ?>
        </div>
    </div>


</body>
</html>