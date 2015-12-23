<?php
function get_membres()
{
	if(isset($_POST['pseudo']) AND ($_POST['pass']) AND ($_POST['email']))
	{
		global $bdd;
		$req = $bdd->prepare('INSERT INTO membres (pseudo, pass, email, date_inscription)
							  VALUES (?, ?, ?, CURDATE())');
		$req->execute(array($_POST['pseudo'], $_POST['pass'], $_POST['email']));
		
		echo 'Le membre a bien été ajouté'; 
	}
	
	else
	{	
		echo 'Veuillez remplir tous les champs';
	}
}
