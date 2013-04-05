<!-- Page de gestion des utilisateurs et des droits (gestion.php) -->
<legend>Gestion des utilisateurs et des droits</legend>

<table id="tableauType">
	<tr>
		<th>Numéro d'utilisateur</th>
		<th>Nom</th>
		<td>Action</td>
	</tr>
	<?php
	$reponse = $bdd->query("SELECT * FROM utilisateur");
	while($ligne = $reponse->fetch())
	{
	?>
		<tr>
			<td><?php echo $ligne['id_utilisateur']; ?></td>
			<td><?php echo $ligne['prenom_utilisateur']." ".$ligne['nom_utilisateur']; ?></td>
			<td>
				<a href="#" onclick="window.open('include/utilisateurs/modifier_droit.php?id=<?php echo $ligne['id_utilisateur']; ?>', 'wclose', 'width=500,height=300,toolbar=no,status=no,left=20,top=30'); Location:reload();">Modifier</a>/<a href="#" onclick="if (window.confirm('Vous etes sur de ne pas faire une betise ?')){location.href='include/utilisateurs/supprimer_utilisateur.php?id=<?php echo $ligne['id_utilisateur']; ?>';return true;} else {return false;}">Supprimer</a>
			</td>
		</tr>	
	<?php
	}
	?>
</table>
<hr>
<h2>Ajouter un utilisateur</h2>
<form action="include/utilisateurs/gestion_droit.method.php" method="post" id="insererType">
	<table>
		<tr>
			<td><label for="type">Nom : </label></td>
			<td>
				<input type="text" name="nom" id="nom" required>
				<input type="hidden" name="action" id="action" value="insertion">
			</td>
		</tr>
		<tr>
			<td><label for="type">Prenom : </label></td>
			<td><input type="text" name="prenom" id="prenom" required></td>
		</tr>
		<tr>
			<td><label for="type">Nom d'utilisateur : </label></td>
			<td><input type="text" name="login" id="login" required></td>
		</tr>
		<tr>
			<td><label for="type">Mot de passe : </label></td>
			<td><input type="password" name="mdp" id="mdp"  required></td>
		</tr>
		<tr>
			<td><label for="type">Niveau de droit : </label></td>
			<td>
				<select name="droit" id="droit">
					<option value="user">Utilisateur</option>
					<option value="admin">Administrateur</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" id="trBouton">
				<input type="submit" name="valider" value="Valider">
			</td>
		</tr>
	</table>
</form>
