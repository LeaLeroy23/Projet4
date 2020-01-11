<?php

require_once 'Modele/Modele.php';

class Commentaire extends Modele
{

  /** Renvoie la liste des commentaires associés à un chapitre*/ 
    public function getCommentaires($idChapitre, $status = 1)
    {
        $sql = 'select id as id, date_com as date, author, email, content, chapter_id from comment where chapter_id=? AND status= ?';
		    $commentaires = $this->executerRequete($sql, array($idChapitre, $status));
        return $commentaires;
	}
	
	/** Ajoute un commentaire dans la base*/ 
	public function addComment($author, $email, $content, $idChapitre)
	{
		$sql = 'insert into comment(author, email, content, chapter_id, status) values(?, ?, ?, ?, ?)';
		$this->executerRequete($sql, array($author, $email, $content, $idChapitre, 1));
	}

	/**signalé un commentaire*/ 
	public function flagComment($COM_ID)
	{
		$sql = 'UPDATE comment SET status = "0" WHERE id = ?';
		$this->executerRequete($sql, array($COM_ID));
	}

	/**autoriser un commentaire signalé*/ 
	public function autoriseCommentaire($COM_ID)
	{
		$sql = 'UPDATE comment SET status = "1" WHERE id = ?';
		$this->executerRequete($sql, array($COM_ID));
	}
	
	/**recuperation des commentaires signalés pour tableau vueComments*/ 
  	public function getAllCommentaires()
  	{
		$sql = 'select id, date_com as date, author, email, content, chapter_id, status from comment where status=0';
		$commentaires = $this->executerRequete($sql);
		return $commentaires;
  	}

    /**suppression du commentaire*/ 
    public function deleteCommentaire($COM_ID)
    {
      $sql = 'DELETE FROM comment WHERE id=?';
      $this->executerRequete($sql, array($COM_ID));
    }
}
