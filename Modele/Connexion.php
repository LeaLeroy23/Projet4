<?php

require_once 'Modele/Modele.php';

class Connexion extends Modele
{
    public function getUser($email, $password){
        $sql = 'select USER_id, USER_password from user where USER_email =?';
        $connexion = $this->executerRequete($sql, array($email));
        return $connexion->fetch();

        //$checkPassword = password_verify($password, password_hash($password, PASSWORD_DECRYPT));
    }
}