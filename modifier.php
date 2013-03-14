<?php
session_start();
$utilisateur = $_SESSION['login'];

?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Modification courrier</title>
	<style>
		body {
			
		 	margin:auto;
		}
		#formModif table {
			margin: 0 auto;
			height: 350px;
		}
	</style>
	<link rel="stylesheet" href="css/Aristo/Aristo.css">
</head>
<body>
	<?php
	include_once('include/bdd.php');
	if(isset($_GET['id']) && !empty($_GET['id'])) {
		$id = addslashes($_GET['id']);
	}
	else {
		echo "Erreuuur";
		return false;
	}
	
	$sql = 'SELECT id_courrier, objet_courrier, date_courrier, observation, id_accuse_de_reception, nom_nature, nom_type, num_envoi, courrier.id_expediteur, nom_expediteur, service_expediteur.nom_service AS serviceE, courrier.id_destinataire, nom_destinataire, service_destinataire.nom_service AS serviceD
		FROM courrier, destinataire, expediteur, service_expediteur, service_destinataire, nature, type, utilisateur
		WHERE courrier.id_nature = nature.id_nature
		AND courrier.id_type = type.id_type
		AND courrier.id_destinataire = destinataire.id_destinataire
		AND courrier.id_expediteur = expediteur.id_expediteur
		AND destinataire.id_service = service_destinataire.id_service
		AND expediteur.id_service = service_expediteur.id_service
		AND id_courrier = "'.$id.'" 
		GROUP BY id_courrier;';

	$reponse = $bdd->query($sql);
	$ligne = $reponse->fetch();
	?>

	<form action="modifier_courrier.php" method="post" id="formModif">
		<input type="hidden" name="idModif" id="idModif" value="<?php echo $id ?>">
		<table>
			<tr>
				<td><label for="numModif">Num. d'envoi : </label></td>
				<td><input type="text" name="numModif" id="numModif" value="<?php echo $ligne['num_envoi'] ?>"></td>
			</tr>
			<tr>
				<td><label for="objetModif">Objet : </label></td>
				<td><input type="text" name="objetModif" id="objetModif" value="<?php echo $ligne['objet_courrier'] ?>"></td>
			</tr>
			<tr>
				<td><label for="dateModif">Date : </label></td>
				<td><input type="text" name="dateModif" id="dateModif" class="datepicker" value="<?php echo $ligne['date_courrier'] ?>"></td>
			</tr>
			<tr>
				<td><label for="observModif">Observation : </label></td>
				<td><input type="text" name="observModif" id="observModif" value="<?php echo $ligne['observation'] ?>"></td>
			</tr>
			<tr>
				<td><label for="typeModif">Type : </label></td>
				<td>
					<select name="typeModif" id="typeModif">
						<?php
						$reponse = $bdd->query('SELECT * FROM nature');
						
						while($ligne2 = $reponse->fetch())
						{
							if($ligne['nom_nature'] == $ligne2['nom_nature']) {
								echo "<option value=".$ligne2['id_nature']." selected>".$ligne2['nom_nature']."</option>";
							}
							else {
								echo "<option value=".$ligne2['id_nature'].">".$ligne2['nom_nature']."</option>";
							}
							
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="expeModif">Expediteur : </label></td>
				<td>
					<input type="text" name="expeModif" id="expeModif" value="<?php echo $ligne['nom_expediteur'] ?>">
					<input type="hidden" name="idExpeModif" id="idExpeModif" value="<?php echo $ligne['id_expediteur'] ?>">
				</td>
				<td>
					<select name="serviceExpe" id="serviceExpe">
						<?php
						$reponse = $bdd->query('SELECT * FROM service_expediteur');
						
						while($ligne2 = $reponse->fetch())
						{
							if($ligne['serviceE'] == $ligne2['nom_service']) {
								echo "<option value=".$ligne2['id_service']." selected>".$ligne2['nom_service']."</option>";
							}
							else {
								echo "<option value=".$ligne2['id_service'].">".$ligne2['nom_service']."</option>";
							}
							
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="destModif">Destinataire : </label></td>
				<td>
					<input type="text" name="destModif" id="destModif" value="<?php echo $ligne['nom_destinataire'] ?>">
					<input type="hidden" name="idDestModif" id="idDestModif" value="<?php echo $ligne['id_destinataire'] ?>">
				</td>
				<td>
					<select name="serviceDest" id="serviceDest">
						<?php
						$reponse = $bdd->query('SELECT * FROM service_destinataire');
					
						while($ligne2 = $reponse->fetch())
						{
							if($ligne['serviceD'] == $ligne2['nom_service']) {
								echo "<option value=".$ligne2['id_service']." selected>".$ligne2['nom_service']."</option>";
							}
							else {
								echo "<option value=".$ligne2['id_service'].">".$ligne2['nom_service']."</option>";
							}
							
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" value="Modifier" id="submitModif">
				</td>
			</tr>
		</table>	
	</form>
	
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="js/interface.js"></script>
</body>
</html>