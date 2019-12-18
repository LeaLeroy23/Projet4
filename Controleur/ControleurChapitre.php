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
        $this->chapitres = new Chapitre();
        $this->commentaire = new Commentaire();
    }

     // Affiche la liste de tous les chapitres du blog
     public function chapitres()
     {
         $chapitres = $this->chapitres->getChapitres();
         $vue = new Vue("Chapitres");
         $vue->generer(array('chapitres' => $chapitres));
     }
 
     public static function excerpt($data, $endValue = 250, $beginValue = 0)
     {
         return substr($data, $beginValue, $endValue);
     }

    // Affiche les détails sur un chapitre
    public function chapitre($idChapitre)
    {
        // ajouter un commentaire
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
                    $form['author'] = $author;
                }

                $email = $_POST['email'];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['message']['email'] = "votre email n'est pas au bon format";
                }else {
                    $form['email'] = $email;
                }
                if (strlen($email)>100) {
                    $errors['form']['email'] = 'votre email est trop long';
                } else {
                    $form['email'] = $email;
                }

                $content = $_POST['content'];
                if (empty($content)) {
                    $errors['message']['content'] = 'votre commentaire est vide';
                }
                if (strlen($content)>1000) {
                    $errors['form']['content'] = 'votre commentaire est trop long';
                } else {
                    $form['content'] = $content;
                }

                $idChapitre = $_POST['id'];

                //$this->commentaire->addComment($author, $email, $content);

                if (empty($errors)){
                    $this->commentaire->addComment($author, $email, $content, $idChapitre);
                    $form = [];
                }
            }
            
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['flagComment'])) {
                /*echo '<pre>';
                print_r($_POST);
                die();*/
                $COM_ID = $_POST['comment_id'];
                $this->commentaire->flagComment($COM_ID);
                //$errors['form']['flagcomment'] = 'Ce commentaire a été signalé';
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

}
