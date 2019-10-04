<?php

require_once 'Modele/Chapitre.php';
require_once 'Vue/Vue.php';

class ControleurChapitres {

  private $chapitres;

  public function __construct() {
    $this->chapitres = new Chapitre();
  }

  // Affiche la liste de tous les chapitres du blog
  public function chapitres() {
    $chapitres = $this->chapitres->getChapitres();
    $vue = new Vue("Chapitres");
    $vue->generer(array('chapitres' => $chapitres));
  }

}
