<?php
/* Démarrage de la session */
session_start();

require_once __DIR__."/lib/dbb.php";
require_once __DIR__."/Class/User.class.php";




 
if ($_SERVER["REQUEST_METHOD"] != "POST") 
{
    http_response_code(405);
    die();
}

$query = $DB->prepare("SELECT *
FROM user
 WHERE id = ?",
 array($_SESSION['id']));
$afficher_profil = $query->fetch();

    if(!empty($_POST)){
     extract($_POST);
        $valid = true;
 
        if (isset($_POST['modification'])){
            $nom = htmlentities(trim($nom));//trim=supprime les espaces avant le nom
            $prenom = htmlentities(trim($prenom));//html entities traduit tous les caractères et entité en HTML
            $email = htmlentities(strtolower(trim($email)));//strtolower pr convertir en minuscule
 
         if(empty($nom)){
            $valid = false;
            $er_nom = "Il faut mettre un nom";
            }
 
        if(empty($prenom)){
            $valid = false;
            $er_prenom = "Il faut mettre un prénom";
         }
 
        if(empty($mail)){
            $valid = false;
            $er_mail = "Il faut mettre un mail";
 
            }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email)){
            $valid = false;
            $er_mail = "Le mail n'est pas valide";
 
            }else{
            $req_mail = $DB->query("SELECT email
                FROM utilisateur
                WHERE email = ?",
            array($email));
             $req_email = $req_email->fetch();
 
        if ($req_mail['email'] <> "" && $_SESSION['email'] != $req_email['email']){
            $valid = false;
            $er_mail = "Ce mail existe déjà";
 }
}
 
if ($valid){
    $DB->insert("UPDATE utilisateur SET prenom = ?, nom = ?, email = ?
                     WHERE id = ?",
                     array($prenom, $nom,$email, $_SESSION['id']));
 
                 $_SESSION['nom'] = $nom;
                 $_SESSION['prenom'] = $prenom;
                 $_SESSION['email'] = $email;
 
             header('Location: profil_utilisateur.php');
             exit;
             }
         }
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Demo class pdo</title>
</head>

<body>
    <p>Votre adresse email est <?= $_SESSION["email"] ?> et votre id <?= $_SESSION["user_id"] ?> .</p>
</body>

</html>
