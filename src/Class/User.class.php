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
    public string $name_users;
    /**
     * Constructeur
     */
    public function __construct(string $nom, string $prenom, string $email, string $mot_de_passe, string $name_users)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->name_users = $name_users;
    }
    public function save(): int
    {
        global $bdh;
        $query = $bdh->prepare("INSERT INTO users (nom, prenom, email, mot_depasse, name_users)VALUE (?, ?, ?, ?, ?);");
        return $query->execute([$this->nom, $this->prenom, $this->email, $this->mot_de_passe, $this->name_users]);
    }
    public static function getuserByEmail(string $email): user | null
    {
        global $dbh;
        $query = $dbh->prepare("SELECT *  FROM users WHERE email = ?;");
        $query->execute([$email]);
        $user_data = $query->fetch(PDO::FETCH_ASSOC);

        if ($user_data != false) {
            $user = new User($user_data["nom"], $user_data["prenom"], $user_data["email"], $user_data["mot_de_passe"], $user_data["name_users"]);
            $user->id = $user_data["id"];
            return $user;
        } else {
            return null;
        }
        
    }
}
