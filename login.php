<?php

//Inclusion de la fonction isConnecetd()
require 'parts/functions.php';

//Nécessaire pour pouvoir utiliser les variables de session
session_start();

//Si le visiteur n'est pas déjà connecté, on traite le formulaire
if(!isConnected()){

    //appel des variables
    if(
        isset($_POST['email']) &&
        isset($_POST['password'])
    ){
        //bloc des vérifs
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Email invalide';
        }
        if(!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#$%&\'()*+,\-\.\/:;<=>?\\\\@[\]\^_`{|}~]).{8,1000}$/' , $_POST['password'])){
            $errors[] = 'Mot de passe doit contenir minimum 1 maj, 1 min, 1 chiffre et un caractère spécial';
        }

        if(!isset($errors)){
           //connexion à la BDD
            try{

                $bdd = new PDO('mysql:host=localhost;dbname=lesswheels;charset=utf8', 'root' , '');

                //affichage des erreurs SQL si il y en a
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(Exception $e){

                die('Problème avec la bdd : ' . $e->getMessage());
            }

            //vérification de l'addresse dans la BDD
            $response = $bdd->prepare("SELECT * FROM users WHERE email = ?");

            $response->execute([
                $_POST['email']
            ]);

            // Récupération des résultats de la requête sous forme d'arrays associatifs
            $user = $response->fetch(PDO::FETCH_ASSOC);

            //si le compte n'existe pas, on affiche un message d'erreur
            if(empty($user)){
                $errors[] = 'Cette adresse mail n\'existe pas !';
            } else{
                //si le mot de passe n'est pas correct on affiche un message d'erreur
                if(!password_verify($_POST['password'], '$2y$10$O2VlECfUrOn0bFibyQiRX.7/OFCScBFY.a5GEtZdXBEYOoH.MbmJO')){
                    $errors[] = 'Le mot de passe est incorrect !';
                } else{
                    //message de succès
                    $successMessage = 'Vous êtes bien connecté !';

                    //création d'un sous tableau 'user' dans la session. Le tableau contient tout les information de l'utilisateur
                    $_SESSION['user'] = $user;
                }
            }

            //fermeture de la requête
            $response->closeCursor();
        }
    }
}



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

    <div class="container-fluid">
        <?php include 'parts/menu.php'; ?>

        <div class="row">
            <h1 class="text-center col-12 mt-5">Connexion</h1>

            <?php
            // Si il y a des erreurs, on les affiches
            if(isset($errors)){
                foreach($errors as $error){
                    echo '<p style="color:red;">' . $error . '</p>';
                }
            }

            // Si le message de succès existe, on l'affiche, sinon on affiche le formulaire
            if(isset($successMessage)){
                echo
                    '<div class="row">
                        <p class="alert alert-success col-12">' . $successMessage . '<a href="index.php">Cliquez ici</a> pour revenir à l\'accueil</p>
                    </div>';
            } else {
                // Si le visiteur n'est pas connecté, on affiche le formulaire, sinon on affiche un message d'erreur
                if(!isConnected()){
                    ?>
                    <div class="row">
                        <form action="login.php" method="POST" class="col-12 col-md-6 offset-md-3 my-5">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="" class="form-control" name="email" id="email" placeholder="alice@exemple.com">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <input type="submit" value="Connexion" class="btn btn-success col-12 my-2">
                        </form>
                    </div>
                    <?php
                }else {
                    //si le visiteur s'est déjà connecté, on affiche un message
                    echo '<p style="color:red;">Vous êtes déjà connecté !</p>';
                }
            }
            ?>
    </div>

</body>
</html>