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
	$num = addslashes(strip_tags($_POST['num']));
	$objet = addslashes(strip_tags($_POST['objet']));
	$expe = addslashes(strip_tags($_POST['expediteur']));
	$dest = addslashes(strip_tags($_POST['destinataire']));
	$service = addslashes(strip_tags($_POST['service']));
	$date_debut = addslashes(strip_tags($_POST['date_debut']));
	$date_fin = addslashes(strip_tags($_POST['date_fin']));
	$sens = addslashes(strip_tags($_POST['sens']));

	// construction de la requete SQL
	$sql = 'SELECT id_courrier, objet_courrier, date_courrier, observation, id_accuse_de_reception, nom_nature, nom_type, num_envoi,  nom_expediteur, service_expediteur.nom_service AS serviceE, nom_destinataire, service_destinataire.nom_service AS serviceD
		FROM courrier, destinataire, expediteur, service_expediteur, service_destinataire, nature, type, utilisateur
		WHERE courrier.id_nature = nature.id_nature
		AND courrier.id_type = type.id_type
		AND courrier.id_destinataire = destinataire.id_destinataire
		AND courrier.id_expediteur = expediteur.id_expediteur
		AND destinataire.id_service = service_destinataire.id_service
		AND expediteur.id_service = service_expediteur.id_service';

	if($num != null) {
		$sql .= ' AND num_envoi = "'.$num.'"';
	}
	if($sens != null) {
		$sql .= ' AND nom_type = "'.$sens.'"';
	}
	if($objet != null) {
		$sql .= ' AND objet_courrier LIKE "%'.$objet.'%"';
	}
	if($expe != null) {
		$sql .= ' AND nom_expediteur LIKE "%'.$expe.'%"';
	}
	if($dest != null) {
		$sql .= ' AND nom_destinataire LIKE "%'.$dest.'%"';
	}
	if($service != null) {
		$sql .= ' AND service_expediteur.nom_service LIKE "%'.$service.'%" OR service_destinataire.nom_service LIKE "%'.$service.'%"';
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
			<th>ID</th>
			<th>Num. envoi</th>
			<th>Objet</th>
			<th>Date</th>
			<th>Observation</th>
			<th>Type</th>
			<th>Expediteur</th>
			<th>Destinataire</th>
		</tr>
		<?php
		while($ligne = $reponse->fetch())
		{
		?>
		<tr>
			<td><?php echo $ligne['id_courrier'] ?></td>
			<td><?php echo $ligne['num_envoi'] ?></td>
			<td><?php echo $ligne['objet_courrier'] ?></td>
			<td><?php echo $ligne['date_courrier'] ?></td>
			<td><?php echo $ligne['observation'] ?></td>
			<td><?php echo $ligne['nom_nature'] ?></td>
			<td><?php echo $ligne['nom_expediteur']." (".$ligne['serviceE'].")" ?></td>
			<td><?php echo $ligne['nom_destinataire']." (".$ligne['serviceD'].")" ?></td>
			<td><a href="#" onClick="window.open('modifier.php?id=<?php echo $ligne['id_courrier'] ?>','Modification','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=400, height=300');return(false)">Modifier</a></td>
		</tr>
		<?php
		}
		?>
	</table>
</body>
</html>
