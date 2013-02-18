<div class="menu">

	<?php
	$path = $_SERVER['PHP_SELF'];
	$file = basename ($path);
	switch ($file) {
	 	case 'index.php':
	?>
	 		<div class="separateur"></div>
			<dl>
				<dt><a href="index.php" class="current">Accueil</a></dt>
			</dl>
			<div class="separateur"></div>
			<dl>
				<dt><a href="recherche.php">Rechercher</a></dt>
			</dl>
			<div class="separateur"></div>
			<dl>
				<dt><a href="inserer.php">Inserer</a></dt>
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
				<dt><a href="recherche.php" class="current">Rechercher</a></dt>
			</dl>
			<div class="separateur"></div>
			<dl>
				<dt><a href="inserer.php">Inserer</a></dt>
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
			<dl>
				<dt><a href="inserer.php" class="current">Inserer</a></dt>
			</dl>
			<div class="separateur"></div>
	<?php
			break;
	 	default:
	 		break;
	} 
	?>
	
</div>