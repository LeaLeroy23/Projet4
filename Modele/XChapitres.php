<?php

require_once 'Modele/Modele.php';

class Chapitres extends Modele {

  // Renvoie la liste des chapitres du blog
  public function getChapitres() {
    $sql = 'select id, add_date, title, content from chapter'
      . ' order by id desc';
    $chapitres = $this->executerRequete($sql);
    return $chapitres;
  }

  public function nbChapters() {
    $sql = 'select COUNT(id) AS nbChapter from chapter' ;
    $nbChapters = $this->executerRequete($sql);
    return $nbChapters;
  }

  // Renvoie les informations sur un chapitre
  public function getChapitre($idChapitre) {
    $sql = 'select id, add_date, title, content from chapter'
      . ' where id=?';
    $chapitre = $this->executerRequete($sql, array($idChapitre));

    if ($chapitre->rowCount() == 1)
      return $chapitre->fetch();  // Accès à la première ligne de résultat

    else
      throw new Exception("Aucun chapitre ne correspond à l'identifiant '$idChapitre'");
    }


}
