<?php

/**
 * Classe produit
 */

class Annonce_produit
{

    /* Propriétés */

    public float $prix_depart_enchere; 
    public string $date_mise_en_ligne; 
    public string $date_fin_enchere;
    public string $marque;
    public string $modele;
    public string $puissance; 
    public int $annee;
    public string $description;
    
    /**
     * Constructeur
     */
    public function __construct(float $prix_depart_enchere,string $date_mise_en_ligne,string $date_fin_enchere,string $marque, string $modele, INT $puissance, string $annee,string $description)
    {
    
    $this-> prix_depart_enchere =$prix_depart_enchere; 
    $this-> date_mise_en_ligne =$date_mise_en_ligne;
    $this-> date_fin_enchere =$date_fin_enchere;
    $this-> marque =$marque;
    $this-> modèle =$modele;
    $this-> puissance =$puissance; 
    $this-> annee =$annee;
    $this-> description =$description;
    }

};