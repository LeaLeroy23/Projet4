<?php

//require_once 'Modele/Contact.php';
require_once 'Vue/vue.php';

class ControleurContact {

  //private $contact;

  public function __construct() {
    //$this->contact = new Contact();
  }

  // Affiche la liste de tous les chapitres du blog
  public function contact() {
    //$contact = $this->contact->getContact();
    $vue = new Vue("Contact");
  $vue->generer(array('contact' /*=> $contact*/));
  }

}
