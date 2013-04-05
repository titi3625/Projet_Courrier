<?php
require('bdd.php');

if(isset($_POST)) {
	extract($_POST);
	if((isset($numCourrier) && !empty($numCourrier)) && (isset($date) && !empty($date)) && (isset($numAccuse) && !empty($numAccuse))) {
		$numCourrier = addslashes(strip_tags($numCourrier));
		$date = addslashes(strip_tags($date));
		$numAccuse = addslashes(strip_tags($numAccuse));

		$requete = "INSERT INTO accuse_de_reception VALUES('', '".$numAccuse."', '".$date."', '".$numCourrier."')";

		$reponse = $bdd->exec($requete);
		$lastIdAc = $bdd->lastInsertId();
		$requete2 = "UPDATE courrier SET id_accuse_de_reception = '".$lastIdAc."' WHERE num_envoi = '".$numCourrier."'";
		$reponse2 = $bdd->exec($requete2);
		if($reponse > 0 && $reponse2 > 0) {
			echo "Accusé de reception ajouté";
		}
		else {
			echo "Problème de base de données";
		}
		header("Location:../inserer.php?page=3&numA=".$lastIdAc);
	}
}
else {
	echo "Erreur de formulaire";
}

