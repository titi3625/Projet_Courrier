<?php
require('../bdd.php');
if(isset($_GET['id']) && !empty($_GET['id'])) {
	extract($_GET);
	$requete = "SELECT * FROM accuse_de_reception WHERE id_accuse = '".$id."'";
	$reponse = $bdd->query($requete);
	$ligne = $reponse->fetch();
}
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Modifier un type</title>
	<style>
		body {
			margin: auto;
			font-family: trebuchet,arial,tahoma,verdana,sans-serif;
			font-size: 11px;
		}
		fieldset {
			height: 180px;
			width: auto;
			border-radius: 10px;
			padding: 5px 0px 5px 0px;
		}
		table {
			margin: auto;
			width: auto;
			border-collapse: collapse;
		}
		table tr {
			height: 35px;
		}
		table tr td {
			width: 100px;
			text-align: center;
			padding: 5px;
		}
		input[type="text"] {
			width: 200px;
		}
	</style>
</head>
<body>
	<fieldset>
		<legend>Modifier un service</legend>
		<table>
			<tr>
				<td>Date de retour : </td>
				<td><?php echo $ligne['date_accuse']; ?></td>
			</tr>
			<tr>
				<td>Num. de l'accusé de réception</td>
				<td><?php echo $ligne['num_accuse']; ?></td>
			</tr>
			<tr>
				<td colspan="2">
					<a href="#" onclick="window.close()">Fermer la fenêtre</a>
				</td>
			</tr>
		</table>
	</fieldset>
	
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="js/interface.js"></script>
</body>
</html>
