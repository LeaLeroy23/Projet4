<?php $this->titre = "Espace Administration / Edition"; ?>

<body id="top">
    <section class="s-content dashboard-section">
        <?php
        include 'gabaritSidebar.php';
        ?>

            <div class="col-10">
                <div class="container-dashboard" id="dashboard">

                    <div class="row row-dashboard">

                        <div class="col-12 box-dashboard" id="box-dashboard">

                            <form method="POST" action="index.php?action=dashboard" enctype="multipart/form-data" novalidate>

                            <input type="hidden" name="chapter" value="add" />

                            <h4 class="title-dashboard"><i class="fas fa-pen"></i>Modification d'un chapitre</h4>

                                <div class="col-12">
                                    <input type="text" id="form-writting" name="title" placeholder="Titre" value=''><?= $chapter['title'];?>


                                    <textarea id="form-writting" name="content" placeholder="Contenu"> <?= $chapter['content'];?> </textarea>

                                    <div class="col-4">
                                        <input type="date" name="add_date">
                                    </div>

                                    <div class="col-4">
                                        <input type="file" name="url_photo" id="url_photo">
                                    </div>

                                        <input type="submit" id="form-updating" value="mettre à jour">
                                </div>
                                
                            </form>
                        
                        </div>

                    </div>

                </div>
            </div>

        
        </div>
    </section>

</body>
