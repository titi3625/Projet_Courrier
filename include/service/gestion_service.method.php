<?php
include('../bdd.php');

// on verifie que les variables du formulaire sont bien arrivé
if(isset($_POST)) {
	extract($_POST);
	if(isset($nom) && !empty($nom) && isset($action) && !empty($action)) {
		// selon la variable $action on appelle la fonction correspondante
		switch ($action) {
			case 'insertion':
				try {
					$reponse = $bdd->query("INSERT INTO service VALUES('', '".$nom."');");
				}
				catch(PDOException $e) {
					die('Erreur : '.$e->getMessage());
				}
			
				if($reponse > 0) {
					echo "<script> alert(\"Le type a été ajouté\"); </script>";
					header("Location: gestion.php?page=2");
				}
				else {
					echo "<script> alert(\"Erreur dans la requête\"); </script>";
				}

				header("Location: ../gestion.php?page=2");
				break;
			case 'modification':

				if(isset($id) && !empty($id)) {
					$requete = "UPDATE service SET nom_service = '".$nom."' WHERE id_service = '".$id."';";
					try {
						$reponse = $bdd->exec($requete);
					}
					catch(PDOException $e) {
						die('Erreur : '.$e->getMessage());
					}
					
					if($reponse > 0) {
						echo "<script> alert(\"Le type a été modifié\"); </script>";
					}
					else {
						echo "<script> alert(\"Erreur dans la requête\"); </script>";
					}
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
