<?php $this->titre = "Espace Administration"; ?>

<body id="top">
  	<section class="s-content dashboard-section">
		<?php
		include 'gabaritSidebar.php';
		?>
        
            <div class="col-10 background_area">
                
                    <div class="row row-dashboard">

                        <div class="col-12" id="box-dashboard">

                            <h4 class="title-dashboard"><i class="fas fa-comments"></i>Liste des commentaires (<?= $comments->rowCount(); ?>)</h4>

                            <div class="row">
                                <div class="col-12">

                                    <label>

                                    <div class="crud-block">
                                        <div class="col-3 table-comment">
                                            <p>Chapitre</p>
                                        </div>

                                        <div class="col-2 table-comment">
                                            <p>Auteur</p>
                                        </div>

                                        <div class="col-4 table-comment">
                                            <p>Content</p>
                                        </div>

                                        <div class="col-2 table-comment">
                                            <p>Date</p>
                                        </div>

                                        <div class="col-1 table-comment">
                                        </div>

                                    </div>                   
                                        
                                        <?php foreach ($comments as $comment): ?>
                                            <div class="crud-block">

                                                <div class="col-3 table-comment">
                                                    <p class="comment_list">Chapitre</p>
                                                </div>

                                                <div class="col-2 table-comment">
                                                    <p class="comment_list"><?= $comment['author']; ?></p>
                                                </div>

                                                <div class="col-4 table-comment">
                                                    <p class="comment_list"><?= $comment['content']; ?></p>
                                                </div>

                                                <div class="col-2 table-comment">
                                                    <p class="comment_list"><?= $comment['date']; ?></p>
                                                </div>

                                                <div class="col-1 table-comment">
                                                    <a href="index.php?action=supprimerCommentaire&id=<?=$chapitre['id'];?>" class="crud-link"><i class="fas fa-times"></i></a>
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
