<?php
if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['nom']) && !empty($_GET['nom'])) {
	extract($_GET);
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
			height: 270px;
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
		<form action="gestion_service.method.php" method="post" >
			<table>
				<tr>
					<td><label for="">Num. du service : </label></td>
					<td><?php echo $id; ?></td>
				</tr>
				<tr>
					<td><label for="nom">Nom : </label></td>
					<td><input type="text" name="nom" id="nom" value="<?php echo $nom; ?>" pattern="[A-Za-z._-\w]{1,20}" required></td>
				</tr>
				<tr><td colspan="2"><input type="submit" value="Modifier" name="valider"></td></tr>
			</table>
			<input type="hidden" name="action" id="action" value="modification">
			<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
		</form>
	</fieldset>
	
</body>
</html>
