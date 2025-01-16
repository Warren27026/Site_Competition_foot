<?php
//paramètre de connexion à la base de données
$server="localhost:3306";
$user="e2405720";
$pwd="Yae172hd";
$db="e2405720";
//connexion au serveur où se trouve la base de données
$mysqli = new mysqli($server, $user, $pwd, $db);
//affichage d 'un message d'erreur si la connexion a été refusée
if (!$mysqli){
echo "Connexion à la base impossible";
}
echo 'Connexion réussie';
?>