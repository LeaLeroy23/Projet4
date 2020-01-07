<?php $this->titre = "Espace Administration"; ?>

<body id="top">
  	<section class="s-content dashboard-section">
		<?php
		include 'gabaritSidebar.php';
		?>
        
            <div class="col-10 background_area">
                
                    <div class="row row-dashboard">

                        <div class="col-12" id="box-dashboard">

                            <h4 class="title-dashboard"><i class="fas fa-comments"></i>Liste des commentaires signalés (<?= $comments->rowCount(); ?>)</h4>

                            <div class="row">
                                <div class="col-12">

                                    <label>

                                    <div class="crud-block">
                                        <div class="col-2 table-comment">
                                            <p>Chapitre</p>
                                        </div>

                                        <div class="col-2 table-comment">
                                            <p>Auteur</p>
                                        </div>

                                        <div class="col-5 table-comment">
                                            <p>Content</p>
                                        </div>


                                    </div>                   
                                       
                                        <?php foreach ($comments as $comment): ?>
                                         
                                        <div class="crud-block">
                                                <div class="col-2 table-comment">
                                                    <p class="comment_list">Chapitre <?= $comment['COM_chapter_id'];?></p>
                                                </div>

                                                <div class="col-2 table-comment">
                                                    <p class="comment_list"><?= $comment['author']; ?></p>
                                                </div>

                                                <div class="col-3 table-comment">
                                                    <p class="comment_list"><?= $comment['content']; ?></p>
                                                </div>

                                                <div class="col-2 table-comment">
                                                    <form method="POST" action="index.php?action=authorizeComment">
                                                        <input type='hidden' name="comment_id" value='<?= $comment['COM_ID']; ?>'>
                                                        <input type="submit" class="btn--primary" value="Autoriser" name="authorizeComment">
                                                    </form>
                                                </div>

                                                <div class="col-2 table-comment">
                                                    <form method="POST" action="index.php?action=deleteComment">
                                                        <input type='hidden' name="comment_id" value='<?= $comment['COM_ID']; ?>'>
                                                        <input type="submit" class="btn--primary" value="Supprimer" name="supp">
                                                        <?php if (isset($errors['message']['supp'])) {?>
                                                            <p class="success"><?=$errors['message']['supp'];?>
                                                        <?php }?>
                                                    </form>
                                                </div>

                                            </div>
                                                
                                        <?php endforeach; ?>
                                        
                                    </label>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        <!--fermeture des éléments appelé en include-->
        </div>
		
    </section>
</body>
