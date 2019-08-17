<?php


 $v= $_GET['valeur'];
try
{
$bdd = new PDO('mysql:host=localhost;dbname=allimentation;charset=utf8', 'root', '');
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage()); 
}



$req = $bdd->prepare("SELECT nom FROM produit where nom like concat($v,'%')");
$req->execute();
$results=$req->fetchAll();


foreach($results as $result)
{
	
	echo $result['nom'].'|';	
}

?>	