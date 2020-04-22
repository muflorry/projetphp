
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">LessWheels</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="article.php">Articles <span class="sr-only"></span></a>
      </li>

      <?php
      //si l'utilisateur n'est pas connecté on affiche les pages de connexion et d'inscription
      if(!isset($_SESSION['user'])){
        ?>
        <li class="nav-item active">
          <a class="nav-link" href="login.php">Connexion <span class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="registration.php">Inscription <span class="sr-only"></span></a>
        </li>
        <?php
      } else{
        //si déja connecté et bien enregistré on affiche les page de profil et de déconnexion
        ?>
        <li class="nav-item active">
          <a class="nav-link" href="logout.php">Déconnexion <span class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="profil.php">Profil <span class="sr-only"></span></a>
        </li>
        <?php
      }

      ?>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Chercher un article" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>
</nav>