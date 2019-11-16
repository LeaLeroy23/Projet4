<?php

require_once 'Modele/Modele.php';

class Chapitre extends Modele {

    // Renvoie la liste des chapitres du blog
    public function getChapitres() {
        $sql = 'select id, add_date, title, content from chapter'
          . ' order by id desc';
        $chapitres = $this->executerRequete($sql);
        return $chapitres;
    }

    // Renvoie la liste des 5 derniers chapitres du blog
    public function getChapitresLimit() {
        $sql = 'select id, add_date, title, content from chapter'
          . ' order by id desc LIMIT 0, 5';
        $chapitres = $this->executerRequete($sql);
        return $chapitres;
    }

    // Renvoie les informations sur un chapitre
    public function getChapitre($idChapitre) {
        $sql = 'select id, add_date, title, content from chapter'
          . ' where id=?';
        $chapitre = $this->executerRequete($sql, array($idChapitre));

      if ($chapitre->rowCount() == 1)
          return $chapitre->fetch();  // Accès à la première ligne de résultat

      else
          throw new Exception("Aucun chapitre ne correspond à l'identifiant '$idChapitre'");
      }

    // Ajoute un chapitre dans la base
    public function addChapter($title, $content, $add_date, $url_photo) {
        $sql = 'insert into chapter(title, content, add_date, url_photo)'
          . ' values(?, ?, ?, ?)';
        //$date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($title, $content, $add_date, $url_photo));
    }

    // Ajoute un chapitre dans la base
    public function updateChapter($title, $content, $add_date, $url_photo) {
        $sql = 'update into chapter(title, content, add_date, url_photo)'
          . ' values(?, ?, ?, ?)';
        //$date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($title, $content, $add_date, $url_photo));
    }
}
