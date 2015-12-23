<?php

	include_once('modele/modele_inscription.php'); // On inclus le modele pour qu'il fasse le lien avec la BDD

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
		
	if(isset($_POST['pass_verif']))
	{
		$_POST['pass_verif'] = htmlspecialchars($_POST['pass_verif']);
	}

	
		// On vérifie sur le mdp à bien été entré et s'il est identique au mdp retapé. Sinon on indique une erreur

	if(isset($_POST['pass']) AND ($_POST['pass_verif']) AND ($_POST['pass'] != $_POST['pass_verif'])) 
		{
			echo '<strong style="color:red;"> - Les mots de passe tapés ne sont pas identiques </strong><br/>';
		}		
		
		
		// On verifie que l'email tapé soit dans un format valide.
		if(isset($_POST['email']))		
		{
			$_POST['email']=htmlspecialchars($_POST['email']);
			if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#',$_POST['email']))
			{
				echo '<strong style="color:red;"> - L\'email n\'est pas un format valide </strong><br/>';
			} 
		} 
		
	include_once('vue/index_inscription.php'); // On inclus la page HTML de vue.