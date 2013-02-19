<?php
session_start();
if($_SESSION['auth'] != 'yes') {
	header('Location:index.php');
}
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Recherche courrier</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/Aristo/Aristo.css">

</head>
<body>
	<div class="header">
		<?php
		include_once('include/menu.php');
		?>
		<div class="user">
			<p><?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?></p>
			<a href="include/deconnexion.php">Se déconnecter</a>
		</div>
	</div>
		
	<div class="content">
		<div class="divRecherche" align="center">
			<fieldset>
				<legend>Recherche</legend>
				<table>
					<tr>
						<th colspan="2">
							<div id="radio">
								<input type="radio" name="statut" id="lesdeux" checked> <label for="lesdeux">Les deux</label>
								<input type="radio" name="statut" id="entrant"> <label for="entrant">Courrier entrant</label>
								<input type="radio" name="statut" id="sortant"> <label for="sortant">Courrier sortant</label>
							</div>
						</th>
					</tr>
					<tr>
							<td align="left"><label for="rechercheObjet">Recherche par objet : </label></td>
							<td align="left"><input type="text" name="rechercheObjet" id="rechercheObjet"/></td>
					</tr>
					<tr>
							<td align="left"><label for="rechercheDestinataire">Recherche par destinataire : </label></td>
							<td align="left"><input type="text" name="rechercheDestinataire" id="rechercheDestinataire"/></td>
					</tr>
					<tr>
							<td align="left"><label for="rechercheService">Recherche par service : </label></td>
							<td align="left"><input type="text" name="rechercheService" id="rechercheService"/></td>	
					</tr>
					<tr>
							<td><label for="rechercheDate">Recherche par date du : </label></td>
							<td><input type="text" name="rechercheDate" id="rechercheDate" class="datepicker"/><label for="rechercheDate2"> au : </label> <input type="text" name="rechercheDate2" id="rechercheDate2" class="datepicker"/></td>
					</tr>
					<tr align="center">
						<td colspan="2">
							<input type="button" name="rechercher" id="rechercher" value="Rechercher"/>
							<input type="button" name="reset" id="reset" value="Effacer">
						</td>
					</tr>
					</div>
					
				</table>
			</fieldset>

			<div class="resultat">

			</div>
			
		</div>
	</div>
	
	<div class="footer">
		
	</div>

	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
	<script src="js/interface.js"></script>
	<script src="js/main.js"></script>
</body>
</html>