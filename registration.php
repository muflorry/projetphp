<?php

//Inclusion de la fonction permettant de vérifier si un captcha est correct ou pas
require 'recaptchavalid.php';

//appel des variables
if(
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['confirm-password']) &&
    isset($_POST['firstname']) &&
    isset($_POST['lastname']) &&
    isset($_POST['g-recaptcha-response'])
){
    // Blocs des verifs
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Email invalide';
    }
    if(!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#$%&\'()*+,\-\.\/:;<=>?\\\\@[\]\^_`{|}~]).{8,1000}$/' , $_POST['password'])){
        $errors[] = 'Mot de passe doit contenir minimum 1 maj, 1 min, 1 chiffre et un caractère spécial';
    }
    if($_POST['confirm-password'] != $_POST['password']){
        $errors[] = 'Confirmation du mot de passe différente !';
    }
    if(!preg_match('/^.{2,50}$/', $_POST['firstname'])){
        $errors[] = 'Le prénom doit contenir entre 2 et 50 caractères !';
    }
    if(!preg_match('/^.{2,50}$/', $_POST['lastname'])){
        $errors[] = 'Le nom doit contenir entre 2 et 50 caractères !';
    }
    if(!recaptcha_valid($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR'])){
        $errors[] = 'Captcha invalide !';
    }

    //si pas d'erreurs
    if(!isset($errors)){
        //connexion à la BDD
        try{

            $bdd = new PDO('mysql:host=localhost;dbname=lesswheels;charset=utf8', 'root' , '');

            //affichage des erreurs SQL si il y en a
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(Exception $e){

            die('Problème avec la bdd : ' . $e->getMessage());
        }

        //insertion d'un nouveau compte en bdd
        $response = $bdd->prepare("INSERT INTO users(email, password, firstname, lastname, admin, register_date, activated, register_token) VALUES (?,?,?,?,?,?,?,?) ");

        $response->execute([
            $_POST['email'],
            password_hash($_POST['password'], PASSWORD_BCRYPT),
            $_POST['firstname'],
            $_POST['lastname'],
            0,
            date('Y-m-d H:i:s'),
            0,
            0
        ]);

        //vérification que l'insertion a correctement fonctionné
        if($response->rowCount() > 0){
            //message de succès
            $successMessage = 'Votre compte a été bien crée !';
        } else{
            //message d'erreurs
            $errors[] = 'Veuillez réessayer, problème avec la BDD';
        }

        //fermeture de la requête
            $response->closeCursor();
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
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>


<?php include 'parts/menu.php'; ?>

    <div class="row">
        <h1 class="text-center col-12 mt-5">Inscription</h1>
    </div>

    <?php

    //si il y a des erreurs, on les affiche
    if(isset($errors)){
        foreach($errors as $error){
            echo '<p style="color:red;">' . $error . '</p>';
        }
    }

    //si le message de succès existe, on l'affiche
    if(isset($successMessage)){
        echo '<p style=color:green;">' . $successMessage . '</p>';
    } else{

        ?>

        <form action='registration.php' method='POST' class="col-12 col-md-6 offset-md-3 my-5">
            <div class="form-group">
                <label for="form-type">Email </label>
                <input type="email" name="email" class="form-control" value="" id="email" placeholder="alice@exemple.com">
            </div>
            <div class="form-group">
                <label for="form-type">Mot de passe </label>
                <input type="password" name="password" value="" class="form-control" id="password">
            </div>
            <div class="form-group">
                <label for="form-type">Confirmation mot de passe </label>
                <input type="password" name="confirm-password" value="" class="form-control" id="confirm-password" >
            </div>
            <div class="form-group">
                <label for="form-type">Prénom </label>
                <input type="text" name="firstname" value="" class="form-control" id="firstname" placeholder="Alice">
            </div>
            <div class="form-group">
                <label for="form-type">Nom </label>
                <input type="text" name="lastname" value="" class="form-control" id="lastname" placeholder="Smith">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success col-12 my-2">M'inscrire</button>
            </div>
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LdkwusUAAAAAAaz5fTkdBipobr3rbfdSt5CFRE0"></div>
            </div>
        </form>

        <?php
    }

    ?>
</body>
</html>