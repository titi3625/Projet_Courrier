<?php
session_start();

// suppression des variables session en cours
session_destroy();

// redirection vers index.php
header("Location: ../index.php");