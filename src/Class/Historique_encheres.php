<?php

/**
 * Classe produit
 */

class HistoriqueAchat
{

    /* Propriétés */
<<<<<<< HEAD
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
=======
    
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
>>>>>>> c40efa1a71abe3ba76bddc902e8b9670698303a5
    }
};
