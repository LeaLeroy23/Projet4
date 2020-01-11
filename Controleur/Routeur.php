<?php
/** require */
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurChapitre.php';
require_once 'Controleur/ControleurConnexion.php';
require_once 'Controleur/ControleurDashboard.php';
require_once 'Vue/vue.php';

class Routeur
{
    private $ctrlAccueil;
    private $ctrlChapitre;
    private $ctrlConnexion;
    private $ctrlDashboard;


    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlChapitre = new ControleurChapitre();
        $this->ctrlConnexion = new ControleurConnexion();
        $this->ctrlDashboard = new ControleurDashboard();
    }

    /**Route une requête entrante : exécution l'action associée*/
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'chapitre') {
                    $idChapitre = intval($this->getParametre($_GET, 'id'));
                    if ($idChapitre != 0) {
                        $this->ctrlChapitre->chapitre($idChapitre);
                    } else {
                        throw new Exception("Identifiant du Chapitre non valide");
                    }
                } elseif ($_GET['action'] == 'commenter') {
                    $this->ctrlChapitre->commenter();
                } elseif ($_GET['action'] == 'flagComment') {
                    $this->ctrlChapitre->flagComment();
                } elseif ($_GET['action'] == 'chapitres') {
                    $this->ctrlChapitre->chapitres();
                } elseif ($_GET['action'] == 'connexion') {
                    $this->ctrlConnexion->login();
                } elseif ($_GET['action'] == 'deconnexion') {
                    $this->ctrlConnexion->logout();
                } elseif ($_GET['action'] == 'dashboard') {
                    $this->ctrlDashboard->dashboard();
                } elseif ($_GET['action'] == 'chapterList') {
                    $this->ctrlDashboard->chapterList();
                } elseif ($_GET['action'] == 'edit') {
                    $this->ctrlDashboard->edit();
                } elseif ($_GET['action'] == 'deleteChapter') {
                    $this->ctrlDashboard->deleteChapter();
                } elseif ($_GET['action'] == 'comments') {
                    $this->ctrlDashboard->commentsList();
                } elseif ($_GET['action'] == 'authorizeComment') {
                    $this->ctrlDashboard->authorizeComment();
                } elseif ($_GET['action'] == 'deleteComment') {
                    $this->ctrlDashboard->deleteComment();
                } else {
                    throw new Exception("Action non valide");
                }
            } else {
                $this->ctrlAccueil->accueil();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }


    /** Affiche une erreur */

    private function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    /** Recherche un paramètre dans un tableau */
    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else {
            throw new Exception("Paramètre '$nom' absent");
        }
    }
}
