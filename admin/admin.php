<?php
require_once '../inc/function.php';
session_start();
admin_only();
?>

<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" type="text/css" href="css/style_admin.css"> <!-- Liaison avec le CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../ckeditor/ckeditor.js"></script>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<head>
	<title>Admin</title>
</head>
<body>

<h1 id="titre_admin">Espace Admin</h1>
<h3 id="titre_admin">Bienvenue sur votre page admin <?= $_SESSION['auth']->pseudo; ?></h3>

<!-- Création du corps de la page. -->
<div class="container"> 
 
<!-- Déclaration de la première grille, au niveau du corps de la page. -->
    <div class="row"> 
 
<!-- Création d'une première zone dont la largeur sera égale à 9 colonnes -->
        <div class="col-md-12">  
 
<!-- Création de la seconde grille, cette dernière aura une largeur égale de de la première zone que nous venons de créer  -->
        <div class="row"> 
 
<!-- Insertion d’une première section qui occupe 3 colonnes de notre nouvelle grille. -->
            <div class="col-xs-2"> 
             <div>
                 <nav id="nav_admin">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="http://localhost/Projet">Accueil du site</a></li>
                        <li><a href="#article">Ajout d'article</a></li>
                        <li><a href="#">Modération</a></li>
                        <li><a href="#stat">Statistiques</a></li>
                    </ul>
                 </nav>
             </div>
            </div> 
 
<!-- pareil pour l’élément précédent sauf que cette section occupera 5 colonnes de la grille-->
            <div class="col-xs-8"> 
            <div class="form-group" id="article"> 
                <form method="post" action="http://localhost/Projet/billet_post.php">
            <label id="form" for="pseudo">Pseudo : </label><input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrez votre pseudo..." maxlength="20" /><br />
            <label id="form" for="titre">Titre : </label><input type="text" class="form-control" name="titre" id="titre" placeholder="Entrez le titre..." maxlength="50" /><br />
            <label id="form" for="article">Article : </label><br /><textarea class="form-control" name="article" id="editor1" rows="10" cols="80" placeholder="Ecrivez votre article ici...">
            </textarea><br />
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
            <div class="row">
            <p id="titre_option_cat">Choississez une catégorie :</p>
            <div class="col-xs-2">
                
            </div>
                <div class="col-xs-3">
                    <label>
                    <div class="radio">
                        <input type="radio" name="id_page" id="optionsRadios0" value="0"> <p id="option_cat">Mes aventures </br>
                        <input type="radio" name="id_page" id="optionsRadios1" value="1"> Dofus 1.29 </br>
                        <input type="radio" name="id_page" id="optionsRadios2" value="2"> Dofus 2.0 </br>
                        <input type="radio" name="id_page" id="optionsRadios3" value="3"> DofusTouch </p>
                    </div>
                    </label>
                </div>
                <div class="col-xs-3">
                        
                </div>
                <div class="col-xs-3">
                    <label>
                    <div class="radio">
                        <input type="radio" name="id_page" id="optionsRadios4" value="4"> <p id="option_cat">DofusPets </br>
                        <input type="radio" name="id_page" id="optionsRadios5" value="5"> News </br>
                        <input type="radio" name="id_page" id="optionsRadios6" value="6"> Mise à jours </br>
                        <input type="radio" name="id_page" id="optionsRadios7" value="7"> Ankama </p>
                    </div>
                    </label>
                </div>
            <div class="col-xs-2">
                    
            </div>
            </div>
            <input type="submit" class="btn btn-danger" value="Envoyer" />
                </form>
            </div>
                <div class="well" id="stat">
                    <h2>Les statistiques de "Projet"</h2>
                </div>
                <div class="well" id="info">
                    <h2>Localhost : Référence id_page</h2>
                    <p>id_page -> 0 = Mes Aventures</p>
                    <p>id_page -> 1 = Dofus 1.29</p>
                    <p>id_page -> 2 = Dofus 2.0</p>
                    <p>id_page -> 3 = DofusTouch</p>
                    <p>id_page -> 4 = DofusPets</p>
                    <p>id_page -> 5 = News</p>
                    <p>id_page -> 6 = Mise à jours</p>
                    <p>id_page -> 7 = Ankama</p>
                </div>
            </div> 
            
<!-- cette derniere section occupe le reste de la grille (4 colonnes) -->
            <div class="col-xs-2"> 
                <div>
                 <nav id="nav_admin2">
                    <ul class="nav nav-pills nav-stacked">
                    <li><a href="#info">Informations Localhost</a></li>
                     </ul>
                 </nav>
             </div>
            </div> 
            
        </div> 
    
        </div> 
 
    </div> 
 
</div>

<script type="text/javascript" src="js/javascript.js"></script> <!-- Liaison avec JavaScript -->

</body>
</html>