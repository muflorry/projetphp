<?php

//Inclusion de la foction isConnected()
require 'parts/functions.php';

//Nécessaire pour pouvoir utiliser les variables de session
session_start();

//Si l'utilisateur est bien connecté, on détruit le tableau user dans la session, ce qui déconnecte l'utilisateur
if(isConnected()){
    unset($_SESSION['user']);
    $success = true;
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title>Déconnexion</title>
</head>
<body>

    <?php include 'parts/menu.php'; ?>

    <div class="container">
        <div class="row">
            <h1 class="text-center col-12 mt-5">Déconnexion</h1>
        </div>
    </div>

    <?php
    //Si l'utilisateur est connecté, on affiche un message confirmant la déconnexion, sinon un message d'erreur
    if(isset($success)){
        echo '<p class="alert alert-success col-12"> Vous avez bien été déconnecté ! <a href="index.php">Cliquez ici pour revenir à l\'accueil</a></p>';
    } else{
        echo
            '<div class="container">
                <div class="row">
                    <h1 class="text-center col-12 mt-5">Erreur 403</h1>
                 </div>
                <div class="row">
                    <p class="alert alert-danger col-12 text-center mt-4">Vous devez être connecté pour accèder à cette page !</p>
                </div>
            </div>';
    }

    ?>


</body>
</html>