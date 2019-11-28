<?php

require_once 'Modele/Modele.php';

class Commentaire extends Modele
{

  // Renvoie la liste des commentaires associés à un chapitre
    public function getCommentaires($idchapitre)
    {
        $sql = 'select COM_ID as id, COM_author, COM_email, COM_content from comment'
      . ' where id=?';
        $commentaires = $this->executerRequete($sql, array($idchapitre));
        return $commentaires;
    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($COM_author, $COM_email, $COM_content)
    {
        $sql = 'insert into comment(COM_author, COM_email, COM_content)'
      . ' values(?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($COM_author, $COM_email, $COM_content));
    }
}
