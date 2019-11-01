<?php

require_once 'Modele/Chapitre.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/vue.php';

class ControleurChapitre {

  private $chapitre;
  private $commentaire;

  public function __construct() {
    $this->chapitre = new Chapitre();
    $this->commentaire = new Commentaire();
  }

  // Affiche les détails sur un chapitre
  public function chapitre($idChapitre) {
    $chapitre = $this->chapitre->getChapitre($idChapitre);
    $commentaires = $this->commentaire->getCommentaires($idChapitre);
    $vue = new Vue("Chapitre");
    $vue->generer(array('chapitre' => $chapitre, 'commentaires' => $commentaires));
  }

  // Ajoute un chapitre
  public function publier($title, $content, $add_date, $url_photo) {
    // Sauvegarde du chapitre
    $this->chapitre->ajouterChapitre($title, $content, $add_date, $url_photo);
    // Actualisation de l'affichage du dashboard
  }

  public function uploadFile($url_photo){
    $target_dir = "contenu/images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "Le fichier est une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "le fichier n'est pas une image";
            $uploadOk = 0;
        }
    }
  }

  // Ajoute un commentaire à un chapitre
  public function commenter($auteur, $contenu, $idChapitre) {
    // Sauvegarde du commentaire
    $this->commentaire->ajouterCommentaire($auteur, $contenu, $idChapitre);
    // Actualisation de l'affichage du chapitre
    //$this->chapitre($idChapitre);
  }
}
