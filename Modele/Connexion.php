<?php
require_once 'Modele/Modele.php';

class Connexion extends Modele {

  //renvoie les identifiants de connexion
  public function getConnect(){
    $sql = 'select Co_id as id, Co_username as username,'
      . ' Co_password as password, from t_admin';
    $connectUser = $this->executerRequete($sql);
    return $connectUser;
  }

}
?>
