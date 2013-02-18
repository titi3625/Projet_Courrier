<?php
session_start();
if($_SESSION['auth'] != 'yes') {
	header('Location:index.php');
	echo "<script>alert('Vous n'avez pas accès à cette page');</script>";
}
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Insertion courrier</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/Aristo/Aristo.css">


</head>
<body>
	<div class="header">
		<?php
		include_once('include/menu.php');
		?>
		<div class="user">
			<p><?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?></p>
			<a href=\"include/deconnexion.php\">Se déconnecter</a>
		</div>
	</div>
	
	<div class="content">
		bonjour
	</div>
	
	<div class="footer">
		
	</div>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
	<script src="js/interface.js"></script>
	<script src="js/main.js"></script>
</body>
</html>