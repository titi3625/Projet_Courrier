<?php
session_start();
if($_SESSION['auth'] != "yes") {
	echo "<script>alert('Vous n'avez pas accès à cette page');</script>";
	header('Location:index.php');
}
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Insertion courrier</title>

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
							include('include/insertion_entrant.php');
							break;
	
						case '2':
							include('include/insertion_sortant.php');
							break;
						
						default:
							echo "Erreur de redirection ! (onch onch)";
							break;
					}
				}

				if(isset($_GET['num'])) {
					echo "<div class=\"confirmInsert\">";
					echo "Le courrier n°".$_GET['num']." a été ajouté";
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

</body>
</html>