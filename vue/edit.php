<?php 
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../style.css" />
		<title> Espace Membres - Editez votre Profil </title>
	</head>

	<body>
	
	<div class="profil"><h2> Editez votre profil </h2>
	
	<form method="post" action="../controleur/traitements.php" enctype="multipart/form-data">
		<fieldset>
			<legend> Avatar </legend>
				<input type="hidden" name="MAX_FILE_SIZE" value="1048576*3"/>
				
				<p><label for="img_upload"><strong> Changez votre avatar </strong> (taille maximale : 3Mo)</label> : </p>
				<img src="../controleur/avatars/mini_<?php echo $_SESSION['id']?>.jpg"/>
				<p><input type="file" name="img_upload" id="img_upload" /></p>
				<input type="submit" value="Changer Avatar"/>
		</fieldset>
	</form>
	
	<form method="post" action="../modele/bdd_traitements.php">
		<fieldset>
			<legend> E-mail </legend>
			<p><label for="verif_email"><strong> E-mail actuel </strong></label> : 
			<input type="text" name="verif_email" id="verif_email"/><br/>
			<p><label for="new_email"><strong> Nouvel E-mail </strong></label> :
			<input type="text" name="new_email" id="new_email"/></p> 
			<input type="submit" value="Changer Email"/>
	</form>
	
	</div>
	
	<a href="connecte.php"> Retour à la page d'accueil de votre profil </a>
	
	</form>
	
	</body>
</html>
