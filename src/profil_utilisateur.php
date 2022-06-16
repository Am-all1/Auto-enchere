
<?php

require_once __DIR__."/lib/dbb.php";

session_start();

 
if ($_SERVER["REQUEST_METHOD"] != "POST") 
{
    http_response_code(405);
    die();
}

    $afficher_profil = $DB->query("SELECT *
        FROM user
         WHERE id = ?",
         array($_SESSION['id']));
     $afficher_profil = $afficher_profil->fetch();
 
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



 <body>
     <div>Modification</div>

        <form method="post">

         <?php
             if (isset($er_nom)){

             ?>
             <div><?= $er_nom ?></div>

             <?php
             }

            ?>

        <input type="text" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }else{ echo $afficher_profil['nom'];}?>" required>   
        <?php
             if (isset($er_prenom)){
        ?>
            <div><?= $er_prenom ?></div>
        <?php
             }
            ?>
        <input type="text" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }else{ echo $afficher_profil['prenom'];}?>" required>   
            <?php

            if (isset($er_mail)){

            ?>
            <div><?= $er_mail ?></div>
            <?php
         }
            
            ?>
<input type="email" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }else{ echo $afficher_profil['mail'];}?>" required>
<button type="submit" name="modification">Modifier</button>
 </form>
 </body>
</html>