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
    public function addGrid($name,$cat){
        $sql='INSERT INTO `grid`(`idGrid`, `nameGrille`, `category`) VALUES (null,?,?)';
        $this->executerRequete($sql,array($name,$cat));
       
    }

    
     public function addItem($name,$des,$idGrid,$idItemCat){
        $sql='INSERT INTO `itemgrid`(`id_item`, `item`, `description`, `idGrid`, `idItemCat`) VALUES (null,?,?,?,?)';
        $this->executerRequete($sql,array($name,$des,$idGrid,$idItemCat));
       
    }
    
      public function addCat($name,$req){
        $sql= 'INSERT INTO `itemcat`(`idItemCat`, `name`, `requirement`) VALUES (null,?,?)';
        $this->executerRequete($sql,array($name,$req));
       
    }
    
    
      public function getCat()
    {
        $sql='select * from itemCat';
        $cat = $this->executerRequete($sql);
        return $cat;
    }
    
    public function getGrilles()
    {
        $sql='select * from grid';
        $grille = $this->executerRequete($sql);
        return $grille;
    }
} 
