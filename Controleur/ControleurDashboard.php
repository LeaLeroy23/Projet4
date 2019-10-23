<?php

require_once 'Modele/Dashboard.php';
require_once 'Vue/vue.php';

class ControleurDashboard {

  private $dashboard;
  //private $commentaire;

  public function __construct() {
    $this->dashboard = new Dashboard();
    //$this->commentaire = new Commentaire();
  }

  // Affiche la liste de tous les chapitres du blog
  public function dashboard() {
    $dashboard = $this->dashboard->getChapitres();
    //$commentaires = $this->commentaire->getCommentaires();
    $vue = new Vue("Dashboard");
    $vue->generer(array('dashboard' => $dashboard));
  }


}
