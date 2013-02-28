<legend>Gestion des types de courrier</legend>
<table id="tableauType">
	<tr>
		<th>Numéro de type</th>
		<th>Type existant</th>
		<td>Action</td>
	</tr>
	<?php
	$reponse = $bdd->query("SELECT * FROM nature");
	while($ligne = $reponse->fetch())
	{
	?>
		<tr>
			<td><?php echo $ligne['id_nature']; ?></td>
			<td><?php echo $ligne['nom_nature']; ?></td>
			<td><a href="#" onclick="window.open('include/type/modifier_type.php?id=<?php echo $ligne['id_nature']; ?>&nom=<?php echo $ligne['nom_nature']; ?>', 'wclose', 'width=500,height=300,toolbar=no,status=no,left=20,top=30'); Location:reload();">Modifier</a></td>
		</tr>	
	<?php
	}
	?>
</table>

<form action="include/type/gestion_type.method.php" method="post" id="insererType">
	<table>
		<tr>
			<td><label for="type">Nouveau type de courrier : </label></td>
			<td>
				<input type="text" name="nom" id="nom" pattern="[A-Za-z._-\w]{1,20}" required>
				<input type="hidden" name="action" id="action" value="insertion">
			</td>
		</tr>
		<tr>
			<td colspan="2" id="trBouton">
				<input type="submit" name="valider" value="Valider">
			</td>
		</tr>
	</table>
</form>
