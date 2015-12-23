	<?php
	
	if(isset($_POST['pseudo']) AND ($_POST['pass']))
	{
		$pass_hache = sha1($_POST['pass']);
		
		global $bdd;
		$req=$bdd->prepare('SELECT id, email, DATE_FORMAT (date_inscription, \'%d/%m/%Y\') AS date_fr FROM membres WHERE pseudo = :pseudo AND pass = :pass');
		$req->execute(array(
			'pseudo' => $_POST['pseudo'],
			'pass' => $pass_hache));
		
		$resultat = $req-> fetch();
	
		if (!$resultat)
		{
			echo '<p><strong style="color:red;">Mauvais identifiant ou mot de passe !</strong></p>';
		}
	
		else
		{
			session_start();
			$_SESSION['id']= $resultat['id'];
			$_SESSION['pseudo']= $_POST['pseudo'];
			$_SESSION['email'] = $resultat['email'];
			$_SESSION['date_inscription'] = $resultat['date_fr'];
			
			if(!empty($_POST['connect_auto']))
			{
				setcookie('pseudo', $_POST['pseudo']);
				setcookie('pass', $pass_hache);	
			}
			
			header('Location:vue/connecte.php');
		}
	}
	
	
	if(isset($_COOKIE['pseudo']) AND ($_COOKIE['pass']))
	{
		global $bdd;
		$req=$bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND pass = :pass');
		$req->execute(array(
			'pseudo' => $_COOKIE['pseudo'],
			'pass' => $_COOKIE['pass']));
		
		$resultat = $req-> fetch();
	
		if (!$resultat)
		{
			echo '<p><strong style="color:red;">Mauvais identifiant ou mot de passe !</strong></p>';
		}
		else
		{
			header('Location:vue/connecte.php');
		}
	}