<?php

/**
 * Classe produit
 */

class HistoriqueAchat
{

    /* Propriétés */
    public string $id;
    public string $derniere_enchere; 
    public int $prix_final;
   
    
    /**
     * Constructeur
     */
    public function __construct(INT $id, INT $derniere_enchere, FLOAT $prix_final)
    {
        $this->id = $id;
        $this->derniere_enchere = $derniere_enchere;
        $this->prix_final= $prix_final;
    
    }

};