<?php
session_start();
require_once __DIR__."/include/header.php";
require_once __DIR__."/include/footer.php";

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>The place to be | Mentions Légales</title>
</head>
<body>
<?php affichage_header("Accueil", ["index"=>"index.php","profil"=>"affichage_profil.php","Enchère"=>"enregistrement_enchere.php", "Connexion"=> "page_connexion.php"]); ?>

    <main>
        <a href="index.php">Retour à l'accueil</a>
        <h2>Mentions Légales</h2> 

        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis itaque nemo magnam nisi dolores accusamus, eum tempora facilis consequatur tenetur, vero officiis numquam perspiciatis! Maiores cumque quod officia animi veniam?</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam veritatis, voluptatibus repellendus reprehenderit quia dolor ipsum cumque, iure incidunt porro excepturi itaque, inventore sequi beatae doloribus aliquam libero eveniet vero.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum quibusdam aliquam placeat dolore illo ad fugiat ea tempora. Sequi praesentium impedit eligendi provident quos sed magni tempora autem perferendis expedita!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos inventore debitis nisi placeat suscipit, necessitatibus dignissimos nulla deserunt atque cupiditate officiis consequatur a voluptatem at pariatur labore vitae ad eius.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quaerat quod, iusto ratione dicta corrupti iste, vel amet ex iure, labore non! Itaque a assumenda eum et animi sint maiores?</p>

    </main>

    <?php affichage_footer("Tous droit reservés", "mentions_legales.php"); ?>

</body>

</html>