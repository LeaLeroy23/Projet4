<?php
require_once 'Modele/Modele.php';

class Contact extends Modele {

  //renvoie la liste des billets du blog
  public function getContact(){
    $sql = 'select BIL_ID as id, BIL_DATE as date,'
      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
      . ' order by BIL_ID desc';
    $Contact = $this->executerRequete($sql);
    return $Contact;
  }
}

