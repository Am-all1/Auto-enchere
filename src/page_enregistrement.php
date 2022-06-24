<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <title>Auto-enchère</title>
    </head>
    <body id="formConnection">
        <div class="card text-bg-info mb-3" style="max-width: 60rem;">
            <div class="card-header">
                <h2>Inscription</h2>
            </div>
            <br/>
            <form class="card-body" action="validation_profil_utilisateur.php" method="POST">
                <div class="form-floating mb-3" class="card-text" >
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required><br/>
                    <label for="nom">Nom:</label>
                </div>
                <div class="form-floating mb-3" class="card-text" >    
                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prenom" required><br/>
                    <label for="prenom">Prénom:</label>
                </div>
                <div class="form-floating mb-3" class="card-text" >        
                    <input type="email" class="form-control" name="email" id="email" placeholder="nom@exemple.com" required><br/>
                    <label for="email">Email:</label>
                </div>
                <div class="form-floating" class="card-text" >
                    <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" required><br/>
                    <label for="mot_de_passe">Mot de passe:</label>
                </div>
                
                <div class="inscription" class="card-text" >
                    <input type="submit" class="btn btn-primary btn-lg" value="S'inscrire">
                </div>
            </form>
            
            <div class="enregistrement_href" class="card-text" >
                <a href="page_connexion.php" ><input type="button" class="btn btn-primary btn-lg" value="Retour à la page connexion"></a>   
            </div>
            <br/>
        </div>
    </body>
</html>

<style>
#formConnection{
    
    DISPLAY: FLEX;
    flex-direction: column;
    justify-content: center;
    align-content: center;
    margin-left: 30%;
    width: 40%;
    margin-top: 20%;
    height: 50px;
}

.inscription {
    display: flex;
    justify-content: center;

}

.enregistrement_href {
    display: flex;
    justify-content: center;
}

.card-text {

font-size: large;
}
</style>