<?php
require('../bdd.php');

if(isset($_GET)) {
	if(isset($_GET['id'])) {
		extract($_GET);
	}
}

$requete = "DELETE FROM utilisateur WHERE id_utilisateur = '".$id."';";

try {
	$reponse = $bdd->exec($requete);
}
catch(PDOException $e) {
	die($e->getMessage());
}
header('Location: ../../gestion.php?page=3');