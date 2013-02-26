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
	<title>Modification courrier</title>
</head>
<body>
	<?php
	include_once('bdd.php');

	$id = addslashes($_GET['id']);
	$sql = 'SELECT id_courrier, objet_courrier, date_courrier, sens_courrier, nom_observation, id_accuse_accuse_de_reception, nom_type_courrier, nom_destinataire, nom_service 
	FROM courrier, service, destinataire, observation, type_courrier, posseder, attribuer 
	WHERE courrier.id_courrier = posseder.id_courrier_courrier 
	AND courrier.id_courrier = attribuer.id_courrier_courrier 
	AND attribuer.id_service_service = service.id_service 
	AND posseder.id_destinataire_destinataire = destinataire.id_destinataire 
	AND courrier.id_observation_observation = observation.id_observation 
	AND courrier.id_type_courrier_type_courrier = type_courrier.id_type_courrier 
	AND id_courrier = "'.$id.'" GROUP BY id_courrier;';

	$reponse = $bdd->query($sql);
	$ligne = $reponse->fetch();
	?>

	<form action="modifier.method.php" method="post" id="formModif">
		<tr>
			<td><label for="objetModif">Objet : </label></td>
			<td><input type="text" name="objetModif" id="objetModif" value="<?php echo $ligne['objet_courrier'] ?>"></td>
		</tr>
		<tr>
			<td><label for="dateModif">Date : </label></td>
			<td><input type="text" name="dateModif" id="dateModif" value="<?php echo $ligne['date_courrier'] ?>"></td>
		</tr>
		<tr>
			<td><label for="observModif">Observation : </label></td>
			<td><input type="text" name="observModif" id="observModif" value="<?php echo $ligne['nom_observation'] ?>"></td>
		</tr>
		<tr>
			<td><label for="typeModif">Type : </label></td>
			<td><input type="text" name="typeModif" id="typeModif" value="<?php echo $ligne['nom_type_courrier'] ?>"></td>
		</tr>
		<tr>
			<td><label for="expeModif">Expediteur : </label></td>
			<td><input type="text" name="expeModif" id="expeModif" value="<?php echo $ligne['objet_courrier'] ?>"></td>
		</tr>
		<tr>
			<td><label for="destModif">Destinataire : </label></td>
			<td><input type="text" name="destModif" id="destModif" value="<?php echo $ligne['objet_courrier'] ?>"></td>
		</tr>
		<tr>
			<td><label for="sensModif">Sens du courrier : </label></td>
			<td><input type="text" name="sensModif" id="sensModif" value="<?php echo $ligne['sens_courrier'] ?>"></td>
		</tr>
	</form>
</body>
</html>