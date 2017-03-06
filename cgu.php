<?php include("header.php"); ?>

	<title>À propos & CGU</title>
<body>

<header>

<?php include("entete.php"); ?>
    
<?php include("menus.php"); ?>

</header>

<div id="espace_menu">
    
</div>

<article>

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
                
            </div> 
            
<!-- cette derniere section occupe le reste de la grille (4 colonnes) -->
            <div class="col-xs-1"> 
            
            </div> 
            
        </div> 
    
        </div> 
 
    </div> 
 
</div>

</article>

<div id="espace_menu">
    
</div>

<footer>

    <!-- Le pied de page -->
    
    <?php include("pied_de_page.php"); ?>

</footer>

</body>
</html>