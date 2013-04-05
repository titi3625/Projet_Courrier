<?php
require('bdd.php');

if(isset($_POST)) {
	extract($_POST);
	if((isset($numCourrier) && !empty($numCourrier)) && (isset($date) && !empty($date)) && (isset($numAccuse) && !empty($numAccuse))) {
		$numCourrier = addslashes(strip_tags($numCourrier));
		$date = addslashes(strip_tags($date));
		$numAccuse = addslashes(strip_tags($numAccuse));
		// insertion dans la table accuse_de_reception
		$requete = "INSERT INTO accuse_de_reception VALUES('', '".$numAccuse."', '".$date."', '".$numCourrier."')";
		// mise a jour de la table courrier pour renseigner la cle etrangere de l'accuse
		$requete2 = "UPDATE courrier SET id_accuse_de_reception = '".$lastIdAc."' WHERE num_envoi = '".$numCourrier."'";

		try {
			$reponse = $bdd->exec($requete);
			$lastIdAc = $bdd->lastInsertId();
			$reponse2 = $bdd->exec($requete2);
		}
		catch(PDOException $e) {
			$e->getMessage();
		}
		
		// si les requetes on fonctionnees
		if($reponse > 0 && $reponse2 > 0) {
			echo "Accusé de reception ajouté";
		}
		else {
			echo "Problème de base de données";
		}
		header("Location:../inserer.php?page=3&numA=".$lastIdAc); // on renvoi a la page d'insertion de l'accuse avec le num de l'accuse qu'on vient d'inserer
		// pour le message de confirmation (voir inserer.php)
	}
}
else {
	echo "Erreur de formulaire";
}

