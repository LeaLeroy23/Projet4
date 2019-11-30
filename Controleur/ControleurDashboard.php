<?php

require_once 'Modele/Chapitre.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/vue.php';

class ControleurDashboard
{
    private $chapitre;
    private $commentaire;

    //définition de constante pour l'utilisation dans plusieurs fonciton
    const MAXSIZE = 5*1024*1024;

    public function __construct()
    {
        $this->chapitre = new Chapitre();
        $this->commentaire = new Commentaire();
    }

    // Affiche la liste de tous les chapitres du blog
    public function dashboard()
    {
        //echo '<pre>';
        //print_r($_POST);
        $errors=[];
        $form=[];
        $maxsize = 5 * 1024 * 1024;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //le formulaire est posté
            //je traite les données
            $title = $_POST['title'];
            if (empty($title)) {
                $errors['message']['title'] = 'le titre est vide';
            }
            if (strlen($title)>100) {
                $errors['form']['title'] = 'le titre est trop long';
            } else {
            }

            $content = $_POST['content'];
            if (empty($content)) {
                $errors['message']['content'] = 'le contenu est vide';
            } else {
                $form['content'] = $content;
            }
            
            $add_date = $_POST['add_date'];

            //traitement d'un fichier a uplader
            // Vérifie si le fichier a été uploadé sans erreur.
            if (isset($_FILES["url_photo"]) && $_FILES["url_photo"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "PNG" => "image/PNG");
                $filename = $_FILES["url_photo"]["name"];
                $filetype = $_FILES["url_photo"]["type"];
                $filesize = $_FILES["url_photo"]["size"];

                // Vérifie l'extension du fichier
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) {
                    die("Erreur : Veuillez sélectionner un format de fichier valide.");
                }

                // Vérifie la taille du fichier - 5Mo maximum
                if ($filesize > self::MAXSIZE) {
                    die("Erreur: La taille du fichier est supérieure à la limite autorisée.");
                }

                // Vérifie le type MIME du fichier
                if (in_array($filetype, $allowed)) {
                    //verifie si le fichier existe avant de le telecharger
                    //if(file_exists($_SERVER['REMOTE_HOST'] . DIRECTORY_SEPARATOR . 'upload'. DIRECTORY_SEPARATOR . 'contenu' . DIRECTORY_SEPARATOR))
                    if (file_exists("./contenu/upload/" . $_FILES["url_photo"]["name"])) { //$_SERVER['REMOTE_HOST'] DIRECTORY_SEPARATOR
                        echo $_FILES["url_photo"]["name"] . "existe déjà.";
                    } else {
                        $filename = uniqid() . '.' . $ext;
                        move_uploaded_file($_FILES["url_photo"]["tmp_name"], "./contenu/upload/" .  $filename);
                        //echo "votre fichier a été télécharger avec succès";
                    }
                    $this->chapitre->addChapter($title, $content, $add_date, $filename);
                    echo 'Un chapitre a bien été ajouter au site';
                } else {
                    echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
                }
            }
        }

        // affichage de la vue
        $chapters = $this->chapitre->getChapitres();
        $vue = new Vue("Dashboard");
        $vue->generer(array(
            'chapters' => $chapters,
            'errors' => $errors,
            'form' => $form
        ));
    }

    public function chapterList()
    {
        // affichage de la vue
        $chapters = $this->chapitre->getChapitres();
        $vue = new Vue("ChapterList");
        $vue->generer(array(
            'chapters' => $chapters
        ));
    }

    // modifier un chapitre
    public function edit()
    {
        $errors=[];
        $form=[];
        $maxsize = 5 * 1024 * 1024;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['title'];
            if (empty($title)) {
                $errors['message']['title'] = 'le titre est vide';
            }
            if (strlen($title)>100) {
                $errors['form']['title'] = 'le titre est trop long';
            } else {
            }

            $content = $_POST['content'];
            if (empty($content)) {
                $errors['message']['content'] = 'le contenu est vide';
            } else {
                $form['content'] = $content;
            }

            // Vérifie si le fichier a été uploadé sans erreur.
            if (isset($_FILES["url_photo"]) && $_FILES["url_photo"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "PNG" => "image/PNG");
                $filename = $_FILES["url_photo"]["name"];
                $filetype = $_FILES["url_photo"]["type"];
                $filesize = $_FILES["url_photo"]["size"];

                // Vérifie l'extension du fichier
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) {
                    die("Erreur : Veuillez sélectionner un format de fichier valide.");
                }

                // Vérifie la taille du fichier - 5Mo maximum
                if ($filesize > self::MAXSIZE) {
                    die("Erreur: La taille du fichier est supérieure à la limite autorisée.");
                }

                // Vérifie le type MIME du fichier
                if (in_array($filetype, $allowed)) {
                    //verifie si le fichier existe avant de le telecharger
                    //if(file_exists($_SERVER['REMOTE_HOST'] . DIRECTORY_SEPARATOR . 'upload'. DIRECTORY_SEPARATOR . 'contenu' . DIRECTORY_SEPARATOR))
                    if (file_exists("./contenu/upload/" . $_FILES["url_photo"]["name"])) { //$_SERVER['REMOTE_HOST'] DIRECTORY_SEPARATOR
                        echo $_FILES["url_photo"]["name"] . "existe déjà.";
                    } else {
                        $filename = uniqid() . '.' . $ext;
                        move_uploaded_file($_FILES["url_photo"]["tmp_name"], "./contenu/upload/" .  $filename);
                        //echo "votre fichier a été télécharger avec succès";
                    }
                    $this->chapitre->updateChapter($title, $content, $filename);
                    echo 'Un chapitre a bien été mis à jour au site';
                } else {
                    echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
                }
            }

        }

        $chapter_id = $_GET['id'];
        // affichage de la vue
        $chapitre = $this->chapitre->getChapitre($chapter_id);
        $vue = new Vue("Edit");
        $vue->generer([
            'chapitre' => $chapitre,
            'errors' => $errors,
            'form' => $form
        ]);
    }

    public function comments()
    {
        // affichage de la vue
        $comments = $this->commentaire->getCommentaires();
        $vue = new Vue("Comments");
        $vue->generer(array(
            'comment' => $comment
        ));
    }
}