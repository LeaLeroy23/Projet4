<?php

require_once 'Modele/Admin.php';
require_once 'Vue/vue.php';

class ControleurAdmin {

  private $Admin;

  public function __construct() {
    $this->Admin = new Admin();
  }

  // Affiche la liste de tous les billets du blog
  public function admin() {
    $billets = $this->billet->getBillets();
    $vue = new Vue("Admin");
    $vue->generer(array('billets' => $billets));
  }

}
