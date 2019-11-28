<?php

require_once 'Modele/Chapitre.php';
require_once 'Vue/vue.php';

class ControleurEdit
{
    private $chapitre;

    //définition de constante pour l'utilisation dans plusieurs fonciton

    public function __construct()
    {
        $this->chapitre = new Chapitre();
    }

    // modifier un chapitre
    public function edit()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $comAuthor = $_POST['COM_author'];
            $comEmail = $_POST['COM_email'];
            $comContent = $_POST['COM_content'];

            $this->chapitre->updateChapter($comAuthor, $comEmail, $comContent);

        }

        // affichage de la vue
        $chapitre = $this->chapitre->getChapitres();
        $vue = new Vue("Edit");
        $vue->generer(array());
    }

}
