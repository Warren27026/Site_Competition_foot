<?php


// inclusion du fichier de connexion a la base de donnée
include("config.php");




// Vérification si le formulaire d'inscription a été soumis
if (isset($_POST['inscription'])) {

    // Récupération des données du formulaire
    $username = ( $_POST['name']);

    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);// Hashage sécurisé du mot de passe
    
    $email =  ($_POST['email']);

    $genre =  ($_POST['genre']);

        // Vérification si l'utilisateur existe déjà dans la base de données

            $verifRequete = $mysql->prepare("SELECT * FROM utilisateur WHERE email = :email");
            $verifRequete->execute(["email" => $email]);
    
            if ($verifRequete->rowCount() > 0) {
                // Si l'utilisateur existe déjà
                echo "cette adresse a  déjà un compte.</br></br> Vous serez redirigé vers la page de connexion dans 5 secondes.";
              header("Refresh:5; url=connexion.php");// Redirection automatique après 5 secondes vers la page de connexion
              exit;
                  //Utilisateur existant
             
            } else{


     
        // Préparation de la requête d'insertion
    $requete = $mysql->prepare( "INSERT INTO utilisateur VALUES (0, :username, :password, :email, :genre)");
    $requete->execute(
        array(
            "username" => $username,
            "password" => $password,
            "email" => $email,
            "genre" => $genre,
        )
        );
        $reponse = $requete->fetchAll(PDO::FETCH_ASSOC);
    
       // echo "inscription réussie !";
       $message = "Inscription réussie !";
       echo '<p style="color: white; background-color: #28a745; padding: 20px; border-radius: 5px; font-size: 18px; font-weight: bold; text-align: center;">
         '. $message . '
      </p>';
      header("Refresh:3; url=connexion.php");
   
}
}





