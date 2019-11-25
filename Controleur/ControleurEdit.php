<?php

require_once 'Modele/Chapitre.php';
require_once 'Vue/vue.php';

class ControleurEdit
{
    private $chapitre;

    //définition de constante pour l'utilisation dans plusieurs fonciton
    const MAXSIZE = 5*1024*1024;

    public function __construct()
    {
        $this->chapitre = new Chapitre();
    }

    // modifier un chapitre
    public function edit($idChapitre)
    {

        // affichage de la vue
        $chapter = $this->chapitre->getChapitre($idChapitre);
        $vue = new Vue("Edit");
        $vue->generer(array());
    }

}
