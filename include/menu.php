<div class="menu">

	<?php
	$path = $_SERVER['PHP_SELF'];
	$file = basename($path);
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
			<dl id="menu">
				<dt><a href="#">Inserer</a></dt>
				<ul class="sousMenu">
					<li><a href="inserer.php?page=1">Courrier départ</a></li>
					<li><a href="inserer.php?page=2">Courrier arrivé</a></li>
					<li><a href="inserer.php?page=3">Ajouter un type</a></li>
					<li><a href="inserer.php?page=4">Ajouter un service</a></li>
				</ul>
			</dl>
			<div class="separateur"></div>
	<?php
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
			<dl id="menu">
				<dt><a href="#">Inserer</a></dt>
				<ul class="sousMenu">
					<li><a href="inserer.php?page=1">Courrier départ</a></li>
					<li><a href="inserer.php?page=2">Courrier arrivé</a></li>
					<li><a href="inserer.php?page=3">Ajouter un type</a></li>
					<li><a href="inserer.php?page=4">Ajouter un service</a></li>
				</ul>
			</dl>
			<div class="separateur"></div>
	<?php
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
			<dl id="menu">
				<dt><a href="#" id="current">Inserer</a></dt>
				<ul class="sousMenu">
					<li><a href="inserer.php?page=1">Courrier départ</a></li>
					<li><a href="inserer.php?page=2">Courrier arrivé</a></li>
					<li><a href="inserer.php?page=3">Ajouter un type</a></li>
					<li><a href="inserer.php?page=4">Ajouter un service</a></li>
				</ul>
			</dl>
			<div class="separateur"></div>
	<?php
			break;
	 	default:
	 		break;
	} 
	?>
	
</div>

