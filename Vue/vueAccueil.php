    <!-- featured
    ================================================== -->

    <section class="s-featured">

        <div class="row">
            <div class="col-full">

                <div class="featured-slider featured" data-aos="zoom-in">


                  <?php foreach ($chapitres as $chapitre): ?>
                    <div class="featured__slide">

                        <div class="entry">

                            <div class="entry__background" style="background-image:url('contenu/images/alaska-chapt1.jpg');"></div>

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0"></a></span>

                                <h1><a href="<?= "index.php?action=chapitre&id=" . $chapitre['id'] ?>" title=""><?= $chapitre['title']?></a></h1>

                                <div class="entry__info">
                                    <a href="<?= "index.php?action=chapitre&id=" . $chapitre['id'] ?>" class="entry__profile-pic">
                                        <img class="avatar" src="contenu/images/avatars/user-03.jpg" alt="">
                                    </a>
                                    <ul class="entry__meta">
                                        <li>Jean Forteroche</a></li>
                                        <li><?= $chapitre['date']?></li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->



                        </div> <!-- end entry -->

                    </div> <!-- end featured__slide -->
                    <?php endforeach; ?>

                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div>
    </section> <!-- end s-featured -->


    <!-- s-content
    ================================================== -->
    <section class="s-content">

        <div class="row entries-wrap wide">

            <div class="entries">

                  <article class="col-block">


                    <div class="item-entry" data-aos="zoom-in">
                        <div class="item-entry__thumb">
                            <a href="#" class="item-entry__thumb-link"></a>
                        </div>

                        <div class="item-entry__title">
                          <h1>Biographie de Jean Forteroche</h1>

                            <div class="item-entry__cat" style="border-top: 2px solid #6666;">

                              <h3 class="title-bio">Ses Oeuvres</h3>

                                <p style="font-size: 1.6rem; padding: 15px; line-height: 25px;">
                                Jean Forteroche est un écrivain qui préfére s'inspirer de paysage à la limite du desertique.<br />
                                Vous connaissez sans doute une partie de ses oeuvres précédente "Voyage ay bout du Nepal", "Les allées du Nevada" et bien d'autres écrit qui lui ont voulu de nombreuses récompenses dans des compétition littéraire
                              </p>

                              <h3 class="title-bio">Son Histoire</h3>
                              <p style="font-size: 1.6rem; padding: 15px; line-height: 25px;">
                              Jean Forteroche est un écrivain qui préfére s'inspirer de paysage à la limite du desertique.<br />
                              Vous connaissez sans doute une partie de ses oeuvres précédente "Voyage ay bout du Nepal", "Les allées du Nevada" et bien d'autres écrit qui lui ont voulu de nombreuses récompenses dans des compétition littéraire
                              </p>

                            </div>

                        </div>

                    </div> <!-- item-entry -->


                </article> <!-- end article -->

            </div> <!-- end entries -->

        </div> <!-- end entries-wrap -->

    </section> <!-- end s-content -->
