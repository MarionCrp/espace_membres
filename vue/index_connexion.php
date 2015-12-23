<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Espace Membres - Connexion </title>
	</head>
	
	<body>
	
	
	<!-- Creation du Formulaire-->
	
	<form method="post" action="connexion.php">
		<fieldset>
			<legend> Connexion </legend>
			
				<p><label for="pseudo"> Pseudo </label> :
				<input type="texte" name="pseudo" id="pseudo"/></p>

		
				<p><label for="pass"> Mot de Passe </label> :
				<input type="password" name="pass" id="pass" /></p>
				

				<p><label for="connect_auto"> Connexion Automatique </label>
				<input type="checkbox" name="connect_auto" id="connect_auto" /></p>
	
	
				<input type="submit" value="Se connecter"/> 
		

		</fieldset>
	
	</form>
	
		<a href="inscription.php"> Pas encore inscrit ? Créer un compte ici. </a>
	</body>
</html>
