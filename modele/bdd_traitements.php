<?php
session_start();

if(isset($_POST['verif_email']) AND ($_SESSION['id']))
{
	$_POST['verif_email'] = htmlspecialchars($_POST['verif_email']);
	$bdd = new PDO('mysql:host=localhost;dbname=espace_membres','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$req= $bdd -> prepare ('SELECT email FROM membres WHERE id = :id');
	$req-> execute(array(
	'id' => $_SESSION['id']));
	$resultat = $req->fetch();
	
	if(($resultat['email'] == $_POST['verif_email']) AND isset($_POST['new_email']))
	{
		$_POST['new_email'] = htmlspecialchars($_POST['new_email']);
		if(preg_match("#^[a-z0-9_.-]+@[a-z0-9_.-]{2,}\.[a-z]{2,4}$#",$_POST['new_email']))
		{
		$req = $bdd -> prepare ('UPDATE membres SET email = :email WHERE id = :id');
		$req -> execute(array(
		'id' => $_SESSION['id'],
		'email' => $_POST['new_email']));
		header('Location:../vue/connete.php');
		}
		else
		{
			echo 'le format est invalide';
		}
	}
	
	else
	{
		echo 'L\'email entré n\'est pas valide ou le format n\'est pas correct<br/>';
		echo '<a href="../vue/edit.php"> Retour à la page d\'edition </a><br/>';
		echo '<a href="../vue/connecte.php"> Retour à la page d\'accueil </a>';
	}
}

