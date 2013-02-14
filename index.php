<?php
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Accueil</title>
	<link rel="stylesheet" href="css/style.css">
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
	
	<div class="content">
		<?php
		if(!isset($_SESSION['auth']) || $_SESSION['auth'] == 'no') {
		?>
			<form action="index.php" method="post">
				<table class="tableauConnexion">
					<tr>
						<th><label for="login">Nom d'utilisateur : </label></th>
						<th><input type="text" name="login" autofocus required></th>
					</tr>
					<tr>
						<th><label for="mdp" align="right">Mot de passe : </label></th>
						<th><input type="password" name="mdp" required></th>
					</tr>
					<tr >
						<th colspan="2" align="center"><input type="submit" id="connexion" value="connexion"></th>
					</tr>
				</table>
			</form>

			<?php
			if(isset($_POST['login']) && isset($_POST['mdp'])) {
				$login = @$_POST['login'];
				$mdp = @$_POST['mdp'];
	
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
		
	</div>
	<script src="js/main.js"></script>
</body>
</html>