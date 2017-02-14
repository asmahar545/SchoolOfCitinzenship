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
    public function addItemStudent($ida,$ids){
        $sql='insert';
        $evalue= $this->executerRequete($sql,array($ida,$ids));
        return $evalue;
    }
    public function getEvalueStudent($ida,$ids){
        $sql='select *from studentitem where id_adult= ? AND id_student= ?';
        $evalue= $this->executerRequete($sql,array($ida,$ids));
        return $evalue;
    }
    public function addItemEvalueStudent($idS,$idU){
       /* 
       $sql="INSERT INTO `studentitem`(`id_adult`, `id_student`, `id_item`, `response`, `item`)
                VALUES (?,?,1,0,`l'éleve devra être polis`)";
       $this->executerRequete($sql,array($idU,$idS));
       $sql1="INSERT INTO `studentitem`(`id_adult`, `id_student`, `id_item`, `response`, `item`)
                VALUES (?,?,2,0,'Je suis calme')";
       $this->executerRequete($sql1,array($idU,$idS));
       $sql2="INSERT INTO `studentitem`(`id_adult`, `id_student`, `id_item`, `response`, `item`)
                VALUES (?,?,3,0,'J’embête pas me camarade de classe')";
       $this->executerRequete($sql2,array($idU,$idS));
        $sql3="INSERT INTO `studentitem`(`id_adult`, `id_student`, `id_item`, `response`, `item`)
                VALUES (?,?,4,0,'Je suis polis')";
       $this->executerRequete($sql3,array($idU,$idS));
       $sql4="INSERT INTO `studentitem`(`id_adult`, `id_student`, `id_item`, `response`, `item`)
                VALUES (?,?,5,0,'Je parle bien avec mes professeurs')";
       $this->executerRequete($sql4,array($idU,$idS));
        $sql5="INSERT INTO `studentitem`(`id_adult`, `id_student`, `id_item`, `response`, `item`)
                VALUES (?,?,6,0,'J'aide mes camarades de classes')";
       $this->executerRequete($sql5,array($idU,$idS));
        $sql6="INSERT INTO `studentitem`(`id_adult`, `id_student`, `id_item`, `response`, `item`)
                VALUES (?,?,6,0,'J'obéis à mon professeurs')";
       $this->executerRequete($sql6,array($idU,$idS));
        */
        
    }
    public function editItemStudent($idS,$idU,$idItem,$responce){
       $sql='UPDATE `studentitem` SET 
               `response`= ? WHERE id_adult= ? AND id_student= ? AND id_item=? ' ;
       $this->executerRequete($sql,array($responce,$idU,$idS,$idItem));
    }
     public function editItemStudentAjour($idS,$idU){
       $sql='UPDATE `studentitem` SET 
               `response`= 0 WHERE id_adult= ? AND id_student= ?  ' ;
       $this->executerRequete($sql,array($idU,$idS));
    }
  
} 
