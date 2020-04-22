<?php

//Inclusion de la foction isConnected()
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
    <title>Document</title>
</head>
<body>

<?php include 'parts/menu.php'; ?>

<div class="container">
    <div class="row">
        <h1 class="text-center col-12 mt-5">Accueil</h1>
        <h2 class="text-center col-12">Bienvenue sur Lesswheels, le premier site qui parle de voitures sans roues !</h2>
        <p class="alert alert-info col-6 offset-3 my-4">Vous pouvez créer des comptes sans problème, seulement ils seront tous "utilisateur". <br>Vous pouvez utiliser le compte suivant pour avoir un compte admin :<br>Email : <strong>admin@exemple.com</strong><br>Mot de passe : <strong>aaaaaaaaA7/</strong></p>
    </div>
        <div class="row">
            <h2 class="col-12 text-center">Les deux derniers articles parus sur le site</h2>
            <div class="col-12">
                                        <div class="card my-4">
                            <div class="card-header bg-primary text-white">
                                Les voitures sans roues sont très apréciées des écolos                            </div>
                            <div class="card-body">
                                <!-- Si le contenu de l'article fait plus de 50 caractères, on le tronque et on colle '...' à la suite -->
                                C'est pas très étonnant ! 

 Lorem ipsum dolor... <a href="article.php?id=2">Lire la suite</a>                            </div>
                            <div class="card-footer text-muted">
                                Le <strong>lundi 20 avril 2020 à 19h17</strong> par <strong>Alice</strong>
                            </div>
                        </div>
                                                <div class="card my-4">
                            <div class="card-header bg-primary text-white">
                                Sortie de la nouvelle Peugeot sans roues                            </div>
                            <div class="card-body">
                                <!-- Si le contenu de l'article fait plus de 50 caractères, on le tronque et on colle '...' à la suite -->
                                La nouvelle Peugeot sans roues est enfin sortie !
... <a href="article.php?id=1">Lire la suite</a>                            </div>
                            <div class="card-footer text-muted">
                                Le <strong>lundi 20 avril 2020 à 19h16</strong> par <strong>Alice</strong>
                            </div>
                        </div>
        </div>
    </div>
</div>


</body>
</html>