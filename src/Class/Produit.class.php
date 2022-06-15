<?php

/**
 * Classe produit
 */

class User
{

    /* Propriétés */
    public string $id;
    public string $prix_de_reserve; 
    public int $fin_enchere;
    public string $date;
    public string $modele;
    public string $puissance; 
    public int $annee;
    public string $description;
    
    /**
     * Constructeur
     */
    public function __construct(string $id, FLOAT $prix_de_reserve,string $fin_enchere,DateTime $date, string $modele, INT $puissance, string $annee,string $description)
    {
    $this-> id =$id;
    $this-> prix_de_reserve =$prix_de_reserve; 
    $this-> fin_enchere =$fin_enchere;
    $this-> date =$date;
    $this->modèle =$modele;
    $this-> puissance =$puissance; 
    $this-> annee =$annee;
    $this-> description =$description;
    }

};