<?php
// require
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurChapitre.php';
//require_once 'Controleur/ControleurChapitres.php'; /*pour l'affichage de la liste*/
require_once 'Controleur/ControleurConnexion.php';
require_once 'Controleur/ControleurDashboard.php';
require_once 'Controleur/ControleurContact.php';
require_once 'Vue/vue.php';

class Routeur
{
    private $ctrlAccueil;
    private $ctrlChapitre;
    //private $ctrlChapitres;
    private $ctrlConnexion;
    private $ctrlDashboard;
    private $ctrlContact;


    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlChapitre = new ControleurChapitre();
        //$this->ctrlChapitres = new ControleurChapitres();
        $this->ctrlConnexion = new ControleurConnexion();
        $this->ctrlDashboard = new ControleurDashboard();
        $this->ctrlContact = new ControleurContact();
    }

    // Route une requête entrante : exécution l'action associée
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
                } elseif ($_GET['action'] == 'contact') {
                    $this->ctrlContact->contact();
                } elseif ($_GET['action'] == 'connexion') {
                    $this->ctrlConnexion->connexion();
                } elseif ($_GET['action'] == 'dashboard') {
                    $this->ctrlDashboard->dashboard();
                } elseif ($_GET['action'] == 'chapterList') {
                    $this->ctrlDashboard->chapterList();
                } elseif ($_GET['action'] == 'edit') {
                    $this->ctrlDashboard->edit();
                }elseif ($_GET['action'] == 'comments') {
                    $this->ctrlDashboard->commentsList();
                }elseif ($_GET['action'] == 'deleteComment') {
                    $this->ctrlDashboard->deleteComment();
                }else {
                    throw new Exception("Action non valide");
                }
            } else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }


    // Affiche une erreur
    private function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else {
            throw new Exception("Paramètre '$nom' absent");
        }
    }
}
