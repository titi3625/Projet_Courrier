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
	</div>
	
	<div class="content">
		<form action="index.php" method="post">
			<table class="tableauConnexion">
				<tr>
					<th><label for="login">Nom d'utilisateur : </label></th>
					<th><input type="text" name="login"></th>
				</tr>
				<tr>
					<th><label for="mdp">Mot de passe : </label></th>
					<th><input type="text" name="mdp"></th>
				</tr>
				<tr >
					<th colspan="2" align="center"><input type="submit" id="connexion" value="connexion"></th>
				</tr>
			</table>
			
		</form>
	</div>
	
	<div class="footer">
		
	</div>
</body>
</html>