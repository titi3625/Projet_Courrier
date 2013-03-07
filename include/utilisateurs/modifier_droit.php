<?php
require('../bdd.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {
	extract($_GET);
	$reponse = $bdd->query("SELECT * FROM utilisateur WHERE id_utilisateur = ".$id.";");
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
			//text-align: center;
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
					<td><label for="">Num. de l'utilisateur : </label></td>
					<td><?php echo $id; ?></td>
				</tr>
				<tr>
					<td><label for="nom">Nom : </label></td>
					<td><input type="text" name="nom" id="nom" value="<?php echo $ligne['nom_utilisateur'] ?>" pattern="[A-Za-z._-\w]{1,20}" required></td>
				</tr>
				<tr>
					<td><label for="nom">Prénom : </label></td>
					<td><input type="text" name="prenom" id="prenom" value="<?php echo $ligne['prenom_utilisateur'] ?>" pattern="[A-Za-z._-\w]{1,20}" required></td>
				</tr>
				<tr>
					<td><label for="nom">Pseudo : </label></td>
					<td><input type="text" name="pseudo" id="pseudo" value="<?php echo $ligne['login_utilisateur'] ?>" pattern="[A-Za-z0-9._-\w]{1,20}" required></td>
				</tr>
				<tr>
					<td><label for="nom">Mot de passe : </label></td>
					<td><input type="text" name="mdp" id="mdp" value="<?php echo $ligne['mdp_utilisateur'] ?>" pattern="[A-Za-z0-9]{1,20}" required></td>
				</tr>
				<tr>
					<td><label for="nom">Droit : </label></td>
					<td>
						<?php
						if($ligne['droit_utilisateur'] == "admin")
						{
						?>
							<select name="droit" id="droit" value="<?php echo $ligne['droit_utilisateur'] ?>">
								<option value="user">Utilisateur</option>
								<option value="admin" selected>Administrateur</option>
							</select>
						<?php
						}
						else {
							?>
							<select name="droit" id="droit" value="<?php echo $ligne['droit_utilisateur'] ?>">
								<option value="user" selected>Utilisateur</option>
								<option value="admin">Administrateur</option>
							</select>
							<?php
						}
						?>
						
					</td>
				</tr>
				<tr><td colspan="2"><input type="submit" value="Modifier" name="valider"></td></tr>
			</table>
			<input type="hidden" name="action" id="action" value="modification">
			<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
		</form>
	</fieldset>
	
</body>
</html>
