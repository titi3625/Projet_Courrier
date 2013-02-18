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
	$objet = str_replace("'", "\'", strip_tags($_POST['objet']));
	$dest = str_replace("'", "\'", strip_tags($_POST['destinataire']));
	$service = str_replace("'", "\'", strip_tags($_POST['service']));
	$date_debut = str_replace("'", "\'", strip_tags($_POST['date_debut']));
	$date_fin = str_replace("'", "\'", strip_tags($_POST['date_fin']));
	$sens = str_replace("'", "\'", strip_tags($_POST['sens']));
	
	$where = 0;
	// construction de la requete SQL
	$sql = 'SELECT id_courrier, objet_courrier, date_courrier, sens_courrier, nom_observation, id_accuse_accuse_de_reception, nom_type_courrier, nom_destinataire, nom_service FROM courrier NATURAL JOIN posseder NATURAL JOIN attribuer NATURAL JOIN service NATURAL JOIN destinataire NATURAL JOIN observation NATURAL JOIN type_courrier ';
	if($sens != null) {

		$sql .= 'WHERE sens_courrier = "'.strip_tags($sens).'"';
		$where = 1;
	}
	if($objet != null) {
		if($where == 1) {
			$sql .= ' AND objet_courrier LIKE "%'.strip_tags($objet).'%"';
		}
		else {
			$sql .= 'WHERE objet_courrier LIKE "%'.strip_tags($objet).'%"';
			$where = 1;
		}
	}
	if($dest != null) {
		if($where == 1) {
			$sql .= ' AND nom_destinataire LIKE "%'.strip_tags($dest).'%"';
		}
		else {
			$sql .= 'WHERE nom_destinataire LIKE "%'.strip_tags($dest).'%"';
			$where = 1;
		}
	}
	if($service != null) {
		if($where == 1) {
			$sql .= ' AND nom_service LIKE "%'.strip_tags($service).'%"';
		}
		else {
			$sql .= 'WHERE nom_service LIKE "%'.strip_tags($service).'%"';
			$where = 1;
		}
	}
	if($date_debut != null && $date_fin != null) {
		if($where == 1) {
			$sql .= " AND date_courrier BETWEEN '".$date_debut."' AND '".$date_fin."'";
		}
		else {
			$sql .= "WHERE date_courrier BETWEEN '".$date_debut."' AND '".$date_fin."'";
			$where = 1;
		}
	}
		
	$sql .= ' GROUP BY id_courrier;';
	
	$reponse = $bdd->query($sql);
	?>
	<table>
		<tr>
			<th>Num</th>
			<th>Objet</th>
			<th>Date</th>
			<th>Observation</th>
			<th>Type</th>
			<th>Destinataire</th>
			<th>Service</th>
			<th>Statut</th>
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
		</tr>
		<?php
		}
		?>
	</table>
</body>
</html>
