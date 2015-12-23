<?php

include_once("modele/modele_connexion.php");

	
if(isset($_POST['pass'])) // On hache le mdp !
		{
		$pass = htmlspecialchars($_POST['pass']);
		$pass = $_POST['pass'];
		$pass_hache = sha1($pass);
		}
	
if (isset ($_POST['pseudo']))	
	{
		$_POST['pseudo']= htmlspecialchars($_POST['pseudo']);
		
	}
	
	
	include_once("vue/index_connexion.php");
