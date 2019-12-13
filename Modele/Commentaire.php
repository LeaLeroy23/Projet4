<?php

require_once 'Modele/Modele.php';

class Commentaire extends Modele
{

  // Renvoie la liste des commentaires associés à un chapitre
    public function getCommentaires($idChapitre)
    {
        $sql = 'select COM_ID as id, COM_date as date, COM_author as author, COM_email as email, COM_content as content, COM_chapter_id from comment where COM_chapter_id=?';
		$commentaires = $this->executerRequete($sql, array($idChapitre));
        return $commentaires;
	}
	
	// Ajoute un commentaire dans la base
	public function addComment($author, $email, $content, $idChapitre)
	{
		$sql = 'insert into comment(COM_author, COM_email, COM_content, COM_chapter_id, COM_status) values(?, ?, ?, ?, ?)';
		$this->executerRequete($sql, array($author, $email, $content, $idChapitre, 0));
		//return $commentaires;
	}

	//signalé un commentaire
	public function flagComment($COM_ID){
		$sql = 'UPDATE comment SET COM_status = ? WHERE COM_ID = ?';
		echo 'la connexion est faite';
		$this->executerRequete($sql, array('1', $COM_ID));
		echo 'la connexion est fini';
	}
	

    public function getAllCommentaires()
    {
        $sql = 'select COM_ID, COM_date as date, COM_author as author, COM_email as email, COM_content as content, COM_chapter_id, COM_status from comment where COM_status=0';
        $commentaires = $this->executerRequete($sql);
        return $commentaires;
    }

    //suppression du commentaire
    public function deleteCommentaire($COM_ID)
    {
      $sql = 'DELETE FROM comment WHERE COM_ID=?';
      $this->executerRequete($sql, array($COM_ID));
    }
}
