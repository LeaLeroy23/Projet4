<?php

require_once 'Modele/Chapitre.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/vue.php';

class ControleurDashboard {

    private $chapitre;
    private $commentaire;

    public function __construct() {
        $this->chapitre = new Chapitre();
    }

    //Affiche les détails sur un chapitre
    public function modification($idChapitre){
        $chapitre = $this->chapitre->getChapitre($idChapitre);
        $commentaires = $this->commentaire->getVommentaire($idChapitre);
        $vue = new Vue("modification");
        $vue->generer(array('chapitre' => $chapitre, 'commentaires' => $commentaires));
    }

    // Affiche la liste de tous les chapitres du blog
    public function dashboard() {
        //echo '<pre>';
        //print_r($_POST);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //créer un tableau $errors
        //le formulaire est posté
        //je traite les données
            $title = $_POST['title'];
            // si title vide ou n'a pas la longueur -> $errors['title'] = 'vide ou pas la bonne longueur'
            $content = $_POST['content'];
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
                $maxsize = 5 * 1024 * 1024;
                if($filesize > $maxsize) die("Erreur: La taille du fichier est supérieure à la limite autorisée.");

                // Vérifie le type MIME du fichier
                if(in_array($filetype, $allowed)){
                    //verifie si le fichier existe avant de le telecharger
                    if(file_exists("upload/" . $_FILES["url_photo"]["name"])){
                        echo $_FILES["url_photo"]["name"] . "existe déjà.";
                    } else {
                        move_uploaded_file($_FILES["url_photo"]["tmp_name"], "upload/" .$_FILES["url_photo"]["name"]);
                        echo "votre fichier a été télécharger avec succès";
                    }
                } else{
                    echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
                }
            }
                         
                  // traitement de formulaire photo, extention, error=0
                  // genere un nom unique et on lui ajoute l'extension

                  // if
                  //$this->ctrlChapitre->publier($title, $content, $add_date, $url_photo);
                  // move_upload_files fichier tmp -> images/nom du fichier generé
                  // else erreur impossible de poster l'article
        }
    

    // affichage de la vue
    $chapters = $this->chapitre->getChapitres();
    $vue = new Vue("Dashboard");
    $vue->generer(array('chapters' => $chapters));
  }
}