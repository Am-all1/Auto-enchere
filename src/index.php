<?php
session_start();
require_once __DIR__."/include/header.php";
require_once __DIR__."/include/footer.php";
require_once __DIR__."/affichage_enchere.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>The place to be | Accueil</title>
</head>
<body>
    <?php affichage_header("Accueil", ["Profil"=>"profil_utilisateur.php","Enchère"=>"enregistrement_enchere.php", "historique des enchères"=>"histo_enchere.php", "Connexion"=> "page_connexion.php"]); ?>
    
    <main>
        <h2>Accueil</h2>
    </main> 
    
    <?php affichage_footer("Tous droit reservés", "mentions_legales.php"); ?>
</body>
</html>