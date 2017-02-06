<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Grille
 *
 * @author Asmae
 */
require_once 'Framework/Modele.php';

class Grille extends Modele{


    public function getGrille()
    {
        $sql='select * from grilleevaluation';
        $classes = $this->executerRequete($sql);
        return $classes;
    }

} 
