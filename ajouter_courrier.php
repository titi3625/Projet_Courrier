<?php
include_once('include/bdd.php');

// extraction des variables en post
extract($_POST);

// recuperation des variables depuis l'ajax de formulaire_insertion.js
if(empty($date) || empty($objet) || empty($observation) || empty($destinataire) || empty($expediteur)) {
	echo "Erreur : Le formulaire est incomplet";
}
else {

	$date = addslashes(strip_tags($date));
	$objet = addslashes(strip_tags($objet));
	$observation = addslashes(strip_tags($observation));
	$destinataire = addslashes(strip_tags($destinataire));
	$expediteur = addslashes(strip_tags($expediteur));

	$reponse11 = $bdd->query("SELECT * FROM destinataire WHERE nom_destinataire LIKE '%".$destinataire."%' AND id_service = '".$_POST['serviceDest']."' LIMIT 1");
	$ligne1 = $reponse11->fetch();
	if($ligne1 != false) {
		$lastIdDest = $ligne1['id_destinataire'];
	}
	else {
		$sql1 = "INSERT INTO destinataire VALUES('', '".$destinataire."', '".$_POST['serviceDest']."');";
		echo $sql1;
		$reponse1 = $bdd->exec($sql1);
		$lastIdDest = $bdd->lastInsertId();
	}

	$reponse22 = $bdd->query("SELECT * FROM expediteur WHERE nom_expediteur LIKE '%".$expediteur."%' AND id_service = '".$_POST['serviceExpe']."' LIMIT 1");
	$ligne2 = $reponse22->fetch();
	if($ligne2 != false) {
		$lastIdExpe = $ligne2['id_expediteur'];
	}
	else {
		$sql2 = "INSERT INTO expediteur VALUES('', '".$expediteur."', '".$_POST['serviceExpe']."');";
		echo $sql2;
		$reponse2 = $bdd->exec($sql2);
		$lastIdExpe = $bdd->lastInsertId();
	}
	
	if(isset($lastIdExpe) && isset($lastIdDest)) {
		$sql3 = "INSERT INTO courrier VALUES('', '".$objet."', '".$date."', '".$observation."', '0', '".$_POST['nature']."', '".$_POST['type']."', '".$lastIdExpe."', '".$lastIdDest."')";
		echo $sql3;
		$reponse3 = $bdd->exec($sql3);
	}
	else {
		echo "Erreur de base de données";
	}

}

	

