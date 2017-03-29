<?php
	if (!empty($_POST) && !empty($_POST['mail'])) {
		require_once '../inc/db.php';
		require_once '../inc/function.php';
		$req = $pdo->prepare('SELECT * FROM users WHERE  mail = ? AND valid_at IS NOT NULL');
		$req->execute([$_POST['mail']]);
		$user = $req->fetch();
		session_start();
		if (!empty($user)) {
			$reset_token = str_random(60);
			$pdo->prepare('UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id = ?')->execute([$reset_token, $user->id]);
			my_mail(
				$_POST['mail'],
				$user->pseudo,
				'Réinitialisez votre mot de passe',
				"Merci de cliquer sur le lien pour réinitialisé votre mot de passe <br/>\n\n http://localhost/monPetitSite/reset.php?id=$user->id&token=$reset_token"
				);
			$_SESSION["flash"]['success']='Les instruction vous on été envoyé par mail';
			header('location: login.php');
			exit();

		}else{
			$_SESSION['flash']['danger'] = 'Aucun compte ne correspond a cette adresse mail';
		}
		}

	

?>






<?php require 'inc/header_user.php'; ?>
<?php require '../entete.php'; ?>
<?php require 'inc/menus_user.php'; ?>

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
            	<h1 style="font-family: 'Indie Flower', cursive;">Mot de passe oublié :</h1>

				<form action="" method="post">
					<div class="form-group">
						<input type="mail" name="mail" class="form-control" placeholder="Votre mail" required />
					</div>
					<button type="submit" class="btn btn-danger">Mot de passe oublié</button>
				</form>				
            </div> 
            
<!-- cette derniere section occupe le reste de la grille (4 colonnes) -->
            <div class="col-xs-4"> 
             
            </div> 
            
        </div> 
    
        </div> 
 
    </div> 
 
</div>

<div id="espace_menu">
    
</div>

<?php require 'inc/pied_de_page_user.php'; ?>