<?php
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Acces refuse</title>
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
		

	
	<div class="content">
		<p align="center"><img src="image/acces_refuse.jpg"></img></p>
	</div>
	
	<div class="footer">
		Copyright tiboCorP et plopWorld
	</div>

	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="js/interface.js"></script>
</body>
</html>