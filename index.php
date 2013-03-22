<?php
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Accueil connexion</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/Aristo/Aristo.css">
</head>
<body>
	<div class="header">
		<?php
		include_once('include/menu.php');
		?>
		<div class="user">
			<?php
			if(isset($_SESSION['auth']) && $_SESSION['auth'] == 'yes') {
				echo "<p>".$_SESSION['prenom'] . " " . $_SESSION['nom']."</p>";
				echo "<a href=\"include/deconnexion.php\">Se déconnecter</a>";
			}
			else {
				echo "Vous n'êtes pas connecté(e)";
			}
			?>
		</div>
	</div>
		
	<div class="logo">
		<img src="image/logo.png" alt="Logo EPMS">
	</div>
	
	<div class="content">
		<h2><p align="center">Bienvenue sur le gestionnaire de courrier de l'EMPS</p></h2>
		
		

		<?php
		if(!isset($_SESSION['auth']) || $_SESSION['auth'] == 'no') {
		?>
			<form action="index.php" method="post">
				<p align="center">Vous devez vous connecter pour accéder à l'interface</p>
				<table class="tableauConnexion">

					<tr>
						<td><label for="login">Nom d'utilisateur : </label></td>
						<td><input type="text" name="login" autofocus required></td>
					</tr>
					<tr>
						<td><label for="mdp" align="right">Mot de passe : </label></td>
						<td><input type="password" name="mdp" required></td>
					</tr>
					<tr >
						<td colspan="2" align="center"><input type="submit" id="connexion" value="Connexion"></td>
					</tr>
				</table>
			</form>

			<?php
			if(isset($_POST['login']) && isset($_POST['mdp'])) {
				$login = @$_POST['login'];
				$mdp = md5(@$_POST['mdp']);
	
				if($login == null || $mdp == null) {
					echo '<p align="center">Tout les champs doivent être remplis</p>';
				}
				else {
					include_once('include/bdd.php');
					$req = $bdd->query("SELECT * FROM utilisateur WHERE login_utilisateur = '$login' AND mdp_utilisateur = '$mdp'");
					if($verif = $req->fetch()) {
						$_SESSION['droit']  = $verif['droit_utilisateur'];
						$_SESSION['nom']    = $verif['nom_utilisateur'];
						$_SESSION['prenom'] = $verif['prenom_utilisateur'];
						$_SESSION['login']  = $verif['login_utilisateur'];
						$_SESSION['mdp']    = $verif['mdp_utilisateur'];
						$_SESSION['auth']   = "yes";
						header("Location:index.php");
					}
					else {
						$_SESSION['auth'] = "no";
						echo "Erreur de connexions";
					}
				}
			}
		}
		else {
			echo '<p align="center">Vous êtes connecté(e)</p>';
		}
		?>
	</div>
	
	<div class="footer">
		Copyright tiboCorP et plopWorld
	</div>

	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="js/interface.js"></script>
</body>
</html>