<legend>Gestion des types de courrier</legend>
<table id="tableauType">
	<tr>
		<th>Numéro de type</th>
		<th>Type existant</th>
		<th>Activé</th>
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
			<td>
			<?php
			if($ligne['active'] == '1')	{
				echo "Oui";
			}
			else {
				echo "Non";
			}
			?>
			</td>
			<td><a href="#" onclick="window.open('include/type/modifier_type.php?id=<?php echo $ligne['id_nature']; ?>&nom=<?php echo $ligne['nom_nature']; ?>&num=<?php echo $ligne['num_envoi'] ?>&active=<?php echo $ligne['active'] ?>', 'wclose', 'width=500,height=300,toolbar=no,status=no,left=20,top=30'); Location:reload();">Modifier</a></td>
		</tr>	
	<?php
	}
	?>
</table>
<hr>
<h2>Ajouter un type</h2>
<form action="include/type/gestion_type.method.php" method="post" id="insererType">
	<table>
		<tr>
			<td><label for="type">Nouveau type de courrier : </label></td>
			<td>
				<input type="text" name="nom" id="nom" pattern="[A-Za-z._-\w]{1,20}" required>
				<input type="hidden" name="action" id="action" value="insertion">
			</td>
			
		</tr>
		<tr align="center">
			<td align="center"><input type="checkbox" name="num" id="num"><label for="num">Avec numéro d'envoi</label></td>
		</tr>
		<tr>
			<td colspan="2" id="trBouton">
				<input type="submit" name="valider" value="Valider">
			</td>
		</tr>
	</table>
</form>
