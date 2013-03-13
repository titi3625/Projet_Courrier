<?php
require('include/bdd.php');

if(isset($_POST)) {
	extract($_POST);
	if(isset($numModif) && !empty($numModif)) {
		$requeteD = "UPDATE destinataire SET nom_destinataire = '".$destModif."', id_service = '".$serviceDest."' WHERE id_destinataire = '".$idDestModif."'";
		$requeteE = "UPDATE expediteur SET nom_expediteur = '".$expeModif."', id_service = '".$serviceExpe."' WHERE id_expediteur = '".$idExpeModif."'";
		$requeteC = "UPDATE courrier SET objet_courrier = '".$objetModif."', date_courrier = '".$dateModif."', observation = '".$observModif."', id_nature = '".$typeModif."', num_envoi = '".$numModif."' WHERE id_courrier = '".$idModif."'";

		try {
			$reponseD = $bdd->exec($requeteD);
			$reponseE = $bdd->exec($requeteE);
			$reponseC = $bdd->exec($requeteC);
		}
		catch(PDOException $e) {
			$e->getMessage();
		}
		
		header("Location: modifier.php?id=".$idModif);
	}
}
else {
	echo "Erreeeeur !";
}


