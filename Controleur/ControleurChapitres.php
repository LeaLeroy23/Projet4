<?php

require_once 'Modele/Chapitres.php';
require_once 'Vue/Vue.php';

class ControleurChapitres {

  private $chapitre;

  public function __construct() {
    $this->chapitres = new Chapitres();
  }

  // Affiche la liste de tous les chapitres du blog
  public function chapitres() {
    $chapitres = $this->chapitres->getChapitres();
    $vue = new Vue("Chapitres");
    $vue->generer(array('chapitres' => $chapitres));
  }

}
