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
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>
<body>

    <?php include 'parts/menu.php'; ?>

    <div class="container">
        <div class="row">
            <h1 class="text-center col-12 mt-5">Liste des articles</h1>
        </div>
        <div class="row">
            <!-- Affichage de la liste de tous les articles du site dans une table html Bootstrap ( https://getbootstrap.com/docs/4.3/content/tables/#hoverable-rows ) -->
            <table class="table table-hover col-12 mt-4">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Date de parution</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-6">
                        <!-- Si le titre de l'article fait plus de 25 caractères, on le tronque à 25 caractères et on met '...' à la suite -->
                            <a href="article.php?id=2">Les voitures sans roues s...</a>
                        </td>
                        <td class="col-2">Alice</td>
                        <!-- On affiche la date de parution de l'article en français (setlocale est paramétré dans le fichier /core/modules/session.management.php) -->
                        <td class="col-3">lundi 20 avril 2020 à 19:17:33</td>
                    </tr>
                    <tr>
                        <td class="col-6">
                        <!-- Si le titre de l'article fait plus de 25 caractères, on le tronque à 25 caractères et on met '...' à la suite -->
                            <a href="article.php?id=1">Sortie de la nouvelle Peu...</a>
                        </td>
                        <td class="col-2">Alice</td>
                                    <!-- On affiche la date de parution de l'article en français (setlocale est paramétré dans le fichier /core/modules/session.management.php) -->
                        <td class="col-3">lundi 20 avril 2020 à 19:16:00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>