<?php
include("config.php");

if (isset($_POST["inscription"])) {

    $message = '';

    // Valider 
    if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['genre'])) {
      
        $name = $conn->real_escape_string($_POST['name']);
        $password = $_POST['password'];
        $email = $conn->real_escape_string($_POST['email']);
        $gender = $conn->real_escape_string($_POST['genre']);

        // Valider le format de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "le format de l'email est invalide";
            echo $message;
            exit;
        }

        // valider la taille et le format du mot de passe
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[A-Z]).{8,}$/', $password)) {
            $message = "le mot de passe doit avoir 8 caractères au moins, avec au moins un chiffre et une majuscule ";
            echo $message;
            exit;
        }

        // securiser le mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Inserer les informations dans la base de donnée
        $sql = "INSERT INTO authentification (email, username, mot_de_passe, genre) VALUES ('$email', '$name', '$hashed_password', '$gender')";

        if ($conn->query($sql) === TRUE) {
            echo "Inscription réussie ! Vous pouvez vous connecter.";
        } else {
            echo "Erreur : " . $conn->error;
        }

    } else {
        $message = "Veuillez remplir tous les champs.";
        echo $message;
    }

}

// fermer la connexion
$conn->close();
?>

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