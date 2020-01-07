<?php

require_once 'Modele/Modele.php';

class Connexion extends Modele
{
    public function getUser($email){
        $sql = 'select * from user where email =?';
        $connexion = $this->executerRequete($sql, array($email));
        return $connexion->fetch();
    }

}