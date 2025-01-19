<!--Nana Talom-->
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit;
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidéos en fond d'écran</title>
    <style>
        /* Style global pour enlever les marges et adapter le contenu */
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden; /* Empêcher le défilement */
        }

        /* Conteneur pour les vidéos en plein écran */
        .fond-video {
            position: fixed; /* Fixer le conteneur au fond de l'écran */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Placer derrière tout le contenu */
        }

        /* Toutes les vidéos sont superposées */
        .fond-video video {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Adapter la vidéo au conteneur sans déformation */
            opacity: 0; /* Rendre invisible par défaut */
            transition: opacity 1s ease; /* Transition fluide entre les vidéos */
        }

        /* La vidéo active est visible */
        .fond-video video.actif {
            opacity: 1; /* Rendre visible la vidéo active */
        }

        /* Contenu du site (par-dessus la vidéo) */
        .contenu {
            position: relative; /* Positionner le contenu au-dessus de la vidéo */
            color: white;
            text-align: center;
            font-family: Arial, sans-serif;
            padding-top: 20%;
        }
    </style>
</head>
<body onclick="naviguerVersPage()">
    <!-- Conteneur pour les vidéos en fond d'écran -->
    <div class="fond-video">
        <video src="image/uefa.mp4" class="actif" autoplay muted loop></video>
        <video src="image/foot1.mp4" muted loop></video>
        <video src="image/foot2.mp4" muted loop></video>
        <video src="image/foot3.mp4" muted loop></video>
        <video src="image/foot4.mp4" muted loop></video>
        <video src="image/foot5.mp4" muted loop></video>
    </div>

    <!-- Contenu de la page par-dessus les vidéos -->
    <div class="contenu">
        <h1>Footix</h1>
        <p>Bienvenue, <?php echo htmlspecialchars($username); ?>!</p> 
        <P>Cliquez pour avancer</P>
    </div>
<!-- Musique en fond -->
<audio id="musique-fond" src="image/UEFA Champions League - Main Theme.mp3" autoplay loop></audio>
    <script>
        // Index de la vidéo active
        let indexVideo = 0;
        
        // Sélectionner toutes les vidéos
        const videos = document.querySelectorAll('.fond-video video');
        
        // Fonction pour changer de vidéo
        function changerVideo() {
            // Retirer la classe 'actif' de la vidéo actuelle
            videos[indexVideo].classList.remove('actif');
            
            // Passer à la vidéo suivante (ou revenir à la première)
            indexVideo = (indexVideo + 1) % videos.length;
            
            // Ajouter la classe 'actif' à la nouvelle vidéo
            videos[indexVideo].classList.add('actif');
            
            // Lancer la lecture de la nouvelle vidéo
            videos[indexVideo].play();
        }
         // Fonction pour naviguer vers une autre page
         function naviguerVersPage() {
            window.location.href = "accueil.html"; // Remplacez par le lien de la page suivante
        }
        
        
        // Changer la vidéo toutes les 10 secondes
        setInterval(changerVideo, 10000);
         // Contrôle du volume de la musique
         const musiqueFond = document.getElementById('musique-fond');
        musiqueFond.volume = 0.6; // Réduisez le volume si nécessaire
    </script>
</body>
</html>
