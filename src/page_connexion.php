
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>The place to be</title>
</head>

<body id="formConnection">
    <div  class="card text-bg-info mb-3" style="max-width: 30rem;">
        <div class="card-header">
            <h2>Connexion</h2>
        </div>
        <form class="card-body" action="connection_user.php" method="POST">    
            <div class="form-floating mb-3" class="card-text" >
                <input type="email" class="form-control" name="email" id="email" placeholder="nom@exemple.com" required>
                <label for="email">Adresse email</label>
            </div>
                
            <div class="form-floating" class="card-text" >
                <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" required>
                <label for="mot_de_passe">Mot de passe</label>
            </div>
            <br/>
            
            <div class="input" class="card-text" >
                <input type="submit" class="btn btn-primary btn-lg" value="Se connecter">
            
            </div>
        </form>
        <br/>
       
        <div class="connexion_href" class="card-text" >
            <a href="page_enregistrement.php"><input type="submit" class="btn btn-primary btn-lg" value="S'inscrire"></a>
        </div>
    <br/>
    </div> 
</body>
<style scoped>
.card-header {
    align-content: center;
}



#formConnection{
    
    DISPLAY: FLEX;
    flex-direction: column;
    justify-content: center;
    align-content: center;
    position: absolute;
    margin-left: 30%;
    width: 40%;
    margin-top: 20%;
    height: 60px;

}

.input {
    display: flex;
    justify-content: center;

}

.connexion_href {
    display: flex;
    justify-content: center;
}

.card-text {

    font-size: x-large;
}


</style>
</html>

