<?php

require_once 'Modele.php';

class Chapitre extends Modele
{

    // Renvoie la liste des chapitres du blog
    public function getChapitres()
    {
        $sql = 'select id, add_date, title, content, url_photo from chapter'
          . ' order by id desc';
        $chapitres = $this->executerRequete($sql);
        return $chapitres;
    }

    // Renvoie la liste des 5 derniers chapitres du blog
    public function getChapitresLimit()
    {
        $sql = 'select id, add_date, title, content, url_photo from chapter order by id desc LIMIT 0, 5';
        $chapitres = $this->executerRequete($sql);
        return $chapitres;
    }

    // Renvoie les informations sur un chapitre
    public function getChapitre($idChapitre)
    {
        $sql = 'select id, add_date, title, content, url_photo from chapter'
          . ' where id=?';
        $chapitre = $this->executerRequete($sql, array($idChapitre));

        if ($chapitre->rowCount() == 1) {
            return $chapitre->fetch();
        }  // Accès à la première ligne de résultat

        else {
            throw new Exception("Aucun chapitre ne correspond à l'identifiant '$idChapitre'");
        }
    }

    // Ajoute un chapitre dans la base
    public function addChapter($title, $content, $add_date, $url_photo)
    {
        $sql = 'insert into chapter(title, content, add_date, url_photo)'
          . ' values(?, ?, ?, ?)';
        $this->executerRequete($sql, array($title, $content, $add_date, $url_photo));
    }

    // modififcation d'un chapitre dans la base
    public function updateChapter($title, $content, $url_photo, $idChapitre)
    {
        $sql = "UPDATE chapter SET title = ?, content = ?, url_photo= ? WHERE id=?";
        $this->executerRequete($sql, array($title, $content, $url_photo, $idChapitre));
    }

    public function deleteChapitre($idChapitre)
    {
        $sql = "DELETE FROM chapter WHERE id=?";
        $this->executerRequete($sql, array($idChapitre));
    }
    
}
