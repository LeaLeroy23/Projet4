<?php $this->titre = "Espace Administration / Edition"; ?>

    <?php
    include 'gabaritSidebar.php';
    ?>

            <div class="col-10">
                <div class="container-dashboard" id="dashboard">

                    <div class="row row-dashboard">

                        <div class="col-12 box-dashboard" id="box-dashboard">

                            <form method="POST" action="index.php?action=dashboard" enctype="multipart/form-data" novalidate>

                            <input type="hidden" name="chapter" value="add" />
                            <h4 class="title-dashboard"><i class="fas fa-pen"></i>Ecrire un Chapitre</h4>

                                <div class="col-12">
                                    <input type="text" id="form-writting" name="title" placeholder="Titre" value='<?= isset($title) ? $title : '' ?>'>

                                        <?php if (isset($errors['message']['title'])) { ?>
                                            <p class="errors">Le titre ne doit pas être vide et doit comporter au maximum 100 caractères </p>
                                        <?php } if (isset($errors['form']['title'])) {?>
                                            <p class="errors">Le titre à une taille supérieur à 100 caractères</p>
                                        <?php } ?>

                                    <textarea id="form-writting" name="content" placeholder="Contenu"><?= isset($form['content']) ? $form['content'] : '' ?></textarea>
                                        <?php if (isset($errors['message']['content'])) { ?>
                                            <p class="errors">Le contenu ne doit pas être vide</p>
                                        <?php } if (isset($errors['form']['content'])) {?>
                                            <p>Le contenu ne doit pas dépasser 2000 caractères</p>
                                        <?php } ?>

                                    <div class="col-4">
                                        <input type="date" name="add_date" required pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}">
                                    </div>

                                    <div class="col-4">
                                        <input type="file" name="url_photo" id="url_photo">
                                    </div>

                                        <input type="submit" id="form-writting" value="Publier">
                                </div>
                                
                            </form>
                        
                        </div>

                    </div>

                </div>
            </div>

        
        </div>
    </section>
</body>
