<?php
include('include/bdd.php');
$date = date('d-m-Y');
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Courrier arrivé</title>
	<style>
		body {
			width: 900px;
			margin: 0 auto;
		}
		.header {
			text-align: center;
			margin-bottom: 20px;
		}
		a {
			
		}
		.corp table {
			width: 900px;
			border-collapse: collapse;

		}

		.corp table th {
			background: blue;
			color: white;
			border: 2px solid black;
		}

		.corp table td {
			border: 2px solid black;
		}

		.header img {
			float: left;
			width: 10%;
			height: 10%;
			margin: 0px 0px 0px 0px;
		}

	</style>

</head>
<body>
	<div class="header">
		<img src="image/logo.png" alt="Logo EPMS">	
		<h1>Courrier arrivée</h1>
		<?php echo $date; ?>
		
	</div>
	

	<?php
	$requete = 'SELECT id_courrier, objet_courrier, date_courrier, observation, id_accuse_de_reception, nom_nature, nom_type, courrier.num_envoi, nom_expediteur, service_expediteur.nom_serviceE AS serviceE, nom_destinataire, service_destinataire.nom_serviceD AS serviceD
	FROM courrier, destinataire, expediteur, service_expediteur, service_destinataire, nature, type, utilisateur
	WHERE courrier.id_nature = nature.id_nature
	AND courrier.id_type = type.id_type
	AND courrier.id_destinataire = destinataire.id_destinataire
	AND courrier.id_expediteur = expediteur.id_expediteur
	AND destinataire.id_service = service_destinataire.id_serviceD
	AND expediteur.id_service = service_expediteur.id_serviceE
	AND date_courrier = "2013-03-06" GROUP BY id_courrier';
	$reponse = $bdd->query($requete);
	?>
	<div class="corp">
		<table>
			<tr>
				<th>Date</th>
				<th>Objet</th>
				<th>Expediteur</th>
				<th>Destinataire</th>
				<th>observation</th>
			</tr>
			<?php
			while($ligne = $reponse->fetch())
			{
			?>
				<tr>
					<td><?php echo $ligne['date_courrier']; ?></td>
					<td><?php echo $ligne['objet_courrier']; ?></td>
					<td><?php echo $ligne['nom_expediteur']." ".$ligne['serviceE']; ?></td>
					<td><?php echo $ligne['nom_destinataire']." ".$ligne['serviceD']; ?></td>
					<td><?php echo $ligne['observation']; ?></td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
	<div class="footer">

	</div>
</body>
</html>

