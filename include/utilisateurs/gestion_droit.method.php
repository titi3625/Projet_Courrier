<?php
include('../bdd.php');

// on verifie que les variables du formulaire sont bien arrivé
if(isset($_POST)) {
	addslashes($_POST);
	extract($_POST);
	if(isset($nom) && !empty($nom) && isset($action) && !empty($action)) {
		// selon la variable $action on appelle la fonction correspondante
		switch ($action) {
			case 'insertion':
				try {
					$reponse = $bdd->query("INSERT INTO utilisateur VALUES('', '".$nom."', '".$prenom."', '".$login."', '".$mdp."', '".$droit."');");
				}
				catch(PDOException $e) {
					die('Erreur : '.$e->getMessage());
				}
			
				if($reponse > 0) {
					echo "<script> alert(\"L'utilisateur a été ajouté\"); </script>";
					header("Location: gestion.php?page=3");
				}
				else {
					echo "<script> alert(\"Erreur dans la requête\"); </script>";
				}

				header("Location: ../../gestion.php?page=3");
				break;
			case 'modification':

				if(isset($id) && !empty($id)) {
					if(empty($mdp)) {
						$requete = "UPDATE utilisateur SET nom_utilisateur = '".$nom."', prenom_utilisateur = '".$prenom."', login_utilisateur = '".$pseudo."', droit_utilisateur = '".$droit."' WHERE id_utilisateur = '".$id."';";
					}
					else {
						$requete = "UPDATE utilisateur SET nom_utilisateur = '".$nom."', prenom_utilisateur = '".$prenom."', login_utilisateur = '".$pseudo."', mdp_utilisateur = '".md5($mdp)."', droit_utilisateur = '".$droit."' WHERE id_utilisateur = '".$id."';";
					}
					
					try {
						$reponse = $bdd->exec($requete);
					}
					catch(PDOException $e) {
						die('Erreur : '.$e->getMessage());
					}
					
					echo "<script> alert(\"Le type a été modifié\"); </script>";
				}

				break;
			default:
				echo "Erreur de variable";
				break;
		}
	}
	else {
		echo "<script> alert(\"Erreur !\"); </script>";
	}
}
else {
	echo "<script> alert(\"Erreur du formulaire\"); </script>";
}

