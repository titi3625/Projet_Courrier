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
					$reponse = $bdd->exec("INSERT INTO service_destinataire VALUES('', '".$nom."', '1');");
					$reponse2 = $bdd->exec("INSERT INTO service_expediteur VALUES('', '".$nom."', '1');");
				}
				catch(PDOException $e) {
					die('Erreur : '.$e->getMessage());
				}
			
				if($reponse > 0 && $reponse2 > 0) {
					echo "<script> alert(\"Le service a été ajouté\"); </script>";
					header("Location: gestion.php?page=2");
				}
				else {
					echo "<script> alert(\"Erreur dans la requête\"); </script>";
				}

				header("Location: ../../gestion.php?page=2");
				break;
			case 'modification':

				if($active) {
					$activePlop = '1';
				}
				else {
					$activePlop = '0';
				}

				if(isset($id) && !empty($id)) {
					$requete = "UPDATE service_destinataire SET nom_serviceD = '".$nom."', active = '".$activePlop."' WHERE id_serviceD = '".$id."';";
					$requete2 = "UPDATE service_expediteur SET nom_serviceE = '".$nom."', active = '".$activePlop."' WHERE id_serviceE = '".$id."';";
					
					try {
						$reponse = $bdd->exec($requete);
						$reponse2 = $bdd->exec($requete2);
					}
					catch(PDOException $e) {
						die('Erreur : '.$e->getMessage());
					}

					echo "<script> alert(\"Le service a été modifié\"); </script>";
				
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

?>

