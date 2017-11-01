
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

    // trouver l'id Suivant
    public function getIdSuivantStudent($id, $idS) {
        $sql = "select id_student from eleve where id_classe = ? and id_student > ? LIMIT 1";
        $student = $this->executerRequete($sql, array($id));
        $IdSuiv = $student->fetch();
        return $IdSuiv;
    }

    //ajouter un étudiant
    public function addChildren($name, $firstname, $id_classe) {
        $sql = "INSERT INTO `eleve`(`id_student`, `name`, `firstName`, `monteCeinture`, `retard`, `id_classe`) VALUES (Null,?,?,'blanc',0,?)";
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

    public function editChildrenCeinture($ceinture, $id) {
        $sql = "UPDATE `eleve` SET
          `monteCeinture`=? WHERE `eleve`.`id_student` = ?";
        $rep = $this->executerRequete($sql, array($ceinture, $id));
    }

    public function editChildrenRetard($retard, $id) {
        $sql = "UPDATE `eleve` SET
          `retard`=? WHERE `eleve`.`id_student` = ?";
        $rep = $this->executerRequete($sql, array($retard, $id));
    }

    public function selectCeinture($idE) {
        $sql = "select monteCeinture from eleve where id_student= ?";
        $rep = $this->executerRequete($sql, array($idE));
        if ($rep->rowCount() == 1) {
            return $rep->fetch();
        } // Accès à la première ligne de résultat
        else {
            throw new Exception("Aucun éleve ne correspond 0 l4identifiqnt fourni");
        }
    }

    public function selectRetard($idE) {
        $sql = "select retard from eleve where id_student= ?";
        $rep = $this->executerRequete($sql, array($idE));
        if ($rep->rowCount() == 1) {
            return $rep->fetch();
        } // Accès à la première ligne de résultat
        else {
            throw new Exception("Aucun éleve ne correspond 0 l4identifiqnt fourni");
        }
    }

}
