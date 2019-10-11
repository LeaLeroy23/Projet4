<?php
require_once 'Modele/Modele.php';

class Connexion extends Modele {

  //renvoie les identifiants de connexion
  public function getConnexion(){
    $sql = 'select BIL_ID as id, BIL_DATE as date,'
    . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
    . ' order by BIL_ID desc';
    $Connexion = $this->executerRequete($sql);
    return $Connexion;
  }
}

