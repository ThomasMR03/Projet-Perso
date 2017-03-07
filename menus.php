<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
    }
?>
	<title>Menu de mon site</title>

<body>

<!-- Le corps -->

<!-- Création du corps de la page. -->
<div class="container"> 
 
<!-- Déclaration de la première grille, au niveau du corps de la page. -->
    <div class="row">

<!-- Création d'une première zone dont la largeur sera égale à 9 colonnes -->
        <div class="col-md-12"> 
 
<!-- Création de la seconde grille, cette dernière aura une largeur égale de de la première zone que nous venons de créer  -->
        <div class="row"> 
 
<!-- Insertion d’une première section qui occupe 4 colonnes de notre nouvelle grille. -->
            <div class="col-xs-3">
              <?php include("info.php"); ?>
            </div>
<!-- pareil pour l’élément précédent sauf que cette section occupera 5 colonnes de la grille-->
            <div class="col-xs-7">
                <nav id="nav">
                  <ul class="Nav">
                    <li>
                      <a href="index.php"> <img src="https://i56.servimg.com/u/f56/17/41/84/01/accuei10.png" title="Accueil"></a>
                    </li>
                    <li>
                      <a href="#"> <img src="https://i56.servimg.com/u/f56/17/41/84/01/acmemb10.png" title="Membre"></a>
                    </li>
                    <li>
                      <a href="login.php"> <img src="https://i56.servimg.com/u/f56/17/41/84/01/barre_10.png" title="Connexion"></a>
                    </li>
                  </ul>
                </nav>
            </div>

<!-- cette derniere section occupe le reste de la grille (8 colonnes) -->
            <div class="col-xs-2">
                
            </div>
        </div> 
    
        </div>
    </div>

</div>
				<nav  class="navbar navbar-inverse" id="nav2">
        <?php if(isset($_SESSION['auth'])): ?>
        <h4 id="hello">Bonjour <?= $_SESSION['auth']->pseudo; ?></h4>
        <?php else : ?>
        <h4 id="hello"> Vous êtes déconnecter.</h4>
        <?php endif; ?>
  					<div class="container-fluid" id="navC">
    					<div class="navbar-header">
      						<a class="navbar-brand" href="index.php" style="color: red;">Projet |</a>
                  <a class="navbar-brand" href="indexbillet.php" style="color: red;">| Mes Aventures</a>
    					</div>
    					<ul class="nav navbar-nav">
      						<li class="dropdown">
        					<a class="dropdown-toggle" data-toggle="dropdown" href="#">L'histoire du jeu
        					<span class="caret"></span></a>
        				<ul class="dropdown-menu" role="menu">
                    <li><a href="ankama.php">Ankama</a></li>
                    <li><a href="http://forum.dofus.com/fr/1580-1-29-eratz-henual">Forum Dofus 1.29</a></li>
                    <li><a href="http://www.dofus.com/fr">Site Dofus 2.0</a></li>
                    <li><a href="http://www.dofus-touch.com/fr">Site Dofus Touch</a></li>
                    <li><a href="http://www.dofus-pets.com/fr">Site Dofus Pets</a></li>
                    </li>
        				</ul>
      						<li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Actualités
                  <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="news.php">News</a></li>
                    <li><a href="maj.php">Mise à jour</a></li>
                    </li>
                </ul>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Jeux
                  <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="dofus1.php">Dofus 1.29</a></li>
                    <li><a href="dofus2.php">Dofus 2.0</a></li>
                    <li><a href="dofustouch.php">Dofus Touch</a></li>
                    <li><a href="dofuspets.php">Dofus Pets</a></li>
                    </li>
                </ul>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Inscription & Connexion
                  <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <?php if(isset($_SESSION['auth'])): ?>
                <li><a href="account.php">Changer de mot de passe</a></li>
                <li><a href="logout.php">Se déconnecter</a></li>
                    <?php else : ?>
                <li><a href="login.php">Se connecter</a></li>
                <li><a href="register.php">S'inscrire</a></li>
                    <?php endif; ?>
                </li>
                </ul>
                  <li><a href="cgu.php">À propos & CGU</a></li>
                  <li><a href='admin/admin.php'>Administration</a></li>
    					</ul>
  					</div>
				</nav>

<div class="container">
    <?php if(isset($_SESSION['flash'])) : ?>
      <?php foreach ($_SESSION['flash'] as $type => $message) : ?>
        <div class="alert alert-<?= $type; ?>">
          <?= $message; ?>
        </div>
      <?php endforeach; ?>
      <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
</div>