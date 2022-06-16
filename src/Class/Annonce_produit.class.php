<?php

/**
 * Classe produit
 */

class Annonce_produit
{

    /* Propriétés */

    public string $prix_depart_enchere; 
    public string $date_mise_en_ligne; 
    public int $date_fin_enchere;
    public string $marque;
    public string $modele;
    public string $puissance; 
    public int $annee;
    public string $description;
    
    /**
     * Constructeur
     */
    public function __construct(FLOAT $prix_de_reserve,string $fin_enchere,DateTime $date, string $modele, INT $puissance, string $annee,string $description)
    {
    
    $this-> prix_de_reserve =$prix_de_reserve; 
    $this-> fin_enchere =$fin_enchere;
    $this-> date =$date;
    $this->modèle =$modele;
    $this-> puissance =$puissance; 
    $this-> annee =$annee;
    $this-> description =$description;
    }

};