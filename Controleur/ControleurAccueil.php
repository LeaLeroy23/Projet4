<?php

require_once 'Modele/Chapitres.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

  private $chapitre;

  public function __construct() {
    $this->chapitre = new Chapitre();
  }

  // Affiche la liste de tous les chapitres du blog
  public function accueil() {
    $chapitres = $this->chapitre->getChapitres();
    $vue = new Vue("Accueil");
    $vue->generer(array('chapitres' => $chapitres));
  }

}
