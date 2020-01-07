

<!-- s-content
================================================== -->
<body id="top">

    <section class="s-content">

    <!--Début slider-->
    <div class="slider-connexion">
        <img class="img-connexion-slider" src="contenu/images/slider-connexion.jpg" />
    </div>
    <!--fin slider-->

    <div class="row narrow">

        <div class="col-full s-content__main">

        <h2>Connectez-vous Jean !</h2>

            <form name="cForm" id="cForm" class="contact-form" method="POST" action="index.php?action=connexion">
                <fieldset>
                <input type="hidden" name="submitted" id="submitted" value="1"/>
                <div>
                    <input name="email" class="full-width" placeholder="Identifiant" value="<?= isset($form['email']) ? $form['email'] : '' ?>" type="text">
                    <?php if (isset($errors['message']['email'])) { ?>
                        <p class="errors"><?= $errors['message']['email']; ?></p>
                    <?php } if (isset($errors['form']['email'])) {?>
                        <p class="errors"><?php $errors['form']['email']; ?></p>
                    <?php } ?>
                </div>

                <div class="form-field">
                    <input name="password" class="full-width" placeholder="Mot de passe" value="<?= isset($form['password']) ? $form['password'] : '' ?>" type="text">
                    <?php if (isset($errors['message']['password'])) { ?>
                        <p class="errors"><?= $errors['message']['password']; ?></p>
                    <?php } if (isset($errors['form']['password'])) {?>
                        <p class="errors"><?php $errors['form']['password']; ?></p>
                    <?php } ?>
                </div>
                <?php if (isset($form['message'])) { ?>
                    <p class="errors"><?= $form['message']; ?></p>
                <?php } ?>
                <input type="submit" name="connect" value="Suivez-nous Jean !" class="submit btn btn--primary btn--large full-width">

                </fieldset>
            </form>

        </div>

    </div>

</section>

</body>
