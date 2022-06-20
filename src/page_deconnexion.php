<?php
session_start();
session_destroy();
header('location: ../page_connexion.php');
exit;
?>
<body>
    <?php if ($result == 0) { ?>
        <p>Votre profil a bien été deconnecté.</p>
        <meta http-equiv="refresh" content="1;page_connexion.php" />
    <?php } else { ?>
        <p>Une erreur s'est produite lors de votre enregistrement.</p>
    <?php } ?>


</body>