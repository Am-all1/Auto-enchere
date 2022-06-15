<?php

/**
 * Classe produit
 */

class User
{

    /* Propriétés */
    public string $id;
    public string $nom; 
    public int $prenom;
    public string $email;
    public string $mot_de_passe;
    
    /**
     * Constructeur
     */
    public function __construct(string $id, string $nom, INT $prenom, string $email, string $mot_de_passe)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
    }

};