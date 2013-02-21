<?php
session_start();
if($_SESSION['auth'] != 'yes') {
	header('Location:index.php');
	echo "<script>alert('Vous n'avez pas accès à cette page');</script>";
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
			<a href=\"include/deconnexion.php\">Se déconnecter</a>
		</div>
	</div>
	

	<div class="content">
		<div class="inserer" align="center">
			<fieldset>
				<legend>Ajouter un courrier</legend>
				<form action="#">
					<table>
						<tr>
							<td colspan="2" id="radio">
								<input type="radio" name="statut" id="radioEntrant" checked><label for="radioEntrant">Courrier entrant</label>
								<input type="radio" name="statut" id="radioSortant"><label for="radioSortant">Courrier sortant</label>
							</td>
						</tr>
						
						<tr>
							<td><label for="observation">Date : </label></td>
							<td><input type="text" name="date" id="insertDate" class="datepicker" required></td>
						</tr>
						<tr id="entrant">
							<td><label for="destinataire">Expéditeur : </label></td>
							<td><input type="text" name="destinataire" id="destinataire" required></td>
						</tr>
						<tr id="sortant">
							<td><label for="service">Expediteur : </label></td>
							<td>
								<?php
								$reponse = $bdd->query('SELECT * FROM service');
								?>
								<select name="service" id="service" required>
									<?php
									while($ligne = $reponse->fetch())
									{
										echo "<option value=".$ligne['id_service'].">".$ligne['nom_service']."</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="objet">Objet : </label></td>
							<td><input type="text" name="objet" id="objet" required></td>
						</tr>
						<tr id="entrant2">
							<td><label for="service">Destinataire : </label></td>
							<td>
								<?php
								$reponse = $bdd->query('SELECT * FROM service');
								?>
								<select name="service" id="service" required>
									<?php
									while($ligne = $reponse->fetch())
									{
										echo "<option value=".$ligne['id_service'].">".$ligne['nom_service']."</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr id="sortant2">
							<td>
								<!-- <input type="radio" name="radioDestinataire" id="radioDestinataire1"> -->
								<label for="destinataire">Destinataire : </label>	
							</td>
							<td>
								<input type="text" name="destinataire" id="destinataire" >
								<a href="#"><img src="image/ajouter.png" alt="Ajouter un destinataire" id="imgAjouter"></a>
							</td>
						</tr>
						
						<tr id="sortant3">
							<td><!-- <input type="radio" name="radioDestinataire" id="radioDestinataire2"> --><label for="destinataire">Liste de destinataires : </label></td>
							<td><input type="file" name="destinatairefile" id="destinatairefile" ></td>
						</tr>
						<tr>
							<td><label for="observation">Observation : </label></td>
							<td>
								<?php
								$reponse = $bdd->query('SELECT * FROM observation');
								?>
								<select name="observation" id="observation" required>
									<?php
									while($ligne = $reponse->fetch())
									{
										echo "<option value=".$ligne['id_observation'].">".$ligne['nom_observation']."</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="type">Type : </label></td>
							<td>
								<?php
								$reponse = $bdd->query('SELECT * FROM type_courrier');
								?>
								<select name="type" id="type" required>
									<?php
									while($ligne = $reponse->fetch())
									{
										echo "<option value=".$ligne['id_type_courrier'].">".$ligne['nom_type_courrier']."</option>";
									}
									?>
								</select>
								<div id="divAR">
									<select name="AR" id="AR">
										<option value"!AR">Sans AR</option>
										<option value="AR">Avec AR</option>
									</select>
								</div>
								
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" id="valider" name="valider" value="Ajouter">
								<input type="button"  id="reset" name="reset" value="Effacer">
							</td>
						</tr>
					</table>
				</form>
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