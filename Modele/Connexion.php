<?php
require_once 'Modele/Modele.php';

class Connexion extends Modele {

  //renvoie les identifiants de connexion
  public function getConnexion(){
    $sql = 'select CHA_ID as id, CHA_DATE as date,'
    . ' CHA_TITRE as titre, CHA_CONTENU as contenu from chapitre'
    . ' order by CHA_ID desc';
    $Connexion = $this->executerRequete($sql);
    return $Connexion;
  }
}

