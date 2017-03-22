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
    
    $sql ="CALL `evalueStudent`(?, ?, 1, 1);;";
    $this->executerRequete($sql,array($idU,$idS));   
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
    public function getIdGridstudent($idU,$idS){
        $sql="select DISTINCT idGridStudent from evaluatestudent where id_adult= ? AND id_student= ? ";
        $idG= $this->executerRequete($sql,array($idU,$idS));
        $id= $idG->fetch();
        return $id;
    }
    public function getCommentaire($idG){
        $sql="select * from gridstudent where idGridStudent= ?";
        $idG= $this->executerRequete($sql,array($idG));
        $ligne= $idG->fetch();
        return $ligne;
    }
   public function editCommentaire($idG,$commentaire){
        $sql="UPDATE `gridstudent` SET `commentaire`=? WHERE idGridStudent = ?";
        $this->executerRequete($sql,array($commentaire,$idG));
   }
    public function selectCommentaire($idE){
    $sql="SELECT `commentaire` FROM `itemresponstudent` WHERE idE=? and nameItem='Je suis solidaire'";
    $com=$this->executerRequete($sql,array($idE));
    $ligne= $com->fetch();
    return $ligne;
    }
         
   public function deleteEvaluationStudent(){
       $sql="DELETE FROM evaluatestudent";
       $this->executerRequete($sql);
       
       
   }
   public function deleleteGridStudent(){
       $sql="DELETE FROM gridstudent";
       $this->executerRequete($sql);
   }
   public function editPeriode($dateDebut,$dateFin,$periode){
       $sql="UPDATE `periodicity` SET `id_periodicity`=1,`dateStart`=?,`dateEnd`=?,`period`=? ";
       $this->executerRequete($sql,array($dateDebut,$dateFin,$periode));
       
   }
   public function selectPeriod(){
       $sql="SELECT `id_periodicity`, `dateStart`, `dateEnd`, `period` FROM `periodicity` WHERE id_periodicity =1";
       $period= $this->executerRequete($sql);
       $ligne= $period->fetch();
       return $ligne;
       
       
   }
   public function selectStudentEvalueParClasse($idC,$idU,$nameItem){
      $sql="SELECT `response`, `nameE`, firstE, `nameT`, `nameItem` FROM `itemresponstudent` WHERE classe=? and idU=? and nameItem=? ORDER by firstE,nameE ASC, nameItem ASC";
      $student= $this->executerRequete($sql,array($idC,$idU,$nameItem));
      return $student;
      
      //vous n'aveze pas encore évaluez d'élève pour cette classe
   
   } 
   public function selectNomStudentEvalueParClasse($idC) {
       $sql="SELECT DISTINCT nameE,firstE FROM `itemresponstudent` WHERE classe=?  ORDER by firstE ASC";
       $nomStudent= $this->executerRequete($sql,array($idC,));
       return $nomStudent;
   }
   public function selectNomStudentEvalueParClasseParTeacher($idC,$idU) {
       $sql="SELECT DISTINCT nameE,firstE FROM `itemresponstudent` WHERE classe=? AND IdU=? ORDER by firstE ASC";
       $nomStudent= $this->executerRequete($sql,array($idC,$idU));
       return $nomStudent;
   }
   //compte le nombre d'étudiant dans une classe
    public function selectNbrClasse($idC) {
       $sql="SELECT count( id_student) as nbr FROM eleve,classe WHERE eleve.id_classe=classe.id AND id_classe=?";
       $nbr= $this->executerRequete($sql,array($idC));
       $ligne= $nbr->fetch();
       return $ligne;
   }
   
   //compte le nombre d'évalution faite dans cette clase par le teacher
    public function selectNomStudentEvalueParClasseParTeacherNbr($idC,$idU) {
       $sql="SELECT count(DISTINCT nameE,firstE) as nbr FROM `itemresponstudent` WHERE classe=? AND IdU=? ORDER by firstE ASC";
       $nbr= $this->executerRequete($sql,array($idC,$idU));
       $ligne= $nbr->fetch();
       return $ligne;
   }
   
   public function selectItemStudentEvalueParClasse($idC) {
       $sql="SELECT DISTINCT (nameItem) FROM `itemresponstudent` WHERE classe=?  ORDER by nameItem";
       $item= $this->executerRequete($sql,array($idC));
       return $item;
   }
  public function selectCommentaireStudentParProfesseur($idC,$idU){
      
      $sql="SELECT DISTINCT (commentaire),nameE, firstE FROM `itemresponstudent` WHERE classe= ? and idU=?  ORDER by nameE ASC";
      $Commentaire= $this->executerRequete($sql,array($idC,$idU));
       return $Commentaire;
  }
  
    public function selectResultatStudentParClasse($nameItem,$idC){
      
      $sql="SELECT SUM(response) as resultat,firstE from itemresponstudent where nameItem=? and classe=?  group by firstE,nameE ORDER by firstE ASC";
      $resultat= $this->executerRequete($sql,array($nameItem,$idC));
      return $resultat;
  }
  
    public function selecResultatStudentParProfesseur($nameItem,$idE){
      
      $sql="SELECT SUM(response) as resultat from itemresponstudent where nameItem=? and idE=?";
      $resultat= $this->executerRequete($sql,array($nameItem,$idE));
      return $resultat;
  }
  }