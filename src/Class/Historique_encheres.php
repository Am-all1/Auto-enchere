<?php

/**
 * Classe produit
 */

class HistoriqueAchat
{

    /* Propriétés */
    public int $id_historique_enchere;
    public string $derniere_enchere;
    public int $prix_final;


    /**
     * Constructeur
     */
    public function __construct(INT $id_historique_enchere, INT $derniere_enchere, FLOAT $prix_final)
    {
        $this->id_annonce = $id_historique_enchere;
        $this->derniere_enchere = $derniere_enchere;
        $this->prix_final = $prix_final;
    }
};
