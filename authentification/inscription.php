<?php
include("config.php");

if(isset($_POST["inscription"])) //tester si le formulaire a été soumis


$message = '';

 // Vérification des champs requis
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && filter_var($email, FILTER_VALIDATE_EMAIL) && isset($_POST['genre'])) {
        $username = $conn->real_escape_string($_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $conn->real_escape_string($_POST['email']);
        $genre = $conn->real_escape_string($_POST['genre']);

    $sql = "INSERT INTO authentification (email, username, password, sexe) VALUES (:email, :username, :password, :sexe)";
   
    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie ! Vous pouvez vous connecter.";
    } else {
        echo "Erreur : " . $conn->error;
    }

    } else {
        $message = "Veuillez remplir tous les champs.";
    }

    echo $message;

// Fermer la connexion
$conn->close();
?>