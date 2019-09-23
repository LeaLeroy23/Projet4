<?php
require_once 'Modele/Modele.php';

class Dashboard extends Modele {

  //renvoie la liste des billets du blog
  private function getChapitres(){
    $sql = 'select BIL_ID as id, BIL_DATE as date,'
      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
      . ' order by BIL_ID desc';
    $chapitres = $this->executerRequete($sql);
    return $chapitres;
  }

  // Renvoie les informations sur un chapitre
  function getChapitre($idChapitre) {
    $sql = 'select BIL_ID as id, BIL_DATE as date,'
      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
      . ' where BIL_ID=?';
    $chapitre = $this->executerRequete($sql, array($idChapitre));
    if ($chapitre->rowCount() == 1){
      return $chapitre->fetch();  // Accès à la première ligne de résultat
    } else {
      throw new Exception("Aucun chapitre ne correspond à l'identifiant '$idChapitre'");
    }
  }

    function getComment(){
      $sql = 'select COM_CONTENU as contenuCom, COM_AUTEUR as auteurCom from T_COMMENTAIRE';
      $commentaires = $this->executeRequete($sql);
      return $commentaires;
    }

    function getDashboard(){
      $sql = 'select BIL_ID as id, BIL_DATE as date,'
        . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET';
      $dashboard = $this->executeRequete($sql);
      return $dashboard;
    }

  }
