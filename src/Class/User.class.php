<?php

/**
 * Classe produit
 */

class Product
{

    /* Propriétés */
    protected string $model;
    public string $mark; 
    public int $horsepower;
    public string $year;
    public string $description;
    
    /**
     * Constructeur
     */
    public function __construct(string $model, string $mark, INT $horsepower, string $year, string $description)
    {
        $this->model = $model;
        $this->nmark = $mark;
        $this->horsepower = $horsepower;
        $this->year = $year;
        $this->description = $description;
    }
}
?>