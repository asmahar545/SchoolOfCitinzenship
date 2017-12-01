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
class ControleurTeacher extends ControleurSecurise {

    private $adult;
    private $classe;
    private $student;
    private $grille;

    public function __construct() {
        $this->adult = new Adult();
        $this->classe = new Classe();
        $this->student = new Student();
        $this->grille = new Grille();
    }

    public function index() {

        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult = $this->adult->getadult($idU);
        $nbStudents = $this->classe->getnbElevesParProffesseur($idU);
        $nbStudentTotalEvalue = $this->classe->nombreEleveTotalEvalue($idU);
        $nbClasse = $this->classe->getnbClassesParProffesseur($idU);
        $nbStudent = $this->classe->getnbElevesParProffesseur($idU);
        $this->genererVue(array('adult' => $adult, 'nbrC' => $nbClasse, 'nbrS' => $nbStudent, 'nbstudentTotal' => $nbStudentTotalEvalue, 'nbStudents' => $nbStudents));
    }

    public function documentation() {
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult = $this->adult->getadult($idU);
        $this->genererVue(array('adult' => $adult));
    }

    public function classe() {
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult = $this->adult->getadult($idU);
        $classe = $this->classe->getClasses();
        $this->genererVue(array('adult' => $adult, 'classes' => $classe));
    }

    public function listStudentClass() {
        if ($this->requete->existeParametre("id")) {
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            $adult = $this->adult->getadult($idU);
            $id = $this->requete->getParametre("id");
            $student = $this->student->getStudentClass($id);
            $this->genererVue(array('adult' => $adult, 'lists' => $student, 'id' => $id
            ));
        } else {
            throw new Exception('Erreur du serveur ');
        }
    }

    public function grille() {
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult = $this->adult->getadult($idU);
        $grille = $this->grille->getGrille();
        $this->genererVue(array('adult' => $adult, 'grille' => $grille));
    }

    public function monprofil() {

        $cat = $this->adult->getCat();
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult = $this->adult->getadult($idU);
        $this->genererVue(array('adult' => $adult, 'cat' => $cat));
    }

    public function editMonProfil() {
        $cat = $this->adult->getCat();
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $adult = $this->adult->getadult($idU);
        $this->genererVue(array('adult' => $adult, 'cat' => $cat));
    }

    public function exeEditTeacher() {
        if ($this->requete->existeParametre("name") && $this->requete->existeParametre("firstname") &&
                $this->requete->existeParametre("adress") && $this->requete->existeParametre("birthday") &&
                $this->requete->existeParametre("sexe") && $this->requete->existeParametre("phone") &&
                $this->requete->existeParametre("commentaire") &&
                $this->requete->existeParametre("email") && $this->requete->existeParametre("password") && $this->requete->existeParametre("id_adultCategory")
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


            $adult = $this->adult->getadult($idU);
            $this->genererVue(array('adult' => $adult));
        } else {
            throw new Exception("Faite attention les champs ne sont pas tous définis");
        }
    }

    public function mesclasses() {
        $period = $this->grille->selectPeriod();
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $class = $this->classe->getTeacherUniqueClass($idU);

        $adult = $this->adult->getadult($idU);
        $this->genererVue(array('adult' => $adult, 'class' => $class, 'period' => $period));
    }

    public function evalue() {
        $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
        $class = $this->classe->getTeacherUniqueClass($idU);
        $adult = $this->adult->getadult($idU);
        $this->genererVue(array('adult' => $adult, 'class' => $class));
    }

    public function eleves() {
        if ($this->requete->existeParametre("id")) {
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            $id = $this->requete->getParametre("id");
            //liste des élèves d'une classe .
            $student = $this->student->getStudentClass($id);

            //liste des élèves évalués d'une classe par ce professeur
            $studentFait = $this->student->getStudentEvalueTeacher($id, $idU);
            $studentF = $this->student->getStudentEvalueTeacher($id, $idU);
            $adult = $this->adult->getadult($idU);
            //nombre d'evaluation /nombe total d'eleve
            $nbrtotal = $this->grille->selectNbrClasse($id);
            $nomClasse = $this->classe->getClass($id);
            $nbrE = $this->grille->selectNomStudentEvalueParClasseParTeacherNbr($id, $idU);

            $this->genererVue(array('adult' => $adult, 'studentF' => $studentF, 'student' => $student, 'studentfait' => $studentFait, 'nbrT' => $nbrtotal, 'nbrE' => $nbrE, 'nomClasse' => $nomClasse));
        } else {
            throw new Exception("Faite attention les champs ne sont pas tous définis");
        }
    }

