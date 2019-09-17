<?php

require_once 'Modele/Connexion.php';
require_once 'Vue/vue.php';

class ControleurConnexion {

  private $connexion;

  public function __construct() {
    $this->Connect = new Connect();
  }

  public function connect() {
    $this->connect>getConnexion();
    $vue = new Vue("Connexion");
    $vue->generer(array('connexion' => $connectUser));
  }

}
