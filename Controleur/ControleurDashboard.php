<?php

require_once 'Modele/Chapitre.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/vue.php';

class ControleurDashboard {

  private $chapitre;
  private $commentaire;

  public function __construct() {
    $this->chapitre = new Chapitre();
  }

  // Affiche la liste de tous les chapitres du blog
  public function dashboard() {
    $chapters = $this->chapitre->getChapitres();
    $vue = new Vue("Dashboard");
    $vue->generer(array('chapters' => $chapters));
  }


}
