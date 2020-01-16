<?php $this->titre = "Espace Administration / Edition"; ?>

<body id="top">
    <section class="s-content dashboard-section">
        <?php
            include 'gabaritSidebar.php';
        ?>

            <div class="col-10 background_area">
                <div class="container-dashboard" id="dashboard">

                    <div class="row row-dashboard">

                        <div class="col-12 box-dashboard" id="box-dashboard">

                            <form method="POST" action="<?= "index.php?action=edit&id=" . $chapitre['id']; ?>" enctype="multipart/form-data">

                            <input type="hidden" name="chapter" value="update" />
                            <input type="hidden" name="chapter_id" value="<?php $chapitre['id']; ?>" />

                            <h4 class="title-dashboard"><i class="fas fa-pen"></i>Modification d'un chapitre</h4>

                                <div class="col-12">
                                    <input type="text" id="form-title" name="title" placeholder="Titre" value='<?= $chapitre['title'];?>'>
                                    <?php if (isset($errors['message']['title'])) { ?>
                                        <p class="errors">Le titre ne doit pas être vide et doit comporter au maximum 100 caractères </p>
                                    <?php } if (isset($errors['form']['title'])) {?>
                                        <p class="errors">Le titre à une taille supérieur à 100 caractères</p>
                                    <?php } ?>

                                    <textarea id="form-writting" class="w100" name="content" placeholder="Contenu"><?= $chapitre['content'];?></textarea>
                                    <?php if (isset($errors['message']['content'])) { ?>
                                        <p class="errors">Le contenu ne doit pas être vide</p>
                                    <?php } if (isset($errors['form']['content'])) {?>
                                        <p class="errors">Le contenu ne doit pas dépasser 2000 caractères</p>
                                    <?php } ?>

                                    <div class="col-4 form-box">
                                        <input type="file" name="url_photo" id="url_photo" placeholder="<?= $chapitre['url_photo'];?>">
                                    </div>

                                        <input type="submit" class="w100" value="mettre à jour">
                                </div>
                                
                            </form>
                        
                        </div>

                    </div>

                </div>
            </div>

        
        </div>
    </section>
    <script>
        tinymce.init({
        selector: '#form-writting',
                                                
        }); 
    </script>
</body>
