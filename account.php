<?php
	session_start();
	require_once 'inc/function.php';
	user_only();

	if (!empty($_POST)) {
		if (!empty($_POST['password']) && $_POST['password']!=$_POST['password_confirm']) {
			$_SESSION['flash']['danger'] = 'Les mots de passe ne correspondent pas';
		}else{
			$user_id = $_SESSION['auth']->id;
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
			require_once 'inc/db.php';
			$pdo->prepare('UPDATE users SET password = ? WHERE id =?')->execute([$password, $user_id]);
			$_SESSION['flash']['success'] = 'Votre mot de passe a bien été changé';
		} 
	}




?>
<?php require 'header.php'; ?>
<?php require 'entete.php'; ?>
<?php require 'menus.php'; ?>

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
              <h1 style="font-family: 'Indie Flower', cursive;"><i>Bonjour <?= $_SESSION['auth']->pseudo; ?><i></h1>

			<form action="" method="post">
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Modifier votre mot de passe" required />
				</div>
				<div class="form-group">
					<input type="password" name="password_confirm" class="form-control" placeholder="Confirmation du mot de passe" required />
				</div>
				<button type="submit" class="btn btn-danger">Modifier le mot de passe</button>
			</form>
            </div>

<!-- cette derniere section occupe le reste de la grille (8 colonnes) -->
            <div class="col-xs-4">
                
            </div>
        </div> 
    
        </div>
    </div>

</div>

<div id="espace_menu">
    
</div>

<?php require 'pied_de_page.php'; ?>