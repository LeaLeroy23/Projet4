<?php
require_once 'Modele/Modele.php';

class Connexion extends Modele {

  //renvoie les identifiants de connexion
  public function getConnexion(){
    $sql = 'select id, date, title, content from chapters'
    . ' order by id desc';
    $Connexion = $this->executerRequete($sql);
    return $Connexion;
  }
}

