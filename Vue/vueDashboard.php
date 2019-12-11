<?php $this->titre = "Espace Administration"; ?>

<body id="top">
  	<section class="s-content dashboard-section">
		<?php
		include 'gabaritSidebar.php';
		?>
        
            <div class="col-10 background_area">
                <div class="container-dashboard" id="dashboard">

                    <div class="row row-dashboard">

                        <div class="col-12 box-dashboard" id="box-dashboard">

                            <form method="POST" action="index.php?action=dashboard" enctype="multipart/form-data" novalidate>

                                <input type="hidden" name="chapter" value="add" />

                                    <h4 class="title-dashboard"><i class="fas fa-pen"></i>Ecrire un Chapitre</h4>

                                    <!--Formulaire de redaction d'un chapitre-->
                                    <div class="col-12">
                                      <input type="text" id="form-writting" name="title" placeholder="Titre" value='<?= isset($form['title']) ? $form['title'] : '' ?>'>
                                          <?php if (isset($errors['message']['title'])) { ?>
                                              <p class="errors"><?= $errors['message']['title'] ?></p>
                                          <?php } if (isset($errors['form']['title'])) {?>
                                              <p class="errors"><?php $errors['form']['title']; ?></p>
                                          <?php } ?>
                                      <textarea id="form-writting" name="content" placeholder="Contenu"><?= isset($form['content']) ? $form['content'] : '' ?></textarea>
                                      <?php if (isset($errors['message']['content'])) { ?>
                                          <p class="errors"><?= $errors['message']['content']; ?></p>
                                      <?php } if (isset($errors['form']['content'])) {?>
                                          <p class="errors"><?= $errors['form']['content']; ?></p>
                                      <?php } ?>
                                        <div class="col-4">
                                          <input type="date" name="add_date">
                                        </div>
                                        <div class="col-4">
                                          <input type="file" name="url_photo" id="url_photo">
                                        </div>
                                          <input type="submit" id="form-writting" value="Publier">
                                    </div>
                                    <!--Fin -- Formulaire de redaction d'un chapitre-->
                                
                            </form>
                          
                        </div>

                    </div>

                    

                </div>
            </div>

        <!--fermeture des éléments appelé en include-->
        </div>
		
    </section>
</body>
