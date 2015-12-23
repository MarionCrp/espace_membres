<?php

session_start();

$maxsize = $_POST['MAX_FILE_SIZE'];

echo 'taille max acceptee: ' . $maxsize . ' octets <br/>';
echo 'taille du fichier : ' . $_FILES['img_upload']['size'] . ' octets <br/>';


if ($_FILES['img_upload']['error'] > 0)
{
	$erreur = "Erreur lors du transfert";
}

if($_FILES['img_upload']['size'] < $maxsize) $erreur = "Le fichier est trop gros" ;


$extensions_valides = array ('jpg', 'jpeg', 'gif', 'png');
$extension_upload = strtolower( substr( strrchr($_FILES['img_upload']['name'], '.') ,1) );
if (in_array($extension_upload, $extensions_valides))
{
	echo 'Extension correcte <br/>';
}


//Créer un dossier 'fichiers/1/'
/*mkdir('fichier/69/', 0777, true);*/


//Créer un identifiant difficile à deviner
$img_upload = md5(uniqid(rand(), true));

$img_upload = "avatars/{$_SESSION['id']}.{$extension_upload}";
$resultat = move_uploaded_file($_FILES['img_upload']['tmp_name'], $img_upload);

if (isset($resultat) AND ($extension_upload == 'jpeg') OR ($extension_upload == 'jpg'))
{
	$source = imagecreatefromjpeg($img_upload);
	$destination = imagecreatetruecolor (100,100);
	$largeur_source = imagesx($source);
	$hauteur_source = imagesy($source);
	$largeur_destination = imagesx($destination);
	$hauteur_destination = imagesy($destination);
	imagecopyresampled($destination,$source,0,0,0,0,$largeur_destination,$hauteur_destination,$largeur_source,$hauteur_source);
	imagejpeg($destination,"avatars/mini_{$_SESSION['id']}.jpg");
	imagejpeg($destination,"avatars/mini_{$_SESSION['id']}.jpg");
	header('Location:../vue/connecte.php');
}

/*if (isset($resultat) AND ($extension_upload == 'png'))
{
	echo 'Cette image est au format png';
	$source = imagecreatefrompng($img_upload);
	$destination = imagecreatetruecolor (100,100);
	$largeur_source = imagesx($source);
	$hauteur_source = imagesy($source);
	$largeur_destination = imagesx($destination);
	$hauteur_destination = imagesy($destination);
	imagecopyresampled($destination,$source,0,0,0,0,$largeur_destination,$hauteur_destination,$largeur_source,$hauteur_source);
	imagepng($destination,"avatars/mini_{$_SESSION['id']}.png");
	//header('Location:../vue/connecte.php');
}*/

?>
