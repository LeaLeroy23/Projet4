<?php $this->titre = "Espace Administration"; ?>

<body id="top">
  	<section class="s-content dashboard-section">
		<?php
		include 'gabaritSidebar.php';
		?>
        
            <div class="col-10 background_area">
                
                    <div class="row row-dashboard">

                        <div class="col-12" id="box-dashboard">

                            <h4 class="title-dashboard"><i class="fas fa-list-alt"></i>Liste des chapitres (<?= $chapters->rowCount(); ?>)</h4>

                            <div class="row">
                                <div class="col-12">

                                    <label>                   
                                        
                                        <?php foreach ($chapters as $chapter): ?>
                                            <div class="crud-block">

                                                <div class="col-6">
                                                    <a href="<?= "index.php?action=chapitre&id=" . $chapter['id']; ?>" class="crud-link">
                                                        <p><?= $chapter['title']; ?></p>
                                                    </a>
                                                </div>

                                                <div class="col-3">
                                                    <form method="POST" action="<?= "index.php?action=edit&id=" . $chapter['id']; ?>">
                                                        <input type="submit" class="btn--primary" name="editChapter" value="Modifier">
                                                    </form>
                                                </div>

                                                <div class="col-3">
                                                    <form method="POST" action="index.php?action=deleteChapter">
                                                        <input type='hidden' name="id" value='<?= $chapter['id']; ?>'>
                                                        <input type="submit" class="btn--primary" name="deleteChapter" value="Supprimer">
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
