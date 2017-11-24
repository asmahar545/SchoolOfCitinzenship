
<?php

/**
 * Created by PhpStorm.
 * User: Asmae
 * Date: 18/01/2017
 * Time: 13:48
 */
require_once 'Framework/Modele.php';

class Student extends Modele {

    public function getnbstudents() {


        $rqt = 'select count(*) as nb from eleve';

        $rep = $this->executerRequete($rqt);
        $ligne = $rep->fetch();
        return $ligne['nb'];
    }

    public function getStudents() {
        $sql = "select * from eleve";
        $student = $this->executerRequete($sql);
        return $student;
    }

    // commentaire du Titulaire
    public function getCommentaireTitulaire($idE, $IdT) {
        $sql = "SELECT commentaire FROM `itemresponstudent` WHERE idE= ? and idU= ? group by commentaire";
        $commentaire = $this->executerRequete($sql, array($idE, $idT));
        $comm = $commentaire > fetch();
        return $comm;
    }

    //
    public function getIdTitulaire($idC) {
        $sql = "SELECT `Titulaire` FROM `classe` WHERE id= ?";
        $titulaire = $this->executerRequete($sql, array($idC));
        $idU = $titulaire > fetch();
        return $idU;
    }

    // classe 1 à la toussaint
    public function getStudentsBadgesToussaint1($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 1";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint2($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 2";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint3($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 3";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint4($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 4";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint5($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 5";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint6($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 6";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint7($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 7";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint8($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 8";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint9($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 9";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint10($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 10";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint11($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 11";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint12($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe=12";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint13($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 13";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint14($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 14";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint15($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 15";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint16($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 16";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint17($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 17";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint18($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 18";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint19($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 19";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint20($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 20";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint21($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 21";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint22($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 22";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint23($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 23";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint24($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 24";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint25($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 25";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint26($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 26";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint27($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 27";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint28($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 28";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint29($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 29";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesToussaint30($couleur) {
        $sql = "SELECT name,firstName from eleve where Toussaint=? and id_classe= 30";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgeNoel($couleur) {
        $sql = "SELECT name,firstName from eleve where Noel=?";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesPaques($couleur) {
        $sql = "SELECT name,firstName from eleve where Paques=?";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    public function getStudentsBadgesJuin($couleur) {
        $sql = "SELECT name,firstName from eleve where =?";
        $student = $this->executerRequete($sql, array($couleur));
        return$student;
    }

    /*  requete pour avoir lal liste des eleves evalue et pas =select name, firstName from eleve where id_classe = 3 UNION All SELECT nameE, firstE FROM `itemresponstudent` where classe= 3 and idU= 745 group by nameE ORDER BY name ASC */

    public function getStudentsName($idS) {
        $sql = "select * from eleve where id_student=?";
        $student = $this->executerRequete($sql, array($idS));
        $ligne = $student->fetch();
        return $ligne;
    }

    public function getStudentsNameSeul($idS) {
        $sql = "select name from eleve where id_student=?";
        $student = $this->executerRequete($sql, array($idS));
        $ligne = $student->fetch();
        return $ligne;
    }

    public function getStudentClass($id) {
        $sql = "select * from eleve where id_classe = ? order by name ASC";
        $student = $this->executerRequete($sql, array($id));
        return $student;
    }

//fontion qui permet de trouver la liste des élèves évalué par le professeur( permet de savoir quels élève a été fait ou non
    public function getStudentEvalueTeacher($idC, $IdT) {
        $sql = "SELECT idE,nameE, firstE FROM `itemresponstudent` where classe= ? and idU= ?group by nameE,firstE ORDER BY nameE ASC";
        $student = $this->executerRequete($sql, array($idC, $IdT));
        return $student;
    }

// trouver l'id Suivant
    public function getIdSuivantStudent($id, $idS) {
        $sql = "select id_student from eleve where id_classe = ? and id_student > ? LIMIT 1";
        $student = $this->executerRequete($sql, array($id));
        $IdSuiv = $student->fetch();
        return $IdSuiv;
    }

//ajouter un étudiant
    public function addChildren($name, $firstname, $id_classe) {
        $sql = "INSERT INTO `eleve`(`id_student`, `name`, `firstName`, `Toussaint`, `retard`, `id_classe`) VALUES (Null,?,?,'blanc',0,?)";
        $rep = $this->executerRequete($sql, array($name, $firstname, $id_classe));
    }

    public function deleteChildren($idE) {
        $sql = " DELETE FROM `eleve` WHERE id_student=?";
        $rep = $this->executerRequete($sql, array($idE));
    }

    public function editChildren($name, $firstname, $id_classe, $id) {
        $sql = "UPDATE `eleve` SET `name` = ?, `firstName` = ?,
          `id_classe` = ? WHERE `eleve`.`id_student` = ?";
        $rep = $this->executerRequete($sql, array($name, $firstname, $id_classe, $id));
    }

    public function getStudent($id) {
        $sql = "select * from eleve where id_student= ?";
        $rep = $this->executerRequete($sql, array($id));
        if ($rep->rowCount() == 1) {
            return $rep->fetch();
        } // Accès à la première ligne de résultat
        else {
            throw new Exception("Aucun éleve ne correspond 0 l4identifiqnt fourni");
        }
    }

    public function addEvaluateStudent($response, $id_student, $id_adult, $id_item, $idGridStudent) {
        $sql = "INSERT INTO `evaluatestudent`(`response`, `id_student`, `id_adult`, `id_item`, `idGridStudent`) VALUES (?,?,?,?,?)";
        $rep = $this->executerRequete($sql, array($response, $id_student, $id_adult, $id_item, $idGridStudent));
    }

    public function editChildrenCeinture($period, $ceinture, $id) {

        $sql = 'UPDATE `eleve` SET    ' . $period . ' = ? WHERE `eleve`.`id_student` = ?';
        $rep = $this->executerRequete($sql, array($ceinture, $id));
    }

    public function editChildrenRetard($retard, $id) {
        $sql = "UPDATE `eleve` SET
          `retard`=? WHERE `eleve`.`id_student` = ?";
        $rep = $this->executerRequete($sql, array($retard, $id));
    }

    public function selectCeinture($period, $idE) {

        $sql = 'select  ' . $period . ' as periode from eleve where id_student= ?';
        $rep = $this->executerRequete($sql, array($idE));
        if ($rep->rowCount() == 1) {
            return $rep->fetch();
        } // Accès à la première ligne de résultat
        else {
            throw new Exception("Aucun éleve ne correspond à l'iidentifiqnt fourni");
        }
    }

    public function selectRetard($idE) {
        $sql = "select retard from eleve where id_student = ?";
        $rep = $this->executerRequete($sql, array($idE));
        if ($rep->rowCount() == 1) {
            return $rep->fetch();
        } // Accès à la première ligne de résultat
        else {
            throw new Exception("Aucun éleve ne correspond 0 l4identifiqnt fourni");
        }
    }

}
