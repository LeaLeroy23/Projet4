<?php

require_once 'Modele/Modele.php';

class Chapitre extends Modele {

  // Renvoie la liste des chapitres du blog
  public function getChapitres() {
    $sql = 'select id, add_date, title, content from chapter'
      . ' order by id desc';
    $chapitres = $this->executerRequete($sql);
    return $chapitres;
  }

  // Renvoie la liste des 5 derniers chapitres du blog
  public function getChapitresLimit() {
    $sql = 'select id, add_date, title, content from chapter'
      . ' order by id desc LIMIT 0, 5';
    $chapitres = $this->executerRequete($sql);
    return $chapitres;
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

    // Ajoute un chapitre dans la base
    public function ajouterChapitre($title, $content, $add_date) {
    $sql = 'insert into chapter(title, content, add_date)'
       . ' values(?, ?, ?)';
    //$date = date(DATE_W3C);  // Récupère la date courante
    $this->executerRequete($sql, array($title, $content, $add_date));
    }

}
