<?php include("header.php"); ?>

	<title>Dofus 1.29</title>
<body>

<header>

<?php include("entete.php"); ?>
    
<?php include("menus.php"); ?>

</header>

<div id="espace_menu">
    
</div>

<article>

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
$req = $bdd->query('SELECT id, id_page, titre, contenu, auteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id_page = 1 ORDER BY date_creation DESC LIMIT 0, 5');

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
            <h1 style="text-align: center; font-family: 'Indie Flower', cursive; font-size: 100px"><u>L'actu 100% 1.29</u></h1>
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

</article>

<div id="espace_menu">
    
</div>

<?php include("pied_de_page.php"); ?>