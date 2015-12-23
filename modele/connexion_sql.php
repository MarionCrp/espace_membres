<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=espace_membres','root', '');
}

catch(Exception $e)
{
	die('Erreur :' . $e->getMessage());
}

