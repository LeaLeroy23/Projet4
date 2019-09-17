<?php
require_once 'Modele/Modele.php'

//class Admin extends Modele {

  //renvoie la liste des billets du blog
  public function getAllBillets(){
    $sql = 'select BIL_ID as id, BIL_DATE as date,'
      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
      . ' order by BIL_ID desc';
    $allBillets = $this->executerRequete($sql);
    return $allBillets;
  }
//}
?>
