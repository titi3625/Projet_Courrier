<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<?php
	// inclusion du fichier de connexion à la bdd
	include('include/bdd.php');
	
	// recuperation des variables depuis le formulaire de recherche en ajax
	$id = addslashes(strip_tags($_POST['id']));
	$objet = addslashes(strip_tags($_POST['objet']));
	$expe = addslashes(strip_tags($_POST['expediteur']));
	$dest = addslashes(strip_tags($_POST['destinataire']));
	$service = addslashes(strip_tags($_POST['service']));
	$date_debut = addslashes(strip_tags($_POST['date_debut']));
	$date_fin = addslashes(strip_tags($_POST['date_fin']));
	$sens = addslashes(strip_tags($_POST['sens']));
	
	// construction de la requete SQL
	$sql = 'SELECT id_courrier, objet_courrier, date_courrier, sens_courrier, nom_observation, id_accuse_accuse_de_reception, nom_type_courrier, nom_destinataire, nom_service, attribuer.sens_courrier
		FROM courrier, service, destinataire, observation, type_courrier, posseder, attribuer
		WHERE courrier.id_courrier = posseder.id_courrier_courrier
		AND courrier.id_courrier = attribuer.id_courrier_courrier
		AND attribuer.id_service_service = service.id_service
		AND posseder.id_destinataire_destinataire = destinataire.id_destinataire
		AND courrier.id_observation_observation = observation.id_observation
		AND courrier.id_type_courrier_type_courrier = type_courrier.id_type_courrier ';

	if($id != null) {
		$sql .= ' AND id_courrier = "'.$id.'"';
	}
	if($sens != null) {
		$sql .= ' AND sens_courrier = "'.$sens.'"';
	}
	if($objet != null) {
		$sql .= ' AND objet_courrier LIKE "%'.$objet.'%"';
	}
	if($expe != null) {
		$sql .= 'AND (service.nom_service LIKE "%'.$expe.'%" AND attribuer.sens_service = "expediteur")
				OR (destinataire.nom_destinataire LIKE "%'.$expe.'%" AND posseder.sens_destinataire = "expediteur")';
	}
	if($dest != null) {
		$sql .= ' AND nom_destinataire LIKE "%'.$dest.'%"';
	}
	if($service != null) {
		$sql .= ' AND nom_service LIKE "%'.$service.'%" AND attribuer.sens_service =';
	}

	if($date_debut != null && $date_fin != null) {
		$sql .= " AND date_courrier BETWEEN '".$date_debut."' AND '".$date_fin."'";
	}
		
	$sql .= ' GROUP BY id_courrier;';
	echo $sql;
	$reponse = $bdd->query($sql);
	?>
	<table>
		<tr>
			<th>Num</th>
			<th>Objet</th>
			<th>Date</th>
			<th>Observation</th>
			<th>Type</th>
			<th>Expediteur</th>
			<th>Destinataire</th>
			<th>Statut</th>
			<th>Action</th>
		</tr>
		<?php
		while($ligne = $reponse->fetch())
		{
		?>
		<tr>
			<td><?php echo $ligne['id_courrier'] ?></td>
			<td><?php echo $ligne['objet_courrier'] ?></td>
			<td><?php echo $ligne['date_courrier'] ?></td>
			<td><?php echo $ligne['nom_observation'] ?></td>
			<td><?php echo $ligne['nom_type_courrier'] ?></td>
			<td><?php echo $ligne['nom_destinataire'] ?></td>
			<td><?php echo $ligne['nom_service'] ?></td>
			<td><?php echo $ligne['sens_courrier'] ?></td>
			<td><a href="#" onClick="window.open('modifier.php?id=<?php echo $ligne['id_courrier'] ?>','Modification','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=800, height=720');return(false)">Modifier</a></td>
		</tr>
		<?php
		}
		?>
	</table>
</body>
</html>
