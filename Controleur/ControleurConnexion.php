<?php

require_once 'Modele/Connexion.php';
require_once 'Vue/vue.php';

class ControleurConnexion
{

  private $connexion;

    public function __construct()
    {
        $this->connexion = new Connexion();
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['login'])) {
                $result= $this->connexion->login();
                if ($result && $result['password']){

                }
            }
        }
        $connexion = $this->connexion->getConnexion();
        $vue = new vue("Connexion");
        $vue->generer(array('connexion'));
    }
}
