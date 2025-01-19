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

            // Récupère les données de l'utilisateur correspondant à l'email (si trouvé)
            $user = $req->fetch(PDO::FETCH_ASSOC);
            // Vérifie si un utilisateur est trouvé et si le mot de passe saisi correspond à celui dans la base de donnée
            if ($user && password_verify($password, $user['password'])) {
                // Stocke les informations utilisateur dans la session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                
                // Gère l'option "Se souvenir de moi"
                if (isset($_POST['se_souvenir'])) {
                    setcookie('user_id', $user['id'], time() + (86400 * 30), "/"); // 86400 = 1 jour
                    setcookie('user_email', $user['email'], time() + (86400 * 30), "/");
                }

                header("Location: ../video changente.html"); 
                exit;   
            } else {
                $message = "Adresse email ou mot de passe incorrect.";
            }
        } else {
            $message = "Veuillez remplir tous les champs.";
        }
    }
}

// Vérifie si les cookies existent pour l'authentification automatique
if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_email'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['user_email'] = $_COOKIE['user_email'];
    header("Location: ../video changente.html");
    exit;
}
// Récupère l'email stocké dans le cookie (s'il existe) pour pré-remplir le champ email
$email_stocke = isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>connexion</title>
<link rel="stylesheet" href="style inscription.css">
</head>
<body>
<h1>connexion</h1>

<form method="post" action="connexion.php">
<label for="email">Adresse email</label>
<input type="email" id="email" name="email" placeholder="Entrez votre email..." value="<?php echo htmlspecialchars($email_stocke); ?>" required> <br><br>



<label for="password"> mot de passe</label>
<input type="password" id="password" name="password" placeholder="Entrez votre mdp" required> <br><br>

<label>
    <input type="checkbox" name="se_souvenir"> Se souvenir de moi
</label> <br><br>

<input type="submit" value="me connecter" name="connexion" />
</form>
<div> 
  <i style="color:red">
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
</html>






