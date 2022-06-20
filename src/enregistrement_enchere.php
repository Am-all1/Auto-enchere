<?php
session_start();
require_once __DIR__ . "/include/header.php";
require_once __DIR__ . "/include/footer.php";
require_once __DIR__."/lib/dbb.php";

if (isset($_POST['prix_depart_enchere'],$_POST['date_mise_en_ligne'],$_POST['date_fin_enchere'],$_POST['modele'],$_POST['marque'],$_POST['puissance'],$_POST['annee'],$_POST['description']))
{
    if(!empty($_POST['prix_depart_enchere']) AND !empty($_POST['date_mise_en_ligne']) AND !empty($_POST['date_fin_enchere']) AND !empty($_POST['modele']) AND !empty($_POST['marque']) AND !empty($_POST['puissance']) AND !empty($_POST['annee']) AND !empty($_POST['descritption']))  {
        $prix_depart_enchere = htmlspecialchars($_POST["prix_depart_enchere"]);
        $date_mise_en_ligne = htmlspecialchars($_POST["date_mise_en_ligne"]);
        $date_fin_enchere = htmlspecialchars($_POST["date_fin_enchere"]);
        $modele = htmlspecialchars($_POST["modele"]);
        $marque = htmlspecialchars($_POST["marque"]);
        $puissance = htmlspecialchars($_POST["puissance"]);
        $annee = htmlspecialchars($_POST["annee"]);
        $description = htmlspecialchars($_POST["description"]);
        $id_users = $_SESSION["id_users"];

    /* Préparation de la requette*/
        $query = $dbh->prepare("INSERT INTO annonce_produit (prix_depart_enchere, date_mise_en_ligne, date_fin_enchere, modele, marque, puissance, annee, description, name) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);");
        // NOW()??? au 2ème '?'

    /*Execution de la requette*/
        $result = $query->execute([$prix_depart_enchere, $date_mise_en_ligne, $date_fin_enchere, $modele, $marque, $puissance, $annee, $description, $name]);

        $message = 'Votre annonce a bien été postée';

    } else {
        $message = 'Veuillez remplir tous les champs';
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Enregistrement de l'annonce</title>
    </head>
    <body>

        <?php affichage_header("Accueil", ["Accueil"=>"index.php","profil"=>"affichage_profil.php", "Mentions Légales"=>"mentions_legales.php", "Connexion"=> "page_connexion.php"]); ?>
        
        <form action="enchere.php" method="POST" enctype="multipart/form-data">
        
            <label for="prix_depart_enchere">Prix de reserve:</label>
            <input type="number" name="prix_depart_enchere" id="prix_depart_enchere" required><br/>

            <label for="date_mise_en_ligne">Date de début de l'enchère:</label>
            <input type="date" name="date_mise_en_ligne" id="date_mise_en_ligne" required><br/> -->
            
            <label for="date_fin_enchere">Fin de l'enchère:</label>
            <input type="date" name="date_fin_enchere" id="date_fin_enchere" required><br/>

            <label for="modele">Modele du véhicule:</label>
            <input type="text" name="modele" id="modele" required><br/>

            <label for="marque">Marque du véhicule:</label>
            <input type="text" name="marque" id="marque" required><br/>
            
            <label for="puissance">Puissance:</label>
            <input type="number" name="puissance" id="puissance" required><br/>
            
            <label for="annee">Année de mise en circulation:</label>
            <input type="number" name="annee" id="annee" required><br/>

            <label for="description">description:</label>
            <textarea name="description" placeholder="Ecrire la description de votre véhicule:" required></textarea><br/>

            <label for="file">Fichier</label>
            <input type="file" name="file">
            
            <button type="submit">Enregistrer votre annonce</button><br/>

        </form>
        <br/>
        <?php if(isset($message)) {
            echo $message;
        } ?>

        <?php affichage_footer("Tous droit reservés", "mentions_legales.php"); ?>
    </body>
</html>