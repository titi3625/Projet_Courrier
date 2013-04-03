<?php
session_start();
require('include/bdd.php');

if(isset($_POST)) {
	extract($_POST);
	if(isset($expeModif) && !empty($expeModif)) {
		$requeteD = "UPDATE destinataire SET nom_destinataire = '".$destModif."', id_service = '".$serviceDest."' WHERE id_destinataire = '".$idDestModif."'";
		$requeteE = "UPDATE expediteur SET nom_expediteur = '".$expeModif."', id_service = '".$serviceExpe."' WHERE id_expediteur = '".$idExpeModif."'";
		$requeteC = "UPDATE courrier SET objet_courrier = '".$objetModif."', date_courrier = '".$dateModif."', observation = '".$observModif."', id_nature = '".$typeModif."', num_envoi = '".$numModif."' WHERE id_courrier = '".$idModif."'";
		$requeteHisto = "INSERT INTO histo_courrier VALUES('".$idModif."', '".$_SESSION['login']."', '".date('Y-m-d H:i:s')."')";

		try {
			$reponseD = $bdd->exec($requeteD);
			$reponseE = $bdd->exec($requeteE);
			$reponseC = $bdd->exec($requeteC);
			$reponseHisto = $bdd->exec($requeteHisto);
		}
		catch(PDOException $e) {
			$e->getMessage();
		}
		echo "<script> alert(\"Le type a été modifié\"); window.close(); </script>";

		
	}
}
else {
	echo "Erreeeeur !";
}


