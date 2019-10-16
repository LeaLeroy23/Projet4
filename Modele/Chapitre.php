<?php

require_once 'Modele/Modele.php';

class Chapitre extends Modele {

  // Renvoie la liste des chapitres du blog
  public function getChapitres() {
    $sql = 'select CHA_ID as id, CHA_DATE as date,'
      . ' CHA_TITRE as titre, CHA_CONTENU as contenu from chapitre'
      . ' order by CHA_ID desc';
    $chapitres = $this->executerRequete($sql);
    return $chapitres;
  }

  // Renvoie la liste des 5 derniers chapitres du blog
  public function getChapitresLimit() {
    $sql = 'select CHA_ID as id, CHA_DATE as date,'
      . ' CHA_TITRE as titre, CHA_CONTENU as contenu from chapitre'
      . ' order by CHA_ID desc LIMIT 5';
    $chapitres = $this->executerRequete($sql);
    return $chapitres;
  }

  // Renvoie les informations sur un chapitre
  public function getChapitre($idChapitre) {
    $sql = 'select CHA_ID as id, CHA_DATE as date,'
      . ' CHA_TITRE as titre, CHA_CONTENU as contenu from chapitre'
      . ' where CHA_ID=?';
    $chapitre = $this->executerRequete($sql, array($idChapitre));

    if ($chapitre->rowCount() == 1)
      return $chapitre->fetch();  // Accès à la première ligne de résultat

    else
      throw new Exception("Aucun chapitre ne correspond à l'identifiant '$idChapitre'");
    }


}
