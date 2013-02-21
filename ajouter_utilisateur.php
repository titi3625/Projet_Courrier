<?php
include_once('/include/bdd.php');

// recuperation des variables depuis l'ajax de formulaire_insertion.js
$objet = strip_tags($_POST['objet']);
$destinataire = strip_tags($_POST['destinataire']);
$service = strip_tags($_POST['service']);
$date = strip_tags($_POST['date']);
$type = strip_tags($_POST['type']);
$observation = strip_tags($_POST['observation']);
$sens = strip_tags($_POST['sens']);
$accuse = strip_tags($_POST['accuse'])

// requete d'insertion dans la table courrier
$requeteCourrier = "INSERT INTO courrier VALUES('', '".$objet."', '".$date."', '".$sens."', '".$observation."', '".$accuse."', '".$type."')" + "SELECT LAST_INSERT_ID()";

// Insertion des services et destinataire dans les tables de jointures
$reponseCourrier = $bdd->query($requeteCourrier);
$ligne = $reponseCourrier->fetch();
$requeteService = "INSERT INTO attribuer VALUES('', '".$ligne['LAST_INSERT_ID()']."', '".$service."')";
$requeteObservation = "INSERT INTO posseder VALUES('".$ligne['LAST_INSERT_ID()']."', '".$destinataire."')";
