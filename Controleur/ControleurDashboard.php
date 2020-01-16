<?php

require_once 'Modele/Chapitre.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/vue.php';

class ControleurDashboard
{
    private $chapitre;
    private $commentaire;

    /**définition de constante pour l'utilisation dans plusieurs fonciton*/
    const MAXSIZE = 5*1024*1024;

    public function __construct()
    {
        $this->chapitre = new Chapitre();
        $this->commentaire = new Commentaire();
    }

    /**
     * Affiche la liste de tous les chapitres du blog
     */
    public function dashboard()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit();
        }
        $errors=[];
        $form=[];
        $maxsize = 5 * 1024 * 1024;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['title'];
            if (empty($title)) {
                $errors['message']['title'] = 'Le titre ne doit pas être vide';
            }
            if (strlen($title)>100) {
                $errors['form']['title'] = 'Le titre ne doit pas être aussi long';
            } else {
                $form['title'] = $title;
            }

            $content = $_POST['content'];
            if (empty($content)) {
                $errors['message']['content'] = 'Le contenu ne doit pas être vide';
            } else {
                $form['content'] = $content;
            }
            
            $add_date = $_POST['add_date'];
            if (empty($add_date)) {
                $errors['message']['add_date'] = 'La date ne doit pas être vide';
            } else {
                $form['add_date'] = $add_date;
            }
            $filename = "";
            /**traitement d'un fichier a uplader*/
            /** Vérifie si le fichier a été uploadé sans erreur.*/
            if (isset($_FILES["url_photo"]) && $_FILES["url_photo"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "PNG" => "image/PNG");
                $filename = $_FILES["url_photo"]["name"];
                $filetype = $_FILES["url_photo"]["type"];
                $filesize = $_FILES["url_photo"]["size"];

                /** Vérifie l'extension du fichier*/
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) {
                    die("Erreur : Veuillez sélectionner un format de fichier valide.");
                }

                /** Vérifie la taille du fichier - 5Mo maximum*/
                if ($filesize > self::MAXSIZE) {
                    die("Erreur: La taille du fichier est supérieure à la limite autorisée.");
                }

                /** Vérifie le type MIME du fichier*/
                if (in_array($filetype, $allowed)) {
                    /**verifie si le fichier existe avant de le telecharger*/
                    if (file_exists("./contenu/upload/" . $_FILES["url_photo"]["name"])) {
                        die($_FILES["url_photo"]["name"] . "existe déjà.");
                    } else {
                        $filename = uniqid() . '.' . $ext;
                        move_uploaded_file($_FILES["url_photo"]["tmp_name"], "./contenu/upload/" .  $filename);
                    }
                } else {
                    die("Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.");
                }
            }
            if (empty($errors)) {
                $this->chapitre->addChapter($title, $content, $add_date, $filename);
                header("Location: index.php?action=chapterList");
            exit();
            }
            
        }

        /**affichage de la vue*/ 
        $chapters = $this->chapitre->getChapitres();
        $vue = new Vue("Dashboard");
        $vue->generer(array(
            'chapters' => $chapters,
            'errors' => $errors,
            'form' => $form
        ));
    }

    /** modifier un chapitre*/
    public function edit()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit();
        }

        $chapter_id = $_GET['id'];

        $errors=[];
        $form=[];
        $maxsize = 5 * 1024 * 1024;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['title'];
            if (empty($title)) {
                $errors['message']['title'] = 'Le titre ne doit pas être vide';
            }
            if (strlen($title)>100) {
                $errors['form']['title'] = 'Le titre est trop long';
            } else {
                $form['title'] = $title;
            }

            $content = $_POST['content'];
            if (empty($content)) {
                $errors['message']['content'] = 'Le contenu ne doit pas être vide';
            } else {
                $form['content'] = $content;
            }

            /**traitement d'un fichier a uplader*/
            /** Vérifie si le fichier a été uploadé sans erreur.*/
            if (isset($_FILES["url_photo"]) && $_FILES["url_photo"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "PNG" => "image/PNG");
                $filename = $_FILES["url_photo"]["name"];
                $filetype = $_FILES["url_photo"]["type"];
                $filesize = $_FILES["url_photo"]["size"];

                /** Vérifie l'extension du fichier*/
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) {
                    die("Erreur : Veuillez sélectionner un format de fichier valide.");
                }

                /** Vérifie la taille du fichier - 5Mo maximum*/
                if ($filesize > self::MAXSIZE) {
                    die("Erreur: La taille du fichier est supérieure à la limite autorisée.");
                }

                /** Vérifie le type MIME du fichier*/
                if (in_array($filetype, $allowed)) {
                    /**verifie si le fichier existe avant de le telecharger*/
                    if (file_exists("./contenu/upload/" . $_FILES["url_photo"]["name"])) {
                        die($_FILES["url_photo"]["name"] . "existe déjà.");
                    } else {
                        $filename = uniqid() . '.' . $ext;
                        move_uploaded_file($_FILES["url_photo"]["tmp_name"], "./contenu/upload/" .  $filename);
                    }
                    $this->chapitre->updateChapter($title, $content, $filename, $chapter_id);
                    die('Un chapitre a bien été modifié');
                } else {
                    die("Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.");
                }
            }
        }

        /** affichage de la vue*/
        $chapitre = $this->chapitre->getChapitre($chapter_id);
        $vue = new Vue("Edit");
        $vue->generer([
            'chapitre' => $chapitre,
            'errors' => $errors,
            'form' => $form
        ]);
    }

    /**déclenche la vue de la liste des chapitres*/
    public function chapterList()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit();
        }

        /** affichage de la vue*/
        $chapters = $this->chapitre->getChapitres();
        $vue = new Vue("ChapterList");
        $vue->generer(array(
            'chapters' => $chapters
        ));
    }

    /**Suppression d'un chapitre via la vueChapterList*/
    public function deleteChapter()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['deleteChapter'])) {
                $idChapitre = $_POST['id'];
                if ($this->chapitre->getChapitre($idChapitre)) {
                    $this->chapitre->deleteChapitre($idChapitre);
                }
            }
        }
        header("Location: index.php?action=chapterList");
        exit;
    }

    /**afficher la liste des commentaire signalé dans le vueComments*/ 
    public function commentsList()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit();
        }

        /**affichage de la vue*/ 
        $comments = $this->commentaire->getAllCommentaires();
        $vue = new Vue("Comments");
        $vue->generer(array(
            'comments' => $comments
        ));
    }

    /**autorisation de commentaire signalé via la page vueComments*/ 
    public function authorizeComment()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['authorizeComment'])) {
                $COM_ID = $_POST['comment_id'];
                if ($this->commentaire->getCommentaires($COM_ID)) {
                    $this->commentaire->autoriseCommentaire($COM_ID);
                }
            }
        }
        header("Location: index.php?action=comments");
        exit;
    }

    /**suppression de commentaire via la page vueComments*/ 
    public function deleteComment()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['supp'])) {
                $COM_ID = $_POST['comment_id'];
                if ($this->commentaire->getCommentaires($COM_ID)) {
                    $this->commentaire->deleteCommentaire($COM_ID);
                    $errors['massage']['supp'] = "Le commentaire de" . $COM_author . "a bien été supprimer";
                }
            }
        }
        header("Location: index.php?action=comments");
        exit;
    }
}
