<?php

require_once 'Modele/Contact.php';
require_once 'Vue/Vue.php';

class ControleurContact {

  private $contact;

  public function __construct() {
    $this->contact = new Contact();
  }

  // Affiche la liste de tous les chapitres du blog
  public function contact() {
    $contacts = $this->contact->getContacts();
    $vue = new Vue("Contact");
    $vue->generer(array('contacts' => $contacts));
  }

}
