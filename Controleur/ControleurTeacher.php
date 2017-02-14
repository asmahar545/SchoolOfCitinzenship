<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Adult.php';
require_once 'Modele/Classe.php';
require_once 'Modele/Student.php';
require_once 'Modele/Grille.php';

/**
 * Created by PhpStorm.
 * User: Asmae
 * Date: 17/01/2017
 * Time: 19:16
 */
class ControleurTeacher extends ControleurSecurise
{
    private $adult;
    private $classe;
    private $student;
    private $grille;

    public function __construct()
    {
        $this->adult = new Adult();
        $this->classe= new Classe();
        $this->student = new Student();
        $this->grille =new Grille();

    }
    public function index() {
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $this->genererVue(array('adult'=>$adult));

    }
    public function documentation(){
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $this->genererVue(array('adult'=>$adult));

        
    }
    public function monprofil(){
        
        $cat= $this->adult->getCat();
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $this->genererVue(array('adult'=>$adult,'cat'=>$cat));

        
    }
    public function exeEditTeacher()
            {
        if ($this->requete->existeParametre("name") && $this->requete->existeParametre("firstname")
                 &&
                $this->requete->existeParametre("adress") && $this->requete->existeParametre("birthday") &&
                $this->requete->existeParametre("sexe") && $this->requete->existeParametre("phone") && 
                $this->requete->existeParametre("commentaire") &&
                $this->requete->existeParametre("email") && $this->requete->existeParametre("password")
                && $this->requete->existeParametre("id_adultCategory")
            ) {
               
                $name = $this->requete->getParametre("name");
                $firstname = $this->requete->getParametre("firstname");
                $adress = $this->requete->getParametre("adress");
                $birthday = $this->requete->getParametre("birthday");
                $commentaire = $this->requete->getParametre("commentaire");
                $date = date("Y-m-d ", strtotime($birthday));
                $sexe = $this->requete->getParametre("sexe");
                $phone = $this->requete->getParametre("phone");
                $email = $this->requete->getParametre("email");
                $password = $this->requete->getParametre("password");
                $id_adultCategory = $this->requete->getParametre("id_adultCategory");
                $idU = $this->requete->getSession()->getAttribut("idUtilisateur"); 
                
                $this->adult->editAdult($name, $firstname, $adress, $birthday, $sexe, $phone, $commentaire, $email, $password, $id_adultCategory, $idU);
                
                
                $adult=$this->adult->getadult($idU);
                $this->genererVue(array('adult'=>$adult));
             
            } else {
                throw new Exception("Faite attention les champs ne sont pas tous définis");
            }
    }
    public function mesclasses(){
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $class= $this->classe->getTeacherUniqueClass($idU);
       
        $adult=$this->adult->getadult($idU);
        $this->genererVue(array('adult'=>$adult,'class'=>$class));
    }
    public function evalue(){
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $class= $this->classe->getTeacherUniqueClass($idU);
        $adult=$this->adult->getadult($idU);
        $this->genererVue(array('adult'=>$adult,'class'=>$class));
    }
    public function eleves(){
        if ($this->requete->existeParametre("id"))
             {
           $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
           $id = $this->requete->getParametre("id");
           $student= $this->student->getStudentClass($id);
           $adult=$this->adult->getadult($idU);
           $this->genererVue(array('adult'=>$adult,'student'=>$student));}
        else{
             throw new Exception("Faite attention les champs ne sont pas tous définis");
        }
    }
    public function jevalue(){
        if ($this->requete->existeParametre("id")){
        $id = $this->requete->getParametre("id");
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        
        $item=$this->grille->getEvalueStudent($idU, $id);
        $this->genererVue(array('adult'=>$adult,'item'=>$item,'id'=>$id));
        }
    }
    
    public function exeEvaluationStudent(){
        if ($this->requete->existeParametre("valider")
          &&
            $this->requete->existeParametre("id"))
            {
            
          
            $idS = $this->requete->getParametre("id");
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            $adult=$this->adult->getadult($idU);
        
            $tab1=$_POST['valider'];
            //je remet tout à jour 
            $this->grille->editItemStudentAjour($idS, $idU);
            foreach ($_POST['valider'] as $item) {
              
            $val=1;
            $this->grille->editItemStudent($idS, $idU,$item,$val);
            } 
             
       
        
        $this->genererVue(array('adult'=>$adult,'id'=>$idS));}
    
     else {
             throw new Exception("Faite attention les champs ne sont pas tous définis");
        }
     }

}
