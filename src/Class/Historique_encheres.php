<?php

/**
 * Classe historique_achat
 */

class HistoriqueEnchere
{

    /* Propriétés */
       
    public string $derniere_encheres; 
    public int $prix_final;
    public int $id_user;
    public int $id_annonce_produit;
   
    
    /**
     * Constructeur
     */
    public function __construct(INT $id, INT $derniere_enchere, FLOAT $prix_final, int $id_user ,int $id_annonce_produit)
    {
        
        $this->derniere_encheres = $derniere_enchere;
        $this->prix_final= $prix_final;
        $this->id_user=$id_user;
        $this->id_annonce_produit =$id_annonce_produit;
    }
};
