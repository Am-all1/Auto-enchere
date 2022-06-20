
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>The place to be</title>
</head>

<body id="formConnection">
    <form action="connection_user.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br/>

        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" required><br/>


        <input type="submit" value="Se connecter"><br/>

    </form>
    <form action="page_enregistrement.php" method="POST">
        <input type="submit" value="S'inscrire">
    </form>
</body>

<style scoped>

#formConnection{
    
    DISPLAY: FLEX;
    justify-content: space-around;
    position: absolute;
   
    width: 100%;
    padding-top: 270px;
    height: 50px;
}

</style>
</html>

