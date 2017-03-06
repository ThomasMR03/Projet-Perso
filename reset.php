<?php
	if(isset($_GET['id']) && isset($_GET['token'])){
		require_once 'inc/db.php';
		require_once 'inc/function.php';
		session_start();
		$req = $pdo->prepare('SELECT * FROM users WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > NOW()-(1000*60*30)');
		$req->execute([$_GET['id'],$_GET['token']]);
		$user = $req->fetch();
		if($user){

			if (!empty($_POST)) {
				if (!empty($_POST['password']) && $_POST['password']!=$_POST['password_confirm']) {
					$_SESSION['flash']['danger'] = 'Les mots de passe ne correspondent pas';
				}else{
					$user_id = $user->id;
					$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
					$pdo->prepare('UPDATE users SET password = ?, reset_token = NULL, reset_at = null WHERE id =?')->execute([$password, $user_id]);
					$_SESSION['flash']['success'] = 'Votre mot de passe a bien été changé';
					$_SESSION['auth']= $user;
					header('location: account.php');
					exit();
				} 
		}







		}
		
	}else{
		header('location: index.php');
		exit();
	}




?>
<?php require 'inc/header.php'; ?>
<h1>Réinitialisez votre mot de passe</h1>

<form action="" method="post">
	<div class="form-group">
		<input type="password" name="password" class="form-control" placeholder="Modifier votre mot de passe" required />
	</div>
	<div class="form-group">
		<input type="password" name="password_confirm" class="form-control" placeholder="Confirmation du mot de passe" required />
	</div>
	<button type="submit" class="btn btn-primary">Modifier le mot de passe</button>
</form>

<?php require 'inc/footer.php'; ?>