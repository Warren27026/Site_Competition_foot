<?php


session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["connexion"])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];

            $req = $mysql->prepare("SELECT * FROM utilisateur WHERE email = ?");
            // Exécute la requête avec l'email fourni
            $req->execute(array($email));

            // Récupère les données de l'utilisateur correspondant à l'email (si trouvé
            $user = $req->fetch(PDO::FETCH_ASSOC);
                // Vérifie si un utilisateur est trouvé et si le mot de passe saisi correspond à celui  dans la base de donnée
            if ($user && password_verify($password, $user['password'])) {

                header("Location: ../accueil.html"); // c'est ici qu'on va mettre la commande pour rediriger a la page d'acceuil
                    exit;   
            } else {
                $message = "Adresse email ou mot de passe incorrect.";
            }
        } else {
            $message = "Veuillez remplir tous les champs.";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<title>connexion</title>
<link rel="stylesheet" href="style inscription.css">
</head>
<body>
<h1> connexion</h1>

<form method="post" action="connexion.php">

<label for="email">Adresse email</label>
<input type="email" id="email" name="email" placeholder="Entrez votre email..." required> <br><br>

<label for="password">mot de passe</label>
<input type="password" id="password" name="password" placeholder="Entrez votre mdp" required> <br><br>

<input type="submit" value="me connecter" name = "connexion" />
</form>
<div> 
  <i style=" color:red"> 
  <?php
      if (isset($message)){
      echo $message, "<br/>";
      }
    ?>
    </i>
    je n'ai pas de compte
</div>
<a href="inscription.html">je m'inscris</a>
</body>