    public function jevalue() {
        if ($this->requete->existeParametre("id")) {
            $id = $this->requete->getParametre("id");
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            $student = $this->student->getStudentsName($id);
            $adult = $this->adult->getadult($idU);
            $this->grille->addItemEvalueStudent($id, $idU);
            //trouver le commentire qui et null et le mettre dan texTArea,ensuite l'éditer
            $idG = $this->grille->getIdGridstudent($idU, $id);

            $idgrid = $idG['idGridStudent'];

            //trouver le commentaire qui et null et le mettre dan texTArea,ensuite l'éditer
            $commentaire = $this->grille->getCommentaire($idgrid);
            $period = $this->grille->selectPeriod();
            //dans exeEvaluationStudent

            $item = $this->grille->getEvalueStudent($idU, $id);

            $this->genererVue(array('adult' => $adult, 'item' => $item, 'id' => $id, 'commentaire' => $commentaire, 'idgrid' => $idgrid, 'period' => $period, 'student' => $student));
        }
    }

    public function exeEvaluationStudent() {
        if ($this->requete->existeParametre("valider") &&
                $this->requete->existeParametre("id")) {

            // $commentaire= $this->requete->getParametre("commentaire");
            $idS = $this->requete->getParametre("id");
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            $adult = $this->adult->getadult($idU);
            $idG = $this->grille->getIdGridstudent($idU, $idS);


            $idgrid = $idG['idGridStudent'];


            //éditer un commentaire
            //$this->grille->editCommentaire($idgrid, $commentaire);
            $tab1 = $_POST['valider'];
            //je remet tout à jour
            $this->grille->editItemStudentAjour($idS, $idU);
            foreach ($_POST['valider'] as $item) {

                $val = 1;
                $this->grille->editItemStudent($idS, $idU, $item, $val);
            }
            //chercher la variable gridstudent dans reponse
            //trouver le commentire qui et null et le mettre dan texTArea,ensuite l'éditer
            $idG = $this->grille->getIdGridstudent($idU, $idS);
            $idgrid = $idG['idGridStudent'];
            //trouver le commentaire qui et null et le mettre dan texTArea,ensuite l'éditer
            $commentaire = $this->grille->getCommentaire($idgrid);
            //trouver la idclasse de l'élève
            $idC = $this->classe->getClasseEleve($idS);
            //idSuivant
            //  $idSuivant = $this->student->getIdSuivantStudent($idC, $idS);
            // ouverture de exeEvaluateStudent $this->genererVue(array('adult' => $adult, 'id' => $idU, 'tab' => $tab1, 'idC' => $idC));///




            $this->genererVue(array('adult' => $adult, 'id' => $idU, 'tab' => $tab1, 'idC' => $idC));
        } else {

            $idS = $this->requete->getParametre("id");
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            $adult = $this->adult->getadult($idU);
            $idG = $this->grille->getIdGridstudent($idU, $idS);
            $idgrid = $idG['idGridStudent'];
            //trouver le commentaire qui et null et le mettre dan texTArea,ensuite l'éditer
            $this->grille->editItemStudentAjour($idS, $idU);
            $commentaire = $this->grille->getCommentaire($idgrid);
            $this->grille->editItemStudentToutAzero($idS, $idU);
            //trouver la idclasse de l'élève
            $idC = $this->classe->getClasseEleve($idS);


            $id = $this->requete->getParametre("id");

            $student = $this->student->getStudentsName($id);

            $this->grille->addItemEvalueStudent($id, $idU);
            //trouver le commentire qui et null et le mettre dan texTArea,ensuite l'éditer
            $idG = $this->grille->getIdGridstudent($idU, $id);

            $idgrid = $idG['idGridStudent'];
            //trouver le commentaire qui et null et le mettre dan texTArea,ensuite l'éditer
            $commentaire = $this->grille->getCommentaire($idgrid);
            $period = $this->grille->selectPeriod();
            //dans exeEvaluationStudent
            $item = $this->grille->getEvalueStudent($idU, $id);
            $this->genererVue(array('adult' => $adult, 'id' => $idU, 'tab' => $tab1, 'idC' => $idC));
        }
    }

