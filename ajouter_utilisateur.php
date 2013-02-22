<?php
include_once('include/bdd.php');

// extraction des variables en post
extract($_POST);
//echo $objet;

// recuperation des variables depuis l'ajax de formulaire_insertion.js
if(empty($objet) || empty($destinataire) || empty($date)) {
	echo "Erreur : Le formulaire est incomplet";
}
else {

	$objet = str_replace("'", "\'", $objet);
	$destinataire = str_replace("'", "\'", $destinataire);
	$date = str_replace("'", "\'", $date);

	// requete d'insertion dans la table courrier
	$requeteCourrier = "INSERT INTO courrier VALUES('', '".$objet."', '".$date."', '".$sens."', '".$observation."', '".$accuse."', '".$type."');";
	$reponseCourrier = $bdd->exec($requeteCourrier);

	if($reponseCourrier > 0) { // si la premiere requete a fonctionné

		// on recupere l'id du dernier courrier inséré
		$lastIdCourrier = $bdd->lastInsertId();

		// Insertion du service
		$requeteService = "INSERT INTO attribuer VALUES('".$lastIdCourrier."', '".$service."');";
		$nb1 = $bdd->exec($requeteService);


		// on verifie que le destinataire n'existe pas déja
		$requeteSelectDestinataire = "SELECT * FROM destinataire WHERE nom_destinataire LIKE '%".$destinataire."%' LIMIT 1;";
		//echo $requeteSelectDestinataire;
		$reponseSelectDestinataire = $bdd->query($requeteSelectDestinataire);
		$ligne = $reponseSelectDestinataire->fetchAll();
		echo $ligne['id_destinataire'];
		// s'il n'existe pas on l'insere dans la base
		if(count($ligne) == 0) {
			$requeteDestinataire = "INSERT INTO destinataire VALUES('', '".$destinataire."');";
			$nb2 = $bdd->exec($requeteDestinataire);
			if($nb2 > 0) {
				// et on reprend son id
				$lastIdDestinataire = $bdd->lastInsertId();
			}
			else {
				echo "Erreur de bdd :  insertion destinataire";
			}
			
		}
		// s'il existe on reprend directement son id
		else {
			$lastIdDestinataire = $ligne['id_destinataire'];
		}
		
		// ensuite on creer le lien entre le destinataire et le courrier
		// en utilisant l'id du dernier courrier et du destinataire
		$requetePosseder = "INSERT INTO posseder VALUES('".$lastIdCourrier."', '".$lastIdDestinataire."');";
		echo $requetePosseder;
		$nb3 = $bdd->exec($requetePosseder);
		

		// si les trois requetes précedentes ont fonctionnées
		if($nb1 == 0) {
			echo "Erreur de base de données : service";
		}
		elseif($nb3 == 0) {
			echo "Erreur de base de données : posseder";
		}
		else {
			echo "Insertion réussie";
		}
	}
	else {
		echo "Erreur de base de données : courrier";
	}

}

//$objet = strip_tags($_POST['objet']);
//$destinataire = strip_tags($_POST['destinataire']);
//$service = strip_tags($_POST['service']);
//$date = strip_tags($_POST['date']);
//$type = strip_tags($_POST['type']);
//$observation = strip_tags($_POST['observation']);
//$sens = strip_tags($_POST['sens']);
//$accuse = strip_tags($_POST['accuse']);



	

