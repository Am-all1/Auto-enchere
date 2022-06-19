<?php
session_start();
require_once __DIR__."/include/header.php";
require_once __DIR__."/include/footer.php";
require_once __DIR__."/lib/dbb.php";
require_once __DIR__."/Class/Produit.class.php";
require_once __DIR__."/lib/serveur_requette.php";

/* recuperation des données du formulaire*/   
    $prix_depart_enchere = htmlspecialchars($_POST["prix_depart_enchere"]);
    $date_mise_en_ligne = htmlspecialchars($_POST["date_mise_en_ligne"]);
    $date_fin_enchere = htmlspecialchars($_POST["date_fin_enchere"]);
    $modele = htmlspecialchars($_POST["modele"]);
    $marque = htmlspecialchars($_POST["marque"]);
    $puissance = htmlspecialchars($_POST["puissance"]);
    $annee = htmlspecialchars($_POST["annee"]);
    $description = htmlspecialchars($_POST["description"]);
    $id_users = $_SESSION["id_users"];


    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));

    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    if(in_array($extension, $extensions)){
        move_uploaded_file($tmpName, './upload/'.$name);
    }
    else{
        echo "Mauvaise extension";
    }

/* Préparation de la requette*/
    $query = $dbh->prepare("INSERT INTO annonce_produit (prix_depart_enchere, date_mise_en_ligne, date_fin_enchere, modele, marque, puissance, annee, description, name) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);");

/*Execution de la requette*/
    $result = $query->execute([$prix_depart_enchere, $date_mise_en_ligne, $date_fin_enchere, $modele, $marque, $puissance, $annee, $description, $name]);

 
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The place to be | Profil utilisateur</title>
</head>
<body>
    <?php if($result == 1){ ?>
        <p>Votre annonce a bien été enregistré.</p>
        <meta http-equiv="refresh" content="1;index.php" />
    <?php } else { ?>
        <p>Une erreur s'est produite lors de l'enregistrement de votre annonce.</p>
    <?php } ?>
</body>
</html>