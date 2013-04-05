<?php
session_start();
if($_SESSION['auth'] != "yes" || $_SESSION['droit'] != "admin") {
	header('Location: erreur_acces.php');
}
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Espace de gestion</title>

	<!-- Link du css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/Aristo/Aristo.css">

</head>
<body>
	<div class="header">
		<?php
		include_once('include/menu.php');
		include_once('include/bdd.php');
		?>
		<div class="user">
			<p><?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?></p>
			<a href="include/deconnexion.php">Se déconnecter</a>
		</div>
	</div>
	
	<div class="logo">
		<img src="image/logo.png" alt="Logo EPMS">
	</div>

	<div class="content">
		<div class="inserer" align="center">

			<fieldset>
				<?php
				if(isset($_GET['page']) && !empty($_GET['page'])) {
					switch ($_GET['page']) {
						case '1':
							include('include/type/gestion_type.php');
							break;
						case '2':
							include('include/service/gestion_service.php');
							break;
						case '3':
								include('include/utilisateurs/gestion_droit.php');				
							break;
						case '4':
								include('include/historique/gestion_modif.php');				
							break;	
						default:
							echo "Erreur de redirection ! (onch onch)";
							break;
					}
				}

				if(isset($_GET['num'])) {
					echo "<div class=\"confirmInsert\">";
					echo "L'element' n°".$_GET['num']." a été ajouté";
					echo "</div>";
				}
				?>
			</fieldset>
		</div>
		
	</div>

	<div class="footer">
		
	</div>
	
	<!-- Link des fichiers javascript -->
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="js/interface.js"></script>
	<script src="js/formulaire_insertion.js"></script>
	<script src="js/recherche_accuse.js"></script>

</body>
</html>