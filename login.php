<?php
include_once('include/bdd.php');

function login($username, $password) {

	$req = $bdd->query("SELECT * FROM utilisateur WHERE login_utilisateur = '$login' AND mdp_utilisateur = '$mdp'");
	
	// Si la requete ne renvoi rien
	if($req == null) {
		return false;
	}
	else {
		while($u = $req->fetch()) { 
			session_regenerate_id(true);
			$session_id = $u[id];
			$session_username = $username;
			$session_level = $u[user_level];

			$_SESSION['user_id'] = $session_id;
			$_SESSION['user_level'] = $session_level;
			$_SESSION['user_name'] = $session_username;
			$_SESSION['user_lastactive'] = time();
			return true;
		}
	}
}