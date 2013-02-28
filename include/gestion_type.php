<legend>Ajouter un type de courrier</legend>
<table id="tableauType">
	<tr>
		<th>Type existant</th>
	</tr>
	<?php
	$reponse = $bdd->query("SELECT * FROM nature");
	while($ligne = $reponse->fetch())
	{
	?>
		<tr>
			<td><?php echo $ligne['nom_nature']; ?></td>
		</tr>	
	<?php
	}
	?>
</table>
<form action="gestion_type.method.php" method="post" id="insererType">
	<table>
		<tr>
			<td><label for="type">Nouveau type de courrier : </label></td>
			<td><input type="text" name="type" id="type"></td>
		</tr>
		<tr>
			<td colspan="2" id="trBouton">
				<input type="submit" name="valider" value="Valider">
				<input type="reset" name="reset" value="Reset">
			</td>
		</tr>
	</table>
</form>
