<?php
	if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
		require_once '../inc/db.php';
		require_once '../inc/function.php';
		$req = $pdo->prepare('SELECT * FROM users WHERE (pseudo = :username OR mail = :username) AND valid_at IS NOT NULL');
		$req->execute(['username'=> $_POST['username']]);
		$user = $req->fetch();
		session_start();

		if (!empty($user)) {
		if (password_verify($_POST['password'], $user->password)) {
			$_SESSION['auth'] = $user;
			$_SESSION['flash']['success'] = 'Vous êtes connecté';
			header('location: index.php');
			exit();


		}else{
			$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe non valide';
		}
		}else{
			$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe non valide';
		}

	}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Espace de connexion</title>
</head>
<body>
<?php include("inc/header_user.php"); ?>
<?php require '../entete.php'; ?>
<?php require 'inc/menus_user.php'; ?>

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
            <div class="col-xs-4">
              
            </div>
<!-- pareil pour l’élément précédent sauf que cette section occupera 5 colonnes de la grille-->
            <div class="col-xs-4">
               <h1 style="font-family: 'Indie Flower', cursive;"><i>Se connecter :</i></h1>
				<form action="" method="post">
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="Pseudo ou Mail" required />
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Mot de passe" required />
						<a href="remember.php">Mot de passe oublié</a>
					</div>
					<button type="submit" class="btn btn-danger">Connexion</button>
				</form>
            </div>

<!-- cette derniere section occupe le reste de la grille (8 colonnes) -->
            <div class="col-xs-4">
                
            </div>
        </div> 
    
        </div>
    </div>

</div>

<?php require 'inc/pied_de_page_user.php'; ?>