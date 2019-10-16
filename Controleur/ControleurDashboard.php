<?php

require_once 'Modele/Dashboard.php';
require_once 'Vue/vue.php';

class ControleurDashboard {

  private $dashboard;

  public function __construct() {
    $this->dashboard = new Dashboard();
  }

  // Affiche la liste de tous les chapitres du blog
  public function dashboard() {
    $dashboard = $this->dashboard->getChapitres();
    $vue = new Vue("Dashboard");
    $vue->generer(array('dashboard' => $dashboard));
  }

}
