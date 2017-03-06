<?php
	if (!empty($_POST) && !empty($_POST['mail'])) {
		require_once 'inc/db.php';
		require_once 'inc/function.php';
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







<?php require 'inc/header.php'; ?>

<h1>Mot de passe oublié</h1>

<form action="" method="post">
	<div class="form-group">
		<input type="mail" name="mail" class="form-control" placeholder="votre mail" required />
	</div>
	<button type="submit" class="btn btn-primary">Mot de passe oublié</button>
</form>
<?php require 'inc/footer.php'; ?>