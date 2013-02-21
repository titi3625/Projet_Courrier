<?php
include_once('include/bdd.php');

// recuperation des variables depuis l'ajax de formulaire_insertion.js
$objet = strip_tags($_POST['objet']);
$destinataire = strip_tags($_POST['destinataire']);
$service = strip_tags($_POST['service']);
$date = strip_tags($_POST['date']);
$type = strip_tags($_POST['type']);
$observation = strip_tags($_POST['observation']);
$sens = strip_tags($_POST['sens']);
$accuse = strip_tags($_POST['accuse']);



// requete d'insertion dans la table courrier
$requeteCourrier = "INSERT INTO courrier VALUES('', '".$objet."', '".$date."', '".$sens."', '".$observation."', '".$accuse."', '".$type."');";
$reponseCourrier = $bdd->exec($requeteCourrier);

// on recupere l'id du dernier courrier inséré
$lastIdCourrier = $bdd->lastInsertId();

if($reponseCourrier > 0) { // si la premiere requete a fonctionné
	// Insertion du service
	$requeteService = "INSERT INTO attribuer VALUES('".$lastIdCourrier."', '".$service."');";
	$nb1 = $bdd->exec($requeteService);


	// on verifie que le destinataire n'existe pas déja
	$reponseSelectDestinataire = $bdd->query("SELECT * FROM destinataire WHERE nom_destinataire LIKE '%".$destinataire."%';");

	// s'il n'existe pas on l'insere dans la base
	if($reponseSelectDestinataire == false) {
		$requeteDestinataire = "INSERT INTO destinataire VALUES('', '".$destinataire."');";
		$nb2 = $bdd->exec($requeteDestinataire);

		$lastIdDestinataire = $bdd->lastInsertId();
	}
	
	// ensuite on creer le lien entre le destinataire et le courrier
	$requetePosseder = "INSERT INTO posseder VALUES('".$lastIdCourrier."', '".$lastIdDestinataire."');";
	$nb3 = $bdd->exec($requetePosseder);
	

	// si les trois requetes précedentes ont fonctionnées
	if($nb1 > 0 && $nb2 > 0 && $nb3 > 0) {
		echo "Insertion réussie";
	}
	else {
		echo "échec service ou observation";
	}
}
else {
	echo "Echeeeeec courrier";
}


