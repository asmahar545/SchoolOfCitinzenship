<?php


require_once 'Framework/Modele.php';

class Adult extends Modele
{
    //return un tout les adults
    public function getAdults()
    {
        $sql = "select * from adult";
        $personnel= $this->executerRequete($sql);
        return $personnel;
    }
    //return une seul adult

    public function getadult($id)
    {
        $sql="select * from adult where id_adult= ?";
        $rep=$this->executerRequete($sql,array($id));
        if ($rep->rowCount() == 1){
        return $rep->fetch(); } // Accès à la première ligne de résultat
        else{
        throw new Exception("Aucun éleve ne correspond 0 l4identifiqnt fourni");}
    }
    public function getAdultClass(){
                                                       
        
    }
    public function getEducateurs(){
        $sql= "select * from adult where  id_adultCategory=2";
        $rep=  $this->executerRequete($sql);
        
        return $rep;
    }
    //return le nombre d'adult

    public function getnbadults()
    {

        $rqt='select count(*) as nb from adult ';

        $rep=  $this->executerRequete($rqt);
        $ligne= $rep->fetch();
        return $ligne['nb'];
    }
    //ajoute un adult
    public function addAdult($name,$firstname,$email,$password)
    {
        $sql='INSERT INTO `adult` (`id_adult`, `name`, `firstname`, `email`, `password`, `id_adultCategory`)  VALUES (NULL,?, ?, ?, ?,1)';

        $this->executerRequete($sql,array($name,$firstname,$email,$password));
    }
    public function deleteAdult($idU)
    {
        $sql='DELETE FROM `adult` WHERE id_adult=?';

        $this->executerRequete($sql,array($idU));
    }
    public function addLesson($cours,$nbr){
        $sql= 'INSERT INTO `cours` (`id_lesson`, `name`, `nbr`) VALUES (NULL, ?, ?)';
        $this->executerRequete($sql,array($cours,$nbr));
    
    }

    //return tableau de catégory 
    public function  getCat(){
        $sql="select * from adultcategory";
        $cat= $this->executerRequete($sql);
        return $cat;
        
    }
    //modifie l'adult
    public function editAdult($name,$firstname,$email,$password,$id){
        $sql="UPDATE `adult` SET  `name` = ?, `firstname` = ?, `email` = ?, `password` = ? WHERE `adult`.`id_adult` = ?";
        
       
        $rep=$this->executerRequete($sql,array($name,$firstname,$email,$password,$id));
    }
    public function teacherNbrEvaluate($classe)
     {
        $sql="select count(*) FROM itemresponstudent WHERE classe= ? group by idU";
        $rep=$this->executerRequete($sql,array($classe));
        $nb= $rep->rowCount();
        return $nb;
    }
public function nonEvaluateTeacher(){
 
   $sql="SELECT * FROM `adult` where id_adult in (select id_adult FROM consultclass where id_adult NOT in (SELECT id_adult FROM evaluatestudent))";
   $tab=$this->executerRequete($sql);
   return $tab;
}

   
      
}