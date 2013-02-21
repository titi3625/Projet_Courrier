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
	<title>Modification courrier</title>
</head>
<body>
	
</body>
</html>