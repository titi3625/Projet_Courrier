<?php
session_start();
$_SESSION['url'] = basename($_SERVER['PHP_SELF']);
if($_SESSION['auth'] != "yes") {
	echo "<script>alert('Vous n'avez pas accès à cette page');</script>";
	header('Location:index.php');
}
?>
<!doctype html>
<html lang="FR-fr">
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
							include('include/insertion_entrant.php');
							break;
	
						case '2':
							include('include/insertion_sortant.php');
							break;
						
						case '3':
							include('include/insertion_accuse.php');
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
				elseif (isset($_GET['numA'])) {
					echo "<div class=\"confirmInsert\">";
					echo "L'accusé n°".$_GET['numA']." a été ajouté";
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

	<script>
		$(function() {
			var availableTags = [
				<?php
				require('include/bdd.php');
				$requete = "SELECT * FROM courrier";
				$reponse = $bdd->query($requete);
				
				while($ligne = $reponse->fetch())
				{
					if($ligne['num_envoi'] != "") {
						echo "'".$ligne['num_envoi']."',";
					}
					
				}
				?>
			];
			
			$('#tags').autocomplete({
				source: availableTags
			});
		});
	</script>
</body>
</html>
