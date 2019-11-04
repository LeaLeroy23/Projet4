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

  //Affiche les détails sur un chapitre
  public function modification($idChapitre){
    $chapitre = $this->chapitre->getChapitre($idChapitre);
    $commentaires = $this->commentaire->getVommentaire($idChapitre);
    $vue = new Vue("modification");
    $vue->generer(array('chapitre' => $chapitre, 'commentaires' => $commentaires));
  }

  // Affiche la liste de tous les chapitres du blog
  public function dashboard() {
    $chapters = $this->chapitre->getChapitres();
    $vue = new Vue("Dashboard");
    $vue->generer(array('chapters' => $chapters));
  }


}
