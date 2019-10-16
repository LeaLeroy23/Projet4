<?php
require_once 'Modele/Modele.php';

class Contact extends Modele {

  //renvoie la liste des CHAlets du blog
  public function getContact(){
    $sql = 'select CHA_ID as id, CHA_DATE as date,'
      . ' CHA_TITRE as titre, CHA_CONTENU as contenu from chapitre'
      . ' order by CHA_ID desc';
    $Contact = $this->executerRequete($sql);
    return $Contact;
  }
}

