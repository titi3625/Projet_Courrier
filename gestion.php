<?php
session_start();
if($_SESSION['auth'] != 'yes' && $_SESSION['droit'] != "admin") {
	header('Location:index.php');
	echo "<script>alert('Vous n'avez pas accès à cette page');</script>";
}
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Espace de gestions</title>

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
	

	<div class="content">
		<div class="inserer" align="center">

			<fieldset>
				<?php
				if(isset($_GET['page']) && !empty($_GET['page'])) {
					switch ($_GET['page']) {
						case '1':
							include('include/gestion_type.php');
							break;
	
						case '2':
							include('include/gestion_service.php');
							break;
	
						case '3':
								include('include/gestion_droit.php');				
							break;
						
						default:
							echo "Erreur de redirection ! (onch onch)";
							break;
					}
				}
				?>
			</fieldset>
		</div>
		
	</div>

	<div class="footer">
		
	</div>
	
	<!-- Link des fichiers javascript -->
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
	<script src="js/interface.js"></script>
	<script src="js/formulaire_insertion.js"></script>

</body>
</html>