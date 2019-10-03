<?php

require_once 'Modele/Chapitres.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurChapitre {

  private $chapitre;
  private $commentaire;

  public function __construct() {
    $this->chapitre = new Chapitre();
    $this->commentaire = new Commentaire();
  }

  // Affiche les détails sur un chapitre
  public function chapitre($idChapitre) {
    $chapitre = $this->chapitre->getChapitre($idChapitre);
    $commentaires = $this->commentaire->getCommentaires($idChapitre);
    $vue = new Vue("Chapitre");
    $vue->generer(array('chapitre' => $chapitre, 'commentaires' => $commentaires));
  }

  // Affiche tous les chapitres
  public function chapitres() {
    $chapitres = $this->chapitres->getChapitres();
    $vue = new Vue("Chapitres");
    $vue->generer(array('chapitres' => $chapitres));
  }

  // Ajoute un commentaire à un chapitre
  public function commenter($auteur, $contenu, $idChapitre) {
    // Sauvegarde du commentaire
    $this->commentaire->ajouterCommentaire($auteur, $contenu, $idChapitre);
    // Actualisation de l'affichage du chapitre
    $this->chapitre($idChapitre);
  }
}
