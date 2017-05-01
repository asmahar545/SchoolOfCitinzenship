
<?php
require_once 'ControleurSecurise.php';
require_once 'Modele/Adult.php';
require_once 'Modele/Classe.php';
require_once 'Modele/Student.php';
require_once 'Modele/Grille.php';
class ControleurAdmin extends ControleurSecurise
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
        $this->grille = new Grille();

    }
    public function index() {

        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");

        $adult=$this->adult->getadult($idU);
        $nbrc= $this->classe->getnbClasses();
        $nbrs=$this->student->getnbstudents();
        $nbra= $this->adult->getnbadults();
        $nombreEvalueTotalToutProfesseur= $this->classe->nombreEleveTotalEvalueToutProfeseur();
        $nbrDejaProf= $this->classe->nombreEleveEvalueToutProfeseur();
        $this->genererVue(array('adult'=>$adult,'nbr'=>$nbra,'nbrc'=>$nbrc,'nbrs'=>$nbrs,'nbrtotal'=>$nombreEvalueTotalToutProfesseur,'nbr2'=>$nbrDejaProf));

    }
    //Liste professeur, student, classe
    public function professeur(){
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $tab =$this->adult->getAdults();

        $this->genererVue(array('adult'=>$adult,'lists'=>$tab));
    }
    public function educateur(){
         $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $educ=$this->adult->getEducateurs();

        $this->genererVue(array('adult'=>$adult,'lists'=>$educ));
    }
    

    public function student(){
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $student=$this->student->getStudents();
        $this->genererVue(array('adult'=>$adult,'lists'=>$student));
    }
    public function classe(){
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $classe=$this->classe->getClasses();
        $this->genererVue(array('adult'=>$adult,'classes'=>$classe));
    }
    public function listStudentClass(){
         if ($this->requete->existeParametre("id"))
             {
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $id = $this->requete->getParametre("id");
        $student=$this->student->getStudentClass($id);
         $this->genererVue(array('adult'=>$adult,'lists'=>$student,'id'=>$id
                 ));  }
          else
           {
           throw new Exception('Erreur du serveur ');
       }
    }

    //Ajout d'une classe
  public function addClass(){

      $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
      $adult=$this->adult->getadult($idU);

      $this->genererVue(array('adult'=>$adult));

     }
     public function exeAddClass(){
         if ($this->requete->existeParametre("classe") ){
             $classe = $this->requete->getParametre("classe");
             $this->classe->addClasse($classe);
             $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
             $adult=$this->adult->getadult($idU);
             $this->genererVue(array('adult'=>$adult));
         }
         else {
             throw new Exception("Faite attention les paramètres ne sont pas tous définis");
         }
     }
     //Modification Classe
     public function editClass(){
           if ($this->requete->existeParametre("id")) {
       $idC=$this->requete->existeParametre("id");
       $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
       $adult=$this->adult->getadult($idU);
       $clas=$this->classe->getClass($idC);
       $this->genererVue(array('adult'=>$adult,'clas'=>$clas,'idC'=>$idC));}
       else
           {
           throw new Exception('Erreur du serveur ');
       }
        
     }
    
         public function exeEditClass(){
         if ($this->requete->existeParametre("classe") && $this->requete->existeParametre("id"))
                 {
             $classe = $this->requete->getParametre("classe");
             $this->classe->editClasse($classe,$id);
         }
         else{
             throw new Exception("Erreur Serveur");
        }
     } 
     //Supréssion de la Classe
        public function exeDeleteClass(){
            
            if ($this->requete->existeParametre("id"))
             {
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $id = $this->requete->getParametre("id");
        $this->classe->deleteClass($id);
        
         $this->genererVue(array('adult'=>$adult
                 ));  }
          else
           {
           throw new Exception('Erreur du serveur ');
        }
        } 
     
     
     //ajout d'un etudiant
    public function addStudent(){
        $classe= $this->classe->getClasses();
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);

        $this->genererVue(array('adult'=>$adult,'classe'=>$classe));

    }
    public function exeAddStudent(){
        if ($this->requete->existeParametre("name") && $this->requete->existeParametre("idclasse")&&  $this->requete->existeParametre("firstname")
           
            )
        {

        $name = $this->requete->getParametre("name");
        $firstname = $this->requete->getParametre("firstname");
     
        $classe = $this->requete->getParametre("idclasse");
        $this->student->addChildren($name,$firstname,$classe);
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $this->genererVue(array('adult'=>$adult));
        }
        else {
            throw new Exception("Faite attention les paramètres ne sont pas tous définis");
        }

    }
     public function exeDeleteAutorisation(){
        if (  $this->requete->existeParametre("classe") &&
              $this->requete->existeParametre("adult")
           
            )
        {
  
        $classe = $this->requete->getParametre("classe");
        $idU= $this->requete->getParametre("adult");
        $this->classe->deleteDroit($classe, $idU);
        $this->classe->deleteEvaluationDuDroit($classe, $idU);
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $this->genererVue(array('adult'=>$adult));
        }
        else {
            throw new Exception("Impossible de supprimer cette autorisation  ");
        }

    }
    public function exeDeleteChildren(){
        if (  $this->requete->existeParametre("id")
           
            )
        {
  
        $id = $this->requete->getParametre("id");
        $this->student->deleteChildren($id);
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $this->genererVue(array('adult'=>$adult));
        }
        else {
            throw new Exception("Imposible de suprimer l'élève car il a de évaluation en cours");
        }

    }
    //Mofidier un student
     public function editStudent(){
       if ($this->requete->existeParametre("id"))
       {
       $classe= $this->classe->getClasses();
       $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
       $adult=$this->adult->getadult($idU);
       $id = $this->requete->getParametre("id");
       $student=$this->student->getStudent($id);
       $year= $this->classe->selectClasseEleve($id);
       $this->genererVue(array('adult'=>$adult ,'student'=>$student,'classe'=>$classe,'year'=>$year));
       }
       
        
     }
    public function exeDeleteTeacher(){
     if ( $this->requete->existeParametre("id") )
            
                
           {
         
        $id = $this->requete->getParametre("id");
        $this->adult->deleteAdult($id);
           
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            
            $adult=$this->adult->getadult($idU);
      
      $this->genererVue(array('adult'=>$adult));
      }
        else {
            throw new Exception("Le professeur ne peut pas être supprimer car il a évalué des élèves");
        }
     }
     public function exeEditStudent(){
        if ( $this->requete->existeParametre("name") && $this->requete->existeParametre("idclasse")
                &&  $this->requete->existeParametre("firstname")&&
            
                $id = $this->requete->getParametre("id"))
           {
           $name = $this->requete->getParametre("name");
        $firstname = $this->requete->getParametre("firstname");
       
        $classe = $this->requete->getParametre("idclasse");
        $id = $this->requete->getParametre("id");
        $this->student->editChildren($name,$firstname,$classe,$id);
           
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            
            $adult=$this->adult->getadult($idU);
      
      $this->genererVue(array('adult'=>$adult));
      }
        else {
            throw new Exception("Faite attention les paramètres ne sont pas tous définis");
        }
     }
    
     //Ajout d'un professeur
    public function addTeacher(){
        
        //RENVOI DE  LA CATEGORY 
        $cat= $this->adult->getCat();
        //RENVOI DE LA CONNEXION
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);

        $this->genererVue(array('adult'=>$adult,'cat'=>$cat));

    }

    public function exeAddTeacher()
        {
            if ($this->requete->existeParametre("name") && $this->requete->existeParametre("firstname") &&
               
                $this->requete->existeParametre("email") && $this->requete->existeParametre("password")
               
            ) {
                $name = $this->requete->getParametre("name");
                $firstname = $this->requete->getParametre("firstname");
                
              
                $email = $this->requete->getParametre("email");
                $password = $this->requete->getParametre("password");
                

                $this->adult->addAdult($name, $firstname, $email, $password);
                $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
                $adult = $this->adult->getadult($idU);
                $this->genererVue(array('adult' => $adult));
            } else {
                throw new Exception("Faite attention les champs ne sont pas tous définis");
            }

        }
         //Mofidier un Teacher
     public function editTeacher(){
      if ($this->requete->existeParametre("id"))
       {
          //RENVOI DE  LA CATEGORY 
       $cat= $this->adult->getCat();
       $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
       $adult=$this->adult->getadult($idU);
       $id = $this->requete->getParametre("id");
       $teacher=$this->adult->getadult($id);
      
      $this->genererVue(array('adult'=>$adult,'cat'=>$cat,'teacher'=>$teacher));
      }
        else {
            throw new Exception("Faite attention les paramètres ne sont pas tous définis");
        }

  
          }
          
          
          public function exeEditTeacher()
            {
        if ( $this->requete->existeParametre("name") && $this->requete->existeParametre("id")
                &&  $this->requete->existeParametre("firstname")&&$this->requete->existeParametre("email")&&
            
                $id = $this->requete->getParametre("password"))
           {
           $name = $this->requete->getParametre("name");
           $firstname = $this->requete->getParametre("firstname");
            $password = $this->requete->getParametre("password");
            $email = $this->requete->getParametre("email");
            $id = $this->requete->getParametre("id");
            $this->adult->editAdult($name, $firstname, $email, $password, $id);
           
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            
            $adult=$this->adult->getadult($idU);
      
      $this->genererVue(array('adult'=>$adult,'id'=>$id));
      }
        else {
            throw new Exception("Faite attention les paramètres ne sont pas tous définis");
        }
     
    }
     public function droit(){
      $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
      $adult=$this->adult->getadult($idU);
      $teacher = $this->classe->getTeacherClass();
      $class= $this->classe->getClasses();
      $teachers =$this->adult->getAdults();
      $class2= $this->classe->getClasses();
      $teacher2 =$this->adult->getAdults();
      $this->genererVue(array('adult'=>$adult,'teacher'=>$teacher,'clas'=>$class,'teachers'=>$teachers,'classe2'=>$class2,'teacher2'=>$teacher2)); 
     }
     
     public function exeAddDroit(){
         if ($this->requete->existeParametre("adult") && $this->requete->existeParametre("classe") )
        
         {
            $ida = $this->requete->getParametre("adult");
            $idc = $this->requete->getParametre("classe");
            $rep = $this->classe->droitExist($idc, $ida);
            if ($rep == -1){
            
                $this->classe->addDroit($idc, $ida);
                $this->rediriger("admin", "droit");
            
            }
           else
         {
             throw new Exception("Ce professeur a déja en charge cette classe");
         }
         }
         
     
     }
    public function  exeDeleteDroit(){
        if ($this->requete->existeParametre("id") ){
           $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
           $adult=$this->adult->getadult($idU);
      
        $this->genererVue(array('adult'=>$adult));}
        else{
            throw new Exception("Le professeur a évalué cette classe, impossible de supprimer");
        }
         
     }
     public function addLesson(){
           $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
           $adult=$this->adult->getadult($idU);
      
            $this->genererVue(array('adult'=>$adult));
         
     }
     
     public function exeAddLesson(){
         if ($this->requete->existeParametre("cours") && $this->requete->existeParametre("nombre")){
            
            $cours = $this->requete->getParametre("cours");
            $nbr = $this->requete->getParametre("nombre");
            $this->adult->addLesson($cours, $nbr);
            
           $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
           $adult=$this->adult->getadult($idU);
         $this->genererVue(array('adult'=>$adult));}
           else
         {
             throw new Exception("Faite attention les champs ne sont pas tous définis");
         }
         
     }
     
         
     public function grille(){
     $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
     $adult=$this->adult->getadult($idU);
     $grille= $this->grille->getGrille();
     $this->genererVue(array('adult'=>$adult,'grille'=>$grille));
     }
     
     public function addGrid(){
     $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
     $adult=$this->adult->getadult($idU);
   
     $this->genererVue(array('adult'=>$adult));
     }
     
    public function exeAddGrid(){
     if ($this->requete->existeParametre("name") && $this->requete->existeParametre("cat")){  
        $name= $this->requete->getParametre("name");
        $cat = $this->requete->getParametre("cat");
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $this->grille->addGrid($name, $cat);
        $this->rediriger('admin','grille'); }
     else
         {
             throw new Exception("Faite attention les champs ne sont pas tous définis");
         }
    }
    
      public function addItem(){
          $grille = $this->grille->getGrilles();
          $cat= $this->grille->getCat();             
          $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
          $adult=$this->adult->getadult($idU);
          $this->genererVue(array('adult'=>$adult,'cat'=>$cat,'grille'=>$grille));
     }
     
         public function exeAddItem(){
     if ($this->requete->existeParametre("name") && $this->requete->existeParametre("des")
             && $this->requete->existeParametre("iditemcat")&& $this->requete->existeParametre("idgrid")){  
         
             $name= $this->requete->getParametre("name");
             $des = $this->requete->getParametre("des");
             $iditemcat= $this->requete->getParametre("iditemcat");
             $idgrid= $this->requete->getParametre("idgrid");
             
             $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
             $adult=$this->adult->getadult($idU);
             $this->grille->addItem($name, $des, $idgrid, $iditemcat);
        $this->rediriger('admin','grille'); }
     else
         {
             throw new Exception("Faite attention les champs ne sont pas tous définis");
         }
    }
    public function addCat(){
                     
          $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
          $adult=$this->adult->getadult($idU);
          $this->genererVue(array('adult'=>$adult));
     }
     public function exeAddCat(){
     if ($this->requete->existeParametre("name") && $this->requete->existeParametre("req")){  
        $name= $this->requete->getParametre("name");
        $req = $this->requete->getParametre("req");
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $this->grille->addCat($name, $req);
        $this->rediriger('admin','grille'); }
     else
         {
             throw new Exception("Les champs ne sont pas tous définis");
         }
    }
    public function exeEnvoiEmail(){
   
     $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
     $adult=$this->adult->getadult($idU);
    
      $this->genererVue(array('adult'=>$adult));  
        
    }
    public function configuration(){
     $period=$this->grille->selectPeriod();
     $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
     $adult=$this->adult->getadult($idU);
     $nombreEvalueTotalToutProfesseur= $this->classe->nombreEleveTotalEvalueToutProfeseur();
     $nbrDejaProf= $this->classe->nombreEleveEvalueToutProfeseur();
     $this->genererVue(array('adult'=>$adult ,'nbrTotal'=>$nombreEvalueTotalToutProfesseur,'nbrEvalue'=>$nbrDejaProf,'period'=>$period));
     
      
    }
    
    public function exeFinAnnee(){
        $this->grille->deleteEvaluationStudent();
        $this->grille->deleleteGridStudent();
     $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
     $adult=$this->adult->getadult($idU);
     $this->genererVue(array('adult'=>$adult));
      
    }
  public function exeFinPeriode(){
       if ($this->requete->existeParametre("periode")&&
         $this->requete->existeParametre("dateDebut")&&
          $this->requete->existeParametre("dateFin"))
        {
           
           $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
           $periode = $this->requete->getParametre("periode");
            $dateD = $this->requete->getParametre("dateDebut");
            $dateF= $this->requete->getParametre("dateFin");
            $dateDebut = date("Y-m-d ", strtotime($dateD));
           $dateFin = date("Y-m-d ", strtotime($dateF));
           $this->grille->editPeriode($dateDebut, $dateFin,$periode);
           $adult=$this->adult->getadult($idU);
           $this->genererVue(array('adult'=>$adult));}
       else{
           
             throw new Exception("Faite attention les champs ne sont pas tous définis");
         }
           
       
  }
    public function finDePeriode(){
     
     $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
     $adult=$this->adult->getadult($idU);
     $nombreEvalueTotalToutProfesseur= $this->classe->nombreEleveTotalEvalueToutProfeseur();
     $nbrDejaProf= $this->classe->nombreEleveEvalueToutProfeseur();
     $this->genererVue(array('adult'=>$adult ,'nbrTotal'=>$nombreEvalueTotalToutProfesseur,'nbrEvalue'=>$nbrDejaProf));
     
           
       
  }
 public function resultatParClasse(){
      if ($this->requete->existeParametre("id")){
              $period=$this->grille->selectPeriod();
              $idC = $this->requete->getParametre("id");
              $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
              $nbrTeachEvalue= $this->classe->nombreTeacherevalueUneClasse($idC);
              $nomClasse= $this->classe->getClass($idC);
              $nameItem1="Je suis respectueux envers les personnes";
              $nameItem2="J’adopte une attitude non violente";
              $nameItem3="Je suis respectueux du matériel et de l’environnement";
              $nameItem4="Je parle de façon adéquate";
              $nameItem5="Je suis solidaire";
              $nameItem6="Je respecte les règles de l’école";
              $nameItem7="Je m’organise et je deviens autonome";
              $nameItem8="J’écoute les professeurs et les élèves sans les interrompre"; 
              $nameItem9="Je circule dans l’école calmement";
              $nameItem10="Je donne le meilleur de moi-même";
            $Item1= $this->grille->selectResultatStudentParClasse($nameItem1, $idC);
            $Item2= $this->grille->selectResultatStudentParClasse($nameItem2, $idC);
            $Item3= $this->grille->selectResultatStudentParClasse($nameItem3, $idC);
            $Item4= $this->grille->selectResultatStudentParClasse($nameItem4, $idC);
            $Item5= $this->grille->selectResultatStudentParClasse($nameItem5, $idC);
            $Item6= $this->grille->selectResultatStudentParClasse($nameItem6, $idC);
            $Item7= $this->grille->selectResultatStudentParClasse($nameItem7, $idC);
            $Item8= $this->grille->selectResultatStudentParClasse($nameItem8, $idC);
            $Item9= $this->grille->selectResultatStudentParClasse($nameItem9, $idC);
            $Item10= $this->grille->selectResultatStudentParClasse($nameItem10, $idC);
            
          
              
              $nomStudent=$this->grille->selectNomStudentEvalueParClasse($idC);
              $item = $this->grille->selectItemStudentEvalueParClasse($idC);
              $adult=$this->adult->getadult($idU);
              $this->genererVue(array('adult'=>$adult,
                  'item1'=>$Item1,
                'item2'=>$Item2,
                'item3'=>$Item3,
                'item4'=>$Item4,
                'item5'=>$Item5,
                'item6'=>$Item6,
                'item7'=>$Item7,
                'item8'=>$Item8,
                'item9'=>$Item9,
                'item10'=>$Item10,
                'period'=>$period,
                'nomClass'=>$nomClasse,
                'nbteacher'=> $nbrTeachEvalue,
                'nomStudent'=>$nomStudent,
                'item'=>$item));
    
      }
    
           else{
           
             throw new Exception("Faite attention les champs ne sont pas tous définis");
         }
          
      
 }
  public function resultatParEleve(){
      if ($this->requete->existeParametre("id")){
            $idE = $this->requete->getParametre("id");
            //faut trouver un moyen de prendre idStudent que le nameE car il peut avoir plusieurs élève ayant le même prénom
            $idC= $this->classe->getClasseEleve($idE);
            $idClasse= $idC['nb'];
            $nbrTeachEvalue= $this->classe->nombreTeacherevalueUneClasse($idClasse);
            $commentaire= $this->grille->selectCommentaire($idE);
            $period=$this->grille->selectPeriod();
            $student= $this->student->getStudentsName($idE); 
            $retard= $this->student->selectRetard($idE);
            $ceinture= $this->student->selectCeinture($idE);
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
              $nameItem1="Je suis respectueux envers les personnes";
              $nameItem2="J’adopte une attitude non violente";
              $nameItem3="Je suis respectueux du matériel et de l’environnement";
              $nameItem4="Je parle de façon adéquate";
              $nameItem5="Je suis solidaire";
              $nameItem6="Je respecte les règles de l’école";
              $nameItem7="Je m’organise et je deviens autonome";
              $nameItem8="J’écoute les professeurs et les élèves sans les interrompre"; 
              $nameItem9="Je circule dans l’école calmement";
              $nameItem10="Je donne le meilleur de moi-même";
           
            $Item1= $this->grille->selecResultatStudentParProfesseur($nameItem1, $idE);
            $Item2= $this->grille->selecResultatStudentParProfesseur($nameItem2, $idE);
            $Item3= $this->grille->selecResultatStudentParProfesseur($nameItem3, $idE);
            $Item4= $this->grille->selecResultatStudentParProfesseur($nameItem4, $idE);
            $Item5= $this->grille->selecResultatStudentParProfesseur($nameItem5, $idE);
            $Item6= $this->grille->selecResultatStudentParProfesseur($nameItem6, $idE);
            $Item7= $this->grille->selecResultatStudentParProfesseur($nameItem7, $idE);
            $Item8= $this->grille->selecResultatStudentParProfesseur($nameItem8, $idE);
            $Item9= $this->grille->selecResultatStudentParProfesseur($nameItem9, $idE);
            $Item10= $this->grille->selecResultatStudentParProfesseur($nameItem10,$idE);
            
          
              
              
              $item = $this->grille->selectItemStudentEvalueParClasse(1);
              $adult=$this->adult->getadult($idU);
              $this->genererVue(array('adult'=>$adult,
                'item1'=>$Item1,
                'item2'=>$Item2,
                'item3'=>$Item3,
                'item4'=>$Item4,
                'item5'=>$Item5,
                'item6'=>$Item6,
                'item7'=>$Item7,
                'item8'=>$Item8,
                  'item9'=>$Item9,
                  'item10'=>$Item10,
                'period'=>$period,
                  'ceinture'=>$ceinture,
                  'retard'=>$retard,
                'student'=>$student,
                  'commentaire'=>$commentaire,
                  'nbteacher'=> $nbrTeachEvalue,
                'item'=>$item));
              
              
      }
    
           else{
           
             throw new Exception("Faite attention les champs ne sont pas tous définis");
         }
          
      
 }
  public function retardEleve(){
      if ($this->requete->existeParametre("id")){
    $idE = $this->requete->getParametre("id");
     $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
     $adult=$this->adult->getadult($idU);
     $retard= $this->student->selectRetard($idE);
      
     $this->genererVue(array('adult'=>$adult,'id'=>$idE,'retard'=>$retard));}
     
  }
  public function monterDeCeinture(){
      if ($this->requete->existeParametre("id")){
    $idE = $this->requete->getParametre("id");
     $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
     $adult=$this->adult->getadult($idU);
      
      $this->genererVue(array('adult'=>$adult,'id'=>$idE));}
      else
          {
         throw new Exception("Erreur de chargement de page"); 
      }
      
}
 public function exeMonterDeCeinture(){
      if ($this->requete->existeParametre("id")&&$this->requete->existeParametre("ceinture")){
     $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
     $adult=$this->adult->getadult($idU);
      $ceinture = $this->requete->getParametre("ceinture");
       $id = $this->requete->getParametre("id");
     $this->student->editChildrenCeinture($ceinture, $id);
      $this->genererVue(array('adult'=>$adult));}
     else
          {
         throw new Exception("Erreur de chargement de page"); 
      }
      
}
 public function exeRetard(){
      if ($this->requete->existeParametre("id")&&$this->requete->existeParametre("retard")){
     $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
     $adult=$this->adult->getadult($idU);
      $retard = $this->requete->getParametre("retard");
       $id = $this->requete->getParametre("id");
     $this->student->editChildrenRetard($retard, $id);
      $this->genererVue(array('adult'=>$adult));}
     else
          {
         throw new Exception("Erreur de chargement de page"); 
      }
      
}
 public function evaluationRestant(){
      if ($this->requete->existeParametre("id")){
     $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
     $adult=$this->adult->getadult($idU);
     $id = $this->requete->getParametre("id");
      $nbStudent= $this->classe->getnbElevesParProffesseur($id);
      $nbStudentTotalEvalue=$this->classe->nombreEleveTotalEvalue($id);
      $this->genererVue(array('adult'=>$adult,'nbStudent'=>$nbStudent,'nbstudentTotal'=>$nbStudentTotalEvalue));}
      else
          {
         throw new Exception("Erreur de chargement de page"); 
      }
      
}
    //documentation
    public function documentation(){
     $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
     $adult=$this->adult->getadult($idU);
      
     $this->genererVue(array('adult'=>$adult));
      
}
}