<?php $this->titre = "Alaska - " . $chapitre['title']; ?>


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding s-content--narrow">

        <article class="row entry format-standard">

            <div class="entry__media col-full">
                <div class="entry__post-thumb">
                    <img src="<?=  './contenu/upload/' . $chapitre['url_photo']; ?>">
                </div>
            </div>

            <div class="entry__header col-full">
                <h1 class="entry__header-title display-1">
                    <?= $chapitre['title']; ?>
                </h1>
                <ul class="entry__header-meta">
                    <li class="date"><?= $chapitre['add_date']; ?></li>
                    <li class="byline">
                        Par
                        <a href="#0">Jean Forteroche</a>
                    </li>
                </ul>
            </div>

            <div class="col-full entry__main">

                <p class="lead drop-cap">
                  <?= $chapitre['content']; ?>
                </p>

                <p>
                <!--<img src="contenu/images/wheel-1000.jpg" srcset="contenu/images/wheel-2000.jpg 2000w, images/wheel-1000.jpg 1000w, images/wheel-500.jpg 500w" sizes="(max-width: 2000px) 100vw, 2000px" alt="">-->
                </p>



                <div class="entry__taxonomies">
                     <!-- end entry__cat -->


                </div> <!-- end s-content__taxonomies -->

                <div class="entry__author">
                    <img src="contenu/images/avatars/user-03.jpg" alt="jean-Forteroche">

                    <div class="entry__author-about">
                        <h5 class="entry__author-name">
                            <span>Ecrit par</span>
                            <a href="#0">Jean Forteroche</a>
                        </h5>

                        <div class="entry__author-desc">
                            <p>
                            Je suis un auteur qui vous livre sa version du monde. Depuis plusieurs années je fai le tour du monde
                            et j'écris toute émotions concernant ces lieux qui sont toujours remplis d'histoire et de culture bien différente que celle que l'on connait.
                            </p>
                        </div>
                    </div>
                </div>

            </div> <!-- s-entry__main -->

        </article> <!-- end entry/article -->


        <!--<div class="s-content__entry-nav">
            <div class="row s-content__nav">
                <div class="col-six s-content__prev">
                    <a href="#0" rel="prev">
                        <span>Previous Post</span>
                        The Pomodoro Technique Really Works.
                    </a>
                </div>
                <div class="col-six s-content__next">
                    <a href="#0" rel="next">
                        <span>Next Post</span>
                        3 Benefits of Minimalism In Interior Design.
                    </a>
                </div>
            </div>
        </div> end s-content__pagenav -->

        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">Commentaires</h3>

                    <!-- START commentlist -->
                    <ol class="commentlist">
                    <?php foreach ($commentaires as $commentaire): ?>

                        <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img class="avatar" src="contenu/images/avatars/user-01.jpg" alt="" width="50" height="50">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">

                                    <div class="comment__author"><?= $commentaire['author']; ?></div>

                                    <div class="comment__meta">
                                        <div class="comment__time"><?= $commentaire['date']; ?></div>
                                        <div class="comment__reply">
                                            <form name="flag" method="POST" action="index.php?action=chapitre&id=<?=$chapitre['id'];?>">
                                                <input type='hidden' name="comment_id" value='<?= $commentaire['id']; ?>'>
                                                <input type="submit" class="btn--primary" id="flagComment" name="flagComment" value="Signaler">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment__text">
                                <p><?= $commentaire['content']; ?></p>
                                </div>

                            </div>
                        </li> 
                        <?php endforeach; ?><!-- end comment level 1 -->

                    </ol>
                    <!-- END commentlist -->

                </div> <!-- end col-full -->
            </div> <!-- end comments -->

            <div class="row comment-respond">

                <!-- START respond -->
                <div id="respond" class="col-full">

                    <h3 class="h2">Laisser un commentaire</h3>

                    <form name="contactForm" id="contactForm" method="POST" action="index.php?action=chapitre&id=<?=$chapitre['id'];?>#contactForm">
                      
                            
                            <div class="form-field">
                                <input type="text" name="author" id="auteur" class="full-width" placeholder="Votre Nom*" value="<?= isset($form['author']) ? $form['author']: '' ?>">
                                <?php if (isset($errors['message']['author'])) { ?>
                                    <p class="errors"><?= $errors['message']['author']; ?></p>
                                <?php } if (isset($errors['form']['author'])) {?>
                                    <p class="errors"><?= $errors['form']['author']; ?></p>
                                <?php } ?>
                            </div>
                            
                            <div class="form-field">
                                <input type="text" name="email" id="Email" class="full-width" placeholder="Votre Email*" value="<?= isset($form['email']) ? $form['email'] : '' ?>">
                                <?php if (isset($errors['message']['email'])) { ?>
                                    <p class="errors"><?= $errors['message']['email']; ?></p>
                                <?php } if (isset($errors['form']['email'])) {?>
                                    <p class="errors"><?= $errors['form']['email']; ?></p>
                                <?php } ?>
                            </div>

                            <div class="message form-field">
                                <textarea name="content" id="Message" class="full-width" placeholder="Votre Message*"><?= isset($form['content']) ? $form['content'] : '' ?></textarea>
                                <?php if (isset($errors['message']['content'])) { ?>
                                    <p class="errors"><?= $errors['message']['content']; ?></p>
                                <?php } if (isset($errors['form']['content'])) {?>
                                    <p class="errors"><?= $errors['form']['content']; ?></p>
                                <?php } ?>
                            </div>
                            

                            <input type="hidden" name="id" value="<?= $chapitre['id']; ?>"/>

                            <input type="submit" name="commenter" value="commenter" class="btn btn-primary btn-wide btn--large full-width">
                        
                    </form> <!-- end form -->

                </div>
                <!-- END respond-->

            </div> <!-- end comment-respond -->

        </div> <!-- end comments-wrap -->

    </section> <!-- end s-content -->
