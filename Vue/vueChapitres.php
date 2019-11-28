<!-- s-content
================================================== -->
<section class="s-content">

  <div class="container slidebar">

    <!--Début slider-->
      <div class="slider-chapitres">
        <img class="img-chapitres-slider" src="contenu/images/slider-chapitres-400.jpg" />
      </div>
    <!--fin slider-->
  </div>

<!--start foreach chapters-->
  <div class="row entries-wrap wide">

      <div class="entries">
        <?php foreach ($chapitres as $chapitre): ?>
            <article class="col-block">

              <div class="item-entry" style="width: 90%; margin: 0 auto; padding-bottom: 0;" data-aos="zoom-in">
                
                  <div class="item-entry__thumb">
                      <a href="#" class="item-entry__thumb-link"></a>
                  </div>

                  <div class="item-entry__title" style= "margin-bottom: 2rem;">
                    <a href="<?= "index.php?action=chapitre&id=" . $chapitre['id'] ?>">
                      <h2 class="titre-chapitre" style="font-size: 2.5rem;"><?= $chapitre['title'] ?></h2>
                    </a>

                      <div class="item-entry__cat" style="width: 90%; margin: 0 auto; border-top: 2px solid #6666;">

                        <p class="chapitre-text"><?= ControleurChapitres::excerpt($chapitre['content']); ?></p>

                        <p class="chapitre-date">Date de publication: <?= $chapitre['add_date']?></p>

                      </div>

                  </div>

              </div> <!-- item-entry -->

          </article> <!-- end article -->
          <?php endforeach; ?>


      </div> <!-- end entries -->

  </div> <!-- end foreach chapters-->


</section> <!-- end s-content -->
