<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=alaska;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

//On récupère les valeurs entrées par jean forteroche :
$title=$_POST['title'];
$content=$_POST['content'];
 
//On créée une variable date du jour grâce à la fonction date() de PHP
$date = date("d.m.y");

//On prépare la commande sql d'insertion
$sql = 'INSERT INTO chapter VALUES("","'.$title.'","'.$content.'", "'.$date.'")';

?>