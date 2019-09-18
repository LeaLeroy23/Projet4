<?php

require_once 'Modele/Modele.php';

class Commentaire extends Modele {

  // Renvoie la liste des commentaires associés à un chapitre
  public function getCommentaires($idchapitre) {
    $sql = 'select COM_ID as id, COM_DATE as date,'
      . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
      . ' where BIL_ID=?';
    $commentaires = $this->executerRequete($sql, array($idchapitre));
    return $commentaires;

  }

  // Ajoute un commentaire dans la base
  public function ajouterCommentaire($auteur, $contenu, $idchapitre) {
    $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
      . ' values(?, ?, ?, ?)';
    $date = date(DATE_W3C);  // Récupère la date courante
    $this->executerRequete($sql, array($date, $auteur, $contenu, $idchapitre));
  }

}
