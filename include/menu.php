<div class="menu">

	<?php
	$file = basename($_SERVER['PHP_SELF']);
	switch($file) {
	 	case 'index.php':
	?>
	 		<div class="separateur"></div>
			<dl>
				<dt><a href="index.php" id="current">Accueil</a></dt>
			</dl>
			<div class="separateur"></div>
			<dl>
				<dt><a href="recherche.php">Rechercher</a></dt>
			</dl>
			<div class="separateur"></div>
			<dl id="menu1">
				<dt><a href="#">Inserer</a></dt>
				<ul class="sousMenu1">
					<li><a href="inserer.php?page=1">Courrier arrivé</a></li>
					<li><a href="inserer.php?page=2">Courrier départ</a></li>
				</ul>
			</dl>
			<div class="separateur"></div>
			<?php
			if($_SESSION['auth'] == "yes" && $_SESSION['droit'] == 'admin') {
			?>
				<dl id="menu2">
					<dt><a href="#">Gestion</a></dt>
					<ul class="sousMenu2">
						<li><a href="gestion.php?page=1">Types de courrier</a></li>
						<li><a href="gestion.php?page=2">Services</a></li>
						<li><a href="gestion.php?page=3">Utilisateurs</a></li>
					</ul>
				</dl>
			<?php
			}
	 		break;
		case 'recherche.php':
	?>
			<div class="separateur"></div>
			<dl>
				<dt><a href="index.php">Accueil</a></dt>
			</dl>
			<div class="separateur"></div>
			<dl>
				<dt><a href="recherche.php" id="current">Rechercher</a></dt>
			</dl>
			<div class="separateur"></div>
			<dl id="menu1">
				<dt><a href="#">Inserer</a></dt>
				<ul class="sousMenu1">
					<li><a href="inserer.php?page=1">Courrier arrivé</a></li>
					<li><a href="inserer.php?page=2">Courrier départ</a></li>
				</ul>
			</dl>
			<div class="separateur"></div>
			<?php
			if($_SESSION['auth'] == "yes" && $_SESSION['droit'] == 'admin') {
			?>
				<dl id="menu2">
					<dt><a href="#">Gestion</a></dt>
					<ul class="sousMenu2">
						<li><a href="gestion.php?page=1">Types de courrier</a></li>
						<li><a href="gestion.php?page=2">Services</a></li>
						<li><a href="gestion.php?page=3">Utilisateurs</a></li>
					</ul>
				</dl>
			<?php
			}
			break;
		case 'inserer.php':
	?>
			<div class="separateur"></div>
			<dl>
				<dt><a href="index.php">Accueil</a></dt>
			</dl>
			<div class="separateur"></div>
			<dl>
				<dt><a href="recherche.php">Rechercher</a></dt>
			</dl>
			<div class="separateur"></div>
			<dl id="menu1">
				<dt><a href="#" id="current">Inserer</a></dt>
				<ul class="sousMenu1">
					<li><a href="inserer.php?page=1">Courrier arrivé</a></li>
					<li><a href="inserer.php?page=2">Courrier départ</a></li>
				</ul>
			</dl>
			<div class="separateur"></div>
			<?php
			if($_SESSION['auth'] == "yes" && $_SESSION['droit'] == 'admin') {
			?>
				<dl id="menu2">
					<dt><a href="#">Gestion</a></dt>
					<ul class="sousMenu2">
						<li><a href="gestion.php?page=1">Types de courrier</a></li>
						<li><a href="gestion.php?page=2">Services</a></li>
						<li><a href="gestion.php?page=3">Utilisateurs</a></li>
					</ul>
				</dl>
			<?php
			}
			break;
		case 'gestion.php':
	?>
			<div class="separateur"></div>
			<dl>
				<dt><a href="index.php">Accueil</a></dt>
			</dl>
			<div class="separateur"></div>
			<dl>
				<dt><a href="recherche.php">Rechercher</a></dt>
			</dl>
			<div class="separateur"></div>
			<dl id="menu1">
				<dt><a href="#">Inserer</a></dt>
				<ul class="sousMenu1">
					<li><a href="inserer.php?page=1">Courrier arrivé</a></li>
					<li><a href="inserer.php?page=2">Courrier départ</a></li>
				</ul>
			</dl>
			<div class="separateur"></div>
			<?php
			if($_SESSION['auth'] == "yes" && $_SESSION['droit'] == 'admin') {
			?>
				<dl id="menu2">
					<dt><a href="#" id="current">Gestion</a></dt>
					<ul class="sousMenu2">
						<li><a href="gestion.php?page=1">Types de courrier</a></li>
						<li><a href="gestion.php?page=2">Services</a></li>
						<li><a href="gestion.php?page=3">Utilisateurs</a></li>
					</ul>
				</dl>
			<?php
			}
			break;
		case 'erreur_acces.php':
	?>
			<div class="separateur"></div>
			<dl>
				<dt><a href="index.php">Accueil</a></dt>
			</dl>
			<div class="separateur"></div>
			<dl>
				<dt><a href="recherche.php">Rechercher</a></dt>
			</dl>
			<div class="separateur"></div>
			<dl id="menu1">
				<dt><a href="#">Inserer</a></dt>
				<ul class="sousMenu1">
					<li><a href="inserer.php?page=1">Courrier arrivé</a></li>
					<li><a href="inserer.php?page=2">Courrier départ</a></li>
				</ul>
			</dl>
			<div class="separateur"></div>
			<?php
			if($_SESSION['auth'] == "yes" && $_SESSION['droit'] == 'admin') {
			?>
				<dl id="menu2">
					<dt><a href="#">Gestion</a></dt>
					<ul class="sousMenu2">
						<li><a href="gestion.php?page=1">Types de courrier</a></li>
						<li><a href="gestion.php?page=2">Services</a></li>
						<li><a href="gestion.php?page=3">Utilisateurs</a></li>
					</ul>
				</dl>
			<?php
			}
	 	default:
	 		break;
	}
	?>
	
</div>

