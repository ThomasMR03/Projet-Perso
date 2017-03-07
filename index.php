<?php include("header.php"); ?>
<head>
	<title>Projet</title>
</head>
<body onLoad=" banniere();" onUnload="clearTimeout(ban)" bgcolor="#FFFFFF">

<header>

<?php include("entete.php"); ?>

<!-- <form name="formBan">
    <input type="text" name="Fbanniere" size="50">
</form> -->
    
    <?php include("menus.php"); ?>

</header>

<div id="espace_menu">
    
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
                <ul class="nav nav-pills nav-stacked">
                    <li><a id="hover" href="#bienvenue"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a id="hover" href="#Qui_suis_je"><span class="glyphicon glyphicon-pencil"></span> Présentation</a></li>
                    <li><a id="hover" href="#Almanax"><span class="glyphicon glyphicon-book"></span> Almanax</a></li>
                    <li><a id="hover" href="#Facebook"><span class="fa fa-facebook"></span> Facebook</a></li>
                    <li><a id="hover" href="#Twitter"><span class="fa fa-twitter"></span> Twitter</a></li>
                    <li><a id="hover" href="#Youtube"><span class="fa fa-youtube"></span> Youtube</a></li>
                </ul>
            </div>
<!-- pareil pour l’élément précédent sauf que cette section occupera 5 colonnes de la grille-->
            <div class="col-xs-5">
                
            </div>

<!-- cette derniere section occupe le reste de la grille (8 colonnes) -->
            <div class="col-xs-5">
                <div id="bienvenue" class="well">
                    <h2 style="text-align: center;">Je vous souhaite la bienvenue sur mon site web</h2>
                </div>
                <div id="Qui_suis_je" class="well">
                    <h2 style="text-align: center;">Présentation :</h2>
                    <p>Bonjour à tous ! Je m'appel Thomas et je suis le créateur et développeur de "Projet" !</p>
                    <p>"Projet" est un fan-site non officiel du <b>MMORPG Français : Dofus</b>, un jeu en ligne crée par <a style="color: red" href="http://www.ankama.com/fr">Ankama</a>.</p>
                    <p>J'ai crée ce site dans un premier temps pour m'entraîner a développer un site internet <b>(actuellement en formation de codeur/développeur web)</b>, mais aussi pour pouvoir vous donnez la possibilé de retrouver toutes les news des jeux Ankama sur le même site.</p>
                    <p>Sur ce site vous pouvez découvrir : différents articles sur l'univers d'Ankama (Dofus 1.29, Dofus 2.0, Dofus Touch, Dofus Pets) mais aussi sur mes aventures en jeu !</p>
                    <p>Le site est <b>souvent mis à jour</b>, la liste des nouveautés peut-être consultée sur la page appropriée du menu en bas de site : <a style="color: red" href="#">À venir</a>.</p>
                    <p>Si vous souhaitez voir apparaître une nouvelle page, ou une nouvelle fonctionnalité, etc sur mon site, vous pouvez <b>me contacter</b>.</p>
                    <p style="text-align: center;"><b>CaptainFire03</b></p>
                </div>
                <div id="Almanax">
                <iframe width="350" height="150" frameborder="0" scrolling="no" 
                    src="http://www.dofuspourlesnoobs.com/module-almanax.html">
                </iframe>
                </div>
                <div id="Facebook">
                    <div>
                    <h3 style="text-align: center; color: #912B3B;"><span style="color: #912B3B;" class="glyphicon glyphicon-menu-down"></span> Nous rejoindre sur Facebook <span style="color: #912B3B;" class="glyphicon glyphicon-menu-down"></span></p>
                    <p><a class="btn btn-default" href="https://www.facebook.com/DOFUS"><img src="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/16711749_1487036894670024_3515168637264643690_n.jpg?oh=0b3c9f3651042c678389393a8d13ec2c&oe=596C8A35" style="width: px; height: 200px;"></a></h3>
                    </div>
                </div>
                <div id="Twitter">
                    <!--<h3>Liste basé sur le @Dofusfr</h3>-->
                <a class="twitter-timeline"  href="https://twitter.com/search?q=%40Dofusfr" data-widget-id="831063371407568896">Tweets sur @Dofusfr</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
                <div id="Youtube">
                    <div class="panel panel-default">
                        <div class="panel-heading"><img style="width: 70px;" src="http://www.freeiconspng.com/uploads/youtube-png-19.png"> Youtube</div>
                        <div class="panel-body">
                           <iframe width="425" height="360" src="https://www.youtube.com/embed/lAp_FANpjdo" frameborder="0" allowfullscreen></iframe> 
                        </div>
                    </div>                     
                </div>
            </div>
        </div> 
    
        </div>
    </div>

</div>

<div id="espace_menu">
    
</div>
 
<?php include ("pied_de_page.php"); ?>