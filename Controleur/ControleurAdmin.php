
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
        $this->genererVue(array('adult'=>$adult,'nbr'=>$nbra,'nbrc'=>$nbrc,'nbrs'=>$nbrs));

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
       $idc=$this->requete->existeParametre("id");
       $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
       $adult=$this->adult->getadult($idU);
       $clas=$this->classe->getClass($idc);
       $this->genererVue(array('adult'=>$adult,'clas'=>$clas,'idc'=>$idc));}
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
        if ($this->requete->existeParametre("name") && $this->requete->existeParametre("firstname")&&
            $this->requete->existeParametre("adress") && $this->requete->existeParametre("birthday")&&
            $this->requete->existeParametre("sexe")&& $this->requete->existeParametre("phone")&&
            $this->requete->existeParametre("id_classe"))
        {

        $name = $this->requete->getParametre("name");
        $firstname = $this->requete->getParametre("firstname");
        $adress = $this->requete->getParametre("adress");
        $birthday = $this->requete->getParametre("birthday");
        $date = date("Y-m-d ", strtotime($birthday));
        $sexe = $this->requete->getParametre("sexe");
        $phone = $this->requete->getParametre("phone");
        $classe = $this->requete->getParametre("id_classe");
        $this->student->addChildren($name,$firstname,$adress,$date,$sexe,$phone,$classe);
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult=$this->adult->getadult($idU);
        $this->genererVue(array('adult'=>$adult));
        }
        else {
            throw new Exception("Faite attention les paramètres ne sont pas tous définis");
        }

    }
    //Mofidier un student
     public function editStudent(){
      
       $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
       $adult=$this->adult->getadult($idU);
      
      $this->genererVue(array('adult'=>$adult));
      
       
        
     }
     public function exeEditStudent(){
          $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
       $adult=$this->adult->getadult($idU);
      
      $this->genererVue(array('adult'=>$adult));
      
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
                $this->requete->existeParametre("adress") && $this->requete->existeParametre("birthday") &&
                $this->requete->existeParametre("sexe") && $this->requete->existeParametre("phone") &&
                $this->requete->existeParametre("email") && $this->requete->existeParametre("password")
                && $this->requete->existeParametre("id_adultCategory")
            ) {
                $name = $this->requete->getParametre("name");
                $firstname = $this->requete->getParametre("firstname");
                $adress = $this->requete->getParametre("adress");
                $birthday = $this->requete->getParametre("birthday");
                
                $date = date("Y-m-d ", strtotime($birthday));
                $sexe = $this->requete->getParametre("sexe");
                $phone = $this->requete->getParametre("phone");
                $email = $this->requete->getParametre("email");
                $password = $this->requete->getParametre("password");
                $id_adultCategory = $this->requete->getParametre("id_adultCategory");

                $this->adult->addAdult($name, $firstname, $adress, $date, $sexe, $phone, $email, $password, $id_adultCategory);
                $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
                $adult = $this->adult->getadult($idU);
                $this->genererVue(array('adult' => $adult));
            } else {
                throw new Exception("Faite attention les champs ne sont pas tous définis");
            }

        }
         //Mofidier un Teacher
     public function editTeacher(){
      
       $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
       $adult=$this->adult->getadult($idU);
      
      $this->genererVue(array('adult'=>$adult));
      
       
        
     }
     public function exeEditTeacher(){
          $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
       $adult=$this->adult->getadult($idU);
      
      $this->genererVue(array('adult'=>$adult));
      
     }
     public function droit(){
      $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
      $adult=$this->adult->getadult($idU);
      $teacher = $this->classe->getTeacherClass();
      $class= $this->classe->getClasses();
      $teachers =$this->adult->getAdults();
      $this->genererVue(array('adult'=>$adult,'teacher'=>$teacher,'clas'=>$class,'teachers'=>$teachers)); 
     }
     
     public function exeAddDroit(){
         if ($this->requete->existeParametre("adult") && $this->requete->existeParametre("classe") )
        
         {
            $ida = $this->requete->getParametre("adult");
            $idc = $this->requete->getParametre("classe");
            $this->classe->addDroit($idc, $ida);
            $this->rediriger("admin","droit");
          
         }
         else
         {
             throw new Exception("Faite attention les champs ne sont pas tous définis");
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
             throw new Exception("Faite attention les champs ne sont pas tous définis");
         }
    }
     //documentation
public function documentation(){
     $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
     $adult=$this->adult->getadult($idU);
      
     $this->genererVue(array('adult'=>$adult));
      
}
}