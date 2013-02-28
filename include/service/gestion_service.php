<legend>Gestion des services</legend>
<table id="tableauType">
	<tr>
		<th>Numéro de service</th>
		<th>Services existants</th>
		<td>Action</td>
	</tr>
	<?php
	$reponse = $bdd->query("SELECT * FROM service");
	while($ligne = $reponse->fetch())
	{
	?>
		<tr>
			<td><?php echo $ligne['id_service']; ?></td>
			<td><?php echo $ligne['nom_service']; ?></td>
			<td><a href="#" onclick="window.open('include/service/modifier_service.php?id=<?php echo $ligne['id_service']; ?>&nom=<?php echo $ligne['nom_service']; ?>', 'wclose', 'width=500,height=300,toolbar=no,status=no,left=20,top=30'); Location:reload();">Modifier</a></td>
		</tr>	
	<?php
	}
	?>
</table>

<form action="include/service/gestion_service.method.php" method="post" id="insererType">
	<table>
		<tr>
			<td><label for="type">Nouveau service : </label></td>
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
