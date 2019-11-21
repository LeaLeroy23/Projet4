<?php

//require_once 'Modele/Connexion.php';
require_once 'Vue/vue.php';

class ControleurConnexion
{

  //private $connexion;

    public function __construct()
    {
        //$this->connexion = new Connexion();
    }

    public function connexion()
    {
        //$connexion = $this->connexion->getConnexion();
        $vue = new vue("Connexion");
        $vue->generer(array('connexion' /*=> $connexion*/));
    }
}
