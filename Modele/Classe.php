<?php

/**
 * Created by PhpStorm.
 * User: Asmae
 * Date: 18/01/2017
 * Time: 13:48
 */
require_once 'Framework/Modele.php';

class Classe extends Modele{

public function getnbClasses(){


        $rqt='select count(*) as nb from classe';

        $rep=  $this->executerRequete($rqt);
        $ligne= $rep->fetch();
        return $ligne['nb'];
    }
    public function getnbClassesParProffesseur($idU){


        $rqt='select count(*) as nb from consultclass where id_adult=?';

        $rep=  $this->executerRequete($rqt,array($idU));
        $ligne= $rep->fetch();
        return $ligne['nb'];
    }
      public function getnbElevesParProffesseur($idU){


        $rqt='SELECT COUNT(DISTINCT (nameE)) as nb FROM `itemresponstudent` WHERE idU=?';

        $rep=  $this->executerRequete($rqt,array($idU));
        $ligne= $rep->fetch();
        return $ligne['nb'];
    }
    
    public function getEvalueFalse($idU,$classe){
        $sql="SELECT COUNT(DISTINCT (nameE)) as nb FROM `itemresponstudent` WHERE idU=? and classe=?";
         $rep=  $this->executerRequete($sql,array($idU,$classe));
        $ligne= $rep->fetch();
        return $ligne['nb'];
    }
    public function getClasses()
    {
        $sql='select * from classe';
        $classes = $this->executerRequete($sql);
        return $classes;
    }
    //ajouter un étudiant
    public function addClasse($name)
    {
        $sql="INSERT INTO `classe` (`id`, `yearSexion`) VALUES (NULL,?)";
        $rep=$this->executerRequete($sql,array($name));
    }
    
    public function editClasse($name,$id)
    {
    $sql="UPDATE `classe` SET `yearSexion` = ? 
           WHERE `classe`.`id` = ?";
    $rep=$this->executerRequete($sql,array($name,$id));
    }
    public function getClass($id){
        $sql="select * from classe where id= ?";
        $rep=$this->executerRequete($sql,array($id));
        if ($rep->rowCount() == 1){
        return $rep->fetch(); } // Accès à la première ligne de résultat
        else{
            throw new Exception("Aucun classe ne correspond 0 l4identifiqnt fourni");
    }  
    }
    public function deleteClass($id){
        $sql="DELETE FROM `classe` WHERE `classe`.`id` = ?";
        $rep=$this->executerRequete($sql,array($id));
    }
    public function getTeacherClass(){
        $sql="select * from teacherclass";
        $rep=$this->executerRequete($sql);
        return $rep;
    }
    
     public function getTeacherUniqueClass($idT){
        $sql="select * from teacherclass where idadult= ?";
        $rep=$this->executerRequete($sql,array($idT));
        return $rep;
    }
    public function addDroit($idc,$ida){
       
       $sql="INSERT INTO `consultclass` (`id_classe`, `id_adult`) VALUES (?, ?);";
       $rep=$this->executerRequete($sql,array($idc,$ida));
       return $rep;
     
    }
    public function droitExist($idc,$ida){
        $sql= "select * from consultclass where id_classe = ? and id_adult=?";
        $rep=$this->executerRequete($sql,array($idc,$ida));
        if ($rep->rowCount() == 1){
        return $rep->fetch(); } // Accès à la première ligne de résultat
       
        else{
                return -1;
            
        }
    }
    
}

