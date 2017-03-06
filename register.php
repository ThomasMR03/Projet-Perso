<?php
	session_start();
	if (!empty($_POST)) {
		require_once 'inc/function.php';
		require_once 'inc/db.php';

		if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
			$_SESSION['flash']['danger'] = "Votre pseudo n'est pas valide (alpha_numerique)";
		}else{
			$req = $pdo->prepare('SELECT id FROM users WHERE pseudo = ?');
			$req->execute([$_POST["username"]]);
			$user = $req->fetch();
			if($user){
					$_SESSION['flash']['danger'] = 'Ce pseudo est déjà utilisé';
			}
		}
		if(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
			$_SESSION['flash']['danger'] = "Votre mail n'est pas valide";
		}else{
			$req = $pdo->prepare('SELECT id FROM users WHERE mail = ?');
			$req->execute([$_POST["mail"]]);
			$user = $req->fetch();
			if($user){
					$_SESSION['flash']['danger'] = 'Ce mail est déjà utilisé pour un compte';
			}
		}
		if(empty($_POST['password']) || $_POST['password']!=$_POST['password_confirm']){
			$_SESSION['flash']['danger'] = "Les mots de passe ne correspondent pas";
		}

		if(empty($_SESSION['flash'])){
			$token = str_random(60);
			$password = password_hash($_POST["password"], PASSWORD_BCRYPT);
			$req = $pdo->prepare('INSERT INTO users SET pseudo = ?, mail = ?, password = ?, valid_token = ?');
			$req->execute([$_POST["username"],$_POST["mail"],$password,$token]);
			$user_id = $pdo->lastInsertId();

			my_mail(
				$_POST["mail"],
				$_POST["username"],
				'Confirmation de votre compte',
				 "Merci de cliquer sur le lien pour confirmer votre compte <br/>\n\n http://localhost/monPetitSite/confirm.php?id=$user_id&token=$token"
				  );
			$_SESSION['flash']['success'] = 'Un mail de confirmation vous a été envoyé';
			header('location: login.php');
			exit();

		}
	}

?>
<?php require 'header.php'; ?>
<?php require 'entete.php'; ?>
<?php require 'menus.php'; ?>

<div id="espace_menu">
    
</div>

<!-- Création du corps de la page. -->
<div class="container"> 
 
<!-- Déclaration de la première grille, au niveau du corps de la page. -->
    <div class="row"> 
 
<!-- Création d'une première zone dont la largeur sera égale à 9 colonnes -->
        <div class="col-md-12">  
 
<!-- Création de la seconde grille, cette dernière aura une largeur égale de de la première zone que nous venons de créer  -->
        <div class="row"> 
 
<!-- Insertion d’une première section qui occupe 3 colonnes de notre nouvelle grille. -->
            <div class="col-xs-4"> 
             
            </div> 
 
<!-- pareil pour l’élément précédent sauf que cette section occupera 5 colonnes de la grille-->
            <div class="col-xs-4"> 
            <h1 style="font-family: 'Indie Flower', cursive;"><i>S'inscrire :<i></h1>

			<form action="" method="post">
				<div class="form-group">
					<input type="text" name="username" class="form-control" placeholder="Pseudo" required />
				</div>
				<div class="form-group">
					<input type="text" name="mail" class="form-control" placeholder="Votre adresse mail" required />
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Mot de passe" required />
				</div>
				<div class="form-group">
					<input type="password" name="password_confirm" class="form-control" placeholder="Confirmation du mot de passe" required />
				</div>
				<button type="submit" class="btn btn-danger">Inscription</button>

			</form>
            </div> 
            
<!-- cette derniere section occupe le reste de la grille (4 colonnes) -->
            <div class="col-xs-4"> 
            
            </div> 
            
        </div> 
    
        </div> 
 
    </div> 
 
</div>

<?php require 'pied_de_page.php'; ?>