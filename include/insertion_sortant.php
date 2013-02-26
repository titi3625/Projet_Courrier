<legend>Ajouter un courrier sortant</legend>
<form action="ajouter_courrier.php" method="post" id="insererSortant">
	<table>
		<tr>
			<td><label for="date">Date : </label></td>
			<td><input type="text" name="date" id="date" class="datepicker"></td>
		</tr>
		<tr>
			<td><label for="objet">Objet : </label></td>
			<td><input type="text" name="objet" id="objet"></td>
		</tr>
		<tr>
			<td><label for="expediteur">Expéditeur : </label></td>
			<td><input type="text" name="expediteur" id="expediteur"></td>
			<td>
				<select name="serviceExpe" id="serviceExpe">
					<?php
					$reponse = $bdd->query('SELECT * FROM service');
					
					while($ligne = $reponse->fetch())
					{
						echo "<option value=".$ligne['id_service'].">".$ligne['nom_service']."</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="destinataire">Destinataire : </label></td>
			<td><input type="text" name ="destinataire" id="destinataire"></td>
			<td>
				<select name="serviceDest" id="serviceDest">
					<?php
					$reponse = $bdd->query('SELECT * FROM service');
					
					while($ligne = $reponse->fetch())
					{
						echo "<option value=".$ligne['id_service'].">".$ligne['nom_service']."</option>";
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
			<td>
				<select name="nature" id="nature">
					<?php
					$reponse = $bdd->query('SELECT * FROM nature');
					
					while($ligne = $reponse->fetch())
					{
						echo "<option value=".$ligne['id_nature'].">".$ligne['nom_nature']."</option>";
					}
					?>
				</select>
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
</form>