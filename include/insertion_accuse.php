<legend>Ajouter un accusé de réception</legend>
<form action="include/ajouter_accusedereception.php" method="post">
	<table>
		<tr>
			<td><label for="date">Date de retour : </label></td>
			<td><input type="text" name="date" id="dateAccuse" class="datepicker" required></td>
		</tr>
		<tr>
			<td><label for="numCourrier">N° envoi du courrier : </label></td>
			<td>
				<div class="ui-widget">
					<input type="text" name="numCourrier" id="tags" required>
				</div>
			</td>
		</tr>
		<tr>
			<td><label for="numAccuse">N° de l'accuse : </label></td>
			<td><input type="text" name="numAccuse" id="numAccuse" required></td>
		</tr>
		
		<tr>
			<td colspan="2" id="trBouton">
				<input type="submit" name="valider" value="Valider">
				<input type="reset" name="reset" value="Reset">
			</td>
		</tr>
	</table>


</form>

