<?php

/**
 * Classe utilisateur
 */

class User
{

    /* Propriétés */
    public string $id;
    public string $nom;
    public string $prenom;
    public string $email;
    public string $mot_de_passe;
    /**
     * Constructeur
     */
    public function __construct(string $nom, string $prenom, string $email, string $mot_de_passe)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
    }
    public function save(): int
    {
        global $bdh;
        $query = $bdh->prepare("INSERT INTO users (nom, prenom, email, mot_depasse)VALUE (?, ?, ?, ?);");
        return $query->execute([$this->nom, $this->prenom, $this->email, $this->mot_de_passe]);
    }
    public static function getuserByEmail(string $email): user | null
    {
        global $dbh;
        $query = $dbh->prepare("SELECT *  FROM users WHERE email = ?;");
        $query->execute([$email]);
        $user_data = $query->fetch(PDO::FETCH_ASSOC);

        if ($user_data != false) {
            $user = new User($user_data["nom"], $user_data["prenom"], $user_data["email"], $user_data["mot_de_passe"]);
            $user->id = $user_data["id"];
            return $user;
        } else {
            return null;
        }
        
    }
}
