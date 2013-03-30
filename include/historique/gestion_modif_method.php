<?php
include('../bdd.php');
if(isset($_POST)) {

	extract($_POST);

	$requete = "SELECT courrier.id_courrier, courrier.objet_courrier, courrier.date_courrier, courrier.observation, courrier.id_accuse_de_reception, nature.nom_nature, type.nom_type, courrier.num_envoi, histo_courrier.login_utilisateur, histo_courrier.date_modif
	FROM courrier, nature, type, histo_courrier 
	WHERE courrier.id_nature = nature.id_nature 
	AND courrier.id_type = type.id_type 
	AND courrier.id_courrier = histo_courrier.id_courrier";

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
		<td><?php echo $ligne['objet_courrier']; ?></td>
		<td><?php echo $ligne['observation']; ?></td>
		<td><?php echo $ligne['nom_nature']; ?></td>
		<td><?php echo $ligne['nom_type']; ?></td>
		<td><?php echo $ligne['date_modif']; ?></td>
		<td><?php echo $ligne['login_utilisateur']; ?></td>
	</tr>
	<?php
	}
	?>
</table>