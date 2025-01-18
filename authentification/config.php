<?php
//paramètre de connexion à la base de données
$server = "127.0.0.1";
$user = "root";
$password = "";
try {
    $mysql = new PDO("mysql:host=$server;dbname=user", $user, $password);
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur : ".$e->getMessage();
}