    public function grilleEleve() {
        if ($this->requete->existeParametre("id")) {
            $period = $this->grille->selectPeriod();
            $idC = $this->requete->getParametre("id");
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            $EvalueFalse = $this->classe->getEvalueFalse($idU, $idC);
            $nameItem1 = "Je suis respectueux envers les personnes";
            $nameItem2 = "J’adopte une attitude non violente";
            $nameItem3 = "Je suis respectueux du matériel et de l’environnement";
            $nameItem4 = "Je parle de façon adéquate";
            $nameItem5 = "Je suis solidaire";
            $nameItem6 = "Je respecte les règles de l’école";
            $nameItem7 = "Je m’organise et je deviens autonome";
            $nameItem8 = "J’écoute les professeurs et les élèves sans les interrompre";
            $nameItem9 = "Je circule dans l’école calmement";
            $nameItem10 = "Je donne le meilleur de moi-même";
            //resultat item 1 " Je sui polis"
            $Item1 = $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem1);
            $Item2 = $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem2);
            $Item3 = $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem3);
            $Item4 = $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem4);
            $Item5 = $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem5);
            $Item6 = $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem6);
            $Item7 = $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem7);

            $Item8 = $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem8);
            $Item9 = $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem9);
            $Item10 = $this->grille->selectStudentEvalueParClasse($idC, $idU, $nameItem10);

            $nomClasse = $this->classe->getClass($idC);
            $adult = $this->adult->getadult($idU);

            $nomStudent = $this->grille->selectNomStudentEvalueParClasseParTeacher($idC, $idU);
            $item = $this->grille->selectItemStudentEvalueParClasse($idC);
            $this->genererVue(array('adult' => $adult,
                'item1' => $Item1,
                'item2' => $Item2,
                'item3' => $Item3,
                'item4' => $Item4,
                'item5' => $Item5,
                'item6' => $Item6,
                'item7' => $Item7,
                'item8' => $Item8,
                'item9' => $Item9,
                'item10' => $Item10,
                'period' => $period,
                'nbr' => $EvalueFalse,
                'nomClasse' => $nomClasse,
                'nomStudent' => $nomStudent,
                'item' => $item));
        }
    }

    public function monterDeCeinture() {
        if ($this->requete->existeParametre("id")) {
            //connaitre la période actuelle
            $periodScolaire = $this->grille->selectPeriodScolaire();
            $period = $periodScolaire['period'];

            $idE = $this->requete->getParametre("id");
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            $adult = $this->adult->getadult($idU);
            $student = $this->student->getStudent($idE);
            //badge en Toussaint
            $toussaint = "Toussaint";
            $ceintureToussaint = $this->student->selectCeinture($toussaint, $idE);
            //badge à Noel
            $noel = "Noël";
            $ceintureNoel = $this->student->selectCeinture($noel, $idE);
            // badge à Paques
            $paques = "Pâques";
            $ceinturePaques = $this->student->selectCeinture($paques, $idE);
            $juin = "juin";
            $ceintureJuin = $this->student->selectCeinture($juin, $idE);
            $this->genererVue(array('adult' => $adult, 'id' => $idE, 'student' => $student, 'ceinture' => $ceinture, 'periodactuel' => $periodScolaire, 'badgeNoel' => $ceintureNoel, 'badgeJuin' => $ceintureJuin, 'badgeToussaint' => $ceintureToussaint, 'badgePaques' => $ceinturePaques));
        } else {
            throw new Exception("Erreur de chargement de page");
        }
    }

    public function exeMonterDeCeinture() {
        if ($this->requete->existeParametre("id") && $this->requete->existeParametre("ceinture")) {
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            $adult = $this->adult->getadult($idU);
            //connaitre la période
            $periodScolaire = $this->grille->selectPeriodScolaire();
            $period = $periodScolaire['period'];
            //connaitrele badge
            $ceinture = $this->requete->getParametre("ceinture");
            $id = $this->requete->getParametre("id");
            $idC = $this->classe->getClasseEleve($id);
            $this->student->editChildrenCeinture($period, $ceinture, $id);
            $this->genererVue(array('adult' => $adult, 'idC' => $idC));
        } else {
            throw new Exception("Erreur de chargement de page");
        }
    }

    public function commenterSonEvaluation() {

        if ($this->requete->existeParametre("id")) {
            $idE = $this->requete->getParametre("id");
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            $adult = $this->adult->getadult($idU);
            $commentaire = $this->grille->selectCommentaire($idE, $idU);

            $this->genererVue(array('adult' => $adult, 'id' => $idE, 'commentaire' => $commentaire));
        } else {
            throw new Exception("Erreur de chargement de page");
        }
    }

    public function commentaire() {
        if ($this->requete->existeParametre("id")) {
            $idC = $this->requete->getParametre("id");
            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            $adult = $this->adult->getadult($idU);

            $commentaire = $this->grille->selectCommentaireStudentParProfesseur($idC, $idU);
            $this->genererVue(array('adult' => $adult, 'commentaire' => $commentaire));
        } else {
            throw new Exception("Veuillez évaluer votre élèves");
        }
    }

    public function exeCommentaire() {
        if ($this->requete->existeParametre("id") &&
                $this->requete->existeParametre("commentaire")) {
            $idE = $this->requete->getParametre("id");
            $commentaire = $this->requete->getParametre("commentaire");

            $idU = $this->requete->getSession()->getAttribut("idUtilisateur");
            $adult = $this->adult->getadult($idU);
            $idG = $this->grille->getIdGridstudent($idU, $idE);

            $idC = $this->classe->getClasseEleve($idE);
            $idgrid = $idG['idGridStudent'];
            $this->grille->editCommentaire($commentaire, $idgrid);
            $this->genererVue(array('adult' => $adult, 'idC' => $idC));
        } else {
            throw new Exception("Veuillez évaluer votre élèves");
        }
    }

}
