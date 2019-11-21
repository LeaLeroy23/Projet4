<?php

require_once 'Modele/Chapitre.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/vue.php';

class ControleurChapitre
{
    private $chapitre;
    private $commentaire;

    public function __construct()
    {
        $this->chapitre = new Chapitre();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un chapitre
    public function chapitre($idChapitre)
    {
        $chapitre = $this->chapitre->getChapitre($idChapitre);
        $commentaires = $this->commentaire->getCommentaires($idChapitre);
        $vue = new Vue("Chapitre");
        $vue->generer(array('chapitre' => $chapitre, 'commentaires' => $commentaires));
    }

    //Ajoute un chapitre
    public function ajouterChaptire($title, $content, $add_date, $url_photo)
    {
        // Sauvegarde du chapitre
        $this->chapitre->addChapter($title, $content, $add_date, $url_photo);
        // Actualisation de l'affichage du dashboard
    }

    // Ajoute un commentaire à un chapitre
    public function addComment($COM_author, $COM_content, $COM_date, $idChapitre)
    {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($COM_author, $COM_content, $COM_date, $idChapitre);
    }
}
