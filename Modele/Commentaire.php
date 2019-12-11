<?php

require_once 'Modele/Modele.php';

class Commentaire extends Modele
{

  // Renvoie la liste des commentaires associés à un chapitre
    public function getCommentaires($idChapitre)
    {
        $sql = 'select COM_ID as id, COM_date as date, COM_author as author, COM_email as email, COM_content as content from comment'
      . ' where id=?';
        $commentaires = $this->executerRequete($sql, array($idChapitre));
        return $commentaires;
    }

    public function getAllCommentaires()
    {
        $sql = 'select COM_ID, COM_date as date, COM_author as author, COM_email as email, COM_content as content, COM_chapter_id from comment'; /*where = status 0*/
        $commentaires = $this->executerRequete($sql);
        return $commentaires;
    }

    // Ajoute un commentaire dans la base
    public function addComment($author, $email, $content, $idChapitre)
    {
       	$sql = 'insert into comment(COM_author, COM_email, COM_content, COM_chapter_id, COM_status)' . 'values(?, ?, ?, ?, ?)';
        //$date = ;  //Récupère la date courante
		$this->executerRequete($sql, array($author, $email, $content, $idChapitre, '1'));
		//return $commentaires;
    }

    //suppression du commentaire
    public function deleteCommentaire($COM_ID)
    {
      $sql = 'DELETE FROM comment WHERE COM_ID=?';
      $this->executerRequete($sql, array($COM_ID));
    }
}
