<?php
require('bdd.php');

if(isset($_POST)) {
	extract($_POST);
	if((isset($courrier) && !empty($courrier)) && (isset($date) && !empty($date)) && (isset($num) && !empty($num))) {
		$courrier = addslashes(strip_tags($courrier));
		$date = addslashes(strip_tags($date));
		$num = addslashes(strip_tags($num));

		$requete = "INSERT INTO accuse_de_reception VALUES('', '".$num."', '".$date."', '".$courrier."')";
		$reponse = $bdd->exec($requete);

		if($reponse > 0) {
			echo "Accusé de reception ajouté";
		}
		else {
			echo "Probleme de base de données";
		}
	}
}
else {
	echo "Erreur de formulaire";
}

