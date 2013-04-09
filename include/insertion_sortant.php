<!-- Page d'insertion des courrier sortant ou depart (inserer.php) -->
<legend>Ajouter un courrier départ</legend>
<form action="ajouter_courrier.php" method="post" id="insererSortant">
	<table>
		<tr>
			<td><label for="date">Date : </label></td>
			<td><input type="text" name="date" id="date" class="datepicker" required></td>
		</tr>
		<tr>
			<td><label for="objet">Objet : </label></td>
			<td><input type="text" name="objet" id="objet" required></td>
		</tr>
		<tr>
			<td><label for="expediteur">Expéditeur : </label></td>
			<td><input type="text" name="expediteur" id="expediteur" required></td>
			<td>
				<select name="serviceExpe" id="serviceExpe">
					<?php
					$reponse = $bdd->query('SELECT * FROM service_expediteur');
					
					while($ligne = $reponse->fetch())
					{
						if($ligne['active'] == '1') { // si le service est actif on le met dans la liste deroulante
							echo "<option value=".$ligne['id_serviceE'].">".$ligne['nom_serviceE']."</option>";
						}
						
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="destinataire">Destinataire : </label></td>
			<td><input type="text" name ="destinataire" id="destinataire" required></td>
			<td>
				<select name="serviceDest" id="serviceDest">
					<?php
					$reponse = $bdd->query('SELECT * FROM service_destinataire');
					
					while($ligne = $reponse->fetch())
					{
						if($ligne['active'] == '1') {
							echo "<option value=".$ligne['id_serviceD'].">".$ligne['nom_serviceD']."</option>";
						}
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="observation">Observation : </label></td>
			<td><input type="text" name="observation" id="observation"></td>
		</tr>
		<tr>
			<td><label for="">Type : </label></td>
			<td id="choixNature">
				<?php
				$reponse = $bdd->query('SELECT * FROM nature');
				while($ligne = $reponse->fetch())
				{
					if($ligne['active'] == '1')
					{
					?>
					<p><input type="radio" name="nature" id="<?php echo $ligne['nom_nature'] ?>" plop="<?php echo $ligne['num_envoi'] ?>" value="<?php echo $ligne['id_nature'] ?>" required><label for="<?php echo $ligne['nom_nature'] ?>"><?php echo $ligne['nom_nature'] ?></label></p>
					<?php
					}
				}
				?>
			</td>
			<td>
				<input type="text" name="numNature" id="numNature" placeholder="N° d'envoi ou colis" pattern="[a-zA-Z0-9]{5,15}" required>
			</td>
		</tr>
		<tr>
			<td colspan="3" id="trBouton">
				<input type="hidden" name="type" value="2">
				<input type="submit" name="valider" value="Valider">
				<input type="reset" name="reset" value="Reset">
			</td>
		</tr>
	</table>
	<a href="print_depart.php">Imprimer les courriers départ du jour</a>
</form>