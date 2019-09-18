<?php

require_once 'Modele/Modele.php';

class Chapitre extends Modele {

  // Renvoie la liste des chapitres du blog
  public function getChapitres() {
    $sql = 'select BIL_ID as id, BIL_DATE as date,'
      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
      . ' order by BIL_ID desc';
    $Chapitres = $this->executerRequete($sql);
    return $Chapitres;
  }

  // Renvoie les informations sur un chapitre
  public function getChapitre($idChapitre) {
    $sql = 'select BIL_ID as id, BIL_DATE as date,'
      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
      . ' where BIL_ID=?';
    $chapitre = $this->executerRequete($sql, array($idChapitre));
    if ($chapitre->rowCount() == 1)
      return $chapitre->fetch();  // Accès à la première ligne de résultat
    else
      throw new Exception("Aucun chapitre ne correspond à l'identifiant '$idChapitre'");
    }
}