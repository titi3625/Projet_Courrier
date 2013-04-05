<?php
include('../bdd.php');
if(isset($_POST)) {

	extract($_POST);

	$requete = "SELECT courrier.date_courrier, type.nom_type, histo_courrier.id_courrier, histo_courrier.date_modif, histo_courrier.objet_modif, histo_courrier.observation_modif, nature.nom_nature, nom_expediteur_modif, service_expediteur.nom_serviceE, nom_destinataire_modif, service_destinataire.nom_serviceD, histo_courrier.login_utilisateur
	FROM courrier, nature, type, histo_courrier, service_expediteur, service_destinataire
	WHERE histo_courrier.id_courrier = courrier.id_courrier
	AND courrier.id_type = type.id_type
	AND histo_courrier.id_nature_modif = nature.id_nature
	AND histo_courrier.service_destinataire_modif = service_destinataire.id_serviceD
	AND histo_courrier.service_expediteur_modif = service_expediteur.id_serviceE";

	if(!empty($date_modif)) {
		$requete .= " AND histo_courrier.date_modif = '".$date_modif."'";
	}
	if(!empty($auteur_modif)) {
		$requete .= " AND histo_courrier.login_utilisateur = '".$auteur_modif."'";
	}
}
else {
	echo "ERREUUUUUR";
}
//echo $requete;
$reponse = $bdd->query($requete);
?>

<table>
	<tr>
		<th>Numero Courrier</th>
		<th>Date courrier</th>
		<th>Objet courrier</th>
		<th>Observation</th>
		<th>Expediteur</th>
		<th>Destinataire</th>
		<th>Type courrier</th>
		<th>Sens courrier</th>
		<th>Date modif</th>
		<th>Utilisateur modif</th>
	</tr>
	<?php
	while($ligne = $reponse->fetch()) {
	?>
	<tr>
		<td><?php echo $ligne['id_courrier']; ?></td>
		<td><?php echo $ligne['date_courrier']; ?></td>
		<td><?php echo $ligne['objet_modif']; ?></td>
		<td><?php echo $ligne['observation_modif']; ?></td>
		<td><?php echo $ligne['nom_expediteur_modif']." (".$ligne['nom_serviceE'].")"; ?></td>
		<td><?php echo $ligne['nom_destinataire_modif']." (".$ligne['nom_serviceD'].")"; ?></td>
		<td><?php echo $ligne['nom_nature']; ?></td>
		<td><?php echo $ligne['nom_type']; ?></td>
		<td><?php echo $ligne['date_modif']; ?></td>
		<td><?php echo $ligne['login_utilisateur']; ?></td>
	</tr>
	<?php
	}
	?>
</table>