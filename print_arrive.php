<?php
// Page qui affiche les courriers arrivés du jour dans un format imprimable


// activation des variables de sessions
session_start();

include('include/bdd.php');
$date = date('d-m-Y');

function dateFR() {
	setlocale( LC_TIME, "fr_FR.utf8" );
	return strftime("%A %d %B %Y", time());
}

?>

<!doctype html>
<html lang="fr_FR">
<head>
	<meta charset="UTF-8">
	<title>Courrier arrivé</title>
	<style type="text/css" media="all">
		body {
			width: 900px;
			margin: 0 auto;
		}

		p {
			margin: 0;
		}

		.header {
			text-align: center;
			margin-bottom: 20px;
		}

		.titre {
			margin-bottom: 35px;
		}
		
		.titre p {
			margin-top: 10px;
		}
		
		.titre2 {
				
		}
		
		.titre2 {
			text-align: right;
			font-size: 12px;
		}

		.titre2 h1 {
			text-align: center;
		}
		
		.date {
			text-align: center;
			display: inline-block;
			background: rgba(0, 0, 255, 0.4);
			padding: 10px;
			width: 200px;
			font-size: 16px;
		}
		
		.titre2 hr {
			color: rgba(204, 0, 0, 1);
			border: none;
			border-bottom-style: dashed;
			border-bottom-width: 3px;
		}

		a {
			outline: 0;
		}
		.corp table {
			width: 900px;
			border-collapse: collapse;

		}

		.corp table th {
			background: blue;
			color: #CCCCCC;
			border: 2px solid grey;
			height: 40px;
		}

		.corp table td {
			border: 2px solid grey;
			height: 40px;
			padding-left: 2px;
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
		<div class="titre">
			<img src="image/logo.png" alt="Logo EPMS" id="logo">
			<p>ETABLISSEMENT PUBLIC MEDICO SOCIAL (Fondation Hardy)<br>
			23 bis avenue du Général Leclerc<br>
			77610 FONTENAY TRESIGNY / MARLES EN BRIE</p>
		</div>
		<div class="titre2">
			<div class="date">
				<p><?php echo dateFR(); ?></p>
			</div>
			<p><?php echo $_SESSION['prenom']." ".$_SESSION['nom'] ?></p>
			<h1>COURRIER ARRIVÉE</h1>
			<hr>
		</div>
		
		
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
	AND date_courrier = "'.$date.'"
	AND type.nom_type = "Entrant"
	GROUP BY id_courrier';
	$reponse = $bdd->query($requete);
	?>
	<div class="corp">
		<table>
			<tr>
				<th>Expediteur</th>
				<th>Objet</th>
				<th>Destinataire</th>
				<th>observation</th>
			</tr>
			<?php
			while($ligne = $reponse->fetch())
			{
			?>
				<tr>
					<td><?php echo $ligne['nom_expediteur']." (".$ligne['serviceE'].")"; ?></td>
					<td><?php echo $ligne['objet_courrier']; ?></td>
					<td><?php echo $ligne['nom_destinataire']." (".$ligne['serviceD'].")"; ?></td>
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
