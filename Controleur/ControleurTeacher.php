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
        $nbClasse= $this->classe->getnbClassesParProffesseur($idU);
        $nbStudent= $this->classe->getnbElevesParProffesseur($idU);
        $this->genererVue(array('adult'=>$adult,'nbrC'=>$nbClasse,'nbrS'=>$nbStudent));

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
    public function editMonProfil(){
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
        $period=$this->grille->selectPeriod();
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $class= $this->classe->getTeacherUniqueClass($idU);
       
        $adult=$this->adult->getadult($idU);
        $this->genererVue(array('adult'=>$adult,'class'=>$class,'period'=>$period));
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
           $this->genererVue(array('adult'=>$adult,'student'=>$student,'idC'=>$id));}
        else{
             throw new Exception("Faite attention les champs ne sont pas tous définis");
        }
    }
    public function jevalue(){
        if ($this->requete->existeParametre("id")){
        $id = $this->requete->getParametre("id");
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $student= $this->student->getStudentsName($id);
        $adult =$this->adult->getadult($idU);
        $this->grille->addItemEvalueStudent($id, $idU);
        //trouver le commentire qui et null et le mettre dan texTArea,ensuite l'éditer   
        $idG=$this->grille->getIdGridstudent($idU, $id);
         
        $idgrid= $idG['idGridStudent'];
       
        //trouver le commentaire qui et null et le mettre dan texTArea,ensuite l'éditer 
        $commentaire= $this->grille->getCommentaire($idgrid);
        $period=$this->grille->selectPeriod();
        //dans exeEvaluationStudent
        $item=$this->grille->getEvalueStudent($idU, $id);
        $this->genererVue(array('adult'=>$adult,'item'=>$item,'id'=>$id,'commentaire'=>$commentaire,'idgrid'=>$idgrid,'period'=>$period,'student'=>$student));
        }
    }
    
    public function exeEvaluationStudent(){
        if ($this->requete->existeParametre("valider")
          &&$this->requete->existeParametre("commentaire")&&
            $this->requete->existeParametre("id"))
            {
             
           $commentaire= $this->requete->getParametre("commentaire");
            $idS = $this->requete->getParametre("id");
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            $adult=$this->adult->getadult($idU);
            $idG=$this->grille->getIdGridstudent($idU, $idS);
            
      
            $idgrid= $idG['idGridStudent'];
            
        
             //éditer un commentaire 
            $this->grille->editCommentaire($idgrid, $commentaire);
            $tab1=$_POST['valider'];
            //je remet tout à jour 
            $this->grille->editItemStudentAjour($idS, $idU);
            foreach ($_POST['valider'] as $item) {
              
            $val=1;
            $this->grille->editItemStudent($idS, $idU,$item,$val);
            } 
           //chercher la variable gridstudent dans reponse
          
           //trouver le commentire qui et null et le mettre dan texTArea,ensuite l'éditer   
           $idG=$this->grille->getIdGridstudent($idU, $idS);
           $idgrid= $idG['idGridStudent'];
           //trouver le commentaire qui et null et le mettre dan texTArea,ensuite l'éditer 
           $commentaire= $this->grille->getCommentaire($idgrid);
        
           $this->genererVue(array('adult'=>$adult,'id'=>$idU));}
    
     else {
             throw new Exception("Veuillez évaluer votre élèves");
        }
     }
     public function grilleEleve(){
          if ($this->requete->existeParametre("id")){
              $period=$this->grille->selectPeriod();
              $idC = $this->requete->getParametre("id");
           $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
           $EvalueFalse= $this->classe->getEvalueFalse($idU, $idC);
           $nameItem1="Je m'exprime sans violence";
           $nameItem2="Je respect le matériel des autres et de l'école";
           $nameItem3="Je suis honnête dans mes relations et évaluations.";
           $nameItem4="Je fais mes devoirs et mes leçons";
           $nameItem5="J'ai une tenue conforme au règlement.";
           $nameItem6="Je me déplace de manière calme et ordonnée.";
           $nameItem7="J'ai une attitude positive face au travail";
           //resultat item 1 " Je sui polis"
           $Item1= $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem1);
           $Item2= $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem2);
           $Item3=$this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem3);
           $Item4= $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem4);
           $Item5= $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem5);
           $Item6= $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem6);
           $Item7= $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem7);
           
           
           $adult=$this->adult->getadult($idU);
           $nomStudent=$this->grille->selectNomStudentEvalueParClasse($idC, $idU);
           $item = $this->grille->selectItemStudentEvalueParClasse($idC, $idU);
           $this->genererVue(array('adult'=>$adult,
               'item1'=>$Item1,
                'item2'=>$Item2,
                'item3'=>$Item3,
                'item4'=>$Item4,
                'item5'=>$Item5,
                'item6'=>$Item6,
                'item7'=>$Item7,
               'period'=>$period,
                'nbr'=>$EvalueFalse,
               'nomStudent'=>$nomStudent,
               'item'=>$item));
   
          }
         
     }

}
