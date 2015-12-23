<?php

include_once('modele/connexion_sql.php'); // On lie une première fois la BDD ! 

if (!isset($_GET['section']) OR $_GET['section'] =='controleur')
{
	include_once('controleur/controleur_inscription.php');  // On lit le contrôleur !
}