<?php

require_once 'Modele/Dashboard.php';
require_once 'Vue/vue.php';

class ControleurDashboard {

  private $Dashboard;

  public function __construct() {
    $this->Dashboard = new Dashboard();
  }

  // Affiche la liste de tous les chapitres du blog
  public function dashboard() {
    $chapitres = $this->chapitre->getChapitres();
    $vue = new Vue("Dashboard");
    $vue->generer(array('chapitres' => $chapitres));
  }

}
