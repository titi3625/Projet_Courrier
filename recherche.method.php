<?php
include_once('include/bdd.php');


// fonction qui recupère tout les courriers sortants ayant l'objet en parametre
function getSortantObjet($objet) {
	$requete = 'SELECT * FROM courrier NATURAL JOIN statut WHERE objet_courrier LIKE "%'.$objet.'%" AND nom_statut = \'Sortant\'';
	$reponse = $bdd->query($requete);
	$ligne = $reponse->fetchAll();
	return $ligne;
}

// fonction qui recupère tout les courriers entrants ayant l'objet en parametre
function getEntrantObjet($objet) {
	$requete = 'SELECT * FROM courrier NATURAL JOIN statut WHERE objet_courrier LIKE "%'.$objet.'%" AND nom_statut = \'Entrant\'';
	$reponse = $bdd->query($requete);
	$ligne = $reponse->fetchAll();
	return $ligne;
}

// fonction qui recupère tout les courriers ayant l'objet en parametre
function getToutObjet($objet) {
	$requete = 'SELECT * FROM courrier WHERE objet_courrier LIKE "%'.$objet.'%"';
	$reponse = $bdd->query($requete);
	$ligne = $reponse->fetchAll();
	return $ligne;
}

//// fonction qui recupère tout les courriers ayant le destinataire en parametre
//function getToutDestinataire($destinataire) {
//	$requete = 'SELECT * FROM courrier NATURAL JOIN destinataire WHERE nom_destinataire LIKE "%'.$destinataire.'%"';
//	$reponse = $bdd->query($requete);
//	$ligne = $reponse->fetchAll();
//	return $ligne;
//}

// fonction qui recupère tout les courriers sortants pour le destinataire en parametre
function getSortantDestinataire($destinataire) {
	$requete = 'SELECT * FROM courrier NATURAL JOIN destinataire NATURAL JOIN statut WHERE nom_destinataire LIKE "%'.$destinataire.'%" AND nom_statut = \'Sortant\'';
	$reponse = $bdd->query($requete);
	$ligne = $reponse->fetchAll();
	return $ligne;
}

// fonction qui récupère tout les courriers entrant ou sortant ayant le service en parametre
function getToutService($service) {
	$requete = 'SELECT * FROM courrier NATURAL JOIN attribuer NATURAL JOIN service WHERE nom_destinataire LIKE "%'.$destinataire.'%"';
	$reponse = $bdd->query($requete);
	$ligne = $reponse->fetchAll();
	return $ligne;
}

// fonction qui recupère tout les courriers sortant envoyé par le service en paramère
function getSortantService($service) {
	$requete = 'SELECT * FROM courrier NATURAL JOIN attribuer NATURAL JOIN service NATURAL JOIN statut WHERE nom_service LIKE "%'.$service.'%" AND nom_statut = \'Sortant\'';
	$reponse = $bdd->query($requete);
	$ligne = $reponse->fetchAll();
	return $ligne;
}

// fonction qui récupère tout les courriers entrant destiné au service en parametre
function getEntrantService($service) {
	$requete = 'SELECT * FROM courrier NATURAL JOIN attribuer NATURAL JOIN service NATURAL JOIN statut WHERE nom_service LIKE "%'.$service.'%" AND nom_statut = \'Entrant\'';
	$reponse = $bdd->query($requete);
	$ligne = $reponse->fetchAll();
	return $ligne;
}

// fonction qui recupère tout les courriers modifié par un utilisateur en parametre
function getModifUtilisateur($login) {
	$requete = 'SELECT * FROM courrier NATURAL JOIN modifie NATURAL JOIN utilisateur WHERE login_utilisateur LIKE "%'.$login.'%"';
	$reponse = $bdd->query($requete);
	$ligne = $reponse->fetchAll();
	return $ligne;
}

