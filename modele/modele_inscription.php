<?php

	include('controleur/controleur_inscription.php');
	
		if(isset($_POST['pseudo']))
			{
				global $bdd;
				$reponse = $bdd ->query('SELECT pseudo FROM membres');
				while ($donnees = $reponse->fetch())
				{
					if ($donnees['pseudo'] == $_POST['pseudo'])
					{
						echo '<strong style="color:red;"> - Ce Pseudo est déjà utilisé </strong><br/>';
						$_POST['pseudo'] = NULL;
					
					}
				}
				
			}
			
		if(isset($_POST['email']))
			{
				global $bdd;
				$reponse = $bdd ->query('SELECT email FROM membres');
				while ($donnees = $reponse->fetch())
				{
					if ($donnees['email'] == $_POST['email'])
					{
						echo '<strong style="color:red;"> - Un compte existe déjà avec cet e-mail</strong><br/>';
						$_POST['email'] = NULL;
					
					}
				}
			}

	
		if((isset($_POST['pseudo']) AND ($_POST['pass']) AND ($_POST['pass_verif']) AND ($_POST['email'])) 
			AND ($_POST['pass'] == $_POST['pass_verif']) 
			AND (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#',$_POST['email']))
			AND ($_POST['pseudo'] != NULL)
			AND ($_POST['email'] != NULL))
			
		{
			
			global $bdd;
			$req = $bdd->prepare('INSERT INTO membres (pseudo, pass, email, date_inscription)
								  VALUES (:pseudo, :pass, :email, CURDATE())');
			$req->execute(array(
					'pseudo' => $_POST['pseudo'],
					'pass' => $pass_hache, 
					'email' => $_POST['email']));
			
			echo '<strong style="color:green;"> - Le membre a bien été ajouté</strong><br/><br/>
					<a href="connexion.php"><strong>-> Cliquez ici pour vous connecter <- </strong></a>'; 
		}
		
		else
		{	
			echo '<strong style="color:red;"> - Veuillez remplir tous les champs </strong><br/>';
		}
		