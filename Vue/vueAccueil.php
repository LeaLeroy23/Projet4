    <!-- featured
    ================================================== -->
    
    <section class="s-featured">

        <div class="row">
            <div class="col-full">

                <div class="featured-slider featured" data-aos="zoom-in">


                  <?php foreach ($chapitres as $chapitre): ?>
                    <div class="featured__slide">

                        <div class="entry">

                            <div class="entry__background">
                            
                                <img src="<?= './contenu/upload/' . $chapitre['url_photo'];?>"><!--$_SERVER['REMOTE_HOST] 'contenu/upload' $chapitre['url_photo']-->
                            </div>

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0"></a></span>

                                <h1><a href="<?= "index.php?action=chapitre&id=" . $chapitre['id'] ?>" title=""><?= $chapitre['title']?></a></h1>

                                <div class="entry__info">
                                    <a href="<?= "index.php?action=chapitre&id=" . $chapitre['id'] ?>" class="entry__profile-pic">
                                        <img class="avatar" src="contenu/images/avatars/user-03.jpg" alt="">
                                    </a>
                                    <ul class="entry__meta">
                                        <li>Jean Forteroche</a></li>
                                        <li><?= $chapitre['add_date']?></li>
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

                            <div class="item-entry__cat" style="border-top: 2px solid #6666; width: 80%; margin: 0 auto;">

                                <h3 class="title-bio">Son Histoire</h3>
                                    <p style="font-size: 1.6rem; padding: 15px; line-height: 25px;">
                                    Jean Forteroche est un écrivain qui préfére s'inspirer de paysage à la limite du desertique.<br />
                                    Vous connaissez sans doute une partie de ses oeuvres précédente "Voyage au bout du Nepal", "Les allées du Nevada" et bien d'autres écrit qui m'ont voulu de nombreuses récompenses dans des compétition littéraire.
                                    Après ça j'ai voulu trouver une nouvelle inspiration une nouvelle facette de mon écriture. J'ai longtemps chercher au plus porfond de mon être et de mes connaissances pour trouver ce petit déclic qui m'aidera sans doute à avoir de nouveau un prix littéraire.
                                    </p>

                                <h3 class="title-bio">Ses Oeuvres</h3>
                                    <p style="font-size: 1.6rem; padding: 15px; line-height: 25px;">
                                    Je suis un écrivain qui préfére s'inspirer de paysage pour ses oeuvres. Dans ma vision des choses le paysages compte tout autant que les personnages qui y sont présenté.<br />
                                    Je ne dirais pas que mes livres, mes écrit sont véritablement des romans. Pour moi ils sont des recueilles. Chacun sur un sujet particulier, une partie du globe ou un pays 
                                    Vous connaissez sans doute une partie de mes oeuvres précédente "Voyage au bout du Nepal", "Les allées du Nevada" ou encore "Les collines du Brésil".
                                    </p>

                                <h3 class="title-bio">Ma nouvelle oeuvres "Alaska"</h3>
                                    <p style="font-size: 1.6rem; padding: 15px; line-height: 25px;">
                                    Un jour dans une boutique j'ai vue en tête de gondole un magazine "national geographie" qui avait pour sujet principal l'Alaska. C'est là que j'ai eu cette idée. Partir quelques mois au fin
                                    fond de l'Alaska pour écrire ce nouveau livre. Bien évidemment cela n'avait rien à voir avec ceux que j'ai déjà écrit, c'est un décor complétement différent. <br />
                                    Et justement cela m'a permis d'aller au delà de mes limites et de me découvrir un nouveau style d'écriture.

                                    </p>

                                    <h4 class="title-bio">Venez découvrir ma nouvelle oeuvre <a href="index.php?action=chapitres">Alaska</a></h4>

                            </div>

                        </div>

                    </div> <!-- item-entry -->


                </article> <!-- end article -->

            </div> <!-- end entries -->

        </div> <!-- end entries-wrap -->

    </section> <!-- end s-content -->
