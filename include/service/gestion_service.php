<legend>Gestion des services</legend>
<table id="tableauType">
	<tr>
		<th>Numéro de service</th>
		<th>Services existants</th>
		<td>Activé</td>
		<td>Action</td>
	</tr>
	<?php
	$reponse = $bdd->query("SELECT service_expediteur.id_serviceE AS id_serviceE, service_expediteur.nom_serviceE AS nom_serviceE, active FROM service_expediteur");
	while($ligne = $reponse->fetch())
	{
	?>
		<tr>
			<td><?php echo $ligne['id_serviceE']; ?></td>
			<td><?php echo $ligne['nom_serviceE']; ?></td>
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
			<td><a href="#" onclick="window.open('include/service/modifier_service.php?id=<?php echo $ligne['id_serviceE']; ?>&nom=<?php echo $ligne['nom_serviceE']; ?>&active=<?php echo $ligne['active']; ?>', 'wclose', 'width=500,height=300,toolbar=no,status=no,left=20,top=30'); Location:reload();">Modifier</a></td>
		</tr>	
	<?php
	}
	?>
</table>

<form action="gestion_service.method.php" method="post" id="insererType">
	<table>
		<tr>
			<td><label for="type">Nouveau service : </label></td>
			<td>
				<input type="text" name="nom" id="nom" pattern="[A-Za-z._-\w]{2,20}" required>
				<input type="hidden" name="action" id="action" value="insertion">
			</td>
		</tr>
		<tr>
			<td colspan="2" id="trBouton">
				<input type="submit" name="valider" value="Ajouter">
			</td>
		</tr>
	</table>
</form>
