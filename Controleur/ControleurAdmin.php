<?php

require_once 'Modele/Admin.php';
require_once 'Vue/vue.php';

class ControleurAdmin {

  private $Admin;

  public function __construct() {
    $this->Admin = new Admin();
  }

  // Affiche la liste de tous les chapitres du blog
  public function admin() {
    $chapitres = $this->chapitre->getChapitres();
    $vue = new Vue("Admin");
    $vue->generer(array('chapitres' => $chapitres));
  }

}
