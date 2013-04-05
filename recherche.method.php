<!doctype html>

<!-- Page qui récupere les champs du formulaire de recherche, qui execute les requetes et retourne les resultats sous la forme d'un tableau -->
<html>
<head>
	<meta charset="UTF-8">

	<script>
		$('.imprimRecherche').on("click", function() {
			$('.footer').hide();
			$('.header').hide();
			window.print();
			$('.header').show();
			$('.footer').show();
		});
	</script>
</head>
<body>
	<?php
	// inclusion du fichier de connexion à la bdd
	include('include/bdd.php');
	
	// recuperation des variables depuis le formulaire de recherche en ajax avec recherche.js
	$num = addslashes(strip_tags($_POST['num']));
	$objet = addslashes(strip_tags($_POST['objet']));
	$expe = addslashes(strip_tags($_POST['expediteur']));
	$dest = addslashes(strip_tags($_POST['destinataire']));
	$service = addslashes(strip_tags($_POST['service']));
	$date_debut = addslashes(strip_tags($_POST['date_debut']));
	$date_fin = addslashes(strip_tags($_POST['date_fin']));
	$sens = addslashes(strip_tags($_POST['sens']));

	// construction de la requete SQL
	$sql = 'SELECT id_courrier, objet_courrier, date_courrier, observation, id_accuse_de_reception, nom_nature, nom_type, courrier.num_envoi, nom_expediteur, service_expediteur.nom_serviceE AS serviceE, nom_destinataire, service_destinataire.nom_serviceD AS serviceD
		FROM courrier, destinataire, expediteur, service_expediteur, service_destinataire, nature, type, utilisateur
		WHERE courrier.id_nature = nature.id_nature
		AND courrier.id_type = type.id_type
		AND courrier.id_destinataire = destinataire.id_destinataire
		AND courrier.id_expediteur = expediteur.id_expediteur
		AND destinataire.id_service = service_destinataire.id_serviceD
		AND expediteur.id_service = service_expediteur.id_serviceE';

	// on concatene la variable qui contient la requete selon les critères renseigné
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
		$sql .= ' AND (service_expediteur.nom_serviceE LIKE "%'.$service.'%" OR service_destinataire.nom_serviceD LIKE "%'.$service.'%")';
	}
	if($date_debut != null && $date_fin != null) {
		$sql .= " AND date_courrier BETWEEN '".$date_debut."' AND '".$date_fin."'";
	}
	$sql .= ' GROUP BY id_courrier;';

	//echo $sql;

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
			<th>Statut</th>
			<th>Accusé</th>
			<th>
				<a href="#" class="imprimRecherche">Imprimer</a>				
			</th>
		</tr>
		<?php
		while($ligne = $reponse->fetch())
		{
		?>
		<tr>
			<td><?php echo $ligne['id_courrier']; ?></td>
			<td>
			<?php
			if(empty($ligne['num_envoi'])) {
				echo "Non renseigné";
			}
			else {
				echo $ligne['num_envoi'];
			}
			?>
			</td>
			<td><?php echo $ligne['objet_courrier']; ?></td>
			<td><?php echo $ligne['date_courrier']; ?></td>
			<td><?php echo $ligne['observation']; ?></td>
			<td><?php echo $ligne['nom_nature']; ?></td>
			<td><?php echo $ligne['nom_expediteur']." (".$ligne['serviceE'].")"; ?></td>
			<td><?php echo $ligne['nom_destinataire']." (".$ligne['serviceD'].")"; ?></td>
			<td><?php echo $ligne['nom_type']; ?></td>
			<td>
				<?php 
				if($ligne['id_accuse_de_reception'] != '0') {
					echo "<a href=\"#\" onClick=\"window.open('include/accuse/view_accuse.php?id=".$ligne['id_accuse_de_reception']."','Accusé de réception','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=300, height=200');return(false)\">Oui</a>";
				}
				else {
					echo "Non";
				}
				?>
			</td>
			<td><a href="#" onClick="window.open('modifier.php?id=<?php echo $ligne['id_courrier']; ?>','Modification','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=600, height=400');return(false)">Modifier</a></td>
		</tr>
		<?php
		}
		?>
	</table>
</body>
</html>
