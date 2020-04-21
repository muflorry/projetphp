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

    <div class="row">
        <h1 class="text-center col-12 mt-5">Connexion</h1>
    </div>
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
    

</body>
</html>