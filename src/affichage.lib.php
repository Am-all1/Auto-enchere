<?php


$email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));




    $tmpName_users = $_FILES['file']['tmp_name'];
    $name_users = $_FILES['file']['name_users'];
    $tabExtension = explode('.', $name_users);
    $extension = strtolower(end($tabExtension));

    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    if(in_array($extension, $extensions)){
        move_uploaded_file($tmpName_users, './upload/'.$name_users);
    }
    else{
        echo "Mauvaise extension";
    }
    /* Préparation de la requête */
$query = $dbh->prepare("SELECT * FROM users ORDER BY id DESC");

/* Exécution de la requête */
$query->execute();

/* Récupération des données retournées par la requête */
$users = $query->fetch();


?>

        <h1>profil</h1>

        
           <?php $req = $dbh->query('SELECT name_users FROM users');
            $data = $req->fetch();
            echo "<img src='./upload/".$data['name_users']."' width='300px' ><br>"; ?>
                
           

        <?php while($b = $query->fetch()) { ?>
            <ul>
                <li>Nom: <?=  $b["nom"]; ?></li>
                <li>Prénom: <?= $b["prenom"]; ?></li>
                <li>Email: <?= $b["email"]; ?></li>
                <li>Votre mot de passe <?= $b["mot_de_passe"]; ?></li>
            </ul>

        <?php } ?>
    