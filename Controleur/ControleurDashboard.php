<?php

require_once 'Modele/Chapitre.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/vue.php';

class ControleurDashboard {

    private $chapitre;
    private $commentaire;

    //définition de constante pour l'utilisation dans plusieurs fonciton
    const MAXSIZE = 5*1024*1024;

    public function __construct() {
        $this->chapitre = new Chapitre();
    }

    //Affiche les détails sur un chapitre
    public function modification($idChapitre){
        $chapitre = $this->chapitre->getChapitre($idChapitre);
        $commentaires = $this->commentaire->getCommentaire($idChapitre);
        $vue = new Vue("modification");
        $vue->generer(array('chapitre' => $chapitre, 'commentaires' => $commentaires));
    }

    // Affiche la liste de tous les chapitres du blog
    public function dashboard() {
        //echo '<pre>';
        //print_r($_POST);
        $errors=[];
        $form=[];
        $maxsize = 5 * 1024 * 1024;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //le formulaire est posté
        //je traite les données
            $title = $_POST['title'];
            if(empty($title)){
                $errors['message']['title'] = 'le titre est vide';
            } if (strlen($title)>100){
                $errors['form']['title'] = 'le titre est trop long';
            } else {
                
            }

            $content = $_POST['content'];
            if(empty($content)){
                $errors['message']['content'] = 'le contenu est vide';
            } else {
                $form['content'] = $content;
            }
            
            $add_date = $_POST['add_date'];

            //traitement d'un fichier a uplader
            // Vérifie si le fichier a été uploadé sans erreur.
            if(isset($_FILES["url_photo"]) && $_FILES["url_photo"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
                $filename = $_FILES["url_photo"]["name"];
                $filetype = $_FILES["url_photo"]["type"];
                $filesize = $_FILES["url_photo"]["size"];

                // Vérifie l'extension du fichier
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                // Vérifie la taille du fichier - 5Mo maximum
                if($filesize > self::MAXSIZE) die("Erreur: La taille du fichier est supérieure à la limite autorisée.");

                // Vérifie le type MIME du fichier
                if(in_array($filetype, $allowed)){
                    //verifie si le fichier existe avant de le telecharger
                    //if(file_exists($_SERVER['REMOTE_HOST'] . DIRECTORY_SEPARATOR . 'upload'. DIRECTORY_SEPARATOR . 'contenu' . DIRECTORY_SEPARATOR))
                    if(file_exists("./contenu/upload/" . $_FILES["url_photo"]["name"])){ //$_SERVER['REMOTE_HOST'] DIRECTORY_SEPARATOR
                        echo $_FILES["url_photo"]["name"] . "existe déjà.";
                    } else {
                        //$chapitre = $this->chapitre->getChapitres();
                        move_uploaded_file($_FILES["url_photo"]["tmp_name"], "./contenu/upload/" .  uniqid() . '.' . $ext);
                        echo "votre fichier a été télécharger avec succès";
                    }
                } else{
                    echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
                }

            }
        } /*else {
            $this->chapitre->addChapter($title, $content, $add_date, $url_photo);
        }*/

        // affichage de la vue
        $chapters = $this->chapitre->getChapitres();
        $vue = new Vue("Dashboard");
        $vue->generer(array(
            'chapters' => $chapters,
            'errors' => $errors,
            'form' => $form
        ));
    }


    public function edit(){
        if(isset($_POST['update'])){
            $title=$_POST['title'];
            $content=$_POST['content'];
            $add_date=$_POST['add_date'];
            $url_photo=$_POST['url_photo'];
        } else{
            $this->chapitre->updateChapitre($title, $contenu, $add_date, $url_photo);
            echo 'Le chapitre à bien été mis à jour';
        }

        // affichage de la vue
        $chapters = $this->chapitre->getChapitres();
        $vue = new Vue("edit");
        $vue->generer(array(
            /*'chapters' => $chapters,
            'errors' => $errors,
            'form' => $form*/
        ));

    }

    public function delete(){
        
    }
}