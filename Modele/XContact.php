<?php
require_once 'Modele/Modele.php';

class Contact extends Modele {

  //renvoie la liste des Chapitre du blog
  public function getContact(){
    $sql = 'select id, date, title, content from chapters'
      . ' order by id desc';
    $Contact = $this->executerRequete($sql);
    return $Contact;
  }
  
}

