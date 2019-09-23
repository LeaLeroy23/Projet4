<?php

require_once 'Modele/Connexion.php';
require_once 'Vue/vue.php';

class ControleurConnexion {

  private $connexion;

  public function __construct() {
    $this->Connexion = new Connexion();
  }

  public function connexion() {
    $this->connect>getConnexion();
    $vue = new Vue("Connexion");
    $vue->generer(array('connexion' => $connexion));
  }
}
