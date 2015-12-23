<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Espace Membres - Inscription </title>
	</head>
	
	<body>
	
		
	
	<!-- Creation du Formulaire-->
	
	<form method="post" action="inscription.php">
		<fieldset>
			<legend> Inscription </legend>
			
				<p><label for="pseudo"> Pseudo </label> :
				<input type="texte" name="pseudo" id="pseudo"/></p>
				
				
		
		
				
				<p><label for="pass"> Mot de Passe </label> :
				<input type="password" name="pass" id="pass"/></p>
				

				
				<p><label for="pass_verif"> Retapez votre Mot de Passe </label> :
				<input type="password" name="pass_verif" id="pass_verif"/></p>
				
				
			
				<p><label for="email"> Email </label> :
				<input type="text" name="email" id="email"/></p>

		
				<input type="submit" value="M'inscrire"/> 


		</fieldset>
			
	</form>
	
	</body>
</html>