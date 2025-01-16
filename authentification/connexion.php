<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

   /* $sql = "SELECT * FROM authentification WHERE email = '$email' AND password =' $password' ";
    $result = $conn->query($sql);*/
    $Requete = mysqli_query($mysqli,"SELECT * FROM authentification WHERE email = '".$email."' AND password = '".$password."'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['name'];
            header("Location: welcome.php");
            exit;
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Email introuvable.";
    }
}

$conn->close();
?>