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
        if (isset($_POST['chapter'])) {
        //créer un tableau $errors
        // le formulaire est posté
        // je traite les données
            $title = $_POST['title'];
            // si title vide ou n'a pas la longueur -> $errors['title'] = 'vide ou pas la bonne longueur'
             $content = $_POST['content'];
              $add_date = $_POST['add_date'];

              //traitement d'un fichier a uplader
              // Vérifie si le fichier a été uploadé sans erreur.
              if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
                $filename = $_FILES["photo"]["name"];
                $filetype = $_FILES["photo"]["type"];
                $filesize = $_FILES["photo"]["size"];
              }
              echo '<pre>';
              print_r($_POST);
              print_r($_FILES);
              die();
                  // traitement de formulaire photo, extention, error=0
                  // genere un nom unique et on lui ajoute l'extension

                  // if
                  //$this->ctrlChapitre->publier($title, $content, $add_date, $url_photo);
                  // move_upload_files fichier tmp -> images/nom du fichier generé
                  // else erreur impossible de poster l'article
        }
    $chapters = $this->chapitre->getChapitres();
    $vue = new Vue("Dashboard");
    $vue->generer(array('chapters' => $chapters));
  }


}
