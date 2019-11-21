<?php

require_once 'Modele/Modele.php';

class Commentaire extends Modele
{

  // Renvoie la liste des commentaires associés à un chapitre
    public function getCommentaires($idchapitre)
    {
        $sql = 'select COM_ID as id, COM_date, COM_author, COM_content from comment'
      . ' where id=?';
        $commentaires = $this->executerRequete($sql, array($idchapitre));
        return $commentaires;
    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($COM_author, $COM_content, $COM_date, $idchapitre)
    {
        $sql = 'insert into comment(COM_date, COM_author, COM_content, id)'
      . ' values(?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($COM_date, $COM_author, $COM_content, $idchapitre));
    }
}
