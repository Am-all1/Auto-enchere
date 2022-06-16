<?php
require_once __DIR__ . "/../lib/dbb.php";
/**
 * Classe produit
 */

class User
{

    /* Propriétés */
    public INT $id;
    public string $email;
    public string $mot_de_passe;

    /**
     * Constructeur
     */
    public function __construct(string $email, string $mot_de_passe)
    {
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
    }
    public function save(): int
    {
        global $bdh;
        $query = $bdh->prepare("INSERT INTO user (email, password)VALUE (?, ?);");
        return $query->execute([$this->$email, $this->$mot_de_passe]);
    }
    public static function getuserByEmail(string $email): user | null
    {
        global $dbh;
        $query = $dbh->prepare("SELECT *  FROM user WHERE email = ?;");
        $query->execute([$email]);
        $user_data = $query->fetch(PDO::FETCH_ASSOC);

        if ($user_data != false) {
            $user = new User($user_data["email"], $user_data["mot_de_passe"]);
            $user->id = $user_data["id"];
            return $user;
        } else {
            return null;
        }
    }
}
