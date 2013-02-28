<?php
extract($_POST);

if(isset($type) && !empty($type)) {
	$reponse = $bdd->query("INSERT INTO nature VALUES('', '".$type."');");
	if($reponse > 0) {
		echo "<script> alert(\"Le type a été ajouté\"); </script>";
		header("Location: inserer.php?page=3");
	}
}
else {
	echo "<script> alert(\"Erreur ! Vous devez saisir un nouveau type de courrier\"); </script>";
}
?>