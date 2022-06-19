<?php

/**
 * Classe produit
 */

class Produit
{

    /* Propriétés */

    public int $id;
    public int $prix_depart; 
    public string $date_mise_en_ligne; 
    public int $date_fin_enchere;
    public string $marque;
    public string $modele;
    public string $puissance; 
    public int $annee;
    public string $description;
    public int $id_user;
    /**
     * Constructeur
     */
    public function __construct(int $prix_depart, string $date_mise_en_ligne, string $date_fin_enchere, string $modele, INT $puissance, string $annee,string $description,int $id_user)
    {
    
    $this-> prix_depart =$prix_depart; 
    $this-> date_mise_en_ligne =$date_mise_en_ligne;
    $this-> date_fin_enchere =$date_fin_enchere;
    $this-> modèle =$modele;
    $this-> puissance =$puissance; 
    $this-> annee =$annee;
    $this-> description =$description;
    $this-> id_user =$id_user;
    }
    
};