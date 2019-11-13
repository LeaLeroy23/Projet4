<?php $this->titre = "Espace Administration"; ?>

<body id="top">

    <section class="s-content dashboard-section">
      <div class="col-lg-12 bloc-dash">

        <div class="col-2 col-nav">
          <div class="column">
            <nav class="nav-dashboard">
              <ul class="summary">
                <li class="li-dashboard"><a href="#dashboard" class="intern-link-dashboard">Dashboard</a></li>
                <li class="li-dashboard"><a href="#chapitres" class="intern-link-dashboard">Chapitres</a></li>
                <li class="li-dashboard"><a href="" class="intern-link-dashboard">Modification</a></li>
              </ul>
            </nav>
          </div>
        </div>
        
        <div class="col-10">
          <div class="container-dashboard" id="dashboard">

              <div class="row row-dashboard">

                <div class="col-12 box-dashboard" id="box-dashboard">

                  <?php /*echo '<pre>';
                  print_r($_POST);
                  print_r($errors['message']);
                  print_r($form);
                  echo '</pre>';*/?>
                    <form method="POST" action="index.php?action=dashboard" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="chapter" value="add" />
                    <h4 class="title-dashboard"><i class="fas fa-pen"></i>Ecrire un Chapitre</h4>
                        <div class="col-12">
                          <input type="text" id="form-writting" name="title" placeholder="Titre" value='<?= isset($title) ? $title : '' ?>'>
                              <?php if (isset($errors['message']['title'])) { ?>
                                <div class="error">
                                  <p>Le titre ne doit pas être vide et doit comporter au maximum 100 caractères </p>
                                </div>
                              <?php } if (isset($errors['form']['title'])) {?>
                                <div class="errors">
                                  <p>Le titre à une taille supérieur à 100 caractères</p>
                                </div>
                              <?php } ?>
                          <textarea id="form-writting" name="content" placeholder="Contenu"><?= isset($form['content']) ? $form['content'] : '' ?></textarea>
                          <?php if (isset($errors['message']['content'])) { ?>
                            <div class="errors">
                              <p>Le contenu ne doit pas être vide</p>
                            </div>
                          <?php } if (isset($errors['form']['content'])) {?>
                            <div class="errors">
                              <p>Le contenu ne doit pas dépasser 2000 caractères</p>
                            </div>
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

              <div class="row row-dashboard">

                <div class="col-12" id="box-dashboard">
                  <h4 class="title-dashboard"><i class="fas fa-list-alt"></i>Liste des chapitres (<?= $chapters->rowCount(); ?>)</h4>

                  <div class="row">
                    <div class="col-12">
                      <label>                   
                          
                              <?php foreach ($chapters as $chapter): ?>
                                  <p><a href=""><?= $chapter['title']; ?></a></p>
                              <?php endforeach; ?>
                          
                      </label>
                    </div>
                  </div>

                </div>

              </div>

          </div>
        </div>

        
      </div>
    </section>
</body>
