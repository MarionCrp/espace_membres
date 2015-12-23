<?php 
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../style.css" />
		<title> Espace Membres - Connexion </title>
	</head>
	
	<body>
	
	<header>
		<h1><?php echo $_SESSION['pseudo'];?>, Bienvenue dans votre espace membre ! </h1>
	</header>
	
	<div class="profil"><h2> Votre Profil : </h2>
	<img src="../controleur/avatars/mini_<?php echo $_SESSION['id']?>.jpg"/> 
	<p><strong>Nom</strong> : <?php echo $_SESSION['pseudo'];?> </p>
	<p><strong>E-mail</strong> : <?php echo $_SESSION['email'];?> </p>
		<p> Vous êtes inscrit depuis le <strong> <?php echo $_SESSION['date_inscription'];?></strong></p>
	</div>
	<a href="edit.php"> Modifier votre profil</a>
	<p><a href="../deconnexion.php"> Se deconnecter</a></p>

	</body>
</html>


	
	