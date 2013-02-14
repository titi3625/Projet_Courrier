<?php
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Recherche</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/Aristo/Aristo.css">
	<script>

	</script>
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
		<div align="center">
			<form action="recherche.php" method="post" class="formRecherche">
				<table>
					<tr>
						<th colspan="2" align="">
							<div id="checkboxCourrier">
								<input type="checkbox" name="entrant" id="check1"> <label for="check1">Courrier entrant</label>
								<input type="checkbox" name="sortant" id="check2"> <label for="check2">Courrier sortant</label>
							</div>
							
						</th>
					</tr>
					<tr>
						<th align="left"><label for="rechercheObjet">Recherche par objet : </label></th>
						<th align="left"><input type="text" name="rechercheObjet" id="rechercheObjet"/></th>
					</tr>
					<tr>
						<th align="left"><label for="rechercheDestinataire">Recherche par destinataire : </label></th>
						<th align="left"><input type="text" name="rechercheDestinataire" id="rechercheDestinataire"/></th>
					</tr>
					<tr>
						<th align="left"><label for="rechercheService">Recherche par service : </label></th>
						<th align="left"><input type="text" name="rechercheService" id="rechercheService"/></th>
					</tr>
					<tr>
						<th><label for="rechercheDate">Recherche par date du : <input type="text" name="rechercheDate" id="rechercheDate" class="datepicker"/></label></th>
						<th> <label for="rechercheDate2"> au : </label> <input type="text" name="rechercheDate2" id="rechercheDate2" class="datepicker"/></th>
					</tr>
					<tr>
						<th colspan="2"><input type="submit" name="rechercher" id="rechercher" value="Rechercher"/></th>
					</tr>
				</table>
			</form>
		</div>
	</div>
	
	<div class="footer">
		
	</div>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
	<script src="js/main.js"></script>
	<!-- <script src="js/date.js"></script> -->
</body>
</html>