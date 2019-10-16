<?php

require_once 'Modele/Chapitre.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/vue.php';

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

  // Ajoute un commentaire à un chapitre
  public function commenter($auteur, $contenu, $idChapitre) {
    // Sauvegarde du commentaire
    $this->commentaire->ajouterCommentaire($auteur, $contenu, $idChapitre);
    // Actualisation de l'affichage du chapitre
    $this->chapitre($idChapitre);
  }
}
