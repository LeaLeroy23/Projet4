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
                            <a href="single-standard.html" class="item-entry__thumb-link">
                                <img src="contenu/images/thumbs/post/lamp-400.jpg"
                                     srcset="contenu/images/thumbs/post/lamp-400.jpg 1x, contenu/images/thumbs/post/lamp-800.jpg" alt="">
                            </a>
                        </div>

                        <?php foreach ($chapitres as $chapitre): ?>

                        <div class="item-entry__text">

                            <div class="item-entry__cat">
                                <!--<a href="category.html">Design</a>-->
                            </div>

                            <h1 class="item-entry__title"><a href="single-standard.html"><?= $chapitre['titre']?></a></h1>

                            <div class="item-entry__date">
                                <a href="<?= "index.php?action=chapitre&id=" . $chapitre['id'] ?>"><?= $chapitre['date']?></a>
                            </div>
                        </div>

                    </div> <!-- item-entry -->
                    <?php endforeach; ?>

                </article> <!-- end article -->

            </div> <!-- end entries -->

        </div> <!-- end entries-wrap -->


        <div class="row pagination-wrap">
            <div class="col-full">
                <nav class="pgn" data-aos="fade-up">
                    <ul>
                        <li><a class="pgn__prev" href="#0">Prev</a></li>
                        <li><a class="pgn__num" href="#0">1</a></li>
                        <li><span class="pgn__num current">2</span></li>
                        <li><a class="pgn__num" href="#0">3</a></li>
                        <li><a class="pgn__num" href="#0">4</a></li>
                        <li><a class="pgn__num" href="#0">5</a></li>
                        <li><span class="pgn__num dots">…</span></li>
                        <li><a class="pgn__num" href="#0">8</a></li>
                        <li><a class="pgn__next" href="#0">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>

    </section> <!-- end s-content -->
