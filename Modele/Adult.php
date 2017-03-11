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

        $sql="select * from adult where id_adult= $id";
        $rep=  $this->executerRequete($sql);
        $ligne= $rep->fetch();
        return $ligne;
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
        
        $this->executerRequete($sql,array($name,$firstname,$email,$password,$id));
    }
   
      
}