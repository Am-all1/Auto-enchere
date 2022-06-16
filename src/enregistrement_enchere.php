<?php
require_once __DIR__."/include/header.php";
require_once __DIR__."/include/footer.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <?php affichage_header("Accueil", ["index"=>"index.php","profil"=>"profil.php", "Connexion"=> "page_connexion.php"]); ?>
        
        <form action="annonce.php" method="POST">
            <label for="prix_depart_enchere">Prix de reserve:</label>
            <input type="number" name="prix_depart_enchere" id="prix_depart_enchere">

            <label for="date_mise_en_ligne">Date de début de l'enchère:</label>
            <input type="date" name="date_mise_en_ligne" id="date_mise_en_ligne">
            
            <label for="date_fin_enchere">Fin de l'enchère:</label>
            <input type="date" name="date_fin_enchere" id="date_fin_enchere">

            <label for="modele">Modele du véhicule:</label>
            <input type="text" name="modele" id="modele">

            <label for="marque">Marque du véhicule:</label>
            <input type="text" name="marque" id="marque">
            
            <label for="Puissance">Puissance:</label>
            <input type="number" name="Puissance" id="Puissance">
            
            <label for="annee_vehicule">Année de mise en circulation:</label>
            <input type="date" name="annee_vehicule" id="annee_vehicule">

            <textarea name="description_vehicule">Description:</textarea>

            <input type="submit" value="S'inscrire">
        </form>


        <?php affichage_footer("Tous droit reservés", "mentions_legales.php"); ?>
    </body>
</html>