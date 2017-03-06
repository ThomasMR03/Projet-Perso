<?php include("header.php"); ?>

        <title>Mes Aventures</title>
    <body>
        <?php include("entete.php"); ?>
        <?php include("menus.php"); ?>

        <div id="espace_menu">
    
        </div>

        <h1></h1>
        <h4 style="text-align: center;"><span style="color: red" class="glyphicon glyphicon-menu-down"></span> <u>Derniers billets du blog</u> <span style="color: red" class="glyphicon glyphicon-menu-down"></span></h4>
 
<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=live;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On récupère les 5 derniers billets
$req = $bdd->query('SELECT id, id_page, titre, contenu, auteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id_page = 0 ORDER BY date_creation DESC LIMIT 0, 5');

while ($donnees = $req->fetch())
{
?>

<!-- Création du corps de la page. -->
<div class="container"> 
 
<!-- Déclaration de la première grille, au niveau du corps de la page. -->
    <div class="row"> 
 
<!-- Création d'une première zone dont la largeur sera égale à 9 colonnes -->
        <div class="col-md-12">  
 
<!-- Création de la seconde grille, cette dernière aura une largeur égale de de la première zone que nous venons de créer  -->
        <div class="row"> 
 
<!-- Insertion d’une première section qui occupe 3 colonnes de notre nouvelle grille. -->
            <div class="col-xs-1"> 
             
            </div> 
 
<!-- pareil pour l’élément précédent sauf que cette section occupera 5 colonnes de la grille-->
            <div class="col-xs-10"> 
            <div id="news">
               <h5>
                    <span style="color: red" class="glyphicon glyphicon-triangle-right"></span><i><em>Le <?php echo $donnees['date_creation_fr']; ?></em>
                    par <strong><?php echo $donnees['auteur']; ?></strong></i><span style="color: red" class="glyphicon glyphicon-triangle-left"></span>
                </h5>
                <h3>
                <?php echo htmlspecialchars($donnees['titre']); ?>
                </h3>
                <p>
                <?php
                // On affiche le contenu du billet
                echo nl2br($donnees['contenu']);
                ?>
                <br />
                <em><a href="commentaire.php?billet=<?php echo $donnees['id']; ?>"><span class="glyphicon glyphicon-comment"></span> Commentaires</a></em>
                </p>
                </div>
                <div id="espace">
                    
                </div> 
            </div> 
            
<!-- cette derniere section occupe le reste de la grille (4 colonnes) -->
            <div class="col-xs-1"> 
            
            </div> 
            
        </div> 
    
        </div> 
 
    </div> 
 
</div>
                
<?php
} // Fin de la boucle des billets
$req->closeCursor();
?> 

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
            <div class="col-xs-2">
                
            </div>
<!-- pareil pour l’élément précédent sauf que cette section occupera 5 colonnes de la grille-->
            <div class="col-xs-8">
                <div class="form-group"> 
                <form method="post" action="billet_post.php">
            <label for="pseudo">Pseudo : </label><input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrez votre pseudo..." maclength="20" /><br />
            <label for="titre">Titre : </label><input type="text" class="form-control" name="titre" id="titre" placeholder="Entrez le titre..." maxlength="50" /><br />
            <label for="article">Article : </label><br /><textarea class="form-control" name="article" id="editor1" rows="10" cols="80" placeholder="Ecrivez votre article ici...">
                
            </textarea><br />
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
            <input type="submit" class="btn btn-danger" value="Envoyer" />
                </form>
                </div>
            </div>

<!-- cette derniere section occupe le reste de la grille (8 colonnes) -->
            <div class="col-xs-2">
                
          
            </div>
        </div> 
    
        </div>
    </div>

</div> 

<footer>

    <!-- Le pied de page -->
    
    <?php include("pied_de_page.php"); ?>

</footer>
<script type="text/javascript" src="js/javascript.js"></script> <!-- Liaison avec JavaScript -->
</body>
</html>