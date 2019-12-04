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
        $errors=[];
        $form=[];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['commenter'])) {
                $author = $_POST['author'];
                if (empty($author)) {
                    $errors['message']['author'] = 'votre nom est vide';
                }
                if (strlen($author)>100) {
                    $errors['form']['author'] = 'votre nom est trop long';
                } else {
                }

                print_r($author);

                $email = $_POST['email'];
                if (empty($email)) {
                    $errors['message']['email'] = 'votre email est vide';
                }
                if (strlen($email)>100) {
                    $errors['form']['email'] = 'votre email est trop long';
                } else {
                }

                $content = $_POST['content'];
                if (empty($content)) {
                    $errors['message']['content'] = 'votre commentaire est vide';
                }
                if (strlen($content)>1000) {
                    $errors['form']['content'] = 'votre commentaire est trop long';
                } else {
                }

                $idChapitre = $_POST['id'];

                //echo 'votre commentaire a été mis en ligne';
                //$this->commentaire->addComment($author, $email, $content, $idChapitre);
            }
        }

        $chapitre = $this->chapitre->getChapitre($idChapitre);
        $commentaires = $this->commentaire->getCommentaires($idChapitre);
        $vue = new Vue("Chapitre");
        $vue->generer(array(
            'chapitre' => $chapitre, 
            'commentaires' => $commentaires,
            'errors' => $errors,
            'form' => $form
        ));
    }

    //Ajoute un chapitre
    public function ajouterChapitre($title, $content, $add_date, $url_photo)
    {
        // Sauvegarde du chapitre
        $this->chapitre->addChapter($title, $content, $add_date, $url_photo);
        // Actualisation de l'affichage du dashboard
    }

    //ajouter un commentaire
    public function commenter()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['commenter'])) {
                $author = $_POST['author'];
                if (empty($author)) {
                    $errors['message']['author'] = 'votre nom est vide';
                }
                if (strlen($author)>100) {
                    $errors['form']['author'] = 'votre nom est trop long';
                } else {
                }

                print_r($author);

                $email = $_POST['email'];
                if (empty($email)) {
                    $errors['message']['email'] = 'votre email est vide';
                }
                if (strlen($email)>100) {
                    $errors['form']['email'] = 'votre email est trop long';
                } else {
                }

                $content = $_POST['content'];
                if (empty($content)) {
                    $errors['message']['content'] = 'votre commentaire est vide';
                }
                if (strlen($content)>1000) {
                    $errors['form']['content'] = 'votre commentaire est trop long';
                } else {
                }

                $idChapitre = $_POST['id'];

                //echo 'votre commentaire a été mis en ligne';
                die();

                $this->commentaire->addComment($author, $email, $content, $idChapitre);
            }
        }

        $this->commentaire->addComment($author, $email, $content, $idChapitre);

        // Sauvegarde du commentaire
    }
}
