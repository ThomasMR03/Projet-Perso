<?php include("header.php"); ?>

        <title>Commentaires</title>

    </head>
    <body>
        <?php include("entete.php"); ?>
        <?php include("menus.php"); ?>
         
        <div id="espace_menu">
    
        </div>

        <?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=live', 'root', '');
}
catch(Exception $e)
{
    die('Erreure : '.$e->getMessage());
}
$req = $bdd->prepare('SELECT id, auteur, titre, contenu, date_creation FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
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
                <span style="color: red" class="glyphicon glyphicon-triangle-right"></span><i><em>Le <?php echo $donnees['date_creation']; ?></em>
                    par <strong><?php echo $donnees['auteur']; ?></strong></i><span style="color: red" class="glyphicon glyphicon-triangle-left">
                </span>
                </h5>
                <h3>
                <?php echo htmlspecialchars($donnees['titre']); ?>
                </h3>
                <p>
                <?php
                // On affiche le contenu du billet
                echo nl2br(($donnees['contenu']));
                ?>
                <br />
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
                <form method="post" action="commentaires_post.php?billet=<?php echo $donnees['id']; ?>"/>
                <label id="form_com" for="auteur">Pseudo : </label><input type="text" class="form-control" name="auteur" id="auteur" placeholder="Entrez votre pseudo..." maxlength="20" /><br />
                <label for="commentaire">Commentaire :</label><br /><textarea class="form-control" name="commentaire" id="editor1" rows="10" cols="80" placeholder="Entrez un commentaire">
                </textarea><br />
                <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
                </script>
                <input type="hidden" name="billet" value="<?php $_GET['billet']?>"/>
                <input id="form_com" type="submit" class="btn btn-danger" value="Envoyer" />
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
             
<?php
$req->closeCursor();
$req = $bdd->prepare('SELECT id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_com_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
$req->execute(array($_GET['billet']));
while ($donnees = $req->fetch())
{
?>
    <div id="news">
    <p><span style="color: red" class="glyphicon glyphicon-triangle-right"></span><strong><?php echo $donnees['auteur']; ?></strong> le <?php echo $donnees['date_com_fr']; ?><span style="color: red" class="glyphicon glyphicon-triangle-left"></p>
     <p><?php echo $donnees['commentaire']; ?></p>
    </div>
    <div id="espace">
                    
    </div>
<?php
}
$req->closeCursor();
?>
<footer>

<div id="espace_menu">
    
</div>

<?php include("pied_de_page.php"); ?>