<?php
if (isset($_POST['submit']))
{   $id_users = $_SESSION["id"];
    $maxSize = 90000;
    $validExt = array('.jpg','.jpeg', '.gif','.png');
    if($_FILES['file']['error'] > 0)
    {
        echo "Une erreur est survenue lors du tranfert"; ?>
        <meta http-equiv="refresh" content="2;affichage_profil.php" />
        <?php die();
    }

    $fileSize = $_FILES['file']['size'];
   
    if ( $fileSize > $maxSize)
    {
        echo "Votre fichier est trop volumineuse";?>
        <meta http-equiv="refresh" content="2;affichage_profil.php" />
        <?php die();
    }

    $name = $_FILES['file']['name'];
    $fileExt =".".strtolower(substr(strrchr($_FILES['file']['name'],'.'), 1));

    if (!in_array($fileExt, $validExt))
    {
        echo "Le fichier n'est pas une image";?>
        <meta http-equiv="refresh" content="2;affichage_profil.php" />
        <?php die();
    }

    $tmpName = $_FILES['file']['tmp_name'];
    $uniqueName = md5(uniqid(rand(), true));
    $fileName = "upload/" . $uniqueName . $fileExt;
    $resultat = move_uploaded_file($tmpName, $fileName);

    if ($resultat)
    {
        echo "Transfert terminé !"; ?>
        <meta http-equiv="refresh" content="2;affichage_profil.php" />
    <?php }
    
            
} ?>
    
  
  
  
