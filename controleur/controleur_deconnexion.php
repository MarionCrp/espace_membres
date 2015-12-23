<?php

//appelle de la session
session_start();


$_SESSION = array();

//suppression de la session
session_destroy();

setcookie('pseudo','');
setcookie('pass','');


header('Location:connexion.php');