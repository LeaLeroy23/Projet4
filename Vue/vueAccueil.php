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
                                <span class="entry__category"><a href="#0"><?= $chapitre['id']; ?></a></span>

                                <h1><a href="<?= "index.php?action=chapitre&id=" . $chapitre['id'] ?>" title=""><?= $chapitre['titre']?></a></h1>

                                <div class="entry__info">
                                    <a href="<?= "index.php?action=chapitre&id=" . $chapitre['id'] ?>" class="entry__profile-pic">
                                        <img class="avatar" src="contenu/images/avatars/user-03.jpg" alt="">
                                    </a>
                                    <ul class="entry__meta">
                                        <li><a href="#0"> Jean Forteroche</a></li>
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
                            <a href="single-standard.html" class="item-entry__thumb-link"></a>
                        </div>

                        <div class="item-entry__text">
                          <h3><?= $chapitre['titre']; ?></h3>

                            <div class="item-entry__cat" style="border-top: 2px solid #6666;">
                              <p style="font-size: 1.5rem;"><?= $chapitre['contenu']; ?></p>
                            </div>

                            <h1 class="item-entry__title"><a href="single-standard.html">Lire plus</a></h1>

                            <div class="item-entry__date">
                                <a href=""></a>
                            </div>
                        </div>

                    </div> <!-- item-entry -->


                </article> <!-- end article -->

            </div> <!-- end entries -->

        </div> <!-- end entries-wrap -->

    </section> <!-- end s-content -->
