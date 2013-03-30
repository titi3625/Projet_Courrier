<legend>Gestion de l'historique des modifications</legend>

<h2>Rechercher une modification</h2>
<input type="text" id="date_modif" class="datepicker" placeholder="Par date de modification">
 et/ou 
<select name="auteur_modif" id="auteur_modif">
	<?php
	$requete = "SELECT * FROM utilisateur";
	$reponse = $bdd->query($requete);
	?>
	<option value="">Par auteur de la modification</option>
	<?php
	while($ligne = $reponse->fetch())
	{
		echo "<option value=".$ligne['login_utilisateur'].">".$ligne['login_utilisateur']."</option>";
	}
	?>
</select>
<input type="submit" name="valider" id="submit_modif" value="Rechercher">
<input type="button" id="reset" value="Effacer">

<div class="resultat_modif">
	
</div>
