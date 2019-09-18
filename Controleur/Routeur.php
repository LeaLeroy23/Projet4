<?php
// require
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurChapitre.php';
require_once 'Controleur/ControleurConnexion.php';
require_once 'Controleur/ControleurDashboard.php';
require_once 'Controleur/ControleurContact.php';
require_once 'Vue/vue.php';

class Routeur {
    private $ctrlAccueil;
    private $ctrlChapitre;
    private $ctrlConnexion;
    private $ctrlDashboard;
    private $ctrlContact;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlChapitre = new ControleurChapitre();
        $this->ctrlConnexion = new ControleurConnexion();
        $this->ctrDashboard = new ControleurDashboard();
        $this->ctrContact = new ControleurContact();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'chapitre') {
                    $idChapitre = intval($this->getParametre($_GET, 'id'));
                    if ($idChapitre != 0) {
                        $this->ctrlChapitre->chapitre($idChapitre);
                    }
                    else
                        throw new Exception("Identifiant du Chapitre non valide");
                }
                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idChapitre = $this->getParametre($_POST, 'id');
                    $this->ctrlChapitre->commenter($auteur, $contenu, $idChapitre);
                }
                else
                    throw new Exception("Action non valide");
                }

                else if ($_GET['action'] == 'connexion'){

                }

                else if ($_GET['action'] == 'contact'){

                }


                else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        }

        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }
}
